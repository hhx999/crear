<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model {

	protected $table = 'USUARIOS';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function get_localidad()
	{
	    return $this->belongsTo('App\Localidad', 'localidad');
	}
	public function get_agencia()
	{
	    return $this->hasOne('App\Agencia', 'agencia');
	}
	public function get_actividadPrincipal()
	{
	    return $this->belongsTo('App\ActividadesPrincipales','actividadPrincipal');
	}
	public function emprendimientos()
	{
		return $this->hasMany('App\Trabaja');
	}
}
