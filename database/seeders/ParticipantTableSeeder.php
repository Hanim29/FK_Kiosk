<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParticipantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $applications = Application::all();
        $users = User::whereIn('account_type', ['vendor', 'student'])->get();

        
        for ($i = 0; $i < count($applications); $i++) {
            DB::table('kiosk_participants')->insert([
                'appID' => $applications[$i]->appID,
                'user_id' => $users[$i]->id,
            ]);
        }
    }
}
