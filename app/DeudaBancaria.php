<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class DeudaBancaria extends Model {

	protected $table = 'DEUDAS_BANCARIAS';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
