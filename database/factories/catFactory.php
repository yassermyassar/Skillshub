<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\cat;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cat>
 */
class catFactory extends Factory
{
    protected $model = cat::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => json_encode([
                'en' => $this->faker->word(),
                'ar' => $this->faker->word(),
            ])
        ];
    }
}
