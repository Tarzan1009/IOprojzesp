<?php

$nr_paczki = 0;

if (!empty($_GET['nr_paczki'])) {
    $nr_paczki = $_REQUEST['nr_paczki'];
}

if (!empty($_POST)) {
    // keep track post values
    $nr_paczki = $_POST['nr_paczki'];
}

include('statusmsg.php');
include('database_connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zmienkuriera</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styl.css">
</head>
<body>
<div id="nadaj">
    <div class="row">
        <div class="col-md-4" id="window">
            <div id="zamknij">
                <button type="button" onclick="off()" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="nadaj-header">
                Zmien kuriera dla paczki o nr <?php echo base_convert($nr_paczki, 10, 36); ?>
            </div>
            <div class="form-group bg-secondary" style="padding: 0.5em; margin-radius: 0.5em">
                <label for="status_select">Kurier</label>
                <select class="form-control" id="kurier_select">
                    <?php
                    $sql = $connect->query("select * from kurier");
                    foreach ($sql as $row) {
                        echo '<option value="' . $row['id_kuriera'] . '">' . $row['id_kuriera'] . $row['imie'] . ' ' . $row['nazwisko'] . '</option>';
                    } ?>
                </select>
            </div>
            <div>
                <button type="button" onclick="dalej()" class="btn przycisk btn-secondary">OK</button>
            </div>

        </div>
    </div>
</div>
<script>
    function on() {
        document.getElementById("nadaj").style.display = "block";
    }

    window.onload = on();

    function dalej() {
        var c = document.getElementById("kurier_select");
        var kurier = c.options[c.selectedIndex].value;
        location.href = 'zmieniono.php?nr_paczki=<?php echo $nr_paczki; ?>&id_kuriera='.concat(kurier);
    }
</script>
</body>
</html>
