<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    //
    public function verUsuario()
    {
        return $this->hasOne('App\Usuario');
    }
    public function verArea()
    {
        return $this->hasOne('App\Area');
    }
}
