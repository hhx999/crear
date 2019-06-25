<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    	//SISTEMA DE ROLES SEPARADO DE TESTING
	    // La creación de datos de roles debe ejecutarse primero
	    //$this->call(RoleTableSeeder::class);

	    // Los usuarios necesitarán los roles previamente generados
	    //$this->call(UserTableSeeder::class);

	    //SISTEMA DE ROLES REAL
	    // Creación de los usuarios
    	$this->call(UsuarioTableSeeder::class);

        //Agencias Crear
        $this->call(AgenciaTableSeeder::class);

        //Tipos de formularios
        $this->call(FormTipoTableSeeder::class);

        //Tipos de créditos según los formularios cargados
        $this->call(CredTipoTableSeeder::class);


    }
}
