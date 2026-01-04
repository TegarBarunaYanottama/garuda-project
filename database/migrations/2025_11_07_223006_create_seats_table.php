<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number');
            $table->string('seat_row');      // 'A', 'B', ...
            $table->integer('seat_number');  // 1, 2, ...
            $table->string('status')->default('available');
            $table->string('passenger_name')->nullable();
            $table->string('passenger_email')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('seats');
    }
};