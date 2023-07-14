<?php

namespace Database\Factories;

use App\Models\Regione;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RegioneFactory extends Factory
{
    protected $model = Regione::class;

    public function definition()
    {
        return [
			'region' => $this->faker->name,
        ];
    }
}
