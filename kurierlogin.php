<?php
//index.php
include('database_connection.php');

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Zaloguj</title>
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
            <a class="navbar-brand" href="index.html"><img src="img/logo.png" alt="logo" height="30px"> Poczta</a>
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
            <li class="sidebar-brand"><a href="#"> Panel Klienta </a></li>
        </ul>
    </div> <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">
        <div class="row" id="witaj-zew">
            <div class="container-fluid col-md-8" id="witaj">
                <br/>
                <form method="post">
                    <div class="form-group">
                        <label for="kurier_select">Kurier</label>
                        <select class="form-control" id="kurier_select">
                            <?php
                            $sql = $connect->query("select * from kurier");
                            foreach ($sql as $row) {
                                echo '<option value="' . $row['id_kuriera'] . '">' . $row['imie'] . ' ' . $row['nazwisko'] . '</option>';
                            } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Hasło</label>
                        <input type="password" class="form-control" id="pwd">
                        <div class="invalid-feedback">Sorry, that username's taken. Try another?</div>
                    </div>
                    <div class="form-group">
                        <button type="button" onclick="login()" class="btn btn-secondary btn-lg" style="margin-bottom: 1em">Zaloguj</button>
                    </div>
                </form>
                <br>
                <br>
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

    function login() {
        var c = document.getElementById("kurier_select");
        var kurier = c.options[c.selectedIndex].value;
        var inputVal = document.getElementById("pwd").value;
        if (inputVal = 'admin'){
            location.href = "kurierwitaj.php?id_kuriera=".concat(kurier);
        }else {
            var element = document.getElementById("login");
            element.classList.add("is-Invalid");
        }
    }

</script>
</body>
</html>