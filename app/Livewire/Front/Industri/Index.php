<?php

namespace App\Livewire\Front\Industri;
use Livewire\Component;
use App\Models\Industri;

class Index extends Component
{
    public function render()
    {
        $industris = Industri::all();
        return view('livewire.front.industri.index', [
            'industris' => $industris,
        ]);
    }
}
