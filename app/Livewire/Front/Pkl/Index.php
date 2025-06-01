<?php

namespace App\Livewire\Front\Pkl;

use App\Models\Pkl;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Industri;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $siswaId, $industriId, $guruId, $mulai, $selesai;
    public $isOpen = false;
    public $rowPerPage = 3;
    public $search = '';
    public $userMail;

    public function mount()
    {
        $this->userMail = Auth::user()->email;
    }

    public function render()
    {
        $query = Pkl::latest();

        if ($this->search) {
            $query->where(function ($q) {
                $q->whereHas('siswa', function ($s) {
                    $s->where('nama', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('industri', function ($i) {
                    $i->where('nama', 'like', '%' . $this->search . '%')
                      ->orWhere('bidang_usaha', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('guru', function ($g) {
                    $g->where('nama', 'like', '%' . $this->search . '%');
                })
                ->orWhere('mulai', 'like', '%' . $this->search . '%')
                ->orWhere('selesai', 'like', '%' . $this->search . '%');
            });
        }

        return view('livewire.front.pkl.index', [
            'pkls' => $query->paginate($this->rowPerPage),
            'siswa_login' => Siswa::where('email', $this->userMail)->first(),
            'industris' => Industri::all(),
            'gurus' => Guru::all(),
        ]);
    }

    public function searchData()
    {
        $this->resetPage(); // Reset pagination ke halaman 1 saat pencarian dilakukan
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->resetPage();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->siswaId = '';
        $this->industriId = '';
        $this->guruId = '';
        $this->mulai = '';
        $this->selesai = '';
    }

    public function store()
    {
        $this->validate([
            'siswaId' => 'required',
            'industriId' => 'required',
            'guruId' => 'required',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after:mulai',
        ]);

        DB::beginTransaction();

        try {
            $siswa = Siswa::find($this->siswaId);

            if ($siswa->status_lapor_pkl) {
                DB::rollBack();
                $this->closeModal();
                return redirect()->route('dashboard')->with('error', 'Transaksi dibatalkan: Siswa sudah melapor.');
            }

            Pkl::create([
                'siswa_id' => $this->siswaId,
                'industri_id' => $this->industriId,
                'guru_id' => $this->guruId,
                'mulai' => $this->mulai,
                'selesai' => $this->selesai,
            ]);

            $siswa->update(['status_lapor_pkl' => 1]);

            DB::commit();

            $this->closeModal();
            $this->resetInputFields();

            return redirect()->route('dashboard')->with('success', 'Data PKL berhasil disimpan dan status siswa diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            $this->closeModal();
            return redirect()->route('dashboard')->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}