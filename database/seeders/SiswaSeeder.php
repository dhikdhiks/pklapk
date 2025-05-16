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
            ['nis' => '20392', 'nama' => 'ADNAN FARIS', 'gender' => 'L', 'alamat' => 'Jl. Diponegoro No. 5, Semarang', 'kontak' => '081234567805', 'email' => 'adnanfaris202@gmail.com'],
            ['nis' => '20393', 'nama' => 'AHMAD HANAFFI RAHMADHANI', 'gender' => 'L', 'alamat' => 'Jl. Hayam Wuruk No. 6, Medan', 'kontak' => '081234567806', 'email' => 'ahmadhanafi303@gmail.com'],
            ['nis' => '20394', 'nama' => 'AKBAR AD\'HA KUSUMAWARDHANA', 'gender' => 'L', 'alamat' => 'Jl. Imam Bonjol No. 7, Makassar', 'kontak' => '081234567807', 'email' => 'akbaradha404@gmail.com'],
            ['nis' => '20395', 'nama' => 'ANDHIKA AUGUST FARNAZ', 'gender' => 'L', 'alamat' => 'Jl. Ahmad Yani No. 8, Palembang', 'kontak' => '081234567808', 'email' => 'andhikaugust505@gmail.com'],
            ['nis' => '20396', 'nama' => 'ANGELINA THITHIS SEKAR LANGIT', 'gender' => 'P', 'alamat' => 'Jl. Pahlawan No. 9, Denpasar', 'kontak' => '081234567809', 'email' => 'angelinathithis606@gmail.com'],
            ['nis' => '20397', 'nama' => 'ARIFIN NUR IHSAN', 'gender' => 'L', 'alamat' => 'Jl. Veteran No. 10, Malang', 'kontak' => '081234567810', 'email' => 'arifinnur707@gmail.com'],
            ['nis' => '20398', 'nama' => 'ARYA EKA RAHMAT PRASETYO', 'gender' => 'L', 'alamat' => 'Jl. Gajah Mada No. 11, Solo', 'kontak' => '081234567811', 'email' => 'aryaeka808@gmail.com'],
            ['nis' => '20399', 'nama' => 'ATHIYYA HANIIFA', 'gender' => 'P', 'alamat' => 'Jl. Raya Bogor No. 12, Bogor', 'kontak' => '081234567812', 'email' => 'athiyyahaniifa909@gmail.com'],
            ['nis' => '20400', 'nama' => 'AULIA MAHARANI', 'gender' => 'P', 'alamat' => 'Jl. Asia Afrika No. 13, Bandung', 'kontak' => '081234567813', 'email' => 'auliamaharani1010@gmail.com'],
            ['nis' => '20401', 'nama' => 'BIJAK PUTRA FIRMANSYAH', 'gender' => 'L', 'alamat' => 'Jl. Kebon Jeruk No. 14, Jakarta', 'kontak' => '081234567814', 'email' => 'bijakputra1111@gmail.com'],
            ['nis' => '20402', 'nama' => 'CHRISTIAN JAROT FERDIANNDARU', 'gender' => 'L', 'alamat' => 'Jl. Cikini No. 15, Jakarta', 'kontak' => '081234567815', 'email' => 'christianjarot1212@gmail.com'],
            ['nis' => '20403', 'nama' => 'DAFFA ARYA SETA', 'gender' => 'L', 'alamat' => 'Jl. Malioboro No. 16, Yogyakarta', 'kontak' => '081234567816', 'email' => 'daffaarya1313@gmail.com'],
            ['nis' => '20404', 'nama' => 'DaIMAS BAGUS AHMAD NURYASIN', 'gender' => 'L', 'alamat' => 'Jl. Dr. Sutomo No. 17, Surabaya', 'kontak' => '081234567817', 'email' => 'dimasbagus1414@gmail.com'],
            ['nis' => '20405', 'nama' => 'EKALAYA KEMAL PASHA', 'gender' => 'L', 'alamat' => 'Jl. Panglima Polim No. 18, Jakarta', 'kontak' => '081234567818', 'email' => 'ekalayakemal1515@gmail.com'],
            ['nis' => '20406', 'nama' => 'FADLY ATHALLA FAWWAZ', 'gender' => 'L', 'alamat' => 'Jl. Teuku Umar No. 19, Denpasar', 'kontak' => '081234567819', 'email' => 'fadlyathalla1616@gmail.com'],
            ['nis' => '20407', 'nama' => 'FARADILLA SYIFA NURAINI', 'gender' => 'P', 'alamat' => 'Jl. Raya Kuta No. 20, Bali', 'kontak' => '081234567820', 'email' => 'faradillasyifa1717@gmail.com'],
            ['nis' => '20408', 'nama' => 'FARCHA AMALIA NUGRAHAINI', 'gender' => 'P', 'alamat' => 'Jl. Cendrawasih No. 21, Makassar', 'kontak' => '081234567821', 'email' => 'farchaamalia1818@gmail.com'],
            ['nis' => '20409', 'nama' => 'FAUZAN ADZIMA KURNIAWAN', 'gender' => 'L', 'alamat' => 'Jl. Raya Ubud No. 22, Bali', 'kontak' => '081234567822', 'email' => 'fauzanadzima1919@gmail.com'],
            ['nis' => '20410', 'nama' => 'GABRIEL POSSENTI GENTA BAHANA NAGARI', 'gender' => 'L', 'alamat' => 'Jl. Raden Saleh No. 23, Jakarta', 'kontak' => '081234567823', 'email' => 'gabrielpossenti2020@gmail.com'],
            ['nis' => '20411', 'nama' => 'GILANG NURHUDA', 'gender' => 'L', 'alamat' => 'Jl. Cihampelas No. 24, Bandung', 'kontak' => '081234567824', 'email' => 'gilangnurhuda2121@gmail.com'],
            ['nis' => '20412', 'nama' => 'GISELO KRISTIYANTO', 'gender' => 'L', 'alamat' => 'Jl. K.H. Hasyim Ashari No. 25, Jakarta', 'kontak' => '081234567825', 'email' => 'giselokristi2222@gmail.com'],
            ['nis' => '20413', 'nama' => 'ILHAM PUTRA MAHENDRA', 'gender' => 'L', 'alamat' => 'Jl. Raya Puputan No. 26, Denpasar', 'kontak' => '081234567826', 'email' => 'ilhammahendra2323@gmail.com'],
            ['nis' => '20414', 'nama' => 'INTAN LUVIA HISANAH', 'gender' => 'P', 'alamat' => 'Jl. Cikapundung No. 27, Bandung', 'kontak' => '081234567827', 'email' => 'intanluvia2424@gmail.com'],
            ['nis' => '20415', 'nama' => 'ISNAINI NUR WAHYUNINGSIH', 'gender' => 'P', 'alamat' => 'Jl. Raya Pajajaran No. 28, Bogor', 'kontak' => '081234567828', 'email' => 'isnaininur2525@gmail.com'],
            ['nis' => '20416', 'nama' => 'IZZUDDIN FAYYEDH HAQ', 'gender' => 'L', 'alamat' => 'Jl. Raya Kalimalang No. 29, Jakarta', 'kontak' => '081234567829', 'email' => 'izzuddinfayyedh2626@gmail.com'],
            ['nis' => '20417', 'nama' => 'JARDELLA ANGGUN LAVATEKTONIA', 'gender' => 'P', 'alamat' => 'Jl. Raya Darmo No. 30, Surabaya', 'kontak' => '081234567830', 'email' => 'jardellaanggun2727@gmail.com'],
            ['nis' => '20418', 'nama' => 'JECONIA VALE ADYATMA', 'gender' => 'L', 'alamat' => 'Jl. Raya Diponegoro No. 31, Denpasar', 'kontak' => '081234567831', 'email' => 'jeconiavale2828@gmail.com'],
            ['nis' => '20419', 'nama' => 'KAYSA AQILA AMTA', 'gender' => 'P', 'alamat' => 'Jl. Raya Cikini No. 32, Jakarta', 'kontak' => '081234567832', 'email' => 'kaysaaqila2929@gmail.com'],
            ['nis' => '20420', 'nama' => 'KEVIN ANDREA GERALDINO', 'gender' => 'L', 'alamat' => 'Jl. Raya Braga No. 33, Bandung', 'kontak' => '081234567833', 'email' => 'kevinandrea3030@gmail.com'],
            ['nis' => '20421', 'nama' => 'LAURENTIUS DAVIANO MAXIMUS ANTARA', 'gender' => 'L', 'alamat' => 'Jl. Raya Kuta No. 34, Bali', 'kontak' => '081234567834', 'email' => 'laurentiusdavi3131@gmail.com'],
            ['nis' => '20422', 'nama' => 'MARCELLINUS CHRISTO PRADIPTA', 'gender' => 'L', 'alamat' => 'Jl. Rrunningaya Pasar Baru No. 35, Jakarta', 'kontak' => '081234567835', 'email' => 'marcellinus3232@gmail.com'],
            ['nis' => '20423', 'nama' => 'MEIDINNA TIARA PRAMUDHITA', 'gender' => 'P', 'alamat' => 'Jl. Raya Uluwatu No. 36, Bali', 'kontak' => '081234567836', 'email' => 'meidinnatiara3333@gmail.com'],
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
