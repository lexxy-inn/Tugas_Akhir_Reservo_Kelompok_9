<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(){
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('wallet_id')->nullable();
            $table->unsignedBigInteger('court_id');
            $table->unsignedBigInteger('schedule_id');
            $table->bigInteger('amount');
            $table->enum('status', ['waiting', 'working', 'completed', 'cancelled'])->default('waiting');
            $table->date('date')->nullable();
            $table->string('time_slot')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('wallet_id')->references('id')->on('wallets')->onDelete('set null');
            $table->foreign('court_id')->references('id')->on('courts')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
        });
    }
    public function down(){
        Schema::dropIfExists('orders');
    }
};
