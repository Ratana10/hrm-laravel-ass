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
            $table->tinyInteger('is_stop')->default(0)->after('alert');
            $table->text('stop_reason')->nullable()->after('is_stop');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('open_rooms', function (Blueprint $table) {
            $table->dropColumn('is_stop');
            $table->dropColumn('stop_reason');
        });
    }
};
