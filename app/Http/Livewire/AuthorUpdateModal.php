<?php

namespace App\Http\Livewire;

use App\Models\Author;
use Livewire\Component;

class AuthorUpdateModal extends Component
{
    protected $listeners = ['openAuthorUpdateModal' => 'open'];

    protected $rules = [
        'surname' => 'required|min:3|max:255',
        'name' => 'required|min:3|max:255',
        'patronymic' => 'required|min:3|max:255',
    ];

    public $displayModal;

    public $surname;
    public $name;
    public $patronymic;

    public $item;

    public function open(Author $item)
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->displayModal = true;


        $this->item = $item;
        $this->surname = $item->surname;
        $this->name = $item->name;
        $this->patronymic = $item->patronymic;
    }

    public function close()
    {
        $this->displayModal = false;
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function update()
    {
        $validatedData = $this->validate();

        $this->item->update($validatedData);

        $this->close();

        $this->emit('authorUpdated');
    }

    public function render()
    {
        return view('livewire.author-update-modal');
    }
}
