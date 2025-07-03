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
        Schema::table('alternatifs', function (Blueprint $table) {
            // Rename 'npm' menjadi 'nisn'
            $table->renameColumn('npm', 'nisn');

            // Hapus kolom yang tidak dibutuhkan
            $table->dropColumn([
                'jurusan',
                'no_telp',
                'pas_foto',
                'foto_ktp',
                'karya_tulis'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alternatifs', function (Blueprint $table) {
            // Kembalikan nama kolom nisn menjadi npm
            $table->renameColumn('nisn', 'npm');

            // Tambahkan kembali kolom yang dihapus
            $table->string('jurusan')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('karya_tulis')->nullable();
        });
    }
};
