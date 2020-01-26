<?php
//index.php
include('database_connection.php');

if (!isset($_SESSION["user_id"])) {
    header("location:login.php");
}


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Poczta</title>
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
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo" height="30px"></a>
            <a class="navbar-brand" href="#">Poczta</a>
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
            <li class="sidebar-brand"><a href="#"> Panel Klienta </a></li>
            <li><a href="#">Znajdź paczkomat</a></li>
            <li><a href="paczki.php">Paczki</a></li>
            <li><a href="#">Informacje</a></li>
            <li><a href="logout.php">Wyloguj</a></li>
        </ul>
    </div> <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">
        <div class="row" id="witaj-zew">
            <div class="container-fluid col-md-8" id="witaj">

                <h1>Witaj ponownie


                    <?php
                    $data = $connect->query("SELECT * from register_user where 	register_user_id = '" . $_SESSION['user_id'] . "';")->fetchAll();
                    foreach ($data as $row) {
                        echo $row['user_name'] . "\n";
                        echo $row['user_surname'] . "\n";
                    }


                    ?>

                </h1>

                <h4 align="center"></h4>

            </div>
        </div>
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
