<?php

include "dbconn.php";

if (isset($_POST['submit'])) {
    $sql_first = 'select objekt.obj_id,
		objekt.obj_strasse_nr,
                strasse.str_name,
                plz.plz_id,
                ort.ort_name,
                preis.pre_betrag,
                bezug.bez_am,
                handel.han_name,
                flaechen.fla_gesamt
        from objekt
        left outer join bezug on objekt.obj_id = bezug.obj_id
        inner join preis on objekt.obj_id = preis.obj_id
        inner join strasse on objekt.str_id = strasse.str_id
        inner join plz on strasse.plz_plz_id = plz.plz_id
        natural join ort
        natural join handel
        inner join flaechen on objekt.obj_id = flaechen.obj_id';

    if ($_POST['att'] == 'fla_gesamt'){
        $sql_extend = ' where fla_gesamt >= '.$_POST['test2'];
    } elseif ($_POST['att'] == 'obj_wohnflaeche') {
        $sql_extend = ' where obj_wohnflaeche >= '.$_POST['test2'];
    } elseif ($_POST['att'] == 'pre_betrag') {
        $sql_extend = ' where pre_betrag <= 2*'.$_POST['test2'];
    } else {
        $sql_extend = ' where '.$_POST['att'].' like "%'.$_POST['test2'].'%";';
    }

    $sql = $sql_first . $sql_extend;
    $result = mysqli_query($conn, $sql);
    $realestates = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
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

    <?php include "searchbar.php"?>

    <form name="form" method="post">
        <div class="container" style="margin-top: 200px">
            <?php echo $_POST['att'] ?>
            <table class="table table-bordered w-100">
                <thead>
                <tr>
                    <th scope="col" style="color: white">Objekt Nr</th>
                    <th scope="col" style="color: white">Straße</th>
                    <th scope="col" style="color: white">PLZ</th>
                    <th scope="col" style="color: white">Ort</th>
                    <th scope="col" style="color: white">Preis</th>
                    <th scope="col" style="color: white">Bezug am</th>
                    <th scope="col" style="color: white">Handel</th>
                    <th scope="col" style="color: white">Auswahl</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($realestates as $object): ?>
                    <tr>
                        <td scope="row" style="color: white"><?php echo $object['obj_id']?></td>
                        <td style="color: white"><?php echo $object['str_name']?></td>
                        <td style="color: white"><?php echo $object['plz_id']?></td>
                        <td style="color: white"><?php echo $object['ort_name']?></td>
                        <td style="color: white"><?php echo $object['pre_betrag']?></td>
                        <td style="color: white"><?php echo $object['bez_am']?></td>
                        <td style="color: white"><?php echo $object['han_name']?></td>
                        <td style="color: white">
                            <input type="radio" id="html_<?php echo $object['obj_id']?>" value="<?php echo $object['obj_id']?>" checked="checked"  name="test">
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <div class="container">
                <button class="btn btn-light" type="submit" value="submit" onclick="form.action='realestatedetails2.php'" name="submit" style="float: right; margin-left: 1rem">Details Anzeigen</button>
            </div>
            <div class="container">
                <button class="btn btn-light" type="submit" value="edit" onclick="form.action='editrealestate.php'" name="submit" style="float: right">Bearbeiten</button>
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







