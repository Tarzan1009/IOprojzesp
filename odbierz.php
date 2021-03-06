<?php

$nr_paczki = 0;

if ( !empty($_GET['nr_paczki'])) {
    $nr_paczki = $_REQUEST['nr_paczki'];
}

if ( !empty($_POST)) {
    // keep track post values
    $nr_paczki = $_POST['nr_paczki'];
}

include('database_connection.php');

try {
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $insert_query = "
        UPDATE paczka SET status = 5 WHERE nr_paczki='$nr_paczki';";

    $statement = $connect->prepare($insert_query);
    $statement->execute(
        array(
        )
    );
    // use exec() because no results are returned
    $connect->exec($insert_query);
} catch (PDOException $e) {
    echo $insert_query . "<br>" . $e->getMessage();
}

$connect = null;
?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wysłano</title>
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
                Odebrano paczkę o nr <?php echo base_convert($nr_paczki, 10, 36);  ?>
            </div>
            <div>
                <button type="button" onclick="powrot()" class="btn przycisk btn-secondary">OK</button>
            </div>

        </div>
    </div>
</div>
<script>
    function on() {
        document.getElementById("nadaj").style.display = "block";
    }

    window.onload = on();

    function powrot() {
        location.href = "informacjeoprzesylce.php";
    }
</script>
</body>
</html>
