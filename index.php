<?php 
include 'header.php'; 

if (isset($_SESSION['user'])) {
	header('Location: home.php');
	exit(0);
}

if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$password = mysqli_real_escape_string($link, $_POST['password']);

	$query = mysqli_query($link, "SELECT * FROM users WHERE email='$email'");

	$info_db = mysqli_fetch_assoc($query);
	$password_db = $info_db['password'];

	if (!empty($email) && !empty($password) && password_verify($password, $password_db) && mysqli_num_rows($query) == 1) {

		$nome = $info_db['nome'];
		$sobrenome = $info_db['sobrenome'];
		$role = $info_db['role'];

		$_SESSION['user'] = array("$email", "$password", "$nome", "$sobrenome", "$role");

		header("Location: home.php");
		exit(0);

	} else {
		$_SESSION['erro'] = "Email/Password Incorretos";
		header("Location: index.php");
		exit(0);
	}
	
}
?>
<div style="padding-top: 5%;">
	<div class="card text-center">
		<div class="card-header">
			Gestão de Tripulação
		</div>
		<div class="card-body">
			<h3 class="card-title">Login</h3>
				<h5 class="card-text"><?php if (isset($_SESSION['erro'])) { echo $_SESSION['erro']; } ?></h5>

				<form method="POST">
					<div class="col-6" style="margin: 0 auto;">
						<input type="email" class="form-control" placeholder="Email" name="email">
						<input type="password" class="form-control" placeholder="Password" name="password">
					</div>
					<button class="btn btn-primary" type="submit" name="login">Login</a></button>

				</form>



			</div>
			<div class="card-footer text-secondary">
				Feito por Gabriel Brandão
			</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>