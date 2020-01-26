<?php
//register.php

include('database_connection.php');

if(isset($_SESSION['user_id']))
{
	header("location:index.php");
}

$message = '';

if(isset($_POST["register"]))
{
	$query = "
	SELECT * FROM register_user
	WHERE user_email = :user_email
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':user_email'	=>	$_POST['user_email']
		)
	);
	$no_of_row = $statement->rowCount();
	if($no_of_row > 0)
	{
		$message = '<label class="text-danger">Email Already Exits</label>';
	}
	else
	{
		$user_password = rand(100000,999999);
		$user_encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
		$user_activation_code = md5(rand());
		$insert_query = "
		INSERT INTO register_user
		(user_name, user_surname, user_email, user_password, user_activation_code, user_email_status)
		VALUES (:user_name, :user_surname, :user_email, :user_password, :user_activation_code, :user_email_status)
		";
		$statement = $connect->prepare($insert_query);
		$statement->execute(
			array(
				':user_name'			=>	$_POST['user_name'],
				':user_surname'			=>	$_POST['user_surname'],
				':user_email'			=>	$_POST['user_email'],
				':user_password'		=>	$user_encrypted_password,
				':user_activation_code'	=>	$user_activation_code,
				':user_email_status'	=>	'not verified'
			)
		);
		$result = $statement->fetchAll();
		if(isset($result))
		{
			$base_url = "http://localhost/Test/";  //change this baseurl value as per your file path
			$mail_body = "
			<p>Hej ".$_POST['user_name']." ".$_POST['user_surname'].",</p>
			<p>Dziękuję za zarejestrowanie się. Twoje hasło to ".$user_password.", To hasło zadziała po zweryfikowaniu e-maila.</p>
			<p>Otwórz ten link, aby zweryfikować mail - ".$base_url."email_verification.php?activation_code=".$user_activation_code."
			<p>Pozdrawiamy,<br /> Poczta</p>
			";
			require("PHPMailer/PHPMailer.php");
			require("PHPMailer/SMTP.php");
			require("PHPMailer/Exception.php");

			$mail = new PHPMailer\PHPMailer\PHPMailer();
			$mail->IsSMTP();								//Sets Mailer to send message using SMTP
			$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
			$mail->Port = '587';						//Sets the default SMTP server port
			$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
			$mail->Username = '1nzyn1er1a0program0wan1a24@gmail.com';					//Sets SMTP username
			$mail->Password = 'iop@ssw0rd';					//Sets SMTP password
			$mail->SMTPSecure = '';							//Sets connection prefix. Options are "", "ssl" or "tls"
			$mail->From = '1nzyn1er1a0program0wan1a24@gmail.com';			//Sets the From email address for the message
			$mail->FromName = 'Poczta';					//Sets the From name of the message
			$mail->AddAddress($_POST['user_email'], $_POST['user_name']);		//Adds a "To" address
			$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
			$mail->IsHTML(true);							//Sets message type to HTML
			$mail->Subject = 'Potwierdzenie maila';			//Sets the Subject of the message
			$mail->Body = $mail_body;							//An HTML or plain text message body
			if($mail->Send())								//Send an Email. Return true on success or false on error
			{
				$message = '<label class="text-success">Rejestracja zakończona, Sprawdź swój mail.</label>';
			}
		}
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
        <meta charset="UTF-8">
        <title>Rejestracja</title>
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
		          </ul>
		      </div> <!-- /#sidebar-wrapper -->
		<div id="page-content-wrapper">
		  <div class="row" id="witaj-zew">
		      <div class="container-fluid col-md-8" id="witaj">
		  		<h3>Zaloguj sie, aby przejrzec swoje przesylki</h3>
					<form method="post" id="register_form">
						<?php echo $message; ?>
						<div class="form-group">
							<label>User Name</label>
							<input type="text" name="user_name" class="form-control" pattern="[a-zA-Z ]+" required />
						</div>
						<div class="form-group">
							<label>User Surname</label>
							<input type="text" name="user_surname" class="form-control" pattern="[a-zA-Z ]+" required />
						</div>
						<div class="form-group">
							<label>User Email</label>
							<input type="email" name="user_email" class="form-control" required />
						</div>
						<div class="form-group">
							<input type="submit" name="register" id="register" value="Register" class="btn btn-info" />
						</div>
					</form>
					<p align="right"><a href="login.php">Login</a></p>
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
