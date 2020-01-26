<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paczki</title>
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
            <li><a href="#">Paczki</a></li>
            <li><a href="#">Informacje</a></li>
        </ul>
    </div> <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div class="row" id="witaj-zew">
            <div class="container-fluid col-md-4" id="witaj">
                <h1>Paczki</h1>
            </div>
        </div>
        <div class="row mx-auto">
            <div class="col-md-8 mx-auto">
                <div class="row" id="przyciski">
                    <div class="col-md-6">
                        <button type="button" class="btn btn-primary btn-lg disabled btn-block">Odbierz</button>
                    </div>
                    <div class="col-md-6">
                        <button type="button" onclick="on()" class="btn btn-primary btn-lg btn-block">Nadaj</button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /#page-content-wrapper -->
</div> <!-- /#wrapper -->

<div id="nadaj">
    <div class="row">
        <div class="col-md-4" id="window">
            <div id="zamknij">
                <button type="button" onclick="off()" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="nadaj-header">
                Wybierz sposób wysyłki
            </div>
            <div>
                <button type="button" onclick="wyslij()" class="btn przycisk btn-primary">Paczkomat</button>
                <button type="button" class="btn przycisk btn-primary disabled">Kurier</button>
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


    function wyslij()
    {
        location.href = "wyslij.php";
    }


    function on() {
        document.getElementById("nadaj").style.display = "block";
    }

    function off() {
        document.getElementById("nadaj").style.display = "none";
    }

</script>

</body>
</html>
