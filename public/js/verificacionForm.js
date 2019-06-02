//Alterna los valores de los checks de acuerdo a su estado, 1 = verificado, 0 = no verificado
$(".validar").change(function() {
     $(this).val(this.checked ? "1" : "0");
    });

//Agrega una caja de texto para que el técnico pueda escribir una observación
$("button#agregarObservacion").click(function(){
  div = $(this).parent('div');
  if (div.children('.observacion').length === 0) {
    //se utiliza el titulo de la pagina en donde estamos situados para guiar
    nombreHoja = div.children('.nombreHoja').text();
    //el id lo utilizamos para el tratamiento de datos, está hidden en la vista como un input
    idHoja = div.children('.hoja').text();
    //agregamos a la vista la caja de texto con prepend para que pueda situarse al principio
    div.prepend('<div class="observacion"><b><p>Agregar observación para '+nombreHoja+' </p></b><textarea name=observaciones["'+idHoja+'"]> </textarea></div>');
  }
});


var verificacionModal = document.getElementById('verificacionModal');
var btn = document.getElementById("validar");
var btnConfirmar = document.getElementById("enviarValidacion");
var span = document.getElementsByClassName("close")[0];

//funcionalidad para poder extraer los nombres de las claves de los arreglos
function dividirCadena(name) {
    name = $(this).attr('name');
    separador = '[';
    separador2 = '"';
    var arrayDeCadenas = name.split(separador);
    final = arrayDeCadenas[1].split(separador2);
   return final[1];
}

//instaciamos los arreglos en json para luego poder enviarlos por ajax
var datosVerificar = {};
var observaciones = {};


btn.onclick = function() {
  //mostramos el modal
  verificacionModal.style.display = "block";
  //creamos los elementos tr para trabajarlos
  trNombres = $('<tr></tr>');
  trValores = $('<tr></tr>');
  trObservaciones = $('<tr></tr>');

  //obtenemos los ids de form y valid y los agregamos a los arreglos
  idFormulario = $('#idFormulario').val();
  idValidacion = $('#idValidacion').val();
  datosVerificar['id'] = idFormulario;
  datosVerificar['idValidacion'] = idValidacion;

//Creamos el conjunto de observaciones
$('textarea[name^="observaciones"]').each(function(key, value) {
  name = $(this).attr('name');
  nombre = dividirCadena(name);
//Comprobamos que la observación tiene más de 2 carácteres y menos de 255
  if ($(this).val().length > 2 && $(this).val().length < 255) {
    observaciones[nombre] = $(this).val();
    $('.validar').each(function(){
      name = $(this).attr('name');
      separador = '[';
      separador2 = '"';
      var arrayDeCadenas = name.split(separador);
      final = arrayDeCadenas[1].split(separador2);

      if (final[1] == nombre )
      {
        $(this).attr('value','0');
      }
    });
  } else {
    observaciones[nombre] = null;
  }
});

//agregamos observaciones a los datos que vamos a enviar al controller
  datosVerificar['observaciones'] = observaciones;

//agregamos los datos verificados y creamos la vista en el modal

  $('input[name^="verificar"]').each(function(key, value) {
      //extrae el key del input
      name = $(this).attr('name');
      idNombre = dividirCadena(name);
      nombre = dividirCadena(name);

      //extrae el valor si es verificado o no 
      if ($(this).val() == 1) {
        var valorValidar = '<p style="color:green;">Verificado</p>';
      } else {
        var valorValidar = '<p style="color:red;">No verificado</p>';
      }

      //creamos el elemento para guardarlo en array que va a ser enviado por AJAX

      datosVerificar[nombre] = $(this).val();

      //mayusculas en nombre para la vista
      nombre =  nombre.charAt(0).toUpperCase() + nombre.slice(1);
      //agregamos a los th al tr que van a ser añadidos a la tabla
      $(trNombres).append('<th style="padding-left:10px;padding-right:10px;">'+nombre+('</th>'));
      $(trValores).append('<td align="center">'+valorValidar+'</td>');
      if (observaciones[idNombre]) {
        $(trObservaciones).append('<td><textarea readonly>'+observaciones[idNombre]+'</textarea></td>');
      } else {
        $(trObservaciones).append('<td align="center">Vacío</td>');
      }

      //agregamos el elemento creado al array para enviar
  });
  
  //añadimos los tr creados para formar la tabla de validación
  $("#tabla_verificacion").append(trNombres);
  $("#tabla_verificacion").append(trValores);
  $("#tabla_verificacion").append(trObservaciones);
}

btnConfirmar.onclick = function() {
  var url = window.location.pathname.split('/');
  url = '/'+url[1]+'/'+url[2]+'/';
  $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    $.ajax({
        type: 'POST',
        url: "{{ url('/agregarRevision') }}",
        dataType: 'JSON',
        data : datosVerificar
    }).done(function (data) {
        verificacionModal.style.display = "none";
        $("#tabla_verificacion tr").remove();
        alert('Verificación confirmada!');
        //location.reload();
    }).fail(function ( jqXHR, textStatus, errorThrown ) {
        if (jqXHR.status === 0) {

          alert('No hay conexión: Verify Network.');

        } else if (jqXHR.status == 404) {

          alert('No existe la página solicitada [404]');

        } else if (jqXHR.status == 500) {

          alert('Error en el servidor [500].');

        } else if (textStatus === 'parsererror') {

          alert('Requested JSON parse failed.');

        } else if (textStatus === 'timeout') {

          alert('Time out error.');

        } else if (textStatus === 'abort') {

          alert('Ajax request aborted.');

        } else {

          alert('Uncaught Error: ' + jqXHR.responseText);

        }
    });
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  verificacionModal.style.display = "none";
  $("#tabla_verificacion tr").remove();
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == verificacionModal) {
    verificacionModal.style.display = "none";
    $("#tabla_verificacion tr").remove();
  }
}
