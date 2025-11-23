<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;

Route::get('/', fn() => redirect()->route('dashboard'));
Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

Route::get('/see-more', [CourtController::class,'index'])->name('see-more');
Route::get('/description/{id}', [CourtController::class,'show'])->name('description');

Route::middleware('auth')->group(function(){
    Route::get('/payment/{court}/{schedule}', [PaymentController::class,'show'])->name('payment');
    Route::post('/payment/process', [PaymentController::class,'process'])->name('payment.process');
    Route::get('/payment/success/{order}', [PaymentController::class,'success'])->name('payment.success');

    Route::get('/orders', [OrderController::class,'index'])->name('orders');

    Route::get('/profile', [ProfileController::class,'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class,'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class,'destroy'])->name('profile.destroy');
});

Route::post('/booking', [BookingController::class,'store'])->name('booking.store');

require __DIR__.'/auth.php';
