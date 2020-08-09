<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Signature As Sign;

class Signature extends Component
{
    private $signatures;


    public function render()
    {

        return view('livewire.signature');
    }

    public function mount($signatures)
    {
        dd($signatures);
        $this->signatures = $signatures;
    }
}
