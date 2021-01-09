<?php

namespace App\Http\Livewire;

use App\Models\Author;
use Livewire\Component;
use Livewire\WithPagination;

class AuthorsControl extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'authorCreated' => 'updateList',
        'authorUpdated' => 'updateList',
    ];

    public $sort;

    public function mount()
    {
        $this->sort = 'asc';
    }

    public function openCreateModal()
    {
        $this->emit('openAuthorCreateModal');
    }

    public function openUpdateModal($id)
    {
        $this->emit('openAuthorUpdateModal', $id);
    }

    public function updateList()
    {
        $this->render();
    }

    public function delete(Author $item)
    {
        $item->delete();

        $this->resetPage();
    }

    public function updatingSort()
    {
        $this->resetPage();
    }

    public function getItems()
    {
        $items = Author::withCount('magazines')->orderBy('surname', $this->sort)->paginate();

        return $items;
    }

    public function render()
    {
        $items = $this->getItems();

        return view('livewire.authors-control', compact('items'));
    }
}
