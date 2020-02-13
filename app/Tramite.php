<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    //
    public function obtenerConsulta()
    {   
        return $this->hasOne('App\Consulta');
    }
    public function obtenerFormulario()
    {   
        return $this->hasOne('App\Formulario');
    }
}
