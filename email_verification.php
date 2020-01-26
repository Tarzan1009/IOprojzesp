<?php

include('database_connection.php');

$message = '';

if(isset($_GET['activation_code']))
{
	$query = "
		SELECT * FROM register_user
		WHERE user_activation_code = :user_activation_code
	";
	$statement = $connect->prepare($query);
	$statement->execute(
		array(
			':user_activation_code'			=>	$_GET['activation_code']
		)
	);
	$no_of_row = $statement->rowCount();

	if($no_of_row > 0)
	{
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			if($row['user_email_status'] == 'not verified')
			{
				$update_query = "
				UPDATE register_user
				SET user_email_status = 'verified'
				WHERE register_user_id = '".$row['register_user_id']."'
				";
				$statement = $connect->prepare($update_query);
				$statement->execute();
				$sub_result = $statement->fetchAll();
				if(isset($sub_result))
				{
					$message = '<label class="text-success">Twój e-mail został zweryfikowany pomyślnie. <br /> Możesz zalogować się tutaj - <a href="login.php">Login</a></label>';
				}
			}
			else
			{
				$message = '<label class="text-info">Twój adres e-mail jest już zweryfikowany</label>';
			}
		}
	}
	else
	{
		$message = '<label class="text-danger">Nieprawidlowy link</label>';
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Potwierdzenie maila</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css\styl.css">
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

			<h1 align="center">Weryfikacja maila</h1>

			<h3><?php echo $message; ?></h3>
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
