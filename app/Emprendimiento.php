<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprendimiento extends Model
{
	protected $table = 'emprendimientos';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships

    public function trabajaEn()
    {
        return $this->hasOne('App\Trabaja','emprendimiento_id');
    }
    
}
