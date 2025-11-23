<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('schedule', 'user')->get();
        return view('orders', compact('bookings'));
    }

    public function create()
    {

        $schedules = Schedule::where('is_booked', false)->get();
        return view('booking.create', compact('schedules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        $booking = Booking::create([
            'user_id' => $validated['user_id'],
            'schedule_id' => $validated['schedule_id'],
            'status' => 'pending',
            'payment_status' => 'unpaid',
        ]);

        $schedule = Schedule::findOrFail($validated['schedule_id']);
        $schedule->update(['is_booked' => true]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }

    public function show(Booking $booking)
    {
        return view('booking.show', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking deleted.');
    }
}
