<?php

namespace Database\Seeders;

use App\Models\Flight;
use App\Models\Ticket;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Flight::factory(5)->create();
        Ticket::factory(10)->create();
    }
}
