<?php

    include "dbconn.php";



    if (isset($_POST['submit'])) {
        $sql = 'select objekt.obj_id,
                handel.han_name,
                objekt.obj_wohnflaeche,
                preis.pre_betrag
        from objekt 
        left outer join handel on objekt.han_id = handel.han_id
        inner join objektart on objekt.obar_id= objektart.obar_id
        inner join preis on objekt.obj_id = preis.obj_id
        where objekt.obj_id = '.$_POST['test'];
        $result = mysqli_query($conn, $sql);
        $realestate = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $sql2 = 'select objekt.obj_id,
            heizen_wasser_objekt.heizen_oder_wasser,
            heizen_wasser.hewa_name
        from objekt
        inner join heizen_wasser_objekt on objekt.obj_id = heizen_wasser_objekt.obj_id
        inner join heizen_wasser on heizen_wasser_objekt.hewa_id = heizen_wasser.hewa_id
        where objekt.obj_id = '.$_POST['test'];
        $result2 = mysqli_query($conn, $sql2);
        $realestate2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);

        $sql3 = 'select objekt.obj_id,
            flaechen.fla_garten,
            flaechen.fla_gesamt,
            flaechen.fla_grundflaeche
        from objekt 
        inner join flaechen on objekt.obj_id = flaechen.obj_id
        where objekt.obj_id = '.$_POST['test'];
        $result3 = mysqli_query($conn, $sql3);
        $realestate3 = mysqli_fetch_all($result3, MYSQLI_ASSOC);

        $sql4 = 'select count(raum.rau_id) as "counter"
        from raum
        where raum.obj_id = '.$_POST['test'];
        $result4 = mysqli_query($conn, $sql4);
        $realestate4 = mysqli_fetch_all($result4, MYSQLI_ASSOC);

        $sql5 = 'select objekt.obj_id,
            objekteigenschaften.obei_name
        from objekt
        inner join objekteigenschaften_objekt on objekt.obj_id = objekteigenschaften_objekt.objekt_obj_id
        inner join objekteigenschaften on objekteigenschaften_objekt.obei_id = objekteigenschaften.obei_id
        where objekt.obj_id = '.$_POST['test'];
        $result5 = mysqli_query($conn, $sql5);
        $realestate5 = mysqli_fetch_all($result5, MYSQLI_ASSOC);

        $sql6 = 'select objekt.obj_id,
            raum.rau_id,
          raumname.rana_name,
          group_concat(\' \',Ausstattung.aus_name)  as "equipment"
         from objekt 
         inner join raum on objekt.obj_id = raum.obj_id
         inner join raumname on raum.rana_id = raumname.rana_id
         left outer join Ausstattung_raum on raum.rau_id = Ausstattung_raum.rau_id
         left outer join Ausstattung on Ausstattung_raum.aus_id = Ausstattung.aus_id
        where objekt.obj_id = '.$_POST['test'].'
           group by raum.rau_id';
        $result6 = mysqli_query($conn, $sql6);
        $realestate6 = mysqli_fetch_all($result6, MYSQLI_ASSOC);
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


    <div class="container" style="margin-top: 200px; text-align: center">
        <div>
            <a class="btn btn-primary" style="margin-bottom: 3rem" href="allrealestate.php">zur??ck</a>
        </div>
        <div class="modal-body jumbotron">
            <div class="container-fluid">
                <div class="row" style="align-content: center; margin-bottom: 4rem; margin-top: 4rem">
                    <div class="col-sm">
                        <p>Objekt ID</p>
                        <h1><?php echo $realestate[0]['obj_id'] ?></h1>
                    </div>
                    <div class="col-sm">
                        <p>Kauf/Miete</p>
                        <h1><?php echo $realestate[0]['han_name'] ?></h1>
                    </div>
                    <div class="col-sm">
                        <p>Wohnfl??che</p>
                        <h1><?php echo $realestate[0]['obj_wohnflaeche'] ?></h1>
                    </div>
                    <div class="col-sm">
                        <p>Preis</p>
                        <h1><?php echo $realestate[0]['pre_betrag'] ?></h1>
                    </div>
                </div>

                <div class="row" style="align-content: center; margin-bottom: 4rem">
                    <div class="col-sm">
                        <p>Heizen/Wasser</p>
                        <?php foreach ($realestate2 as $item):?>
                            <h1><?php if ($item['heizen_oder_wasser'] > 1) {
                                    echo 'Warmwasser';
                                } else {
                                    echo 'Heizung';
                                }
                                ?></h1>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-sm">
                        <p>System</p>
                        <?php foreach ($realestate2 as $item):?>
                            <h1><?php echo $item['hewa_name'] ?></h1>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="row" style="align-content: center; margin-bottom: 4rem">
                    <div class="col-sm">
                        <p>Gartenfl??che</p>
                        <h1><?php echo $realestate3[0]['fla_garten'] ?></h1>
                    </div>
                    <div class="col-sm">
                        <p>Gesamtfl??che</p>
                        <h1><?php echo $realestate3[0]['fla_gesamt'] ?></h1>
                    </div>
                    <div class="col-sm">
                        <p>Grundfl??che</p>
                        <h1><?php echo $realestate3[0]['fla_grundflaeche'] ?></h1>
                    </div>
                </div>

                <div class="row" style="align-content: center; text-align: center margin-bottom: 4rem">
                    <div class="col-sm">
                        <p>Anzahl der R??ume</p>
                        <h1><?php echo $realestate4[0]['counter'] ?></h1>
                    </div>
                </div>

                <div class="row" style="align-content: center; margin-bottom: 4rem">
                    <div class="col-sm">
                        <p>Sonstiges</p>
                        <?php foreach ($realestate5 as $item):?>
                            <h1><?php echo $item['obei_name'] ?></h1>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="row" style="align-content: center; margin-bottom: 4rem">
                    <div class="col-sm">
                        <?php foreach ($realestate6 as $item):?>
                            <p><?php echo $item['rana_name'] ?></p>
                            <h1><?php echo $item['equipment'] ?></h1>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

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








