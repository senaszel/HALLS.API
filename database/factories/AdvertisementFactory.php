<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Advertisement>
 */
class AdvertisementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'img_path' => null,
            'author_id' => null,
            'address_id' => null,
            'title' => fake()->sentence(),
            'description' => fake()->text(1500),
            'price' => (fake()->numberBetween(1, 5) * 100)
        ];
    }

    public function withAuthor(User $user = null): static
    {
        if (!isset($user)) {
            $user = User::factory()->create();
        }
        return $this->state(['author_id' => $user->id]);
    }

    public function withAddress(Address $address = null): static
    {
        if (!isset($address)) {
            $address = Address::factory()->create();
        }
        return $this->state(['address_id' => $address->id]);
    }

    public function withTitle(string $title): static
    {
        return $this->state(['title' => $title]);
    }

    public function withDescription(string $description): static
    {
        return $this->state(['description' => $description]);
    }
}
