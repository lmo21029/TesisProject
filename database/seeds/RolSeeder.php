<?php

use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->insert( array(

            'nombre_rol'      =>  'Administrador',


        ));

        \DB::table('roles')->insert( array(

            'nombre_rol'      =>  'Administrativo',


        ));


        \DB::table('roles')->insert( array(

        'nombre_rol'      =>  'Users',


    ));

        \DB::table('Estado')->insert( array(
           'nombre_estado' => 'Amazonas'
        ));

        \DB::table('Estado')->insert( array(
           'nombre_estado' => 'Anzoategui'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Apure'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Aragua'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Barinas'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Carabobo'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Boliver'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Cojedes'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Delta Amacuro'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Falcon'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Distrito Capital'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Guarico'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Merida'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Lara'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Miranda'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Monagas'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Nueva Esparta'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Portuguesa'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Sucre'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Tachira'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Trujillo'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Yaracuy'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Vargas'
        ));

        \DB::table('Estado')->insert( array(
            'nombre_estado' => 'Zulia'
        ));
    }
}
