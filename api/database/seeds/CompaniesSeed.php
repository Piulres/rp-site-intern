<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CompaniesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 5; $i++) {
            App\Company::create([
                'name' => $faker->company,
                'email' => $faker->email,
                'password' => bcrypt('secret')
            ]);
        }
    }
}