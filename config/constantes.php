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
          'completo' => 5,
          'eliminado' => 6
        ],
        "estadosIngresoForm" => [
          'borrador' => 1,
          'enviado' => 2
        ],
        "lineasCreditos" => [
        	'emprendedor' => 1, 
        	'mipymes' => 2, 
        	'turistico' => 3, 
        	'stock' => 4, 
        	'tasaSubsidiada' => 5
    	  ],
        "provincias" => [
          'Buenos Aires-GBA',
          'Capital Federal',
          'Catamarca',
          'Chaco',
          'Chubut',
          'Córdoba',
          'Corrientes',
          'Entre Ríos',
          'Formosa',
          'Jujuy',
          'La Pampa',
          'La Rioja',
          'Mendoza',
          'Misiones',
          'Neuquén',
          'Río Negro',
          'Salta',
          'San Juan',
          'San Luis',
          'Santa Cruz',
          'Santa Fe',
          'Santiago del Estero',
          'Tierra del Fuego',
          'Tucumán',
        ],
        "situacionImpositiva" => [
          'Estado informal' => 1, 
          'Monotributo social' => 2, 
          'Monotributo desde A hasta E' => 3, 
          'Monotributo desde F hasta K' => 4, 
          'Responsable inscripto' => 5
        ],
        "google_key" => [
          'site' => '6LejSZ4UAAAAAJzZs15RzzIqacBAAtli3b3FguCn',
          'secret' => '6LejSZ4UAAAAAIlea3rAWDU0PjynQSOikLqXIcoF'
        ]
];