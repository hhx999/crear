<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentacion extends Model {

	protected $table = 'DOCUMENTACION';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function multimedia()
    {
        return $this->belongsTo('App\Multimedia','multimedia_id');
    }
}
