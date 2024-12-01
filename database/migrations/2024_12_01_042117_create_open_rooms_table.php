<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('open_rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('room_id');
            $table->string('start_date');
            $table->string('end_date');
            $table->float('booking_amount',15,2)->comment('$');
            $table->tinyInteger('condition_invoice')->default(30)->comment('day');
            $table->tinyInteger('alert')->default(7)->comment('day');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('open_rooms');
    }
};
