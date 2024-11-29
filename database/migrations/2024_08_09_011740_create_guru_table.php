<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id();
            $table->string('nipk', 100)->unique();
            $table->string('nama_lengkap', 100);
            $table->unsignedBigInteger('akun_id')->nullable();
            $table->unsignedBigInteger('mapel_id')->nullable();
            $table->string('photo', 255)->nullable();

            $table->foreign('akun_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
