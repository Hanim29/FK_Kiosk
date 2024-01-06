<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\salesModel as Sale;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $applications = Application::all();
        $participants = User::where('account_type', 'student')
            ->orWhere('account_type', 'vendor')
            ->get();
        $counter = 0;

        $possibleComments = [
            'Great sale! 👍',
            'Good job! 👏',
            'Nice transaction! 😊',
            'Excellent! 💯',
            'So bad! 😞',
            'Disappointing! 😕',
        ];

        foreach ($applications as $application) {
            for($i=0; $i < 12; $i++) {
                $randomDate = Carbon::now()->startOfMonth()->addMonths($i)->addDays(rand(0, Carbon::now()->copy()->addMonths($i)->endOfMonth()->day - 1));
                $randomTotalSales = rand(100, 1000);
                $randomIndex = array_rand($possibleComments);
                $randomComment = $possibleComments[$randomIndex];
                Sale::create([
                    'appID' => $application->appID,
                    'userID' => $participants[$counter]->id,
                    'saleDate' => $randomDate, // Set the sale date as current date/time or adjust as needed
                    'kioskNum' => 'K00'.($counter+1), // Replace with actual kiosk number or adjust as needed
                    'totalSales' => $randomTotalSales, // Adjust the total sales value as needed
                    'comment' => $randomComment,
                    // Add other columns or data needed for the sale record
                ]);

            }

            $counter += 1;
        }
    }
}
