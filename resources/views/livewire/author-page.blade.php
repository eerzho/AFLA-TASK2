<div class="card">
    <div class="card-header d-flex">
        <div class="card-title">Author: {{$author->full_name}}</div>
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
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{$items->links()}}
    </div>
</div>
