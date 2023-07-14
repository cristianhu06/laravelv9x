<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmpleadoFactory extends Factory
{
    protected $model = Empleado::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'apellidos' => $this->faker->name,
			'telefono' => $this->faker->name,
			'direccion' => $this->faker->name,
			'cargo' => $this->faker->name,
			'correo' => $this->faker->name,
        ];
    }
}
