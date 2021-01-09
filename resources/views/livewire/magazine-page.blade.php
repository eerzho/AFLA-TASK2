<div class="card">
    <img class="card-img-top" src="{{$magazine->img_url}}" style="width: 600px">
    <div class="card-title">
        Title: {{$magazine->name}}
    </div>
    <div class="card_body">
        {{$magazine->description}}
    </div>
    <div class="card-footer">
        <div class="card-title">
            Authors:
        </div>
        @foreach($magazine->authors as $item)
            <span class="badge badge-primary">
                {{$item->name}}
            </span>
        @endforeach
    </div>
</div>
