<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = ['approve', 'pending'];
        $participants = User::where('account_type', 'student')
            ->orWhere('account_type', 'vendor')
            ->get();

        // Seed multiple users with different account types
        for ($i = 0; $i < count($participants); $i++) {
            $randomStatus = $status[array_rand($status)];

            Application::create([
                'appID' => $i+1,
                'appStatus' => $randomStatus,
            ]);
        }
    }
}
