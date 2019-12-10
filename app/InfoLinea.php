<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoLinea extends Model
{
    //
    public function archivoMultimedia()
    {
        return $this->belongsTo('App\Multimedia','multimedia_id');
    }
}
