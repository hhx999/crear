<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model {

	protected $table = 'PROVEEDORES';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
