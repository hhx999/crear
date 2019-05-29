<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model {

	protected $table = 'OBSERVACIONES';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

}
