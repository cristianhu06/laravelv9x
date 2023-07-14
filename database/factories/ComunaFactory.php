<?php

namespace Database\Factories;

use App\Models\Comuna;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ComunaFactory extends Factory
{
    protected $model = Comuna::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
        ];
    }
}
