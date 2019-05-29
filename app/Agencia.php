<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model {

	protected $table = 'AGENCIAS';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function localidades()
    {
        return $this->hasMany('App\Localidad');
    }
}
