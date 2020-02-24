<div class="albums second">
    <div class="tittle-head">
        <h3 class="tittle">Artist <span class="new">View</span></h3>
        <div class="clearfix"> </div>
    </div>
    @if (count($artists) == 0)
    <h4>{{ trans_choice('messages.artist', 0) }}</h4>
    @else
    <h4>{{ trans_choice('messages.artist', count($artists), ['result' => count($artists)]) }}</h4>
    <div class="grid-container" style="display:grid; grid-template-columns: 16.66% 16.66% 16.66% 16.66% 16.66% 16.66%;">
        @foreach($artists as $artist)
        <div class="grid-item" style="padding-left : 10px;">
            <a href="{{route('artist.songs', ['artist_id' => $artist->id])}}"><img src="{{$artist->avatar}}" title="allbum-name" width="100%"></a>
            <p>{{$artist->name}}</p>
        </div>
        @endforeach
    </div>
    @endif
</div>
<div class="clearfix"></div>
