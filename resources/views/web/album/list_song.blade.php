@extends('web.master')
@section('content')
<div class="single_left" style="width: 45%;">
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
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="response" style="width: 52%;">
    <h4>{{ trans('messages.comment_title') }}</h4>
    @if(count($comments) == 0)
    <p>{{ trans_choice('messages.comment', 0) }} </p>
    @endif
    <div class="media response-info" id="comment_list_box">
        @foreach($comments as $comment)
        <div class="comment_div">
            <div class="media-left response-text-left">
                <a href="#">
                    <img class="media-object" src="{{$comment->user->avatar}}" alt="">
                </a>
                <h5><a href="#">{{$comment->user->name}}</a></h5>
            </div>
            <div class="media-body response-text-right">
                <p>{{$comment->content}}</p>
                <ul>
                    <li>{{date("d-m-Y", strtotime($comment->created_at))}}</li>
                </ul>
                <a class="delete-comment" href="javascript:void(0)" data-url="{{route('comment.delete', ['comment_id' => $comment->id])}}" style="float: right;" onclick="deleteComment(this)">{{ trans('messages.delete_title') }}</a>
            </div>
        </div>
        @endforeach
        <div class="clearfix"> </div>
    </div>
</div>
<div class="clearfix"></div>
@include('web._partial.comment', [
'user' => Auth::user(),
'commentable_type' => \Config::get('constants.album.commentable_type'),
'commentable_id' => $album->id
])
@endsection
@section('before-scripts')
<script src="{{url('web/js/play-audio.js')}}"></script>
@endsection
@section('after-styles')
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
