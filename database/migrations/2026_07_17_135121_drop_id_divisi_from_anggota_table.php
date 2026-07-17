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
        Schema::table('anggota', function (Blueprint $table) {
            $table->dropForeign('fk_anggota_divisi');
            $table->dropColumn('id_divisi');
        });
    }

    public function down(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->unsignedBigInteger('id_divisi');
            $table->foreign('id_divisi', 'fk_anggota_divisi')->references('id_divisi')->on('divisi');
        });
    }
};
