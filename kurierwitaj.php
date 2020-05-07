<?php
//index.php
if (!empty($_GET['id_kuriera'])) {
    $id_kuriera = $_REQUEST['id_kuriera'];
}
if (!empty($_POST)) {
    $id_kuriera = $_POST['id_kuriera'];
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
            <li class="sidebar-brand"><a href="kurierwitaj.php"> Panel Kuriera </a></li>
            <li><a href="kurierpaczki.php?statusin=1&id_kuriera=<?php echo $id_kuriera; ?>">Do odebrania</a></li>
            <li><a href="kurierpaczki.php?statusin=2&id_kuriera=<?php echo $id_kuriera; ?>">Przewóz</a></li>
            <li><a href="kurierpaczki.php?statusin=3&id_kuriera=<?php echo $id_kuriera; ?>">Do dostarczenia</a></li>
            <li><a href="login.php">Wyloguj</a></li>
        </ul>
    </div> <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">
        <div class="row" id="witaj-zew">
            <div class="container-fluid col-md-8" id="witaj">

                <h1>Witaj ponownie, kurierze!

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

