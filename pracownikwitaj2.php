<?php
//index.php
include('database_connection.php');

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
            <li class="sidebar-brand"><a href="pracownikwitaj.php"> Panel Pracownika </a></li>
            <li><a href="allpaczki.php">Paczki</a></li>
        </ul>
    </div> <!-- /#sidebar-wrapper -->
    <div id="page-content-wrapper">
        <div class="row">
            <div class="container-fluid col-md-8" id="witaj">

                <h1>Witaj ponownie, pracowniku!

                </h1>


                <h4 align="center"></h4>

            </div>
        </div>
<!--        <div class="row">-->
<!--            <div class=" col-md-6 bg-yellow text-light mx-auto" style="-->
<!--            background-color: #FED416;-->
<!--            color: gray;-->
<!--            margin-top: 2em;-->
<!--            border: 2px solid gray;-->
<!--            border-radius: 8px;-->
<!--            text-align: center;" id="options">-->
<!--                <form>-->
<!--                    <fieldset>-->
<!--                        <div class="form-group text-dark"-->
<!--                             style="margin: 1em; border-radius: 0.5em; padding-bottom: 0.5em;">-->
<!--                            <legend class="text-dark">Filtry</legend>-->
<!--                            <div class="form-group">-->
<!--                                <label for="paczkomat_select">Paczkomat</label>-->
<!--                                <select class="form-control" id="paczkomat_select">-->
<!--                                    <option value="all" selected="selected">Wszystkie</option>-->
<!--                                    --><?php
//                                    $sql = $connect->query("select * from paczkomat");
//                                    foreach ($sql as $row) {
//                                        echo '<option value="' . $row['id_paczkomatu'] . '">' . $row['nazwa_ulicy'] . ' ' . $row['numer_ulicy'] . ', ' . $row['miasto'] . '</option>';
//                                    } ?>
<!--                                </select>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="user_select">Klient</label>-->
<!--                                <select class="form-control" id="user_select">-->
<!--                                    <option value="all" selected="selected">Wszystkie</option>-->
<!--                                    --><?php
//                                    $sql = $connect->query("select * from register_user");
//                                    foreach ($sql as $row) {
//                                        echo '<option value="' . $row['register_user_id'] . '">' . $row['user_name'] . ' ' . $row['user_surname'] . '</option>';
//                                    } ?>
<!--                                </select>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="kurier_select">Kurier</label>-->
<!--                                <select class="form-control" id="kurier_select">-->
<!--                                    <option value="all" selected="selected">Wszystkie</option>-->
<!--                                    --><?php
//                                    $sql = $connect->query("select * from kurier");
//                                    foreach ($sql as $row) {
//                                        echo '<option value="' . $row['id_kuriera'] . '">' . $row['imie'] . ' ' . $row['nazwisko'] . '</option>';
//                                    } ?>
<!--                                </select>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="gabaryt_select">Rodzaj</label>-->
<!--                                <select class="form-control" id="gabaryt_select">-->
<!--                                    <option value="all" selected="selected">wszystkie</option>-->
<!--                                    <option value="standard">standard</option>-->
<!--                                    <option value="express">express</option>-->
<!--                                    <option value="gabaryt">gabaryt</option>-->
<!--                                    <option value="gabaryt_express">gabaryt express</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <label for="status_select">Status</label>-->
<!--                                <select class="form-control" id="status_select">-->
<!--                                    <option value="all" selected="selected">wszystkie</option>-->
<!--                                    <option value="1">nadano</option>-->
<!--                                    <option value="2">odebrana od klienta</option>-->
<!--                                    <option value="3">w drodze</option>-->
<!--                                    <option value="4">w paczkomacie docelowym</option>-->
<!--                                    <option value="5">odebrana przez klienta</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                            <legend class="text-dark">Sortuj</legend>-->
<!--                            <div class="form-group">-->
<!--                                <select class="form-control" id="sort_select">-->
<!--                                    <option value="id_paczki" selected="selected">Chronologicznie</option>-->
<!--                                    <option value="register_user_id">Po użytkowniku</option>-->
<!--                                    <option value="id_paczkomatu">Po paczkomacie</option>-->
<!--                                    <option value="id_kuriera">Po kurierze</option>-->
<!--                                    <option value="rozmiar">Po gabarycie</option>-->
<!--                                    <option value="status">Po statusie</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <select class="form-control" id="order_select">-->
<!--                                    <option value="ASC" selected="selected">W górę</option>-->
<!--                                    <option value="DESC">W dół</option>-->
<!--                                </select>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </fieldset>-->
<!--                    <button type="button" onclick="przekaz()" class="btn btn-secondary btn-lg" style="margin-bottom: 1em">Pokaż</button>-->
<!--                    <span id="myText"></span>-->
<!--                </form>-->
<!--            </div>-->
<!--        </div>-->
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

    function przekaz() {
        var a = document.getElementById("paczkomat_select");
        var paczkomat = a.options[a.selectedIndex].value;
        var b = document.getElementById("user_select");
        var user = b.options[b.selectedIndex].value;
        var c = document.getElementById("kurier_select");
        var kurier = c.options[c.selectedIndex].value;
        var d = document.getElementById("gabaryt_select");
        var rozmiar = d.options[d.selectedIndex].value;
        var e = document.getElementById("status_select");
        var status = e.options[e.selectedIndex].value;
        var f = document.getElementById("sort_select");
        var sort = f.options[f.selectedIndex].value;
        var g = document.getElementById("order_select");
        var order = g.options[g.selectedIndex].value;


        //var link = 'allpaczki2.php?'.concat('id_paczkomatu=',paczkomat,'&register_user_id=',user,'&id_kuriera=',kurier,'&rozmiar=',rozmiar,'&status=',status,'&sort=',sort,'&order=',order);
        var link = allpaczki.html;
        // document.getElementById("myText").innerHTML = link;
        location.href = link;
    }

</script>

</body>

</html>
