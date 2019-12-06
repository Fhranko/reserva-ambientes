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
        // $faker = Faker::create();
        // for ($i=0; $i < 50 ; $i++) {
        //     \DB::table('reservas')->insert(array(
        //         'nombre' => $faker->firstNameFemale,
        //         'sabor'=> $faker->randomElement(['chocolate','vainilla','cheesecake']),
        //         'created_at' => date('Y-m-d H:m:s'),
        //         'updated_at' => date('Y-m-d H:m:s')
        //     ));
        // }

        // $this->call(UsersTableSeeder::class);
        $this->call(AmbientesSeeder::class);
    }
}
