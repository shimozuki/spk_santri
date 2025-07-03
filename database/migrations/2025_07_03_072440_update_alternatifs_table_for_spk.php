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
            // Tambahkan kolom baru
            $table->string('nama_lengkap')->after('id');
            $table->double('nilai_akhir')->nullable()->after('karya_tulis');
            $table->enum('keterangan_lulus', ['Lulus', 'Tidak Lulus'])->nullable()->after('nilai_akhir');

            // Drop kolom yang tidak lagi digunakan
            $table->dropColumn([
                'semester1',
                'semester2',
                'semester3',
                'semester4',
                'semester5',
                'semester6',
                'prestasi'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alternatifs', function (Blueprint $table) {
            // Kembalikan kolom lama
            $table->double('semester1', 8, 2)->nullable();
            $table->double('semester2', 8, 2)->nullable();
            $table->double('semester3', 8, 2)->nullable();
            $table->double('semester4', 8, 2)->nullable();
            $table->double('semester5', 8, 2)->nullable();
            $table->double('semester6', 8, 2)->nullable();
            $table->text('prestasi')->nullable();

            // Hapus kolom baru
            $table->dropColumn(['nama_lengkap', 'nilai_akhir', 'keterangan_lulus']);
        });
    }
};
