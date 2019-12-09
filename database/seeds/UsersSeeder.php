<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=1; $i < 10; $i++) {
            \DB::table('users')->insert(array(
            'id' => $i ,
            'name' => $faker->firstNameMale,
            'email' => $faker->email,
            'email_verified_at'=> NULL,
            'role'=> $faker->randomElement($array = array ('administrador','usuario')),
            'password' => $faker->randomDigit,
            'remember_token'=> NULL,
            'created_at' => $faker->date('Y-m-d H:m:s'),
            'updated_at' => $faker->date('Y-m-d H:m:s'),
        ));
        }
    }
}
