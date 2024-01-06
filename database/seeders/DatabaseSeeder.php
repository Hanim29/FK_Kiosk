<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ApplicationTableSeeder::class);
        $this->call(ParticipantTableSeeder::class);
        $this->call(PaymentTableSeeder::class);
        $this->call(SalesTableSeeder::class);
    }
}
