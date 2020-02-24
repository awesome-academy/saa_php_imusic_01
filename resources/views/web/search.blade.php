@extends('web.master')
@section("content")
@include('web._partial.list_song', [
    'header_title' => {{ trans('messages.song_title') }},
    'songs' => $songs
])
@include('web._partial.list_artist', [
    'header_title' => {{ trans('messages.artist_title') }},
    'artists' => $artists
])
@include('web._partial.list_album', [
    'header_title' => {{ trans('messages.album_title') }},
    'albums' => $albums
])
<div class="clearfix"></div>
@endsection
