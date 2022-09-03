<?php
include "dbconn.php";

$rana_name = '';
$ranaError = '';
$rana_id = 0;

// Form Submit
if (isset($_POST['submit'])) {
    //validate name
    if (empty($_POST['rana_name'])) {
        $ranaError = 'First Name is required';
    } else {
        $rana_name = filter_input(INPUT_POST, 'rana_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    if (empty($ranaError)) {
        //add to db
        $sql = "INSERT INTO raumname (rana_name) VALUES ('$rana_name')";

        if (mysqli_query($conn, $sql)) {
            //success
            header('Location: index.php');
            //echo 'Has been added';
        } else {
            //Error
            echo 'Error: ' . mysqli_error($conn);
        }
    }
}
