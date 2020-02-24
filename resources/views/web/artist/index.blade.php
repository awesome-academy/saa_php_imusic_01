@extends("web.master")
@section('content')
@include('web._partial.list_artist', [
    'artists' => $artists
])
@endsection
