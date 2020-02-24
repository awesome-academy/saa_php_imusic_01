<div class="widget-side">
    <h4 class="widget-title">{{$header_title}}</h4>
    <div class="col-md-8 col-md-offset-2">
        @if (count($songs) == 0)
        <h4>{{ trans_choice('messages.song', 0) }}</h4>
        @else
        <h4>{{ trans_choice('messages.song', count($songs), ['result' => count($songs)]) }}</h4>
        <ul>
            @foreach($songs as $song)
            <li>
                <div class="song-img">
                    <a href="{{route('song.listen', ['song_id' => $song->id])}}"><img src="{{$song->image}}" class="img-responsive" alt="" style="width: 80px;"/></a>
                </div>
                <div class="song-text">
                    <a href="{{route('song.listen', ['song_id' => $song->id])}}">{{$song->title}}</a>
                    <span class="post-date">{{date('d-m-Y', strtotime($song->created_at))}}</span>
                </div>
                <div class="clearfix"></div>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
</div>
<div class="clearfix"></div>
