<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiHistoryTable extends Migration
{
    public function up()
    {
        Schema::create('nilai_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nilai_siswa_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('nilai_before', 5, 2)->nullable();
            $table->decimal('nilai_after', 5, 2);
            $table->timestamps();

            $table->foreign('nilai_siswa_id')->references('id')->on('nilai_siswa')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('nilai_history');
    }
}
