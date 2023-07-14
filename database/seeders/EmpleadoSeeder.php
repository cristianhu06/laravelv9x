<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado;
use Faker\Factory as Faker;

class EmpleadoSeeder extends Seeder
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
            Empleado::create([
                'nombre' => $faker->firstName,
                'apellidos' => $faker->lastName,
                'telefono' => $faker->phoneNumber,
                'direccion' => $faker->address,
                'cargo' => $faker->jobTitle,
                'correo' => $faker->unique()->safeEmail,
            ]);
        }
    }
}
