<?php

namespace Database\Factories;

use App\Models\Paise;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PaiseFactory extends Factory
{
    protected $model = Paise::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'codigo' => $this->faker->name,
        ];
    }
}
