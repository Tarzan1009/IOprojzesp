<?php

if (!empty($_GET['id_paczkomatu'])) {
    $id_paczkomatu = $_REQUEST['id_paczkomatu'];
}

if (!empty($_POST)) {
    // keep track post values
    $id_paczkomatu = $_POST['id_paczkomatu'];
}

$nr_paczki = 0;

if (!empty($_GET['nr_paczki'])) {
    $nr_paczki = $_REQUEST['nr_paczki'];
}

if (!empty($_POST)) {
    // keep track post values
    $nr_paczki = $_POST['nr_paczki'];
}


include('database_connection.php');

try {
    // set the PDO error mode to exception
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $insert_query = "
        UPDATE paczka SET id_paczkomatu = $id_paczkomatu WHERE nr_paczki= $nr_paczki";

    $statement = $connect->prepare($insert_query);
    $statement->execute(
        array(
            ':id_paczkomatu' => $id_paczkomatu,
            ':nr_paczki' => $nr_paczki
        )
    );
    // use exec() because no results are returned
    $connect->exec($insert_query);
} catch (PDOException $e) {
    echo $insert_query . "<br>" . $e->getMessage();
}


$data = $connect->query("SELECT * from register_user where 	register_user_id = '" . $_SESSION['user_id'] . "';")->fetchAll();
foreach ($data as $row) {
    $user_name = $row['user_name'];
    $user_surname = $row['user_surname'];
    $email = $row['user_email'];
}


$base_url = "http://localhost/Test/";  //change this baseurl value as per your file path
$mail_body = "
			<p>Hej " . $user_name . " " . $user_surname . ",</p>
			<p>Dziękujęmy za wysłanie paczki o nr " . base_convert($nr_paczki, 10, 36) . ".</p>
			<p>Otwórz ten link, aby zobaczyc kod QR - " . $base_url . "qr.php?nr_paczki=" . $nr_paczki . "
			<p>Pozdrawiamy,<br /> Poczta</p>
			";
require("PHPMailer/PHPMailer.php");
require("PHPMailer/SMTP.php");
require("PHPMailer/Exception.php");

$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP();                                //Sets Mailer to send message using SMTP
$mail->Host = 'smtp.gmail.com';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
$mail->Port = '587';                        //Sets the default SMTP server port
$mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
$mail->Username = '1nzyn1er1a0program0wan1a24@gmail.com';                    //Sets SMTP username
$mail->Password = 'iop@ssw0rd';                    //Sets SMTP password
$mail->SMTPSecure = '';                            //Sets connection prefix. Options are "", "ssl" or "tls"
$mail->From = '1nzyn1er1a0program0wan1a24@gmail.com';            //Sets the From email address for the message
$mail->FromName = 'Poczta';                    //Sets the From name of the message
$mail->AddAddress($email);        //Adds a "To" address
$mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
$mail->IsHTML(true);                            //Sets message type to HTML
$mail->Subject = 'Potwierdzenie wysyłki';            //Sets the Subject of the message
$mail->Body = $mail_body;                            //An HTML or plain text message body
if ($mail->Send())                                //Send an Email. Return true on success or false on error
{
    $message = '<label class="text-success">Wyslano e-mail z kodem QR</label>';
}

$connect = null;
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
                Wysłano paczkę!
            </div>
            <?php echo $message; ?>
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
        location.href = "witaj.php";
    }
</script>
</body>
</html>