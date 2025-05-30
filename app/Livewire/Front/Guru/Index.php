<?php

namespace App\Livewire\Front\Guru;

use Livewire\Component;
use App\Models\Guru;

class Index extends Component
{
    public function render()
    {
        $gurus = Guru::all();
        return view('livewire.front.guru.index', [
            'gurus' => $gurus,
        ]);
    }
}
