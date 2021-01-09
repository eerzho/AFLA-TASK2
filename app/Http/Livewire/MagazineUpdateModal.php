<?php

namespace App\Http\Livewire;

use App\Models\Author;
use App\Models\Magazine;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class MagazineUpdateModal extends Component
{
    use WithFileUploads;

    protected $listeners = ['openMagazineUpdateModal' => 'open'];

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'description' => 'nullable',
        'img' => 'nullable|max:2000|mimes:jpg,png'
    ];

    public $displayModal;

    public $item;
    public $name;
    public $description;
    public $img;

    public $step;
    public $values;
    public $perPage;

    public function open(Magazine $item)
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->displayModal = true;

        $this->name = $item->name;
        $this->description = $item->description;
        $this->item = $item;
        $this->img = null;

        $this->step = 1;
        $this->perPage = 0;
        $this->values = [];

        $ids = $item->authors()->pluck('id');

        foreach ($ids as $id) {
            $this->values[$id] = true;
        }
    }

    public function close()
    {
        $this->displayModal = false;
    }

    public function stepChange($type)
    {
        $type == 'next' ? $this->step++ : $this->step--;
    }

    public function pageChange($type)
    {
        $type == 'next' ? $this->perPage++ : ($this->perPage > 0 ? $this->perPage-- : $this->perPage);
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function update()
    {
        $validatedData = $this->validate();

        if ($this->img) {
            Storage::delete($this->item->img_path);
            $validatedData['img_path'] = $this->img->store('img');
        }

        $this->item->update($validatedData);

        $this->item->authors()->sync(array_keys(array_filter($this->values)));

        $this->close();

        $this->emit('magazineUpdated');
    }

    public function getAuthors()
    {
        $items = Author::skip($this->perPage * 5)->limit(5)->get();

        return $items;
    }

    public function render()
    {
        $authors = $this->getAuthors();

        return view('livewire.magazine-update-modal', compact('authors'));
    }
}
