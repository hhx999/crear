<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Formulario extends Model {

	protected $table = 'FORMULARIOS';

    protected $fillable = [];

    protected $dates = [];

    public static $rules = [
        // Validation rules
    ];

    // Relationships
    public function referentes()
    {
        return $this->hasMany('App\Referencia');
    }
    public function clientes()
    {
        return $this->hasMany('App\Cliente');
    }
    public function proveedores()
    {
        return $this->hasMany('App\Proveedor');
    }
    public function competencias()
    {
        return $this->hasMany('App\Competencia');
    }
    public function ventas()
    {
    	return $this->hasMany('App\Venta');
    }
    public function items()
    {
    	return $this->hasMany('App\ItemFinanciamiento');
    }
    public function disponibilidades()
    {
    	return $this->hasMany('App\Disponibilidad');
    }
    public function bienescambio()
    {
        return $this->hasMany('App\BienCambio');
    }
    public function bienesuso()
    {
        return $this->hasMany('App\BienUso');
    }
    public function deudascomerciales()
    {
        return $this->hasMany('App\DeudaComercial');
    }
    public function deudasbancarias()
    {
        return $this->hasMany('App\DeudaBancaria');
    }
    public function deudasfiscales()
    {
        return $this->hasMany('App\DeudaFiscal');
    }
    public function pasosValidos()
    {
        return $this->hasOne('App\FormValido');
    }
    public function documentacion()
    {
        return $this->hasMany('App\Documentacion');
    }
}
