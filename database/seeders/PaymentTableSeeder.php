<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\paymentModel as Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Retrieve all applications
        $applications = Application::all();
        $participants = User::where('account_type', 'student')
            ->orWhere('account_type', 'vendor')
            ->get();
        $counter = 0;


        foreach ($applications as $application) {
            $possiblePaymentMethods = ['card', 'cash', 'online'];
            // Generate dummy data for payment fields
            $paymentData = [
                'appID' => $application->appID,
                'appNum' => $application->appID,
                'phoneNum' => $participants[$counter]->phone_num,
                'email' => $participants[$counter]->email,
                'payDate' => Carbon::now()->subDays(rand(1, 30)), // Random payment date within the last 30 days
                'kioskNum' => 'K00'.($counter+1), // Replace with actual kiosk number or adjust as needed
                'totalPay' => rand(100, 1000), // Random payment amount between 100 and 1000
                'payMethod' => $possiblePaymentMethods[array_rand($possiblePaymentMethods)], // Random payment method
            ];

            $counter += 1;
            Payment::create($paymentData);
        }
    }
}
