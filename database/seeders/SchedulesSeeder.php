<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Court;
use App\Models\Schedule;
use Carbon\Carbon;

class SchedulesSeeder extends Seeder
{
    public function run()
    {
        $days = 14;
        $startHour = 8;
        $endHour = 21;

        $courts = Court::all();

        foreach ($courts as $court) {
            for ($d = 0; $d < $days; $d++) {
                $date = Carbon::now()->addDays($d)->format('Y-m-d');

                for ($h = $startHour; $h < $endHour; $h++) {

                    Schedule::create([
                        'court_id' => $court->id,
                        'date'     => $date,
                        'start_time' => sprintf('%02d:00', $h),
                        'end_time'   => sprintf('%02d:00', $h + 1),
                        'price' => 50000,
                    ]);

                }
            }
        }
    }
}
