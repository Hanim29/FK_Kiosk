<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create at least one account for each type
        $accountTypes = ['admin', 'pupuk_admin', 'fk_bursary', 'student', 'vendor'];
        $counter = 0;

        foreach ($accountTypes as $accountType) {
            User::create([
                'name' => ucfirst($accountType) . ' User',
                'email' => $accountType . '@example.com',
                'matrix_id' => 'AA1234' . $counter, // Adjust matrix_id as needed
                'phone_num' => '223456789' . $counter,
                'ic_number' => '99112233445' . $counter,
                'account_type' => $accountType,
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $counter += 1;
        }

        // Seed multiple users with different account types
        for ($i = 0; $i < 10; $i++) {
            $randomAccountType = $accountTypes[array_rand($accountTypes)];

            User::create([
                'name' => 'User ' . ($i + 1),
                'email' => 'user' . ($i + 1) . '@example.com',
                'matrix_id' => 'AB1234' . ($i + 1),
                'phone_num' => '123456789' . $i,
                'ic_number' => '00112233445' . ($i + 1),
                'account_type' => $randomAccountType,
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
