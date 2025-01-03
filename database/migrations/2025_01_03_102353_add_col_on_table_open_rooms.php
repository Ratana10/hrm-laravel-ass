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
        Schema::table('open_rooms', function (Blueprint $table) {
            $table->float('water_meter')->default(0);
            $table->float('electric_meter')->default(0);
            $table->float('water_price_per_meter')->default(0);
            $table->float('electric_price_per_meter')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('open_rooms', function (Blueprint $table) {
            $table->dropColumn('water_meter');
            $table->dropColumn('electric_meter');
            $table->dropColumn('water_price_per_meter');
            $table->dropColumn('electric_price_per_meter');
        });
    }
};
