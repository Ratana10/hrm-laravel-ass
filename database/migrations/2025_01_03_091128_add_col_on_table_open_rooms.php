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
            $table->float('room_price',15,2)->after('room_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('open_rooms', function (Blueprint $table) {
            $table->dropColumn('room_price');
        });
    }
};
