<?php

include "dbconn.php";

if (isset($_POST['submit'])) {
    $sql = 'select objekt.obj_id,
        objekt.obj_wohnflaeche,
                preis.pre_betrag,
                bezug.bez_am,
                handel.han_name,
                flaechen.fla_gesamt
        from objekt
        left outer join bezug on objekt.obj_id = bezug.obj_id
        inner join preis on objekt.obj_id = preis.obj_id
        natural join handel
        inner join flaechen on objekt.obj_id = flaechen.obj_id
        where objekt.obj_id = '.$_POST['test'];
    $result = mysqli_query($conn, $sql);
    $realestates = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
    session_start();
    $_SESSION['objid'] = $_POST['test'];
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Grayscale - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">Start Bootstrap</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="allrealestate.php">Alle Immobilien</a></li>
                <li class="nav-item"><a class="nav-link" href="search.php">Suche</a></li>
            </ul>
        </div>
    </div>
</nav>

<section class="about-section" id="about" >
    <form method="post" action="edit.php">
        <div class="container w-50" style="margin-top: 200px">
            <h2>Bearbeiten</h2>
            <div class="form-group">
                <label >Wohnfläche</label>
                <input class="form-control" name="wohnflaeche" aria-describedby="emailHelp" value="<?php echo $realestates[0]['obj_wohnflaeche'] ?>">
            </div>
            <div class="form-group" style="margin-top: 2rem">
                <label>Gesamtfläche</label>
                <input class="form-control" name="gesamtflaeche" value="<?php echo $realestates[0]['fla_gesamt'] ?>">
            </div>


            <div class="container" style="margin-top: 2rem">
                <button class="btn btn-light" type="submit" value="edit" name="submit" style="float: right">Speichern</button>
            </div>


        </div>
    </form>



</section>



<!-- Footer-->
<footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; Your Website 2022</div></footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>







