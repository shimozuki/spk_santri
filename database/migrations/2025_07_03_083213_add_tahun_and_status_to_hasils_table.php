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
        Schema::table('hasils', function (Blueprint $table) {
            $table->string('tahun', 4)->after('nilai');
            $table->enum('status', ['Belum Disetujui', 'Disetujui'])->default('Belum Disetujui')->after('tahun');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hasils', function (Blueprint $table) {
            $table->dropColumn(['tahun', 'status']);
        });
    }
};
