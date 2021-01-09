<?php

namespace App\Http\Livewire;

use App\Models\Author;
use App\Models\Magazine;
use Livewire\Component;
use Livewire\WithFileUploads;

class MagazineCreateModal extends Component
{
    use WithFileUploads;

    protected $listeners = ['openMagazineCreateModal' => 'open'];

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'description' => 'nullable',
        'img' => 'required|max:2000|mimes:jpg,png'
    ];

    public $displayModal;

    public $name;
    public $description;
    public $img;

    public $step;
    public $values;
    public $perPage;

    public function open()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->displayModal = true;

        $this->name = '';
        $this->description = '';
        $this->img = null;

        $this->step = 1;
        $this->perPage = 0;
        $this->values = [];
    }

    public function stepChange($type)
    {
        $type == 'next' ? $this->step++ : $this->step--;
    }

    public function pageChange($type)
    {
        $type == 'next' ? $this->perPage++ : ($this->perPage > 0 ? $this->perPage-- : $this->perPage);
    }

    public function close()
    {
        $this->displayModal = false;
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function store()
    {
        $validatedData = $this->validate();

        $validatedData['img_path'] = $this->img->store('img');

        $item = Magazine::create($validatedData);

        $item->authors()->attach(array_keys(array_filter($this->values)));

        $this->close();

        $this->emit('magazineCreated');
    }

    public function getAuthors()
    {
        $items = Author::skip($this->perPage * 5)->limit(5)->get();

        return $items;
    }

    public function render()
    {
        $authors = $this->getAuthors();

        return view('livewire.magazine-create-modal', compact('authors'));
    }
}
