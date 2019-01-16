<?php

use Illuminate\Database\Seeder;
use Faker\factory as Faker;
use App\Design;

class DesignsTableSeeder extends Seeder
{
    public function run()
    {
        Design::truncate();
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Design::create([
                'name' => $faker->lastName,
                'number' => $faker->numberBetween(2,30),
                'price' => $faker->numberBetween(5,45)
            ]);
        }
    }
}