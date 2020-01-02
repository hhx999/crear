@extends('userTest.layout')
    
    @section('title') Registro - Emprendimientos @endsection

    @section('content')

        <div class="w3-col m6" align="left">
            @foreach($emprendimientos as $emprendimiento)
            <img src="{{asset('img/emprendimientos/'.$emprendimiento->imagen->datos_imagen->id)}}" width="100%">
            <h5>{{$emprendimiento->categoria->nombre}}</h5>
            <h2>{{$emprendimiento->denominacion}}</h2>
            <p>
                {{$emprendimiento->descripcion}}
            </p>
            <p>
                <b>Email:</b>{{$emprendimiento->mail}}<br>
                <b>Dirección:</b>{{$emprendimiento->domicilio}}<br>
                <b>Teléfono:</b>{{$emprendimiento->telefono}}<br>
                <br>
                <b>Facebook:</b><a href="{{$emprendimiento->facebook_enlace}}">{{$emprendimiento->facebook_nombre}}</a><br>
                <b>Twitter:</b><a href="{{$emprendimiento->twitter_enlace}}">{{$emprendimiento->twitter_nombre}}</a><br>
                <b>Instagram:</b><a href="{{$emprendimiento->instagram_enlace}}">{{$emprendimiento->instagram_nombre}}</a><br>
                <b>Youtube:</b><a href="{{$emprendimiento->youtube_enlace}}">{{$emprendimiento->youtube_nombre}}</a><br>
                <b>Sitio web:</b><a href="{{$emprendimiento->web_enlace}}">{{$emprendimiento->web_nombre}}</a><br>
            </p>

            @endforeach
        </div>

@endsection