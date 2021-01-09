<?php

namespace App\Http\Livewire;

use App\Models\Author;
use Livewire\Component;
use Livewire\WithPagination;

class AuthorPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $author;

    public function mount($id)
    {
        $this->author = Author::findOrFail($id);
    }

    public function render()
    {
        $items = $this->author->magazines()->withCount('authors')->paginate();

        return view('livewire.author-page', compact('items'));
    }
}
