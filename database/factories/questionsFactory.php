<?php

namespace Database\Factories;

use App\Models\questions;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\questions>
 */
class questionsFactory extends Factory
{
    protected $model = Questions::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'option_1' => $this->faker->sentence(5, true),
            'option_2' => $this->faker->sentence(5, true),
            'option_3' => $this->faker->sentence(5, true),
            'option_4' => $this->faker->sentence(5, true),
            'right_ans' => $this->faker->numberBetween(1, 4),
        ];
    }
}
