<?php include('header.php') ?>

<?php

include "dbconn.php";
if (isset($_POST['content'])) {
    //inhalt anzeigen
    $sql = 'select * from '.$_POST['table'];
    $result = mysqli_query($conn, $sql);
    $columncount = mysqli_num_fields($result);
    //$table = mysqli_fetch_array($result, MYSQLI_NUM);
    //$test2 = mysqli_fetch_field($result);
    $rows = [];
    while($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }?>

    <section class="about-section" id="about" >
        <div class="container" style="margin-top: 3rem">
            <form method="post" action="tableinfo.php">
            <h2>table content "<?php echo $_POST['table'] ?>"</h2>
            <input type="hidden" name="table" value="<?php echo $_POST['table'] ?>">
                <?php echo 'row count: ' .count($rows). '<br>'?>
                <?php echo 'column count: ' .$columncount ?>
                <table class="table table-bordered w-100" style="margin-top: 5rem">
                    <thead>
                    <tr>
                    <?php while ($columnname = mysqli_fetch_field($result)): ?>
                        <th scope="col" style="color: black"><?php echo $columnname -> name?></th>
                    <?php endwhile; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (count($rows) == 0): ?>
                        <h1>Keine Einträge</h1>

                    <?php else: ?>
                        <?php for($i = 0; $i< count($rows); $i++): ?>
                        <tr>
                            <?php for($x = 0; $x< $columncount; $x++): ?>
                                    <th scope="row" style="color: black"><?php echo $rows[$i][$x]?></th>
                            <?php endfor; ?>
                        </tr>
                        <?php endfor; ?>

                    <?php endif; ?>
                    </tbody>
                </table>
                <div class="container">
                    <button class="btn btn-dark" type="submit" value="any" name="submit" style="float: right">Details Anzeigen</button>
                </div>
            </form>
        </div>
    </section>

<?php
}
?>


<?php include('footer.php') ?>
