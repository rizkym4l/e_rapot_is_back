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
        Schema::table('siswa', function (Blueprint $table) {
            $table->string('tingkat')->nullable()->after('photo');
        });

        Schema::table('kelas', function (Blueprint $table) {
            $table->string('tingkat')->nullable()->after('nama_kelas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswa', function (Blueprint $table) {
            $table->dropColumn('tingkat');
        });

        Schema::table('kelas', function (Blueprint $table) {
            $table->dropColumn('tingkat');
        });
    }
};
