<?php

include "dbconn.php";

session_start();

if (isset($_POST['submit'])) {
    $sql = 'update objekt, flaechen 
        set obj_wohnflaeche='.$_POST['wohnflaeche'].', fla_gesamt='.$_POST['gesamtflaeche'].' 
        where (objekt.obj_id = '.$_SESSION['objid'].') and (flaechen.obj_id = '.$_SESSION['objid'].')';
    $result = mysqli_query($conn, $sql);

    if ($result) {
        //success
        header('Location: allrealestate.php');
        //echo 'Has been added';
    } else {
        //Error
        echo 'Error: ' . mysqli_error($conn);
    }
}