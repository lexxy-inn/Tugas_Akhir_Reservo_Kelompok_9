<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Models\Schedule;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/schedules', function(Request $r){
    $courtId = $r->query('court_id');
    $date = $r->query('date');
    if(!$courtId || !$date) return response()->json([], 400);
    $s = Schedule::where('court_id',$courtId)->where('date',$date)->orderBy('start_time')->get();
    return response()->json($s);
});
