/*=============================================
	=            Añadir usuariosController       =
	=============================================*/

	function validateForm() {
		
		var pass1 = document.forms["form-addUser"]["pass"].value;
		var pass2 = document.forms["form-addUser"]["pass2"].value;


		if (pass1 != pass2) {
			$(passErr).show(700);
			$(passErr).delay(1500).hide(700);
			return false;
		}


		pass1 = undefined; pass2 = undefined;
		
		

		/*=====  Comprueba nomUser  ======*/
		var res2 = validateUserName();
		if(!res2){		
			return false;
		}
		res2 = undefined;

		/*=====  Comprueba email  ======*/
		var res = validateEmail();
		if(!res){
			return false;
		}   
		res = undefined;

	}

	function validateUserName(){

		var ops = "checkUserName";
		var userName = document.forms["form-addUser"]["nombreUsuario"].value;
		var retValue2 = false; 
		
		$.ajax({
			async: false,
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '../../controladores/usuariosController.php', // the url where we want to POST
            data        : { operacio: ops, nombreUsuario: userName }, // our data object
            cache: false,
            // timeout: 30000, 
            dataType: "json",
        })
        // using the done promise callback
        .done( function(data2) {
        	if (data2.existss == true){
        		$(userErr).show(700);
        		$(userErr).delay(1500).hide(700);
        		console.log("ocupado");
        		retValue2 = false;
        	}else if (data2.existss == false){
        		console.log("libre");
        		retValue2 = true;   
        	}
        });

        return retValue2;
        ops = undefined; userName = undefined; retValue2 = undefined;
    }



    function validateEmail(){

    	var op = "checkUserEmail";
    	var email = document.forms["form-addUser"]["emailRegister"].value;
    	var retValue = false;        


    	$.ajax({
    		async: false,
	            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
	            url         : '../../controladores/usuariosController.php', // the url where we want to POST
	            data        : { operacio: op, email: email }, // our data object
	            cache: false,
	            // timeout: 30000, 
	            dataType: "json",
	        })
	    // using the done promise callback
	    .done( function(data) {
	    	if (data.exists == true){
	    		$(emailErr).show(700);
	    		$(emailErr).delay(1500).hide(700);
	    		console.log("ocupado");
	    		retValue = false;
	    	}else if (data.exists == false){
	    		console.log("libre");
	    		retValue = true;   
	    	}
	    });
	    return retValue;
	    op = undefined; email = undefined;
	}


	

	window.onload = function (){

	/*=============================================
	=            Valoraciones numeros       =
	=============================================*/

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