<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AmbientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) {
            \DB::table('ambientes')->insert(array(
            'nombre_ambiente' => $faker->firstNameMale,
            'oficina_ambiente' => $faker->streetAddress,
            'capacidad_ambiente' => $faker->numberBetween($min=10, $max=50)
            ));
        }
    }
}
