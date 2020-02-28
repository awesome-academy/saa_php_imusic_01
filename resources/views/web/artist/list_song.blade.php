@extends('web.master')
@section('content')
<div class="post-media" style="width: 100%;">
    <div class="blog-text row">
        <div class="col-md-4" style="padding: 0 45px;">
            <img src="{{$artist->avatar}}" class="img-responsive" alt="">
        </div>
        <div class="col-md-8">
            <a href="single.html"><h3 class="h-t">{{$artist->name}}</h3></a>
            <div class="entry-meta">
                <h6 class="blg">{{ trans('messages.dob_title') }} : {{$artist->dob}}</h6>
                <div class="clearfix"></div>
                <h4 class="h-t"><b>{{ trans('messages.description_title') }} :</b></h4>
                <textarea name="" id="" rows="10" style="width: 100%;background: none; border: none; outline: none; height: auto;" readonly>{{$artist->infomation}}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
@include('web._partial.list_song', [
'songs' => $songs,
'header_title' => trans('messages.song_title')
])
@endsection
