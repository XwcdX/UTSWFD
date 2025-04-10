<?php

namespace Database\Factories;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'flight_id' => Flight::factory(),
            'passenger_name' => fake()->unique()->name(), 
            'passenger_phone' => fake()->unique()->regexify('/^08[1-9]{1}[0-9]{11}$/'),
            'seat_number' => fake()->regexify('/^[A-J]{1}(0[1-9]|10)$/'),
        ];
    }
}
