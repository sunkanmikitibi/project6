<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Petition As AllPetition;

class Petition extends Component
{
    public $petitions;

    public function render()
    {
        $this->petitions = AllPetition::all();
        return view('livewire.petition');
    }
}
