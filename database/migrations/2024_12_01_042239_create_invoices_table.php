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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->float('room_amount',15,2);
            $table->float('e_amount',25,2);
            $table->float('w_amount',25,2);
            $table->float('p_amount',25,2);
            $table->float('o_amount',25,2);
            $table->float('total_amount',25,2);
            $table->integer('exchange_rate_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
