@extends("web.master")
@section('content')
@include('web._partial.list_album', [
    'albums' => $albums
])
@endsection
