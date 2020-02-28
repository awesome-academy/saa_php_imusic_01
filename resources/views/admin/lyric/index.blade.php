@extends('admin.master')
@section('content')
<h1 class="h3 mb-2 text-gray-800">{{ trans('messages.lyric_title') }}</h1>
@include('admin._partial.flash')
<?php use Illuminate\Support\Facades\Config; 
    $status_define = array_flip(\Config::get('constants.status'));
?>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ trans('messages.id_title') }}</th>
                        <th>{{ trans('messages.status_title') }}</th>
                        <th>{{ trans('messages.song_title') }}</th>
                        <th>{{ trans('messages.user_title') }}</th>
                        <th>{{ trans('messages.action_title') }}</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>{{ trans('messages.id_title') }}</th>
                        <th>{{ trans('messages.status_title') }}</th>
                        <th>{{ trans('messages.song_title') }}</th>
                        <th>{{ trans('messages.user_title') }}</th>
                        <th>{{ trans('messages.action_title') }}</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($lyrics as $lyric)
                    <tr>
                        <td>{{$loop->first}}</td>
                        <td>{{$status_define[$lyric->status]}}</td>
                        <td>{{$lyric->song->title}}</td>
                        <td>{{$lyric->user->email}}</td>
                        <td>
                            <a href="{{route('admin.lyric.edit', ['lyric_id' => $lyric->id])}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
