<?php

include "dbconn.php";

session_start();

echo $_POST['name'];
echo $_SESSION['dia_id'];

if (isset($_POST['submit'])) {
    $sql = 'UPDATE diagnose set dia_name="'.$_POST['name'].'" WHERE dia_id = '.$_SESSION['dia_id'].';';
    $result = mysqli_query($conn, $sql);

    if ($result) {
        //success
        header('Location: diagnosen.php');
        //echo 'Has been added';
    } else {
        //Error
        echo 'Error: ' . mysqli_error($conn);
    }
}