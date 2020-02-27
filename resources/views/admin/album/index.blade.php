@extends('admin.master')
@section('content')
<h1 class="h3 mb-2 text-gray-800">{{ trans('messages.album_title') }}</h1>
@include('admin._partial.flash')
<a class="btn btn-primary mt-2 mb-2" href="{{route('admin.album.create')}}">{{ trans('messages.new_title') }}</a>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ trans('messages.title_title') }}</th>
                        <th>{{ trans('messages.count_title') }}</th>
                        <th style="width: 30%;">{{ trans('messages.action_title') }}</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>{{ trans('messages.title_title') }}</th>
                        <th>{{ trans('messages.count_title') }}</th>
                        <th>{{ trans('messages.action_title') }}</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($albums as $album)
                    <tr>
                        <td>{{$album->name}}</td>
                        <td>{{$album->count}}</td>
                        <td> 
                            <a href="{{route('admin.album.edit', ['album_id' => $album->id])}}" class="btn btn-warning" title="Edit"> <i class="fas fa-pencil-alt"></i></a>
                            <a href="{{route('admin.album.delete', ['album_id' => $album->id])}}" class="btn btn-danger confirm-delete" title="Delete">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
