@extends('web.master')
@section('content')
@include('web._partial.list_song', [
    'songs' => $songs,
    'header_title' => 'Ca sĩ ' . $artist->name
])
@endsection
