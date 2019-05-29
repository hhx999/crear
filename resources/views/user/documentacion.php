<?php 
use App\Libraries\Helpers;
?>
<!DOCTYPE html>
<html>
<head>
<title>MENÚ USUARIO - LINEA EMPRENDEDOR</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel='stylesheet' href="<?=$GLOBALS['raiz'].'resources/assets/css/fuente.css'?>">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
  <link rel="icon" href="favicon.ico" type="image/x-icon"/>
  <link rel="shortcut icon" href="<?=$GLOBALS['raiz'].'resources/assets/img/logo.svg'?>" type="image/x-icon"/>
  
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['raiz'].'resources/assets/css/style.css'?>">
  <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['raiz'].'resources/assets/css/alertify.css'?>">

  <script type="text/javascript" src="<?=$GLOBALS['raiz'].'resources/assets/js/alertify.min.js'?>"></script>
  <script src="<?=$GLOBALS['raiz'].'resources/assets/js/jquery.min.js'?>" type="text/javascript"></script>
</head>
<body>

  <div class="w3-col m1 w3-center"><p> </p></div>
  <div class="w3-col m10 w3-white w3-center">
      <div style="margin-bottom: 30px;">
        <img src="<?=$GLOBALS['raiz'].'resources/assets/img/logo_crear.jpg'?>">
      </div>
        <a href="<?=$GLOBALS['urlRaiz'].'user'?>"><button type="button">Volver a FORMULARIOS</button></a><br>
<br>
<input type="text" id="success" value="<?php if ($msg == '1') { echo $msg; } else if ($msg == '0') {echo $msg;} else { echo '2';} ?>" hidden>
  <div class="w3-panel w3-pale-green w3-leftbar w3-border-light-green">
    <h3 align="left">Documentación del FORMULARIO Nº<?=$id?> 
    </h3>
  </div>
  <?php  
  if (!is_object($observacion)) {
  	print_r('<div class="w3-panel w3-orange w3-display-container">
	  <span onclick="this.parentElement.style.display=\'none\'"
	  class="w3-button w3-large w3-display-topright">&times;</span>
	  <h3>Observación!</h3>
	  <p>'.$observacion.'</p>
	</div>');
  }
  ?>
<br>
<style type="text/css">
	#desc {
		height: 60px;
		border: 2px solid #0177b5;
	}
	#archivo {
		border: 2px solid #0177b5;
	}
	.eliminarDocumento {
		cursor: pointer;
	}
</style>
<form action="<?=$GLOBALS['urlRaiz'].'agregarDocumentacion/'.$id?>" method="post" enctype="multipart/form-data">
	<div class="w3-row">
	  <div class="w3-col w3-container m4 l3">
	    <select name="descripcion" id="desc">
			<option value="DNI">DNI</option>
			<option value="DOMICILIO">Domicilio</option>
			<option value="RECIBO_SUELDO">Recibo de sueldo</option>
		</select>
	  </div>
	  <div class="w3-col w3-container m8 l9">  
			<input type="file" name="dni" id="archivo">
	  </div>
	</div>
<br>
    <input style="color:white !important;" class="w3-button w3-light-green" type="submit" value="Subir Documentación" name="submit">
</form>
<br>
<div class="w3-container">
	<h3>Documentación:</h3>
<table class="w3-table-all">
    <thead>
		<tr class="w3-light-green" style="color:white !important;">
			<th>ID</th>
		  	<th>Vista previa</th>
		  	<th>Descripción</th>
		  	<th>Acción</th>
		</tr>
	</thead>
	<tbody>	
	<?php 
	use App\Multimedia;
	for ($i=0; $i < count($documentacion); $i++) {
		switch ($documentacion[$i]->descripcion) {
			case 'DNI':
				$descripcion = "Documento Nacional de Identidad";
				break;
			case 'DOMICILIO':
				$descripcion = "Certificado de domicilio";
				break;
			case 'RECIBO_SUELDO':
				$descripcion = "Recibo de sueldo";
				break;
			default:
				$descripcion = "Descripción no válida";
				break;
		}
		if ($documentacion[$i]->descripcion == 'DNI') {
			$descripcion = "Documento Nacional de Identidad";
		} 
		$multimedia = Multimedia::find($documentacion[$i]->multimedia_id);
		print_r('	<tr>
					<td id="id">
					'.$documentacion[$i]->multimedia_id.'
					</td>
					<td>
				      <img class="w3-bar-item w3-hide-small" style="width:85px" src="'.$GLOBALS['raiz'].'storage'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$multimedia->id.'">
				    </td>
				    <td>
						'.$descripcion.'
					</td>
					<td align="center">
				        <span class="eliminarDocumento w3-large" style="background-color:#fc5353;padding:5px;-webkit-border-radius: 7px;
-moz-border-radius: 7px;
border-radius: 7px;color:white;"><i class="fa fa-trash"></i> Eliminar</span>
				    </td>
				    </tr>');
	} ?>
	</tbody>
</table>
</div>
  <br><br>
     <p><small>Versión <b>TEST</b> del sistema de formularios para la agencia de desarrollo CREAR.</small></p>
     </div>
    <div class="w3-col m1 w3-center"><p></p></div>
    <script type="text/javascript">  
    	if ($('#success').val() == 1) {
    		alertify.success('<span style="color:white !important">La documentación ha sido agregada con éxito!</span>');
    	} else if  ($('#success').val() == 0){
    		alertify.error('<span style="color:white !important">Ocurrió un error al agregar la documentación</span>');
    	}
    	$(document).on('click','.eliminarDocumento', function () {
    		id = $(this).parent().parent('tr').find('#id').text();
    		//console.log($(this).parent().parent('tr').find('#id').text());
    		alertify.confirm("Desea eliminar el archivo con id "+id+"?",
			  function(){
			  	var url = window.location.pathname.split('/');
		        url = '/'+url[1]+'/'+url[2]+'/';

		        $.ajax({
		            type: 'POST',
		            url: url+'eliminarDocumentacion',
		            dataType: "json",
		            data : {'id' : id }
		        }).done(function (data) {
		        	console.log(data);
		            if (data == 1) {
		              alertify.error('Ok, eliminado.');
		            	setTimeout(function(){
						 	window.location.reload(true);   
						}, 1000);
		            } else {
		              alertify.warning('Ocurrió un error.');
		              //window.location.reload(true);
		            }
		        }).fail(function () {
		            alertify.error('Ocurrio un error. Por favor, pongase en contacto con el administrador.');
		            //window.location.reload(true);
		        });
			  },
			  function(){
			    alertify.error('Cancel');
			  });
    	});
    	</script>
</body>
</html>    