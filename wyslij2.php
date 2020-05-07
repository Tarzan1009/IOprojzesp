<?php


$rozmiar = 0;

if ( !empty($_GET['rozmiar'])) {
    $rozmiar = $_REQUEST['rozmiar'];
}

if ( !empty($_POST)) {
    // keep track post values
    $rozmiar = $_POST['rozmiar'];
}


include('database_connection.php');

//$sql = "SELECT    *
//FROM      paczka
//ORDER BY  your_auto_increment_field DESC
//LIMIT     1;";
//$result = $connect->query($sql);
//$row = $result->fetch_assoc();
$kod_przesylki = rand(10e12, 10e16);
$register_user_id = $_SESSION['user_id'];
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$insert_query = "
		INSERT INTO paczka
		(nr_paczki, rozmiar, register_user_id)
		VALUES ('$kod_przesylki', '$rozmiar', '$register_user_id')
		";
$statement = $connect->prepare($insert_query);

$statement->execute(
    array(
        ':nr_paczki' => $kod_przesylki,
        ':rozmiar' => $rozmiar,
        ':register_user_id' => $register_user_id,
    )
);
//// use exec() because no results are returned
//$connect->exec($insert_query);

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
    <script src="js/clipboard.js-master/dist/clipboard.min.js"></script>
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
            <li class="sidebar-brand"><a href="#"> Panel Klienta </a></li>
            <li><a href="paczki.php">Wyślij paczkę</a></li>
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
                    <form method="post" na>
                        <button type="submit" onclick="on()" name="submit" value="standard"
                                class="btn mx-auto przycisk btn-secondary">Wybierz
                        </button>
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
                        <button type="submit" onclick="on()" name="submit" value="express"
                                class="btn mx-auto przycisk btn-secondary">Wybierz
                        </button>
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
                        <button type="submit" onclick="on()" name="submit" value="gabaryt"
                                class="btn mx-auto przycisk btn-secondary">Wybierz
                        </button>
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
                        <button type="submit" onclick="on()" name="submit" value="gabaryt_express"
                                class="btn mx-auto przycisk btn-secondary">Wybierz
                        </button>
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
                <button type="button" data-clipboard-target="#kod-field" class="btn przycisk copy dwielinie btn-primary">Skopiuj
                    kod
                </button>
                <button type="button" onclick="paczkomat()" class="btn przycisk dwielinie btn-primary" id="wyslij">
                    Wybierz
                    paczkomat
                </button>
                <button type="button" onclick="openInNewTab()" class="btn przycisk dwielinie btn-primary">Kod QR</button>
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

    new ClipboardJS('.copy');




    function paczkomat() {
        var nr_paczki = 0;
        nr_paczki = <?php echo json_encode($kod_przesylki); ?>;
        location.href = "paczkomat.php?nr_paczki=".concat(nr_paczki);
    }

    window.onload=on();

    function on() {
        document.getElementById("kod").style.display = "block";
    }

    function off() {
        document.getElementById("kod").style.display = "none";
    }

    // function myFunction() {
    //     /* Get the text field */
    //     var copyText = document.getElementById("myInput");
    //
    //     /* Select the text field */
    //     copyText.select();
    //     copyText.setSelectionRange(0, 99999); /*For mobile devices*/
    //
    //     /* Copy the text inside the text field */
    //     document.execCommand("copy");
    //
    //     /* Alert the copied text */
    //     alert("Copied the text: " + copyText.value);
    // }

    function openInNewTab() {
        var url = "qr.php?nr_paczki=<?php echo $kod_przesylki; ?>"
        var win = window.open(url, '_blank');
        win.focus();
    }



</script>

</body>
</html>

