<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmprendimientoComercial extends Model
{
	protected $fillable = [
		"facebook_nombre",
		"facebook_enlace",
		"twitter_nombre",
		"twitter_enlace",
		"instagram_nombre",
		"instagram_enlace",
		"youtube_nombre",
		"youtube_enlace",
		"web_nombre",
		"web_enlace",
		"telefono",
		"domicilio",
		"mail",
		"denominacion",
		"descripcion",
		"publicado",
		"categoria_id",
		"usuario_id",
		"emprendimiento_id",
		"localidad_id",
	];

	public function imagen()
    {
        return $this->hasOne('App\ImagenesEmprendimiento','emprendimiento_comercial_id');
    }
    public function categoria()
    {
        return $this->belongsTo('App\EmprendimientoCategoria','categoria_id');
    }

}
