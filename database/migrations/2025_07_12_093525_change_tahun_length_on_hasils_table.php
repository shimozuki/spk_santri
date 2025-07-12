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
            $table->string('tahun', 50)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hasils', function (Blueprint $table) {
            $table->string('tahun', 4)->change(); // anggap sebelumnya panjangnya 4 karakter
        });
    }
};
