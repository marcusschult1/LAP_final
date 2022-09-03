<?php
include "dbconn.php";

$sql = 'show databases;';
$result = mysqli_query($conn, $sql);
$dbs = mysqli_fetch_all($result, MYSQLI_ASSOC);
$count = 1;
?>
<div class="container">
    <form method="post" action="dbtables.php">
        <table class="table table-bordered w-100" style="margin-top: 5rem">
            <thead>
            <tr>
                <th scope="col" style="color: black">#</th>
                <th scope="col" style="color: black">First</th>
                <th>Auswahl</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($dbs as $object): ?>
                <tr>
                    <th scope="row" style="color: black"><?php echo $count ?></th>
                    <td style="color: black"><?php echo $object['Database']?></td>
                    <td style="color: black">
                        <input type="radio" checked="checked" value="<?php echo $object['Database']?>" id="html" name="database">
                    </td>
                </tr>
            <?php $count++; ?>    
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="container">
            <button class="btn btn-dark" type="submit" value="submit" name="submit" style="float: right">Details Anzeigen</button>
        </div>

    </form>
</div>
