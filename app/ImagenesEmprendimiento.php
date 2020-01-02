<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenesEmprendimiento extends Model
{
    //
    public function datos_imagen()
    {
        return $this->belongsTo('App\Multimedia','multimedia_id');
    }
}
