<?php 
namespace App\Http\Controllers; 

use App\Http\Requests; 

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request; 

use Auth; 

class ImageController extends Controller { 

    public function getImage($filename) { 
     $path = '/var/www/html/crear/app/Assets/Images/'.$filename; 
     $type = "image/jpeg"; 
     header('Content-Type:'.$type); 
     header('Content-Length: ' . filesize($path)); 
     readfile($path); 
    } 

} 