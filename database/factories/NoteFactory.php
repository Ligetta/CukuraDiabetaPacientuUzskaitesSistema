<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Note::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->text(800),
            'cuklim' => $this->faker->randomFloat(1, 0, 9999),
            'oglhidrati'=> $this->faker->randomFloat(1, 0, 9999),
            'insultips' => $this->faker->sentence,
            'insuldev' => $this->faker->randomNumber,
            'kordev' => $this->faker->randomNumber,
        ];
    }
}