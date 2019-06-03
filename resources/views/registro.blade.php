<?php 
use App\Helpers;
?>
<!DOCTYPE html>
<html>
<head>
  <title>REGISTRO DE USUARIO - PLATAFORMA CREAR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.validate.min.js') }}"></script>

  <script src='https://www.google.com/recaptcha/api.js'></script>
<body>

  <div class="w3-col m1 w3-center"><p></p></div>
  <div class="w3-col m10 w3-white w3-center">
        <div class="w3-col m12 l12" style="margin-bottom: 20px;">
	       	<div class="w3-card-4">
		    <div class="w3-container w3-light-green">
		      <h2 style="color:white;">REGISTRO DE USUARIO EN EL SISTEMA</h2>
		    </div>
	        <form id="regForm" action="" method="post">
	        	<div class="float-container" id="dniBlur">
			      <label>DNI <span style="color:red;">&#10033;</span></label>
			      <input data-placeholder="Ingrese su dni..." name="dni" maxlength="43" id="dni">
			    </div>
			    <div class="float-container">
			      <label>EMAIL <span style="color:red;">&#10033;</span></label>
			      <input data-placeholder="Ingrese su email..." name="mail" maxlength="43" id="mail">
			    </div>
			    <div class="float-container">
			      <label>NOMBRE Y APELLIDO <span style="color:red;">&#10033;</span></label>
			      <input data-placeholder="Ingrese su nombre y apellido..." name="nombre" maxlength="43" id="nombre">
			    </div>
			    <div class="float-container">
			      <label>PASSWORD <span style="color:red;">&#10033;</span></label>
			      <input data-placeholder="Ingrese un password..." name="password" maxlength="43" id="password" type="password">
			    </div>
          <div class="g-recaptcha" 
               data-sitekey="<?= env('GOOGLE_RECAPTCHA_KEY') ?>">
          </div>
			    <p id="notificacion"><?= $msg ?></p>
			    <button class="w3-btn w3-light-green" style="color:white !important;">REGISTRARSE</button>
			</form>
			</div>
			  <p><small>Versión <b>TEST</b> del sistema de formularios para la agencia de desarrollo CREAR.</small></p>
        </div>
    <div class="w3-col m1 w3-center"><p></p></div>

</body>
<script type="text/javascript" src="{{ asset('js/nombreInputsStyle.js') }}"></script>
<script type="text/javascript">
	$( "#regForm" ).validate({
           rules: {
                  dni: {
                           required: true,
                           minlength: 7,
                           maxlength: 40
                   },
                   mail: {
                            required: true,
                            maxlength: 40
                   },
                   nombre: {
                           required: true,
                           maxlength: 40
                   },
                   password: {
                           required: true,
                           maxlength: 40
                   }
           },
           submitHandler: function(form) {
                if (grecaptcha.getResponse()) {
                    form.submit();
                } else {
                    alert('Por favor, confirme el CAPTCHA antes de proceder.')
                }
            },
           messages: {
                  dni: {
                           required: "",
                           minlength: $.format("Necesitamos por lo menos {0} caracteres"),
                           maxlength: $.format("{0} carácteres son demasiados!")
                   },
                   mail: {
                   		   required: "",
                           maxlength: $.format("{0} carácteres son demasiados!")
                   },
                   nombre: {
                   		   required: "",
                           maxlength: $.format("{0} carácteres son demasiados!")
                   },
                   password: {
                   		   required: "",
                           maxlength: $.format("{0} carácteres son demasiados!")
                   }
           }
   });
</script>
<script type="text/javascript">
	$('#dniBlur').on('blur','input',function(event) {
    var datos = {};
        datos['dni'] = $('#dni').val();

    $.ajax({
        type: 'POST',
        url: "{{ url('/registroAjax') }}",
        data : datos
    }).done(function (data) {
    	if (data == 'El DNI es válido') {
    		$('#notificacion').css('color','green');
    		$('#notificacion').text(data);
    	}
    	if ( data == 'El DNI ingresado no es válido o ya existe en nuestros registros.'){
    		$('#notificacion').css('color','red');
    		$('#notificacion').text(data);
    	}
    }).fail(function () {
        console.log('Error contacte con el administrador de la aplicación.');
    });
  }); 
</script>
  <script type="text/javascript">
    $(function() {
    $('input').keyup(function() {
    	if ($(this).attr('id') != 'password') {
        	this.value = this.value.toLocaleUpperCase();
    	}
    });
});
  </script>
<script type="text/javascript">
  $(document).ready(function(){
        //FORMATO DE MASCARAS
        $('#dni').mask('00000000');
      });
</script>
</html>    