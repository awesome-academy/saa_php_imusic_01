@extends('web.master')
@section('content')
<div class="inner-content single">
    <div class="tittle-head">
        <h3 class="tittle">Album <span class="new">Page</span></h3>
        <div class="clearfix"> </div>
    </div>
    
    <div class="single_left" style="width: 45%;">
        <div class="col-md-12 player" style="background: #777; width:100%;">
            <div class="audio-player" id="jquery_jplayer_1">
                <audio id="audio-player"  controls="controls">
                    <source src="{{$songs->first()->link}}" type="audio/mpeg"></source>
                </audio>
            </div>
            <script type="text/javascript">
                $(function(){
                    $('#audio-player').mediaelementplayer({
                        alwaysShowControls: true,
                        features: ['playpause','progress','volume'],
                        audioVolume: 'horizontal',
                        iPadUseNativeControls: true,
                        iPhoneUseNativeControls: true,
                        AndroidUseNativeControls: true
                    });
                });
            </script>
            <ul class="next-top">
                <li><a class="ar" href="#"> <img src="{{url('web/images/arrow.png')}}" alt=""/></a></li>
                <li><a class="ar2" href="#"><img src="{{url('web/images/arrow2.png')}}" alt=""/></i></a></li>
            </ul>	
        </div> 

        <div class="video-main">
            <div class="video-record-list">
                <div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
                    <div class="jp-type-playlist">
                        {{-- <div id="jquery_jplayer_1" class="jp-jplayer" >
                            <audio id="audio-player"  controls="controls">
                                <source src="{{$songs->first()->link}}" type="audio/mpeg"></source>
                            </audio>
                        </div> --}}
                        <div class="jp-playlist">
                            <ul style="display: block;">
                                <?php $i = 1; ?>
                                @foreach ($songs as $song)
                                <li class=" @if($i == 1)jp-playlist-current @endif">
                                    <div>
                                        <a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a>
                                        <a href="javascript:;" class="jp-playlist-item  @if($i == 1)jp-playlist-current @endif" tabindex="0"  @if($i == 1) style="background-color: #45B39D!important; color:black!important;" @endif>{{$i++}}. {{$song->title}}  <span class="jp-artist">by @foreach($song->artists as $artist) {{$artist->name}}@endforeach</span></a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        <script type="text/javascript" src="{{url('web/js/jquery.jplayer.min.js')}}"></script>
        <script type="text/javascript" src="{{url('web/js/jplayer.playlist.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                var myPlaylist = new jPlayerPlaylist({
                    jPlayer: "#jquery_jplayer_1",
                    cssSelectorAncestor: "#jp_container_1"
                }, [
                {
                    title:"Cro Magnon Man",
                    artist:"The Stark Palace",
                    mp3:"http://www.jplayer.org/audio/mp3/TSP-01-Cro_magnon_man.mp3",
                    oga:"http://www.jplayer.org/audio/ogg/TSP-01-Cro_magnon_man.ogg",
                }
                ], {
                    playlistOptions: {
                        enableRemoveControls: true
                    },
                    swfPath: "/js",
                    supplied: "ogv, m4v, oga, mp3",
                    smoothPlayBar: true,
                    keyEnabled: true,
                    audioFullScreen: true // Allows the audio poster to go full screen via keyboard
                });
                
            });
        </script>
    </div>
   
</div>
@endsection
@section('after-styles')
<style>
    .mejs-controls .mejs-play button, .mejs-controls .mejs-pause button {
        left: 30px;
    }
    .next-top {
        left: 20px;
    }
</style>
@endsection
