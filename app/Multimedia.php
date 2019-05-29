<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Multimedia extends Model {

	protected $table = 'MULTIMEDIA';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];
    public function documentacion()
    {
        return $this->hasOne('App\Documentacion');
    }
}