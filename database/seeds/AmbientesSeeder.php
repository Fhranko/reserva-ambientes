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
        $faker = Faker::create();
        for ($i=1; $i <= 5; $i++) {
            \DB::table('ambientes')->insert(array(
            'nombre_ambiente' => $faker->company,
            'oficina_ambiente' => $faker->streetName,
            'capacidad_ambiente' => $faker->numberBetween($min=10, $max=50),
            'descripcion_ambiente' => $faker->text($maxNbChars = 100),
            'imagen_ambiente' => $faker->numberBetween($min=1, $max=8) . '.jpg'
            ));
        }
    }
}
