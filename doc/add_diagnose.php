<?php
include "dbconn.php";

$dia_name = '';
$rana_id = 0;
$array = [];
$string = '';

$sql2 = 'SELECT * FROM diagnose';
$result2 = mysqli_query($conn, $sql2);
$diagnose2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);


// Form Submit
if (isset($_POST['submit'])) {

    $dia_name = filter_input(INPUT_POST, 'diagnose', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    //puts every diagnose in an array
    foreach($diagnose2 as $dia) {
        array_push($array, $dia['dia_name']);
    }

    //converts array to string
    $string = implode('', $array);

    //check if array contains string
    if(str_contains($string, $dia_name)) {
        include('header.php');
        ?>
        <div class="container" style="color: red">
            <div class=" mt-5">
                <h2>Kann nicht hinzugefügt werden, Datensatz bereits vorhanden</h2>
                <a class="btn btn-dark" href="diagnosen.php" style="float: centre">Erneut versuchen</a>
            </div>
        </div>
        <?php
        include('footer.php');
    } else {
        //add to db
        $sql = "INSERT INTO diagnose (dia_name) VALUES ('$dia_name')";

        if (mysqli_query($conn, $sql)) {
            //success
        header('Location: diagnosen.php');
            //echo 'Has been added';
        } else {
            //Error
            echo 'Error: ' . mysqli_error($conn);
        }
    }    
}