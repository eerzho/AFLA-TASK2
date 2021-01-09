<?php

namespace App\Http\Livewire;

use App\Models\Magazine;
use Livewire\Component;

class MagazinePage extends Component
{
    public $magazine;

    public function mount($id)
    {
        $this->magazine = Magazine::with('authors')->findOrFail($id);
    }

    public function render()
    {

        return view('livewire.magazine-page');
    }
}
