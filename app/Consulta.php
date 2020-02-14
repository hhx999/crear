<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    //
    public function verUsuario()
    {
        return $this->belongsTo('App\Usuario','usuario_id');
    }
    public function verArea()
    {
        return $this->belongsTo('App\Area','area_id');
    }
}
