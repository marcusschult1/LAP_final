<?php include("header.php");
include("dbconn.php");

$dia_id=$_POST['dia_id'];
$sql = 'select * from diagnose WHERE dia_id = "'.$dia_id.'"';
$result = mysqli_query($conn, $sql);
$diagnose = mysqli_fetch_all($result, MYSQLI_ASSOC);

session_start();
$_SESSION['dia_id'] = $dia_id;
?>

<div class="container">
    <div class=" mt-5">
        <h2> Dignosen Bearbeiten</h2>
        <!-- <?php echo $_POST['dia_id'] ?> -->
        <form method="post" action="edit.php"> 
            <table class="table">
        <thead>
            <tr>
                <th style="width: 4rem" scope="col"></th>
                <th scope="col">Diagnose</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"></th>
                <td>
                    <input  type="text" name="name" value="<?php echo $diagnose[0]['dia_name'] ?>">
                </td>
                <td>
                <button type="submit" class="btn btn-dark" value="submit" name="submit" style="float: right; border: 0">Speichern</button>
                </td>
            </tr>
        </tbody>
        </table>
        </form>
    </div>
</div>


<?php include("footer.php") ?>