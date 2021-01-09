<?php

namespace App\Http\Livewire;

use App\Models\Author;
use App\Models\Magazine;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class MagazinesControl extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'magazineCreated' => 'updateList',
        'magazineUpdated' => 'updateList',
    ];

    public function mount()
    {

    }

    public function openCreateModal()
    {
        $this->emit('openMagazineCreateModal');
    }

    public function openUpdateModal($id)
    {
        $this->emit('openMagazineUpdateModal', $id);
    }

    public function updateList()
    {
        $this->render();
    }

    public function delete(Magazine $item)
    {
        Storage::delete($item->img_path);

        $item->delete();

        $this->resetPage();
    }

    public function render()
    {
        $items = Magazine::withCount('authors')->paginate();

        return view('livewire.magazines-control', compact('items'));
    }
}
