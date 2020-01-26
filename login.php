<?php
//login.php

include('database_connection.php');

if(isset($_SESSION['user_id']))
{
	header("location:index.php");
}

$message = '';

if(isset($_POST["login"]))
{
	$query = "
	SELECT * FROM register_user
		WHERE user_email = :user_email
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
				'user_email'	=>	$_POST["user_email"]
			)
	);
	$count = $statement->rowCount();
	if($count > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if($row['user_email_status'] == 'verified')
			{
				if(password_verify($_POST["user_password"], $row["user_password"]))
				//if($row["user_password"] == $_POST["user_password"])
				{
					$_SESSION['user_id'] = $row['register_user_id'];
					header("location:index.php");
				}
				else
				{
					$message = "<label>Wrong Password</label>";
				}
			}
			else
			{
				$message = "<label class='text-danger'>Proszę zweryfikuj swój adres e-mail</label>";
			}
		}
	}
	else
	{
		$message = "<label class='text-danger'>Zły adres e-mail</label>";
	}
}

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
		<br />
					<form method="post">
						<?php echo $message; ?>
						<div class="form-group">
							<label>User Email</label>
							<input type="email" name="user_email" class="form-control" required />
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" name="user_password" class="form-control" required />
						</div>
						<div class="form-group">
							<input type="submit" name="login" value="Login" class="btn btn-info" />
						</div>
					</form>
					<p align="right"><a href="register.php">Register</a></p>
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
