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
        Schema::create('alternatifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->integer('npm');
            $table->string('jurusan');
            $table->string('no_telp');
            $table->float('semester1')->nullable();
            $table->float('semester2')->nullable();
            $table->float('semester3')->nullable();
            $table->float('semester4')->nullable();
            $table->float('semester5')->nullable();
            $table->float('semester6')->nullable();
            $table->text('prestasi')->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('foto_ktp')->nullable();
            $table->string('karya_tulis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatifs');
    }
};
