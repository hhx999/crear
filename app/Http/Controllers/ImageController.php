<?php 
namespace App\Http\Controllers; 

use App\Http\Requests; 

use App\Http\Controllers\Controller; 

use Illuminate\Http\Request; 
use App\Documentacion;

use Auth; 

class ImageController extends Controller { 

    public function getImage(int $id) {
    $documentacion = Documentacion::find($id);
    $filename = $documentacion->multimedia_id;
    $ext = $documentacion->multimedia->extension;
     $path = '/var/www/html/crear/app/Assets/Images/'.$filename;
     $type = $ext; 
     header('Content-Type:'.$type); 
     header('Content-Length: ' . filesize($path)); 
     readfile($path); 
    } 

} 