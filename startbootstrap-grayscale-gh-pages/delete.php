<?php
include 'dbconn.php';

$idperson=$_GET['idperson'];
mysqli_query($conn,"delete from person where idperson='$idperson';");

//header('Location: index.php');
?>
<p><?php echo 'idperson: '?></p>
