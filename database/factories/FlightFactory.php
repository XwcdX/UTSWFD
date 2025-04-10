<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departureDate = fake()->dateTimeBetween('now', '+1 year');
        return [
            'flight_code' => fake()->unique()->bothify('??###'),
            'origin' => fake()->randomElement(['SUB', 'JKT', 'BKK', 'SGP', 'KLP']),
            'destination' => fake()->randomElement(['JKT', 'SGP', 'BKK', 'KLP']),
            'departure_time' => $departureDate,
            'arrival_time' => fake()->dateTimeBetween(
                (clone $departureDate)->modify('+4 hours'),
                (clone $departureDate)->modify('+10 hours')),
        ];
    }
}
