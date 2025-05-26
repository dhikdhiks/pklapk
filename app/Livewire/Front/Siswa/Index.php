<?php

namespace App\Livewire\Front\Siswa;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Index extends Component
{
    public $siswa = [];
    public $errorMessage = null;

    public function mount()
    {
        try {
            $response = Http::timeout(10) // Timeout 10 detik
                ->get(env('API_URL', 'http://localhost:8000') . '/api/siswa'); // Gunakan env untuk URL

            if ($response->successful()) {
                $this->siswa = $response->json();
            } else {
                $this->errorMessage = 'Gagal mengambil data dari API: ' . $response->status();
            }
        } catch (\Exception $e) {
            $this->errorMessage = 'Terjadi kesalahan: ' . $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.front.siswa.index');
    }
}
