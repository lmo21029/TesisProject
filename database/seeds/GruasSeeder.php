<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GruasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 30; $i++)
        {
            \DB::table('gruas')->insert( array(
                'tipo_grua'    =>  $faker->domainWord,
                'marca_grua'   =>  $faker->company,
                'placa_grua'   =>  $faker->creditCardNumber
            ));
        }
    }
}
