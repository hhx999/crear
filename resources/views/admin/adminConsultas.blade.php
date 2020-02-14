<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="_token" content="{{csrf_token()}}" />

  <link rel="stylesheet" href="{{ asset('css/w3.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/jquery.mask.min.js') }}"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<title>CREAR - Consultas</title>
<style type="text/css">
	input {
		border: 0px;
	}
</style>
</head>
<body>
<div class="w3-col m1 w3-center"><p></p></div>
  <div class="w3-col m10 w3-white w3-center">
    <h3>ADMINISTRACIÓN DE USUARIOS</h3>
    <fieldset style="margin-bottom: 20px;">
      <legend style="color:green;">Opciones de administración de usuarios</legend>
          <a href="{{ url('/logout') }}" class="w3-btn w3-red">LOGOUT(<?=$nombreUsuario?> <span class="blink">&#9673;</span>)</a>
          <a class="w3-btn w3-green" href="{{ url('/admin') }}">Volver a formularios</a>
    </fieldset>
    <form action="{{url('/consultas')}}" method="post" name="responderConsultas">
    	@if($consultas->isNotEmpty())
	          <input class="w3-button w3-lime" style="color: white;" type="submit" name="enviarRespuestas" value="Responder consultas" id="enviarRespuestas">
	        @endif
	        <div id="consultas">
			<table class="w3-table" style="overflow:scroll;
			    height:100px;">
			    <thead>
			    	<tr class="w3-color w3-green">
			    		<th>ID</th>
			    		<th>Usuario</th>
			    		<th>Fecha</th>
			    		<th>Area</th>
			    		<th>Consultas</th>
			    		<th>Respuesta</th>
			    	</tr>
			    </thead>
			     <tbody>
                  @if($consultas->isNotEmpty())
                    @foreach($consultas as $consulta)
                    <tr>
                      <td style="width: 70px;">
                          <input type="text" name="consulta_id[]" value="{{$consulta->id}}">
                      </td>
                      <td>
                        {{$consulta->verUsuario->nombreApellido}}
                      </td>
                      <td style="width: 100px;">{{$consulta->updated_at}}</td>
                      <td>
                          {{$consulta->verArea->nombre}}
                      </td>
                      <td> {{$consulta->consulta}} 
                      </td>
                      <td>
                      	<textarea name="respuesta[]">{{$consulta->respuesta}}</textarea>
                      </td>
                  </tr>
                    @endforeach
                  @else
	                <tr>
	                    <td colspan="4" style="text-align: center;">No existen registros.</td>
	                </tr>
                  @endif
				</tbody>
			</table>
		</div>
        </form>
		</div>
</body>
</html>