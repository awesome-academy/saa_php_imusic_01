<div class="music-right">
    <!--/video-main-->
    <div class="video-main">
        <div class="video-record-list">
            <div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
                <div class="jp-type-playlist">
                    <div>
                        <h3 class="tittle">{{ trans('messages.top_20_songs') }}</h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="jp-playlist">
                        <ul style="display: block;">
                            <?php $i = 1 ?>
                            @foreach($top_20_songs as $song)
                            <?php $i++ ?>
                            <li @if($i == 1)  class="jp-playlist-current" @endif>
                                <div>
                                    <a href="{{route('song.listen', ['song_id' => $song->id])}}" class="jp-playlist-item" tabindex="0">{{$song->title}} <span class="jp-artist">by @foreach($song->artists as $artist){{$artist->name}}@endforeach</span></a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- script for play-list -->
    <link href="web/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css">
</div>
