<?php 
namespace App\Http\Controllers; 

use App\Http\Requests; 

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request; 

use Auth; 

class InfoCreditosController extends Controller { 

    public function getInfo($filename) {
     return response()->download(public_path("infoLineas/{$filename}"));
    } 

} 