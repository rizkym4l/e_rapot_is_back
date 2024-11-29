<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('nilai_history', function (Blueprint $table) {
            $table->unsignedBigInteger('updated_by')->nullable()->after('user_id');

            // Jika relasi foreign key diperlukan
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('nilai_history', function (Blueprint $table) {
            $table->dropForeign(['updated_by']);
            $table->dropColumn('updated_by');
        });
    }

};
