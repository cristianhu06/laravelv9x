<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1500; $i++) {
            Cargo::create([
                'nombre' => $faker->jobTitle,
            ]);
        }
    }
}
