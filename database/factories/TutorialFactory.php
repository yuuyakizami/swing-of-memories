<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TutorialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Tutorial::class;
    public function definition()
    {
        return [
            'title' => fake()->text(),
            'video' => fake()->text(),
            'title_description' => fake()->text(),
        ];
    }
}
