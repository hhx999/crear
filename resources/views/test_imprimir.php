<?php
use Spipu\Html2Pdf\Html2Pdf;
    //Recogemos el contenido de la vista
    ob_start();
    require_once 'vistaImprimir.php';
    $html=ob_get_clean();
 
    //Pasamos esa vista a PDF
     
    //Le indicamos el tipo de hoja y la codificación de caracteres
    $mipdf=new HTML2PDF('P','A4','es','true','UTF-8');
 
    //Escribimos el contenido en el PDF
    $mipdf->writeHTML($html);
 
    //Generamos el PDF
    $numero = rand();
    $mipdf->Output('Form_LineaEmprendedor'.$numero.'.pdf');
