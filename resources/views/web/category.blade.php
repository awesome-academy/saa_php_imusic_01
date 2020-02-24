@extends('web.master')
@section('content')
@include('web._partial.list_song', [
    'header_title' => $category->name
])
@endsection