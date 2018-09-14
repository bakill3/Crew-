<?php 
include 'ligar_db.php'; 

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<link href="fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">

	<script src="jquery.min.js"></script>


	<title>Proctos</title>

	
</head>
<body>
	<nav class="navbar navbar-light bg-light">
		<?php if (isset($_SESSION['user'])) { ?>
		<a class="navbar-brand" href="home.php">
		<?php } else { ?>
		<a class="navbar-brand" href="#">
		<?php } ?>
			<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
			Proctos
		</a>
		<?php if (isset($_SESSION['user'])) { ?>
		<div>
			<?php if ($_SESSION['user'][4] == 2) { ?>
				<a class="btn btn-dark btn-lg" style="color: #FFFFFF;" href="settings.php"><i class="fas fa-cog"></i></a>
			<?php } ?>
				<a class="btn btn-primary btn-lg" style="color: #FFFFFF;" href="home.php">Barcos</a>
				<a class="btn btn-danger btn-lg" style="color: #FFFFFF;" href="logout.php">Sair</a>
			
		</div>
		<?php } ?>
	</nav>
	<div class="container">


