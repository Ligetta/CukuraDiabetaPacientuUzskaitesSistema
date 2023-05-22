<?php

namespace Database\Factories;

use App\Models\Recepte;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecepteFactory extends Factory
{
    protected $model = Recepte::class;

    public function definition()
    {
        return [
            'pacvards' => $this->faker->name,
            'zalnos' => $this->faker->word,
            'zaldaudz' => $this->faker->randomNumber(2),
        ];
    }
}