@extends('web.master')
@section("content")
@include('web._partial.list_song', [
    'header_title' => 'Bài hát',
    'songs' => $songs
])
@include('web._partial.list_artist', [
    'header_title' => 'Ca sĩ',
    'artists' => $artists
])
@include('web._partial.list_album', [
    'header_title' => 'Album',
    'albums' => $albums
])
<div class="clearfix"></div>
@endsection
