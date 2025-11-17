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
        Schema::create('village_identities', function (Blueprint $table) {

            $table->id();

            // Wilayah administratif
            $table->string('nama_desa', 191)->nullable();
            $table->string('kode_desa', 50)->nullable();
            $table->string('kode_pos', 20)->nullable();
            $table->string('kepala_desa', 191)->nullable();
            $table->string('alamat_kantor', 255)->nullable();

            // Kontak publik
            $table->string('email_desa', 191)->nullable();
            $table->string('telepon_desa', 50)->nullable();
            $table->string('website_desa', 191)->nullable();

            // Hirarki wilayah (opsional, sesuai form referensi)
            $table->string('nama_kecamatan', 191)->nullable();
            $table->string('nama_kabupaten', 191)->nullable();
            $table->string('nama_provinsi', 191)->nullable();

            // Koordinat/geo (opsional)
            $table->string('kode_kecamatan', 50)->nullable();
            $table->string('kode_kabupaten', 50)->nullable();
            $table->string('kode_provinsi', 50)->nullable();

            // Kontak Pemberitahuan (notifikasi resmi)
            $table->string('nama_pemdes', 191)->nullable();
            $table->string('no_hp_pemdes', 50)->nullable();
            $table->string('jabatan_pemdes', 191)->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('village_identities');
    }
};
