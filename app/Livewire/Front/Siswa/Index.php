<?php

namespace App\Livewire\Front\Siswa;

use Livewire\Component;
use App\Models\Siswa;

class Index extends Component
{
    public function render()
    {
        $siswas = Siswa::all();
        return view('livewire.front.siswa.index', [
            'siswas' => $siswas,
        ]);
    }
}
