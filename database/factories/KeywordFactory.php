<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Keyword>
 */
class KeywordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'type' => fake()->name(),
        ];
    }

    public function withName(string $name): static
    {
        return $this->state(['name' => $name]);
    }

    public function withType(string $type): static
    {
        return $this->state(['type' => $type]);
    }
}
