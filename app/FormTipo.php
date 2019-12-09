<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class FormTipo extends Model {

	protected $table = 'FORM_TIPO';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function creditos()
    {
        return $this->hasMany('App\CredTipo');
    }
    public function info()
    {
        return $this->hasMany('App\InfoLinea');
    }
}
