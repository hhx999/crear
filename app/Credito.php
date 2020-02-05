<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credito extends Model
{
    //
    public function historialEstado()
    {
        return $this->hasMany('App\HistorialEstado');
    }
    public function verEstado()
    {
    	return $this->belongsTo('App\EstadoCredito','estado');
    }
    public function verUsuario()
    {
    	return $this->belongsTo('App\EstadoCredito','usuario_id');
    }
    public function verEmprendimiento()
    {
    	return $this->belongsTo('App\Emprendimiento','emprendimiento_id');
    }
    public function ultimoEstado()
    {
        return $this->hasMany('App\HistorialEstado')->orderBy('id', 'DESC')->first();
    }
}
