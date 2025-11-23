<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Court;
use App\Models\Schedule;
use App\Models\Order;

class PaymentController extends Controller {
    public function show($courtId, $scheduleId){
        $court = Court::findOrFail($courtId);
        $schedule = Schedule::findOrFail($scheduleId);
        if($schedule->is_booked){
            return redirect()->route('description',$court->id)->with('error','Slot already booked');
        }
        return view('payment', compact('court','schedule'));
    }

    public function process(Request $request){
        $request->validate([
            'court_id'=>'required|exists:courts,id',
            'schedule_id'=>'required|exists:schedules,id',
            'method'=>'required|string'
        ]);
        $user = auth()->user();
        $schedule = Schedule::findOrFail($request->schedule_id);
        if($schedule->is_booked){
            return back()->with('error','Slot already booked');
        }
        $wallet = $user->wallet;
        if(!$wallet) return back()->with('error','Wallet not found');

        if($wallet->balance < $schedule->price){
            return back()->with('error','Saldo tidak cukup!');
        }

        $wallet->balance -= $schedule->price;
        $wallet->save();

        $schedule->is_booked = true;
        $schedule->status = 'booked';
        $schedule->save();

        $order = Order::create([
            'user_id'=>$user->id,
            'wallet_id'=>$wallet->id,
            'court_id'=>$request->court_id,
            'schedule_id'=>$request->schedule_id,
            'amount'=>$schedule->price,
            'status'=>'working',
            'date'=>$schedule->date,
            'time_slot'=>$schedule->start_time . ' - ' . $schedule->end_time
        ]);

        return redirect()->route('payment.success', $order->id);
    }

    public function success($orderId){
        $order = Order::with('court','schedule')->findOrFail($orderId);
        return view('payment-success', compact('order'));
    }
}
