<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class JobsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 20; $i++) {
            App\Job::create([
                'title' => $faker->jobTitle,
                'description' => $faker->paragraph,
                'local' => $faker->city,
                'remote' => $faker->randomElement($array = ['yes', 'no']),
                'type' => $faker->numberBetween(1,3),
                'company_id' => $faker->numberBetween(1,5)
            ]);
        }
    }
}