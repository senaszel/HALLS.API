<?php

namespace Database\Factories;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rate>
 */
class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rate' => fake()->numberBetween(1, 5),
            'comment' => fake()->paragraph(2, true)
        ];
    }

    public function forAdvertisement(Advertisement $advertisement): self
    {
        return $this->state([
            'advertisement_id' => $advertisement->id
        ]);
    }
}
