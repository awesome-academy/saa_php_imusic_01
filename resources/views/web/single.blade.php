<?php 
use Illuminate\Support\Facades\Config;
?>
@extends('web.master')
@section('content')
<div class="inner-content single">
    <div class="tittle-head">
        <h3 class="tittle">{{ trans('messages.song_title') }} : {{$song->title}}</h3>
        <div class="clearfix"> </div>
    </div>
    <div>
        <div class="col-md-6 player" style="background: #777;">
            <div class="audio-player">
                <audio id="audio-player"  controls="controls">
                    <source src="{{$song->link}}" type="audio/mpeg"></source>
                </audio>
            </div>
            <!---->
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
        <div class="col-md-6">
            @include('web._partial.rating', [
            'rating' => $rating,
            'route_create_rate' => route('rate.create'),
            'rateable_type' => \Config::get('constants.song.rateable_type'),
            'rateable_id' => $song->id,
            'user_rate' => $user_rate
            ])
            <span><a href="javascript:void(0)" class="toggle_favourite" data-status = {{$favourite_status}} data-url-add="{{route('favourite_list.add')}}" data-song-id = "{{$song->id}}" data-url-delete="{{route('favourite_list.delete')}}" style="text-decoration: none; color:black;"><i class="fa fa-heart @if($favourite_status > 0) red @endif" id="icon_heart" ></i></a> <i class="fa fa-headphones" aria-hidden="true">{{$song->count}}</i></span>
        </div>
    </div>
    @include('web._partial.lyrics', [
        'lyric' => $lyric,
        'song' => $song
    ])
    <div class="response" style="width: 100%!important;">
        <h4>{{ trans('messages.comment_title') }}</h4>
        <div class="media response-info" id="comment_list_box">
            <?php $user = auth('web')->user(); ?>
            @if(count($comments) == 0)
            <p>{{ trans_choice('messages.comment', 0) }} </p>
            
            @else
            
            @foreach($comments as $comment)
            <div class="comment_div">
                <div class="media-left response-text-left">
                    <a href="#">
                        <img class="media-object" src="{{$comment->user->avatar}}" alt="" style="width: 100px;">
                    </a>
                    <h5><a href="#">{{$comment->user->name}}</a></h5>
                </div>
                <div class="media-body response-text-right">
                    <p id="content_comment_id_{{$comment->id}}">{{$comment->content}}</p>
                    <ul>
                        <li>{{$comment->created_at}}</li>
                    </ul>
                    @if($user->id == $comment->user->id)
                    <a class="delete-comment" href="javascript:void(0)" data-url="{{route('comment.delete', ['comment_id' => $comment->id])}}" style="float: right;" onclick="deleteComment(this)">{{ trans('messages.delete_title') }}</a>
                    <a class="edit-comment" href="javascript:void(0)" data-url="{{route('comment.update', ['comment_id' => $comment->id])}}" style="float: right;" onclick="showUpdateCommentForm(this)" data-content = "{{$comment->content}}" data-content-id = "#content_comment_id_{{$comment->id}}">{{ trans('messages.edit_title') }} | </a>
                    @endif
                </div>
            </div>
            <div class="clearfix"> </div>
            @endforeach
            
            @endif
        </div>
    </div>
    <div class="clearfix"> </div>
    
    @include('web._partial.comment', [
    'user' => auth('web')->user(),
    'commentable_type' => \Config::get('constants.song.commentable_type'),
    'commentable_id' => $song->id,
    ])
    
</div>
@endsection
@section('before-scripts')
<script>
    $(document).ready(function(){
        audioPlayer();
    });
    function audioPlayer(){
        $("#audio-player")[0].play();
    }
</script>
<script src="{{url('web/js/favourite.js')}}"></script>
@endsection
