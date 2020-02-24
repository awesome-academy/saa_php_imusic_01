<div class="albums second">
    <div class="tittle-head">
        <h3 class="tittle">ALbum <span class="new">View</span></h3>
        <div class="clearfix"> </div>
    </div>
    @if (count($albums) == 0)
    <p>Không tìm thấy album</p>
    @else
    <div class="grid-container" style="display:grid; grid-template-columns: 16.66% 16.66% 16.66% 16.66% 16.66% 16.66%;">
        @foreach($albums as $album)
        <div class="grid-item" style="padding-left : 10px;">
            <a href="{{route('album.songs', ['album_id' => $album->id])}}"><img src="{{$album->image}}" title="allbum-name" width="100%"></a>
            <p>{{$album->name}}</p>
        </div>
        @endforeach
    </div>
    @endif
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
