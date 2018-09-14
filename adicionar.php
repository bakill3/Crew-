<?php
include 'ligar_db.php';
if (isset($_POST['id_barco'])) {
	$id_barco = mysqli_real_escape_string($link, $_POST['id_barco']);
	$add_remove = mysqli_real_escape_string($link, $_POST['add_remove']);

	$maximo = $_SESSION['id_barco'][$id_barco];

	$bb = mysqli_query($link, "SELECT contagem FROM barcos WHERE id_barco='$id_barco'");
	$info_bb = mysqli_fetch_assoc($bb);
	$cont_bb = $info_bb['contagem'];

	if ($add_remove == 1) {

		if ($cont_bb < $maximo) {

			mysqli_query($link, "UPDATE barcos SET contagem=contagem+1 WHERE id_barco='$id_barco' AND contagem<".$maximo."");

			//echo "<script>$('#contagem').val('".$contagem."')</script>";
		}
	} else {
		if ($cont_bb > 0) {
			mysqli_query($link, "UPDATE barcos SET contagem=contagem-1 WHERE id_barco='$id_barco' AND contagem>0");
		}
	}


	$busca = mysqli_query($link, "SELECT contagem,maximo FROM barcos WHERE id_barco='$id_barco'");
	$info_solo = mysqli_fetch_assoc($busca);
	$contagem = $info_solo['contagem'];
	$maximo = $info_solo['maximo'];

	$final = $contagem."/".$maximo;

	echo $final;

}
?>