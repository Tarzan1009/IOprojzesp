<?php

include('database_connection.php');


//switch ($_POST['submit']) {
//    case 'standard':
//        $_SESSION['rozmiar'] = "Standard";
//        break;
//    case 'express':
//        $_SESSION['rozmiar']  = "Express";
//        break;
//    case 'gabaryt':
//        $_SESSION['rozmiar']  = "Gabaryt";
//        break;
//    case 'gabaryt_express':
//        $_SESSION['rozmiar']  = "Gabaryt_Express";
//        break;
//}

//if (isset($_POST["submit"])) {
//    try {
//        // set the PDO error mode to exception
//        $register_user_id = $_SESSION['user_id'];
//        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $insert_query = "
//		INSERT INTO paczka
//		(nr_paczki, rozmiar, register_user_id)
//		VALUES ('$kod_przesylki', '$rozmiar', '$register_user_id')
//		";
//        $statement = $connect->prepare($insert_query);
//
//        $statement->execute(
//            array(
//                ':nr_paczki' => $kod_przesylki,
//                ':rozmiar' => $rozmiar,
//                ':register_user_id' => $register_user_id,
//            )
//        );
//        // use exec() because no results are returned
//        $connect->exec($insert_query);
//    } catch (PDOException $e) {
//        echo $insert_query . "<br>" . $e->getMessage();
//    }
//
//    $connect = null;
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cennik</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styl.css">

</head>
<body>

<nav class="navbar navbar-expand navbar-dark bg-yellow">

    <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
            <a class="navbar-brand" href="witaj.php"><img src="img/logo.png" alt="logo" height="30px"> Poczta</a>
            <ul> <?php
                include("data.php");
                ?> </ul>
        </ul>
        <form class="form-inline my-2 my-md-0"></form>

    </div>
    <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span class="navbar-toggler-icon"></span></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02"
            aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
</nav>
<div id="wrapper" class="toggled">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand"><a href="witaj.php"> Panel Klienta </a></li>
            <li><a href="wyslij.php">Wyślij paczkę</a></li>
            <li><a href="informacjeoprzesylce.php">Paczki</a></li>
            <li><a href="logout.php">Wyloguj</a></li>
        </ul>
    </div> <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="row mx-auto" id="opcje">
            <div class="col-md-3 outer">

                <div class="col-md-12 opcja">
                    <div class="okno-header">
                        <h2>Standard</h2>
                    </div>
                    <div>
                        <h3>
                            <br>
                            <img src="img/package.png" alt="Paczka" width="100%">
                            <br><br>
                            Rozmiar paczki:<br>
                            30x30x30cm<br>
                            <br>
                            Czas dostawy:<br>
                            2-3 dni robocze<br>
                            <br>
                        </h3>
                    </div>
                    <form method="post">
                        <a class="btn mx-auto przycisk btn-secondary" href="wyslij2.php?rozmiar=standard">Wybierz</a>
                    </form>
                </div>
            </div>

            <div class="col-md-3 outer">
                <div class="col-md-12 opcja">
                    <div class="okno-header">
                        <h2>Express</h2>
                    </div>
                    <div>
                        <h3>
                            <br>
                            <img src="img/package.png" alt="Paczka" width="100%">
                            <br><br>
                            Rozmiar paczki:<br>
                            30x30x30cm<br>
                            <br>
                            Czas dostawy:<br>
                            1 dzień roboczy<br>
                            <br>
                        </h3>
                    </div>
                    <form method="post">
                        <a class="btn mx-auto przycisk btn-secondary" href="wyslij2.php?rozmiar=express">Wybierz</a>
                    </form>
                </div>
            </div>

            <div class="col-md-3 outer">
                <div class="col-md-12 opcja">
                    <div class="okno-header">
                        <h2>Gabaryt</h2>
                    </div>
                    <div>
                        <h3>
                            <br>
                            <img src="img/package.png" alt="Paczka" width="100%">
                            <br><br>
                            Rozmiar paczki:<br>
                            60x45x30cm<br>
                            <br>
                            Czas dostawy:<br>
                            2-3 dni robocze<br>
                            <br>
                        </h3>
                    </div>
                    <form method="post">
                        <a class="btn mx-auto przycisk btn-secondary" href="wyslij2.php?rozmiar=gabaryt">Wybierz</a>
                    </form>
                </div>
            </div>

            <div class=" col-md-3 outer">
                <div class="col-md-12 opcja">
                    <div class="okno-header">
                        <h2>Gabaryt Express</h2>
                    </div>
                    <div>
                        <h3>
                            <br>
                            <img src="img/package.png" alt="Paczka" width="100%">
                            <br><br>
                            Rozmiar paczki:<br>
                            60x45x30cm<br>
                            <br>
                            Czas dostawy:<br>
                            1 dzień roboczy<br>
                            <br>
                        </h3>
                    </div>
                    <form method="post">
                        <a class="btn mx-auto przycisk btn-secondary" href="wyslij2.php?rozmiar=gabaryt_express">Wybierz</a>
                    </form>
                </div>
            </div>

        </div>
    </div> <!-- /#page-content-wrapper -->
</div> <!-- /#wrapper -->

<div id="kod">
    <div class="row">
        <div class="col-md-4" id="window">
            <div id="zamknij">
                <button type="button" onclick="off()" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="okno-header">
                Kod przesyłki
            </div>
            <div id="outer-kod">
                <div id="kod-field">
                    <?php
                    echo base_convert($kod_przesylki, 10, 36) . "\n";
                    ?>
                </div>
            </div>
            <div>
                <button type="button" onclick="paczkomat()" class="btn przycisk dwielinie btn-primary" id="wyslij">
                    Wybierz
                    paczkomat
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script> <!-- Menu Toggle Script -->
<script>
    $(function () {
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $(window).resize(function (e) {
            if ($(window).width() <= 768) {
                $("#wrapper").removeClass("toggled");
            } else {
                $("#wrapper").addClass("toggled");
            }
        });
    });

    function paczkomat() {
        location.href = "paczkomat.php";
    }

    function wyslij2() {
        location.href = "wyslij2.php";
    }

    function myFunction() {
        /* Get the text field */
        var copyText = document.getElementById("kod-field");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /*For mobile devices*/

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        alert(copyText.value);
    }

    function standard() {
        $rozmiar = "Standard";
    }

    function express() {
        $rozmiar = "Express"
    }

    function gabaryt() {
        $rozmiar = "Gabaryt"
    }

    function gabaryt_express() {
        $rozmiar = "Gabaryt Express"
    }


</script>

</body>
</html>
