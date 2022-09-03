<?php include ("dbconn.php");
include("header.php");

$sql = 'SELECT * FROM diagnose';
$result = mysqli_query($conn, $sql);
$diagnose = mysqli_fetch_all($result, MYSQLI_ASSOC);

$count = 1;
?>

<div class="container">
    <div class=" mt-5">
        <h2> Dignosen Zentrum</h2>
        <?php echo count($diagnose) ?>
        <form method="post" action="add_diagnose.php"> 
            <table class="table">
        <thead>
            <tr>
                <th style="width: 4rem" scope="col">#</th>
                <th scope="col">Diagnose</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($diagnose as $dia): ?>
                <tr <?php if ($dia['dia_id'] == count($diagnose) && $dia['dia_id'] > 3){echo 'style="background-color: lightcoral"';} ?>>
                    <th scope="row"><?php echo $count ?></th>
                    <td><?php echo $dia['dia_name'] ?></td>
                    <td>
                    <form onsubmit="return confirm('<?php echo $dia['dia_name']?> wird gelöscht.. Sind Sie sicher?');" method="post">
                        <input type="hidden" name="dia_id" value="<?php echo $dia['dia_id']?>">
                        <button  class="glyphicon glyphicon-trash" onclick="form.action='delete.php'" type="submit" value="submit" name="submit" style="float: right; border: 0"></button>
                    </form>
                    <form method="post">
                        <input type="hidden" name="dia_id" value="<?php echo $dia['dia_id']?>">
                        <button  class="glyphicon glyphicon-pencil" onclick="form.action='edit_diagnose.php'" type="submit" value="submit" name="submit" style="float: right; border: 0"></button>
                    </form>
                    </td>
                </tr>
            <?php 
            $count++;
            endforeach; ?>
            <tr>
                <th scope="row"></th>
                <td><input type="text" name="diagnose" required></td>
                <td><button class="btn btn-dark" type="submit" value="submit" name="submit" style="float: right">Hinzufügen</button></td>
            </tr>
        </tbody>
        </table>
        </form>
        
    </div>
</div>


<?php include("footer.php") ?>
