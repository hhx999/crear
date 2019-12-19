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
}
