<?php
    include 'dbconn.php';
    include 'functions.php';

//    $test = 2;
//
//    $sql = 'SELECT * FROM person';
//    $result = mysqli_query($conn, $sql);
//    $person = mysqli_fetch_all($result, MYSQLI_ASSOC);
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
                <a class="navbar-brand" href="#page-top">Start Bootstrap</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="#about">Räume</a></li>
                        <li class="nav-item"><a class="nav-link" href="allrealestate.php">Alle Immobilien</a></li>
                        <li class="nav-item"><a class="nav-link" href="search.php">Suche</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1 class="mx-auto my-0 text-uppercase">Start</h1>
                        <h2 class="text-white-50 mx-auto mt-2 mb-5">A free, responsive, one page Bootstrap theme created by Start Bootstrap.</h2>
                        <a class="btn btn-primary" href="#about">Räume</a>
                        <a class="btn btn-primary" href="allrealestate.php">Alle immobilien</a>
                    </div>
                </div>
            </div>
        </header>
        <!-- About-->
        <section class="about-section" id="about">

<!--            <div class="container">-->
<!--                --><?php //foreach ($person as $item): ?>
<!--                <div class="card my-3">-->
<!--                    <div class="card-body text-center">-->
<!--                        <p>--><?php //echo $item['vname'] ?><!--, --><?php //echo $item['nname'] ?><!-- is --><?php //echo $item['alter'] ?><!-- Jahre alt</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--                --><?php //endforeach; ?>
<!--            </div>-->

<!--            <div class="container">-->
<!--                <table class="table table-bordered w-100" style="margin-top: 5rem">-->
<!--                    <thead>-->
<!--                    <tr>-->
<!--                        <th scope="col" style="color: white">#</th>-->
<!--                        <th scope="col" style="color: white">First</th>-->
<!--                        <th scope="col" style="color: white">Last</th>-->
<!--                        <th scope="col" style="color: #ffffff">Age</th>-->
<!--                        <th scope="col" style="color: white"></th>-->
<!--                    </tr>-->
<!--                    </thead>-->
<!--                    <tbody>-->
<!--                    --><?php //foreach ($person as $object): ?>
<!--                    <tr>-->
<!--                        <th scope="row" style="color: white">--><?php //echo $object['idperson']?><!--</th>-->
<!--                        <td style="color: white">--><?php //echo $object['vname']?><!--</td>-->
<!--                        <td style="color: white">--><?php //echo $object['nname']?><!--</td>-->
<!--                        <td style="color: white">--><?php //echo $object['per_age']?><!--</td>-->
<!--                        <td>-->
<!--                            <a href="delete.php?id=--><?php //echo $object['idperson']; ?><!--" type="button"  class="btn btn-danger">Delete</a>-->
<!--                        </td>-->
<!--                    </tr>-->
<!--                    --><?php //endforeach; ?>
<!--                    </tbody>-->
<!--                </table>-->
<!--            </div>-->

<!---->
<!--            <div class="container">-->
<!--                <p>Dropdown Div</p>-->
<!--                --><?php
//                    $query = 'select * from person;';
//                    makeDropDown($query, 'Personen: ');
//                ?>
<!--            </div>-->

            <div class="container" >
                <?php include 'room.php'?>
            </div>
            <div class="container">
                <a href="create.php" type="button" class="btn btn-light" style="float: right">Add</a>
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
