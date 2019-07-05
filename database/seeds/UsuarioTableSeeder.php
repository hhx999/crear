<?php

use Illuminate\Database\Seeder;
use App\Usuario;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = 'user';
        $role_admin = 'admin';

        $usuario = new Usuario();
        $usuario->dni = '39355458';
        $usuario->nombre = 'Borjas Test';
        $usuario->email = 'borjas@example.com';
        $usuario->password = bcrypt('borjas');
        $usuario->verificado = 1;
        $usuario->rol = $role_user;
        $usuario->save();

        $usuario = new Usuario();
        $usuario->dni = '777';
        $usuario->nombre = 'Admin';
        $usuario->email = 'admin@example.com';
        $usuario->password = bcrypt('1234');
        $usuario->verificado = 1;
        $usuario->rol = $role_admin;
        $usuario->save();
    }
}
