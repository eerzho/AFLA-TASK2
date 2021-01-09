<?php

namespace App\Http\Livewire;

use App\Models\Author;
use Livewire\Component;

class AuthorCreateModal extends Component
{
    protected $listeners = ['openAuthorCreateModal' => 'open'];

    protected $rules = [
        'surname' => 'required|min:3|max:255',
        'name' => 'required|min:3|max:255',
        'patronymic' => 'required|min:3|max:255',
    ];

    public $displayModal;

    public $surname;
    public $name;
    public $patronymic;

    public function open()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->displayModal = true;

        $this->surname = '';
        $this->name = '';
        $this->patronymic = '';
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

        Author::create($validatedData);

        $this->close();

        $this->emit('authorCreated');
    }

    public function render()
    {
        return view('livewire.author-create-modal');
    }
}
