<?php 
use App\Libraries\Helpers;
?>
<!DOCTYPE html>
<html>
<head>
  <title>MENÚ USUARIO - FORMULARIOS</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel='stylesheet' href="<?=$GLOBALS['raiz'].'resources/assets/css/fuente.css'?>">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <link rel="shortcut icon" href="<?=$GLOBALS['raiz'].'resources/assets/img/logo.svg'?>" type="image/x-icon"/>
  <script src="{{ asset('js/jquery.min.js') }}" type="text/javascript"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
<style type="text/css">
@keyframes blink {  
  0% { color: red; }
  50% { color: black; }
  100% { color: red; }
}
@-webkit-keyframes blink {
  0% { color: red; }
  50% { color: black; }
  100% { color: red; }
}
.blink {
  -webkit-animation: blink 1s linear infinite;
  -moz-animation: blink 1s linear infinite;
  animation: blink 1s linear infinite;
}
</style>
</head>
<body>

  <div class="w3-col m1 w3-center"><p></p></div>
  <div class="w3-col m10 w3-white w3-center">
      <div style="margin-bottom: 30px;">
        <a href="<?= $GLOBALS['urlRaiz'] ?>">
        <img src="<?=$GLOBALS['raiz'].'resources/assets/img/logo_crear.jpg'?>">
        </a>
      </div>
        <div class="w3-col m12 l12" style="margin-bottom: 20px;">
          <a href="<?=$GLOBALS['urlRaiz'].'logout'?>" class="w3-btn w3-red">LOGOUT(<?=$nombreUsuario?> <span class="blink">&#9673;</span>)</a>
          <a class="w3-btn w3-green" href="<?=$GLOBALS['urlRaiz'].'user'?>">Volver a formularios</a>
        </div>
        <style type="text/css">
        	


.tipoForm img {
-webkit-filter: brightness(50%);
-webkit-transition: all 0.6s ease;
-moz-transition: all 0.6s ease;
-o-transition: all 0.6s ease;
-ms-transition: all 0.6s ease;
transition: all 0.6s ease;
}

.tipoForm img:hover {
-webkit-filter: brightness(100%);
}

        </style>
         <div class="w3-row w3-container">
		  <h2>Elegí el plan:</h2>
		  <?php 
		  	for ($i=0; $i < count($tiposFormularios); $i++) { 
		  		print_r('
						<div class="w3-half w3-center">
							<div class="tipoForm" style="border: 5px #8dc540 solid;padding:20px;">
							<input type="text" value="'.$tiposFormularios[$i]->id.'" hidden>
							<img height="250px;" width="250px;" src="'.$GLOBALS["raiz"].'resources/assets/img/'.$tiposFormularios[$i]->id.'.png">
						    	<p style="font-size:18px;">'.$tiposFormularios[$i]->nombre.'</p>
						    </div>
						</div>
		  			');
		  	}
		  ?>
		  <p><small>Versión <b>TEST</b> del sistema de formularios para la agencia de desarrollo CREAR.</small></p>
		</div>
		<style type="text/css">
			.slidecontainer {
  width: 100%;
}

.slider {
  -webkit-appearance: none;
  width: 80%;
  height: 25px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}
.monto {
	color:#0278b6;
  font-size: 20px;
}
		</style>
    <div class="w3-col m1 w3-center"><p></p></div>
    <script type="text/javascript">
    	var infoCreditos = '';
    	var contenido = '';
    	var id = '';
		var url = window.location.pathname.split('/');
		url = '/'+url[1]+'/'+url[2]+'/'+url[3]+'/'+url[4]+'/';
		var urlImg = window.location.pathname.split('/');
		urlImg = '/'+urlImg[1]+'/';
    console.log(url);
    	$(document).on('click','.tipoForm', function () {
    		id = $(this).children('input').val();
    		contenido = '';
    		var datos = {};
		        datos['id'] = id;
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
		    $.ajax({
		        type: 'POST',
		        url: url+'buscarCreditos',
		        data : datos
		    }).done(function (data) {
		    	infoCreditos =  JSON.parse(data);
		    	if (jQuery.isEmptyObject(infoCreditos)) {
		    		contenidoFijo = $('<br>\
		    			<img src="'+urlImg+'resources/assets/img/logo_crear.jpg"><br>\
		    			<h4>No existen planes para esta línea de crédito por ahora.<br> Disculpe las molestías. <br></h4><h3>Muchas gracias!</h3><br><br>');
		    	} else {
	    			countInfo = parseInt(infoCreditos.length)-parseInt(1);
			    	contenidoFijo = $('<h3>Elija el plan del crédito al que quiere acceder:</h3>\
			    		<form class="slidecontainer" id="sliderData">\
						    <input class="slider" id="slider1" type="range" min="0" max="'+countInfo+'" value="0">\
						    <br><h3>Monto: <span class="monto">$'+infoCreditos[0].monto+'</span></h3> <!-- default value -->\
						</form>');
			    	contenido = ('<div id="infoCreditos">\
			    					<p>Formalidad:</p>\
									<p>'+infoCreditos[0].descripcion+'</p>\
									<a style="text-decoration:none;" href='+url+'ingresarForm/'+id+'&'+infoCreditos[0].monto+'><button class="w3-btn w3-green" type="button">Ingresar formulario</button></a><br><br>\
								</div>\
	    			');
		    	}
	    		w3modalcontainer.append(contenidoFijo);
	    		w3modalcontainer.append(contenido);
		    }).fail(function () {
		        console.log('Error contacte con el administrador de la aplicación.');
		    });
		    
    		div = $(this).parent();
    		w3modal = $('<div id="modal" class="w3-modal"></div>');
    		w3modalcontent = $('<div class="w3-modal-content"></div>');
    		w3modalcontainer = $('<div class="w3-container"></div>');
    		cerrarModal = $('<span id="cerrarModal" class="w3-button w3-display-topright">&times;</span>');

    		w3modalcontainer.append(cerrarModal);
    		w3modalcontent.append(w3modalcontainer);
    		w3modal.append(w3modalcontent);

    		div.append(w3modal);
    		w3modal.show();
    	});

		$(document).on('change','#slider1', function() {
			$('.monto').text('$'+infoCreditos[this.value].monto);
			contenido = ('<div id="infoCreditos">\
		    					<p>Formalidad:</p>\
								<p>'+infoCreditos[this.value].descripcion+'</p>\
								<a style="text-decoration:none;" href='+url+'ingresarForm/'+id+'&'+infoCreditos[this.value].monto+'><button class="w3-btn w3-green" type="button">Ingresar formulario</button></a><br><br>\
							</div>\
    			');
			$('#infoCreditos').remove();
			w3modalcontainer.append(contenido);
		});
    	$(document).on('click','#cerrarModal', function () {
    		$('#modal').remove();
    	});
    </script>
<div id="id01" class="w3-modal">
    <div class="w3-modal-content">
      <div class="w3-container">
        <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
        <p>Some text. Some text. Some text.</p>
        <p>Some text. Some text. Some text.</p>
      </div>
    </div>
</div>
</body>
</html>    