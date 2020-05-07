<?php

include('database_connection.php');
include('statusmsg.php');

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
        </ul>
    </div> <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">
        <div class="row" id="witaj-zew">
            <div class="container-fluid col-md-8" id="witaj">
                <h2>Paczki</h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nr paczki</th>
                        <th>Klient</th>
                        <th>Rodzaj</th>
                        <th>Status</th>
                        <th>Paczkomat</th>
                        <th>Kurier</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql = $connect->query("select * from paczka, register_user, paczkomat, kurier where paczka.register_user_id = register_user.register_user_id AND paczka.id_paczkomatu = paczkomat.id_paczkomatu AND paczka.id_kuriera = kurier.id_kuriera");
                    foreach ($sql as $row) {
                        echo '<tr>';
                        echo '<td>' . base_convert($row['nr_paczki'], 10, 36) . '</td>';
                        echo '<td>' . $row['user_name'] . ' ' . $row['user_surname'] . '</td>';
                        echo '<td>' . $row['rozmiar'] . '</td>';
                        echo '<td>' . statusmsg($row['status']) . '</td>';
                        echo '<td>' . $row['nazwa_ulicy'] . ' ' . $row['numer_ulicy'] . '<br>' . $row['miasto'] . '</td>';
                        echo '<td>' . $row['imie'] . ' ' . $row['nazwisko'] . '</td>';
                        echo '<td><a class="btn btn-secondary" href="zmienkuriera.php?nr_paczki=' . $row['nr_paczki'] . '">Zmien kuriera</a></td>';
                        echo '</tr>';
                    }
                    ?>
                    </tbody>
                </table>

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

        </script>

</body>

</html>
