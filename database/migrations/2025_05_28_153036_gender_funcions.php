<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration {
    public function up(): void
    {
        // Ubah kolom gender ke VARCHAR(20) sebelum isi dengan string panjang
        Schema::table('siswas', function (Blueprint $table) {
            $table->string('gender', 20)->change();
        });

        // Ubah data 'L' dan 'P' menjadi string lengkap
        DB::statement("
            UPDATE siswas
            SET gender = CASE
                WHEN gender = 'L' THEN 'Laki-laki'
                WHEN gender = 'P' THEN 'Perempuan'
                ELSE gender
            END
        ");
    }

    public function down(): void
    {
        // Pastikan semua data kembali ke 1 karakter dulu agar tidak error
        DB::statement("
            UPDATE siswas
            SET gender = CASE
                WHEN gender = 'Laki-laki' THEN 'L'
                WHEN gender = 'Perempuan' THEN 'P'
                ELSE gender
            END
        ");

        // Baru ubah tipe kolom ke char(1)
        Schema::table('siswas', function (Blueprint $table) {
            $table->char('gender', 1)->change();
        });
    }
};
