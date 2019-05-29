<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class FormValido extends Model {

	protected $table = 'FORM_VALIDOS';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function observaciones()
    {
        return $this->hasMany('App\Observacion');
    }
}
