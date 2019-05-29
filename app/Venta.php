<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model {

	protected $table = 'VENTAS';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
