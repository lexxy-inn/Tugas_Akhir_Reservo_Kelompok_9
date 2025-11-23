<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourtsTable extends Migration
{
    public function up()
{
    Schema::create('courts', function (Blueprint $table) {
        $table->id();
        $table->string('type'); 
        $table->string('name');
        $table->string('location');
        $table->text('description')->nullable();
        $table->decimal('price', 10, 2);
        $table->decimal('ratings', 3, 2)->default(0);
        $table->timestamps();
         $table->string('image')->nullable();
    });
}


    public function down()
    {
        Schema::dropIfExists('courts');
    }
}
