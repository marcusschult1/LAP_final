<?php
ini_set('display_errors', 1); error_reporting(-1);

//if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
//    echo 'We don\'t have mysqli!!!';
//} else {
//    echo 'Phew we have it!';
//}

$host = "localhost";
$username = "root";
$passwd = "";
$dbname = "immobilie";

// Create connection
$conn = new mysqli($host, $username, $passwd, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>





<!--$servername = "localhost";-->
<!--$username = "root";-->
<!--$password = "15381538";-->
<!---->
<!--try {-->
<!--$conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);-->
<!--// set the PDO error mode to exception-->
<!--$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);-->
<!--echo "Connected successfully";-->
<!--} catch(PDOException $e) {-->
<!--echo "Connection failed: " . $e->getMessage();-->
<!--}-->
