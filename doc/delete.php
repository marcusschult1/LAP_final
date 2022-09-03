<?php
include 'dbconn.php';

$dia_id=$_POST['dia_id'];
mysqli_query($conn,"delete from diagnose where dia_id='$dia_id';");

header('Location: diagnosen.php');
?>

