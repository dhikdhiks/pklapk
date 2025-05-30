<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        $siswa = [
            ['nis' => '20388', 'nama' => 'ABU BAKAR TSABIT GHUFRON', 'gender' => 'L', 'alamat' => 'Jl. Merdeka No. 1, Jakarta', 'kontak' => '081234567801', 'email' => 'abubakar123@gmail.com'],
            ['nis' => '20389', 'nama' => 'ADE RAFIF DANESWARA', 'gender' => 'L', 'alamat' => 'Jl. Sudirman No. 2, Bandung', 'kontak' => '081234567802', 'email' => 'aderafif456@gmail.com'],
            ['nis' => '20390', 'nama' => 'ADE ZAIDAN ALTHAF', 'gender' => 'L', 'alamat' => 'Jl. Thamrin No. 3, Surabaya', 'kontak' => '081234567803', 'email' => 'adezaidan789@gmail.com'],
            ['nis' => '20391', 'nama' => 'ADHWA KHALILA RAMADHANI', 'gender' => 'P', 'alamat' => 'Jl. Gatot Subroto No. 4, Yogyakarta', 'kontak' => '081234567804', 'email' => 'adhwakhalila101@gmail.com'],
        ];

        foreach ($siswa as $data) {
            DB::table('siswas')->insert([
                'nis' => $data['nis'],
                'nama' => $data['nama'],
                'gender' => $data['gender'],
                'alamat' => $data['alamat'],
                'kontak' => $data['kontak'],
                'email' => $data['email'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
