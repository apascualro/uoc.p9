window.onload = function (){

	$('input[name=options]').change(function(){	

		var op = $("#operacio").val();
		console.log(op + "op");

		if(op == "addValoracion"){			
			console.log("antes " + op);
		}else{
			var op = "updateValoracion";
		}
		console.log("despues" + op);
		
		var options = $("input[type=radio]:checked").val();

		$.post("valoracionesController.php", 
			{ operacio: op, options: options },
			);
		if(op != "addValoracion"){
			$(valUpdated).show(700);
			$(valUpdated).delay(3000).hide(700);
			
		}else {
			$(valSaved).show(700);
			$(valSaved).delay(3000).hide(700);
			document.getElementById("operacio").value = "updateValoracion";
			console.log("ultim" + op);
		}
		var op = "";

	});





	/*=============================================
	=            Añadir comentario       =
	=============================================*/
	var dato = ['tematica', 'originalidad', 'edicion', 'reincidencia', 'escalabilidad', 'azar'];
	$.each(dato, function(op, index) {
		$(document).ready(function() {

			var $valueSpan = $('#'+ index +'.valueSpan');
			var $value = $('#'+ index );
			$valueSpan.html($value.val());
			$value.on('input change', () => {

				$valueSpan.html($value.val());
			});
		});
	});




	// $('input[name=op_comment]').change(function(){

	// 	const $nom = $(this).attr('id');

	// 	const $valueSpan = $('#'+ $nom +'.valueSpan');
	// 	const $value = $('#'+ $nom);

	// 	$valueSpan.html($value.val());

	// 	$valueSpan.html($value.val());
	// 	$value.on('input change', () => {
	// 		$valueSpan.html($value.val());
	// 	});


	// });


}