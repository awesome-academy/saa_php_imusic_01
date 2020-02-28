@extends('admin.master')
@section('content')
<h1 class="h3 mb-2 text-gray-800">{{ trans('messages.artist_title') }}</h1>
@include('admin._partial.flash')
<a class="btn btn-primary mt-2 mb-2" href="{{route('admin.artist.create')}}">{{ trans('messages.new_title') }}</a>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ trans('messages.id_title') }}</th>
                        <th>{{ trans('messages.name_title') }}</th>
                        <th>{{ trans('messages.dob_title') }}</th>
                        <th style="width: 30%;">{{ trans('messages.action_title') }}</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>{{ trans('messages.id_title') }}</th>
                        <th>{{ trans('messages.name_title') }}</th>
                        <th>{{ trans('messages.dob_title') }}</th>
                        <th style="width: 30%;">{{ trans('messages.action_title') }}</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($artists as $artist)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$artist->name}}</td>
                        <td>{{$artist->dob}}</td>
                        <td> 
                            <a href="{{route('admin.artist.edit', ['artist_id' => $artist->id])}}" class="btn btn-warning" title="Edit"> <i class="fas fa-pencil-alt"></i></a>
                            <a href="{{route('admin.artist.delete', ['artist_id' => $artist->id])}}" class="btn btn-danger confirm-delete" title="Delete">
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
