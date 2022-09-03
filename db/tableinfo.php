<?php include('header.php') ?>

<?php

include "dbconn.php";
if (isset($_POST['submit'])) {
    $sql = 'describe '.$_POST['table'];
    $result = mysqli_query($conn, $sql);
    $table = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>

    <section class="about-section" id="about" >
        <div class="container" style="margin-top: 3rem">
            <form method="post" action="tablecontent.php">
            <h2>table info "<?php echo $_POST['table'] ?>"</h2>
                <input type="hidden" name="table" value="<?php echo $_POST['table'] ?>">
                <table class="table table-bordered w-100" style="margin-top: 5rem">
                    <thead>
                    <tr>
                        <th scope="col" style="color: black">Field</th>
                        <th scope="col" style="color: black">Type</th>
                        <th scope="col" style="color: black">Null</th>
                        <th scope="col" style="color: black">Key</th>
                        <th scope="col" style="color: black">Default</th>
                        <th scope="col" style="color: black">Extra</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($table as $object): ?>
                        <tr>
                            <td style="color: black"><?php echo $object['Field'] ?></td>
                            <td style="color: black"><?php echo $object['Type'] ?></td>
                            <td style="color: black"><?php echo $object['Null'] ?></td>
                            <td style="color: black"><?php echo $object['Key'] ?></td>
                            <td style="color: black"><?php echo $object['Default'] ?></td>
                            <td style="color: black"><?php echo $object['Extra'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="container">
                    <button class="btn btn-dark" type="submit" value="any" name="content" style="float: right">Inhalt Anzeigen</button>
                </div>
            </form>
        </div>


    </section>

  <?php

} 
?>

<?php include('footer.php') ?>
