<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ReservasSeeder extends Seeder
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
        for ($i=0; $i < 20; $i++) {
            \DB::table('reservas')->insert(array(
            'id' => $faker->numberBetween($min = 1, $max = 9) ,
            'id_ambiente'=> $faker->numberBetween($min = 1, $max = 4),
            'fecha_para_reserva' => $faker->date($format = 'Y-m-d', $max = 'now'),
            'hora_desde' => $faker->time($format = 'H:i:s', $max = 'now'),
            'hora_hasta' => $faker->time($format = 'H:i:s', $max = 'now'),
            'created_at' => $faker->date('Y-m-d H:m:s'),
            'updated_at' => $faker->date('Y-m-d H:m:s'),
));
}
    }
}
