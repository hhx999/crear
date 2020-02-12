<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    //
    public function obtenerTramites()
    {
    	if($this->hasOne('App\Consulta')) {
    		return $this->hasOne('App\Consulta');
    	}
    	if($this->hasOne('App\Formulario')) {
    		return $this->hasOne('App\Formulario');
    	}
    }
}
