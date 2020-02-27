@extends('web.master')
@section('content')
<div>
    <div class="single_left" style="width: 45%; margin-left: 25%;">
        <div id="jp_container_1">
            <div class="jp-type-playlist1">
                <div>
                    <div class="col-md-12 player" style="background: #777; width:100%;">
                        <div class="audio-player" id="jquery_jplayer_1">
                            <audio id="audioPlayer"  controls="controls">
                                <source src="" type="audio/mpeg"></source>
                            </audio>
                        </div>
                        <script type="text/javascript">
                            $(function(){
                                $('#audioPlayer').mediaelementplayer({
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
                            <li><a class="ar" href="#" onclick="previousSong()"> <img src="{{url('web/images/arrow.png')}}" alt="" /></a></li>
                            <li><a class="ar2" href="#" onclick="nextSong()"><img src="{{url('web/images/arrow2.png')}}" alt="" /></i></a></li>
                        </ul>
                    </div>
                </div>
                
                <div>
                    <div class="jp-playlist" style="margin-top : 20px">
                        <ul style="display: block;">
                            <?php $i = 1; ?>
                            @foreach ($songs as $song)
                            <li>
                                <div class="jp-playlist-item1">
                                    <a href="{{$song->link}}" class="song-item @if($i == 1)jp-playlist-current1 @endif" tabindex="0">{{$i++}}. {{$song->title}}  <span class="jp-artist">by @foreach($song->artists as $artist) {{$artist->name}}@endforeach</span></a>
                                    <span class="list_item_heart">
                                        <a href="javascript:void(0)" class="toggle_favourite" data-status = "1" data-url-add="{{route('favourite_list.add')}}" data-url-delete="{{route('favourite_list.delete')}}" style="text-decoration: none; color:black;" data-song-id = "{{$song->id}}">
                                            <i class="fa fa-heart red"></i>
                                        </a>
                                    </span>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php $user = auth('web')->user(); ?>
<div class="clearfix"></div>
@endsection
@section('before-scripts')
<script src="{{url('web/js/play-audio.js')}}"></script>
<script src="{{url('web/js/favourite.js')}}"></script>
@endsection
@section('after-styles')
<link rel="stylesheet" href="{{url('web/css/custom.css')}}">
<style>
    .jp-playlist-current1 {
        background-color: #45B39D!important;
        color:#fff!important;
    }
    .jp-playlist ul li {
        background: #222;
    }
    a.song-item {
        display: block;
        color: #999;
        font-size: 1.4em;
        padding: 13px 20px 16px 20px!important;
        text-decoration: none;
    }
    div.jp-playlist a:hover {
        color: #fff!important;
        background: #45B39D!important;
    }
    span.jp-artist {
        color: #fff;
    }
</style>
@endsection
