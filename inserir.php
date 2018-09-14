<?php
include 'header.php';
include 'admin.php';
if (isset($_POST['inserir'])) {
	$nome = htmlspecialchars(mysqli_real_escape_string($link, $_POST['nome']));
	$sobrenome = htmlspecialchars(mysqli_real_escape_string($link, $_POST['sobrenome']));
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$password = mysqli_real_escape_string($link, $_POST['password']);
	$role = mysqli_real_escape_string($link, $_POST['role']);
	
	if (!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($password) && !empty($role)) {
		$pass_hash  = password_hash($password , PASSWORD_DEFAULT);
		mysqli_query($link, "INSERT INTO users(email, password, nome, sobrenome, role) VALUES('$email', '$pass_hash', '$nome', '$sobrenome', '$role')") or die(mysqli_error($link));
	}
	header('Location: inserir.php');
	exit(0);
}
?>
<form method="POST">
	<h2 class="text-center">Adicionar Utilizador</h2>
	<div class="form-group">
		<label for="exampleInputEmail1">Nome</label>
		<input type="text" class="form-control" placeholder="Nome..." name="nome">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Sobrenome</label>
		<input type="text" class="form-control" placeholder="Sobrenome..." name="sobrenome">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Email</label>
		<input type="email" class="form-control" placeholder="Email..." name="email">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Password</label>
		<input type="password" class="form-control" placeholder="Password..." name="password">
	</div>
	<div class="form-group">
		<select name="role" class="form-control">
			<option value="1">Utilizador</option>
			<option value="2">Administrador</option>
		</select>
	</div>
	<div class="text-center"><input type="submit" class="btn btn-primary" name="inserir" value="Adicionar Utilizador"></div>
</form>
<?php
include 'footer.php'; 
?>