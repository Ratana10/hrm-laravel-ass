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
        Schema::table('invoices', function (Blueprint $table) {
            $table->renameColumn('room_amount', 'room_price');
            $table->float('number_e')->default(0)->after('room_price');
            $table->float('number_w')->default(0)->after('number_e');
            $table->renameColumn('p_amount', 'e_amount_per_kilometer')->after('number_w');
            $table->renameColumn('o_amount', 'w_amount_per_kilometer')->after('e_amount_per_kilometer');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->renameColumn('room_price', 'room_amount');
            $table->dropColumn('number_e');
            $table->dropColumn('number_w');
            $table->renameColumn('e_amount_per_kilometer', 'p_amount');
            $table->renameColumn('w_amount_per_kilometer', 'o_amount');
        });
    }
};
