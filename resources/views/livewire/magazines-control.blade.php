<div class="card">
    <livewire:magazine-create-modal></livewire:magazine-create-modal>
    <livewire:magazine-update-modal></livewire:magazine-update-modal>
    <div class="card-header d-flex">
        <button class="btn btn-primary ml-auto"
                type="button"
                wire:click.prevent="openCreateModal">
            Add Magazine
        </button>
    </div>
    <div class="card-body">

        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Img</th>
                <th scope="col">Name</th>
                <th scope="col">Authors Count</th>
                <th scope="col">Open</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($items as $key => $item)
                <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td><img style="width: 100px" src="{{$item->img_url}}"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->authors_count}}</td>
                    <td>
                        <a href="{{route('magazine-page', ['id' => $item->id])}}"
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
