<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {



        \DB::table('users')->insert( array(

            'name'      =>  'Luiggi',
            'apellido'      =>  'Mendonca',
            'email'      =>  'lmo21029@gmail.com',
            'cedula'      => '210292502',
            'direccion'      =>  'Ave bolivar centro lara, branyer',
            'password'      =>  \Hash::make('21029250'),
            'telefono'      =>  '04143468151',
            'id_rol'        =>  '1',

        ));

    }
}
