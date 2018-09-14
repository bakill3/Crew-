<?php 

include 'header.php';
if (!isset($_SESSION['user'])) {
	header('Location: index.php');
	exit(0);
}
?>
<table class="table table-dark table-bordered">
	<thead>
		<tr>
			<td colspan="4"><p class="text-center display-4">Barcos</p></td>
		</tr>
		<tr>
			<td>Nome</td>
			<td>Nº Pessoas</td>
			<td>Adicionar</td>
			<td>Remover</td>
		</tr>
	</thead>
	<tbody>
	<?php
	$query = mysqli_query($link, "SELECT * FROM barcos INNER JOIN barcos_txt ON barcos.barco = barcos_txt.id_barco_txt") or die(mysqli_error($link));
	if (mysqli_num_rows($query) > 0) {
		if (!isset($_SESSION['id_barco'])) {
			$_SESSION['id_barco'] = array();
		}
		while ($info = mysqli_fetch_array($query)) {
			$nome_barco = $info['barco_nome'];
			$id_barco = $info['id_barco'];
			$contagem = $info['contagem'];
			$maximo = $info['maximo'];
			$_SESSION['id_barco'][$id_barco] = $maximo;

			echo "
			<script>
				$(document).ready(function(){


				setInterval(function(){
    				load();
  				}, 500);
				function load() {
					ya = Number(".$id_barco.");
					la = Number(".$maximo.");

					$.ajax({
						type: 'POST',
						url: 'teste.php',
						data: {ya: ya},
						success: function(response){
							$('.contagem_".$id_barco."').html(response);
						}
					});
				}

			});
			</script>
			";


			echo "<input type='hidden' id='maximo' value='$maximo'><tr>
			<td>".$nome_barco."</td>
			<td><div class='contagem_".$id_barco."'>".$contagem."/<span>".$maximo."</span></div></td>
			<td><button class='btn btn-success operate' value='$id_barco' id='1'><i class='fas fa-plus'></i></button></td>
			<td><button class='btn btn-danger operate' value='$id_barco' id='2'><i class='fas fa-minus'></i></button></td>
			</tr>";
		}
	}
	?>
	</tbody>
	

</table>
<script type="text/javascript" src="js/load.js"></script>
<?php include 'footer.php'; ?>