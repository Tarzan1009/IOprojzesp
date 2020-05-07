<?php

//include('database_connection.php');
include('statusmsg.php');
include('database.php');

$statusin = 0;

if (!empty($_GET['statusin'])) {
    $statusin = $_REQUEST['statusin'];
}

if (!empty($_POST)) {
    // keep track post values
    $statusin = $_POST['statusin'];
}

if (!empty($_GET['id_kuriera'])) {
    $id_kuriera = $_REQUEST['id_kuriera'];
}

if (!empty($_POST)) {
    // keep track post values
    $id_kuriera = $_POST['id_kuriera'];
}

switch ($statusin) {
    case 1:
        $title = 'Do odebrania';
        $fun = 'odbierz';
        break;
    case 2:
        $title = 'Do przewiezienia';
        $fun = 'przewiez';
        break;
    case 3:
        $title = 'Do dostarczenia';
        $fun = 'dostarcz';
        break;
    default:
        $title = 'error';
}

$id_kuriera_now = $id_kuriera;
$pdo = Database::connect();
$select_query = "
		select * from paczka, register_user, paczkomat, kurier 
		where paczka.register_user_id = register_user.register_user_id 
		AND paczka.id_paczkomatu = paczkomat.id_paczkomatu 
		AND paczka.id_kuriera = kurier.id_kuriera
		AND paczka.id_kuriera = :id_kuriera_now
		AND paczka.status = :statusin
		";
$statement = $pdo->prepare($select_query);

$statement->execute(
    [
        'id_kuriera_now' => $id_kuriera_now,
        ':statusin' => $statusin
    ]
);
//$statement->debugDumpParams();

$data = $statement->fetchAll();

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
            <li class="sidebar-brand"><a href="kurierwitaj.php"> Panel Kuriera <?php echo $id_kuriera_now; ?></a></li>
            <li><a href="kurierpaczki.php?statusin=1&id_kuriera=<?php echo $id_kuriera; ?>">Do odebrania</a></li>
            <li><a href="kurierpaczki.php?statusin=2&id_kuriera=<?php echo $id_kuriera; ?>">Przewóz</a></li>
            <li><a href="kurierpaczki.php?statusin=3&id_kuriera=<?php echo $id_kuriera; ?>">Do dostarczenia</a></li>
            <li><a href="login.php">Wyloguj</a></li>
        </ul>
    </div> <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">
        <div class="row" id="witaj-zew">
            <div class="container-fluid col-md-8" id="witaj">
                <h2><?php echo $title; ?></h2>

                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nr paczki</th>
                        <th>Klient</th>
                        <th>Gabaryt</th>
                        <th>Paczkomat</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //                    include 'database.php';
                    //                    $pdo = connect;

//                    $sql = $connect->query("select * from paczka, register_user, paczkomat where paczka.register_user_id = register_user.register_user_id AND paczka.id_paczkomatu = paczkomat.id_paczkomatu AND paczka.status='$statusin' AND paczka.id_kuriera='$id_kuriera'");
                    foreach ($data as $row) {
                        echo '<tr>';
                        echo '<td>' . base_convert($row['nr_paczki'], 10, 36) . '</td>';
                        echo '<td>' . $row['user_name'] . ' ' . $row['user_surname'] . '</td>';
                        echo '<td>' . $row['rozmiar'] . '</td>';
                        echo '<td>' . $row['nazwa_ulicy'] . ' ' . $row['numer_ulicy'] . '<br>' . $row['miasto'] . '</td>';
                        echo '<td><a class="btn btn-secondary" href="zmienstatus.php?nr_paczki=' . $row['nr_paczki'] . '&statusin='. $statusin . '$id_kuriera=' . $id_kuriera_now . '">Odbierz</a></td>';
                        echo '</tr>';
                    }
                    //                    Database::disconnect();
                    ?>
                    </tbody>
                </table>

                <!--         					<h2>Twoja przesylka znajduje się w paczkomacie o adresie: </h2> <br />-->
                <!--          --><?php
                //										$data = $connect->query("SELECT paczkomat.nazwa_ulicy, paczkomat.numer_ulicy, paczkomat.miasto from paczkomat, register_user where 	register_user.register_user_id = '".$_SESSION['user_id']."';")->fetchAll();
                //										 foreach ($data as $row) {
                //										     echo "ulica: ".$row['nazwa_ulicy']."\n";
                //												 echo $row['numer_ulicy']."<br />\n";
                //                         echo "miasto: ".$row['miasto']."\n";
                //										 }
                //          ?>
                <!---->
                <!--          <hr>-->
                <!--          <h2>Wariant przesyłki:  </h2> <br />-->
                <!--          --><?php
                //          print_r($result['rozmiar']);
                //                                        //echo base_convert($rozmiar['rozmiar'], 10, 36) . "\n";
                //
                //          //										$data = $connect->query("SELECT paczka.rozmiar from paczka, paczkomat, dostawa where paczka.id_paczkomatu=paczkomat.id_paczki;")->fetchAll();
                ////										 foreach ($data as $row) {
                ////										     echo "rozmiar: ".$row['rozmiar']."<br />\n";
                ////										 }
                //          ?>
                <!---->
                <!---->
                <!--          </h1>-->
                <!---->
                <!--		<h4 align="center"></h4>-->
                <!---->
                <!--	</div>-->
                <!--</div>-->
            </div>
        </div>
        <!-- /#wrapper -->
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

        </script>

</body>

</html>
