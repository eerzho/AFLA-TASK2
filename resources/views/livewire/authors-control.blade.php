<div class="card">
    <livewire:author-create-modal></livewire:author-create-modal>
    <livewire:author-update-modal></livewire:author-update-modal>
    <div class="card-header d-flex">

        <select class="form-control w-50" wire:model="sort">
            <option value="Asc">sort with surname a-z</option>
            <option value="Desc">sort with surname z-a</option>
        </select>

        <button class="btn btn-primary ml-auto"
                type="button"
                wire:click.prevent="openCreateModal">
            Add Author
        </button>
    </div>
    <div class="card-body">

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Surname</th>
                <th scope="col">Name</th>
                <th scope="col">Patronymic</th>
                <th scope="col">Magazines Count</th>
                <th scope="col">Open</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $key => $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->surname}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->patronymic}}</td>
                    <td>{{$item->magazines_count}}</td>
                    <td>
                        <a href="{{route('author-page', ['id' => $item->id])}}"
                           class="btn btn-secondary">
                            Open
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-primary"
                                wire:click.prevent="openUpdateModal({{$item->id}})">
                            Edit
                        </button>
                    </td>
                    <td>
                        <button class="btn btn-danger"
                                type="button"
                                onclick="confirm('Delete this item ?') || event.stopImmediatePropagation()"
                                wire:click.prevent="delete({{$item->id}})">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{$items->links()}}
    </div>
</div>
