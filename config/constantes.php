<?php
//php artisan config:cache
return [
        "lineaCredito" => [
          'emprendedor' => 1,
          'mipymes' => 2, 
          'turistico' => 3, 
          'stock' => 4, 
          'tasaSubsidiada' => 5
        ],
        "estados" => [
          'borrador' => 1,
          'enviado' => 2, 
          'observacion' => 3, 
          'actualizado' => 4, 
          'completo' => 5
        ],
        "estadosIngresoForm" => [
          'borrador' => 1,
          'enviado' => 2
        ]
    ];