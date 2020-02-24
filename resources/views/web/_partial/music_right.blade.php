<div class="music-right">
    <!--/video-main-->
    <div class="video-main">
        <div class="video-record-list">
            <div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
                <div class="jp-type-playlist">
                    <div>
                        <h3 class="tittle">Top 20 bài hát <span class="new">Hot</span></h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="jp-playlist">
                        <ul style="display: block;">
                            <?php $i = 1 ?>
                            @foreach($top_20_songs as $song)
                            <?php $i++ ?>
                            <li @if($i == 1)  class="jp-playlist-current" @endif>
                                <div>
                                    {{-- <a href="" class="jp-playlist-item-remove" style="display: none;">×</a> --}}
                                    <a href="{{route('song.listen', ['song_id' => $song->id])}}" class="jp-playlist-item" tabindex="0">{{$song->title}} <span class="jp-artist">by @foreach($song->artists as $artist){{$artist->name}}@endforeach</span></a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="jp-no-solution" style="display: none;">
                        <span>Update Required</span>
                        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- script for play-list -->
    <link href="web/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css">
</div>
