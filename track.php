<?php
//index.php
include('database_connection.php');
include('statusmsg.php');

$nr_paczki = 0;

if (!empty($_GET['nr_paczki'])) {
    $nr_paczki = $_REQUEST['nr_paczki'];
}

if (!empty($_POST)) {
    // keep track post values
    $nr_paczki = $_POST['nr_paczki'];
}

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
        </ul>
    </div> <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">
        <div class="row" id="witaj-zew">
            <div class="container-fluid col-md-8" id="witaj">
<h2><?php echo $nr_paczki; ?></h2>
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Nr paczki</th>
                        <th>Status</th>
                        <th>Gabaryt</th>
                        <th>Paczkomat</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //                    include 'database.php';
                    //                    $pdo = connect;
                    $sql = $connect->query("SELECT * FROM paczka,paczkomat WHERE paczka.id_paczkomatu=paczkomat.id_paczkomatu AND nr_paczki=' . $nr_paczki'");
                    foreach ($sql as $row) {
                        echo '<tr>';
                        echo '<td>' . base_convert($row['nr_paczki'], 10, 36) . '</td>';
                        echo '<td>' . statusmsg($row['status']) . '</td>';
                        echo '<td>' . $row['rozmiar'] . '</td>';
                        echo '<td>' . $row['nazwa_ulicy'] . ' ' . $row['numer_ulicy'] . '<br>' . $row['miasto'] . '</td>';
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
