<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'court_id',
        'schedule_id',
        'wallet_id',
        'amount',
        'status',
        'date',
        'time_slot',
    ];

    public function court()
    {
        return $this->belongsTo(Court::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    // ========================
    // 🔥 DYNAMIC STATUS
    // ========================
    public function getDynamicStatusAttribute()
    {
        $now = Carbon::now();
        
        $schedule = $this->schedule;

        $start = Carbon::parse($schedule->date.' '.$schedule->start_time);
        $end   = Carbon::parse($schedule->date.' '.$schedule->end_time);

        if ($now->lt($start)) {
            return 'working';   // belum mulai
        }

        if ($now->between($start, $end)) {
            return 'ongoing';   // sedang bermain
        }

        return 'finished';      // sudah selesai
    }
}
