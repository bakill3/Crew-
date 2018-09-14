$(document).ready(function(){

			$(".operate").click(function () {

				var id_barco = $(this).val();

				var add_remove = $(this).attr('id');
				//console.log(add_remove);


				$.ajax({
					type: "POST",
					url: "adicionar.php",
					data: {id_barco: id_barco, add_remove: add_remove},
					success: function(response){
						$('.contagem_' + id_barco).html(response);
					}
				});

			});

		});