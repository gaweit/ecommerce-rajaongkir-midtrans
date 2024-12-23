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
        Schema::table('users', function (Blueprint $table) {
            $table->string('nomor_whatsapp')->after('password')->nullable();
            $table->string('kecamatan')->after('password')->nullable();
            $table->string('kota')->after('password')->nullable();
            $table->string('provinsi')->after('password')->nullable();
            $table->string('kode_pos')->after('password')->nullable();
            $table->text('alamat')->after('password')->nullable();
            $table->string('jenis_kelamin')->after('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
