<?php
include 'ligar_db.php'; 
if (isset($_POST['ya'])) {
	$id_barco = mysqli_real_escape_string($link, $_POST['ya']);
	$query = mysqli_query($link, "SELECT contagem, maximo FROM barcos WHERE id_barco='$id_barco'");
	$i = mysqli_fetch_assoc($query);
	$contagem = $i['contagem'];
	$maximo = $i['maximo'];

	echo $contagem."/".$maximo;

}
?>
