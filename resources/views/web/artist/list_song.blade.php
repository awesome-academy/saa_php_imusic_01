@extends('web.master')
@section('content')
@include('web._partial.list_song', [
    'songs' => $songs,
    'header_title' => trans('messages.artist_title') . $artist->name
])
@endsection
