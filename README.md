# C.R.E.A.R.

Plataforma web para manejo de formularios.

## Instalación del proyecto

- Ejecutar "composer install"
- Crear copia de "env.example" llamada ".env" y configurar.
- Generar key con "php artisan key:generate".
- Modificar permisos de carpeta "storage" para poder operar, "chmod -R 777 storage/logs"
- Crear base de datos "crear_creditos"
- Ejecutar migraciones, "php artisan migrate:refresh --seed"