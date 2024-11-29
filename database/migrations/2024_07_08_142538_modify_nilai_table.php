<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('nilai_siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('tahun_ajaran_id')->nullable()->after('mapel_id');
            $table->float('nilai')->nullable()->after('semester');
            $table->string('nis_siswa');


            $table->foreign('tahun_ajaran_id')->references('id')->on('tahun_ajaran');
            $table->foreign('nis_siswa')->references('nis')->on('siswa');

        });
    }

    public function down(): void
    {
        Schema::table('nilai', function (Blueprint $table) {
            $table->dropForeign(['tahun_ajaran_id']);
            $table->dropForeign(['siswa_id']);

            $table->dropColumn('tahun_ajaran_id');
            $table->dropColumn('nilai');
        });
    }
};
