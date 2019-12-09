<?php 
namespace App\Http\Controllers; 

use App\Http\Requests; 

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request; 

use Auth; 

class InfoCreditosController extends Controller { 

    public function getInfo($filename) { 
     $path = '/var/www/html/crear/public/infoLineas/'.$filename; 
     $type = "pdf"; 
     header('Content-Type:'.$type); 
     header('Content-Length: ' . filesize($path)); 
     readfile($path); 
    } 

} 