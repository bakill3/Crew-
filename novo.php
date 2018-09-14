<?php
include 'header.php';
include 'admin.php';
if (isset($_POST['mudar'])) {
	$nome = htmlspecialchars(mysqli_real_escape_string($link, $_POST['nome']));
	$maximo = htmlspecialchars(mysqli_real_escape_string($link, $_POST['numero']));
	if (!empty($nome) && !empty($maximo)) {
		mysqli_query($link, "INSERT INTO barcos_txt(barco_nome) VALUES('$nome')");
		mysqli_query($link, "INSERT INTO barcos(barco, maximo) VALUES((SELECT id_barco_txt FROM barcos_txt WHERE barco_nome='$nome'), '$maximo')");
	}

	header('Location: novo.php');
	exit(0);
}
?>
<form method="POST">
	<h2 class="text-center">Adicionar Barco</h2>
	<div class="form-group">
		<label for="exampleInputEmail1">Nome do Barco</label>
		<input type="text" class="form-control" placeholder="Nome..." name="nome">
	</div>
	<div class="form-group">
		<label for="exampleInputEmail1">Número Máximo de Pessoas</label>
		<input type="number" class="form-control" placeholder="Máximo..." name="numero">
	</div>
	<div class="text-center"><input type="submit" class="btn btn-primary" name="mudar" value="Adicionar"></div>
</form>
<?php
include 'footer.php'; 
?>