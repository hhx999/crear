<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model {

	protected $table = 'CLIENTES';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
