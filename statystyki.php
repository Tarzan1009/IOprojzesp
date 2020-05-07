<?php

include('database_connection.php');
include('statusmsg.php');

if (!empty($_GET['id_paczkomatu'])) {
    $id_paczkomatu = $_REQUEST['id_paczkomatu'];
}
if (!empty($_POST)) {
    $id_paczkomatu = $_POST['id_paczkomatu'];
}

if (!empty($_GET['register_user_id'])) {
    $register_user_id = $_REQUEST['register_user_id'];
}
if (!empty($_POST)) {
    $register_user_id = $_POST['register_user_id'];
}

if (!empty($_GET['id_kuriera'])) {
    $id_kuriera = $_REQUEST['id_kuriera'];
}
if (!empty($_POST)) {
    $id_kuriera = $_POST['id_kuriera'];
}

if (!empty($_GET['rozmiar'])) {
    $rozmiar = $_REQUEST['rozmiar'];
}
if (!empty($_POST)) {
    $rozmiar = $_POST['rozmiar'];
}

if (!empty($_GET['status'])) {
    $status = $_REQUEST['status'];
}
if (!empty($_POST)) {
    $status = $_POST['status'];
}

function filtr1($indeks, $wartosc)
{
    if ($wartosc != 'all') {
        return ' AND ' . $indeks . ' = \'' . $wartosc . '\'';
    } else {
        return '';
    }
}

function filtr2($indeks, $wartosc)
{
    if ($wartosc != 'all') {
        return ' AND ' . $indeks . ' = ' . $wartosc . '';
    } else {
        return '';
    }
}

$zapytanie = filtr2('paczka.id_paczkomatu', $id_paczkomatu) . filtr2('register_user.register_user_id', $register_user_id) . filtr2('kurier.id_kuriera', $id_kuriera) . filtr1('paczka.rozmiar', $rozmiar) . filtr2('paczka.status', $status) . '';

function stripQuotes($text)
{
    return preg_replace('/^(\'(.*)\'|"(.*)")$/', '$2$3', $text);
}

//$zapytanie = addslashes($zapytanie);
$zapytanie = stripQuotes($zapytanie);
//$zapytanie = preg_replace('/(^[\"\']|[\"\']$)/', '', $zapytanie);
//$zapytanie = str_replace("'","\'",$zapytanie);
//$zapytanie = mysql_real_escape_string($zapytanie);
//$zapytanie = addslashes($zapytanie);
//$zapytanie = str_replace('/1009','\'',$zapytanie);
$zapytanie = "select count(*) from paczka, register_user, paczkomat, kurier where paczka.register_user_id = register_user.register_user_id AND paczka.id_paczkomatu = paczkomat.id_paczkomatu AND paczka.id_kuriera = kurier.id_kuriera" . $zapytanie;
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP Register Login Script with Email Verification</title>
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
            <li class="sidebar-brand"><a href="pracownikwitaj.php"> Panel Pracownika </a></li>
            <li><a href="login.php">Wyloguj</a></li>
        </ul>
    </div> <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">
        <div class="row" id="witaj-zew">
            <div class="container-fluid col-md-8" id="witaj">
                <h2>Statystyki
                    <!--                    = --><?php //echo $zapytanie; ?>
                </h2>
                <p>Dla: <br>
                    paczkomat =
                    <?php
                    if ($id_paczkomatu == 'all') {
                        echo 'all';
                    } else {
                        $sql = $connect->query("select * from paczkomat where id_paczkomatu = '$id_paczkomatu'");
                        foreach ($sql as $row) {
                            echo '' . $row['nazwa_ulicy'] . ' ' . $row['numer_ulicy'] . ', ' . $row['miasto'] . '';
                        }
                    }
                    ?><br>
                    klient =
                    <?php
                    if ($register_user_id == 'all') {
                        echo 'all';
                    } else {
                        $sql = $connect->query("select * from register_user where register_user_id = '$register_user_id'");
                        foreach ($sql as $row) {
                            echo '' . $row['user_name'] . ' ' . $row['user_surname'] . '';
                        }
                    }
                    ?><br>
                    kurier =
                    <?php
                    if ($id_kuriera == 'all') {
                        echo 'all';
                    } else {
                        $sql = $connect->query("select * from kurier where id_kuriera = '$id_kuriera'");
                        foreach ($sql as $row) {
                            echo '' . $row['imie'] . ' ' . $row['nazwisko'] . '';
                        }
                    }
                    ?><br>
                    kurier =
                    <?php
                    if ($status == 'all') {
                        echo 'all';
                    } else {
                        echo $status;
                    }
                    ?><br>

                </p><br>
                <h3>Liczba rekordów wynosi:
                <?php
                $sql = $connect->query($zapytanie);
                foreach ($sql as $row) {
                    echo $row['count(*)'];
                }
                ?></h3>
                <button type="button" onclick="powrot()" class="btn btn-secondary btn-lg" style="margin-bottom: 1em">Powrót</button>
                <!--                --><?php //echo ?>

            </div>
        </div>
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

            function powrot(){
                location.href="pracownikwitaj.php";
            }

        </script>

</body>

</html>