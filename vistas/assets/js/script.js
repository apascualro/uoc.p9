/*=============================================
=            Validar Login       =
=============================================*/
function validateLogin() {


	var email = document.forms["form-login"]["email"].value;
	var pass = document.forms["form-login"]["password"].value;

	
	
	var devolver = false;
	console.log(email);
	console.log(pass);

	var a = checkUser(email, pass);
	console.log(a);
	if(a){
		return true;
	}else{
		$(loginErr).show(700);
		$(loginErr).delay(1500).hide(700);
		return false;
	}
	a = undefined;
}

function checkUser(email, pass){

    // var email = email;
    // var pass = pass;
    var devolver = false;
    var op = "checkLogin";

    $.ajaxSetup({async:false});

    $.ajax({

            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : '../controladores/usuariosController.php', // the url where we want to POST
            data        : { operacio: op, email: email, pass: pass }, // our data object
            cache: false,
            // timeout: 30000, 
            dataType: "json",
        })
    // using the done promise callback
    .done( function(data) {
    	console.log(data);
    	if (data.exists == true){
    		devolver = true;
    	}else if (data.exists == false){
    		devolver = false;
    	}
    });

    $.ajaxSetup({async:true});
    return devolver;
    op = undefined; email = undefined; pass = undefined;
}

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

/*=============================================
=            Validar Filtros       =
=============================================*/

var myVal = "";
var myName = "";
var filtro = "";
var array = [];


function validateFiltros() {

	function titleCase(string){
		return string[0].toUpperCase() + string.slice(1).toLowerCase();
	}

	filtro = titleCase(filtro);
	console.log(filtro);
	console.log(arrayupdate);

	var arrayupdateCheck = arrayupdate.filter(function(el){
		return el === filtro;
	});

	return false;

	// if (typeof arrayupdateCheck !== 'undefined' && arrayupdateCheck.length > 0){
		
	// 	$(FiltroErr).show(700);
	// 	$(FiltroErr).delay(1500).hide(700);
	// 	return false;
	// 	console.log("si");
	// }else{
	// 	return true;
	// 	console.log("no");
	// }		

	filtro = undefined; arrayupdate = undefined; arrayupdateCheck = undefined; 
	myVal = undefined; myName = undefined; array = undefined; filtro = undefined;

}



/**************************************************************************/


window.onload = function (){

/*=============================================
=            Atras       =
=============================================*/


function goBack() {
	window.history.back();
}



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
		).done(function(data){
			// alert(data);
			// console.log(data);
		});

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

/*=============================================
=            subir imagenes       =
=============================================*/




$(document).ready(function(){

    // Submit form data via Ajax
    $("#fupForm").on('submit', function(e){
    	// e.preventDefault();
    	$.ajaxSetup({async:false});

    	$.ajax({
    		type: 'POST',
    		url: '../../controladores/juegosController.php',
    		beforeSend: function(){
    			// $('.submitBtn').attr("disabled","disabled");
    			$('#fupForm').css("opacity",".5");
    		},
    		data: new FormData(this),
    		// dataType: 'json',
    		contentType: false,
    		cache: false,
    		processData:false,
    	})
    	.done(function(response){
    		// alert(response);
    		console.log(response);
    		$('.statusMsg').html('');
    		if(response.status == 1){
    			$('#fupForm')[0].reset();
    			$('.statusMsg').html('<p class="alert alert-success">'+response.message+'</p>');
    		}else{
    			$('.statusMsg').html('<p class="alert alert-danger">'+response.message+'</p>');
    		}
    		$('#fupForm').css("opacity","");
    			// $(".submitBtn").removeAttr("disabled");
    		});
    	$.ajaxSetup({async:true});
    });

    

// File type validation
var match = ['image/jpeg', 'image/png', 'image/jpg'];
$("#file").change(function() {
	for(i=0;i<this.files.length;i++){
		var file = this.files[i];
		var fileType = file.type;

		if(!( (fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) )){
			alert('Sorry, JPG, JPEG, & PNG files are allowed to upload.');
			$("#file").val('');
			return false;
		}
	}
});
$("#file2").change(function() {
	for(i=0;i<this.files.length;i++){
		var file = this.files[i];
		var fileType = file.type;

		if(!( (fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) )){
			alert('Sorry, JPG, JPEG, & PNG files are allowed to upload.');
			$("#file2").val('');
			return false;
		}
	}
});
});

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {

    	if (input.files) {
    		var filesAmount = input.files.length;

    		for (i = 0; i < filesAmount; i++) {
    			var reader = new FileReader();

    			reader.onload = function(event) {
    				
    				$($.parseHTML('<img>')).attr('src', event.target.result).attr('class', 'm-3').attr('style', 'width:100px').appendTo(placeToInsertImagePreview);
    			}

    			reader.readAsDataURL(input.files[i]);
    		}
    	}

    };

    $('#file').on('change', function() {
    	imagesPreview(this, 'div.gallery');
    });
    $('.prv1').on('change', function() {
    	imagesPreview(this, 'div.gallery1');
    });
});

/*=============================================
=            deshabilitar usuarios       =
=============================================*/

$('#toggels .boto').on('click', function() {
    var id = $(this).attr('id');

    var checkStatus = this.checked ? '' : 'deshabilitado';

    $.post("../../controladores/usuariosController.php", {"quickVar": checkStatus, "id": id}, 
      function(data) {
        // alert(data);
        // $('#resultQuickVar' + id).html(data);
      });
  });

}