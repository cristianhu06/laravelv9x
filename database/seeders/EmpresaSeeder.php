<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('es_ES');

        for ($i = 1; $i <= 300; $i++) {
            DB::table('empresas')->insert([
                'nombre' => $faker->company,
                'direccion' => $faker->address,
                'telefono' => $faker->phoneNumber,
                'correo' => $faker->email,
                'descripcion' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
