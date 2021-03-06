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

        //Localidades de Río Negro
        $this->call(LocalidadSeeder::class);
        
        //Tipos de formularios
        $this->call(FormTipoTableSeeder::class);

        //Tipos de créditos según los formularios cargados
        $this->call(CredTipoTableSeeder::class);

        //Reglas de cuestionario cargadas
        $this->call(CuestionarioLineaSeeder::class);

        //Actividades principales
        $this->call(ActividadesPrincipalesSeeder::class);

        //Estados formularios
        $this->call(EstadoFormularioSeeder::class);

        //Estados creditos
        $this->call(EstadoCreditosSeeder::class);

        //Organismos publicos
        $this->call(OrganismoPublicosSeeder::class);

        //Categorias de los emprendimientos
        $this->call(EmprendimientosCategoriasSeeder::class);

        //Tipos de sociedades
        $this->call(TipoSociedadSeeder::class);

        //Áreas de la agencia
        $this->call(AreaSeeder::class);

    }
}
