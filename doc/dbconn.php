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
$dbname = "mydb";

// Create connection
$conn = new mysqli($host, $username, $passwd, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
?>
