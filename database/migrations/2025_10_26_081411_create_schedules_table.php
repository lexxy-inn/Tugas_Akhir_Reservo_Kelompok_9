<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('court_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->bigInteger('price')->default(0);
            $table->enum('status', ['available', 'booked'])->default('available');
            $table->boolean('is_booked')->default(false);
            $table->timestamps();

            $table->foreign('court_id')->references('id')->on('courts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
