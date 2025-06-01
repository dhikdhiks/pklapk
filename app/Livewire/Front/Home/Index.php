<?php

namespace App\Livewire\Front\Home;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Pkl;
use App\Models\Guru;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $siswa;
    public $guru;
    public $pkl;
    public $statusLaporan;
    public $totalPkl;
    public $pklAktif;
    public $greeting;

    public function mount()
    {
        $user = Auth::user();

        if (!$user) {
            // Redirect to login if user is not authenticated
            return redirect()->route('login');
        }

        // Ambil data guru jika role Guru
        if ($user->hasRole('Guru')) {
            $this->guru = Guru::where('email', $user->email)->first();
            if (!$this->guru) {
                session()->flash('error', 'Data guru tidak ditemukan. Silakan hubungi administrator.');
            }
        } else {
            // Ambil data siswa berdasarkan email user yang login
            $this->siswa = Siswa::where('email', $user->email)->first();

            if ($this->siswa) {
                // Ambil PKL terbaru dari siswa
                $this->pkl = Pkl::where('siswa_id', $this->siswa->id)
                    ->with(['guru', 'industri'])
                    ->latest()
                    ->first();

                // Hitung total PKL
                $this->totalPkl = Pkl::where('siswa_id', $this->siswa->id)->count();

                // PKL yang sedang aktif (belum selesai)
                $this->pklAktif = Pkl::where('siswa_id', $this->siswa->id)
                    ->where('selesai', '>=', now())
                    ->count();

                // Status laporan dari tabel siswa
                $this->statusLaporan = $this->siswa->status_lapor_pkl ?? 'Belum Lapor';
            } else {
                // Flash error message if no Siswa record is found
                session()->flash('error', 'Data siswa tidak ditemukan. Silakan hubungi administrator.');
            }
        }

        // Set greeting berdasarkan waktu
        $this->setGreeting();
    }

    private function setGreeting()
    {
        $hour = now()->timezone('Asia/Jakarta')->hour;

        if ($hour < 12) {
            $this->greeting = 'Selamat Pagi';
        } elseif ($hour < 15) {
            $this->greeting = 'Selamat Siang';
        } elseif ($hour < 18) {
            $this->greeting = 'Selamat Sore';
        } else {
            $this->greeting = 'Selamat Malam';
        }
    }

    public function buatLaporan()
    {
        // Redirect ke halaman buat laporan PKL
        return redirect()->route('pkl');
    }

    public function lihatLaporan()
    {
        // Redirect ke halaman detail laporan PKL
        if ($this->pkl) {
            return redirect()->route('pkl', $this->pkl->id);
        }
        session()->flash('error', 'Tidak ada laporan PKL untuk dilihat.');
    }

public function render()
{
    return view('livewire.front.home.index', [
        'guru' => $this->guru,
        'siswa' => $this->siswa,
    ]);
}
}