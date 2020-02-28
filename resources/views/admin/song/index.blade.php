@extends('admin.master')
@section('content')
<h1 class="h3 mb-2 text-gray-800">{{ trans('messages.song_title') }}</h1>
@include('admin._partial.flash')
<a class="btn btn-primary mt-2 mb-2" href="{{route('admin.song.create')}}">{{ trans('messages.new_title') }}</a>
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ trans('messages.id_title') }}</th>
                        <th>{{ trans('messages.title_title') }}</th>
                        <th>{{ trans('messages.count_title') }}</th>
                        <th>{{ trans('messages.score_title') }}</th>
                        <th>{{ trans('messages.new_title') }}</th>
                        <th>{{ trans('messages.category_title') }}</th>
                        <th>{{ trans('messages.artist_title') }}</th>
                        <th>{{ trans('messages.album_title') }}</th>
                        <th>{{ trans('messages.action_title') }}</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>{{ trans('messages.id_title') }}</th>
                        <th>{{ trans('messages.title_title') }}</th>
                        <th>{{ trans('messages.count_title') }}</th>
                        <th>{{ trans('messages.score_title') }}</th>
                        <th>{{ trans('messages.new_title') }}</th>
                        <th>{{ trans('messages.category_title') }}</th>
                        <th>{{ trans('messages.artist_title') }}</th>
                        <th>{{ trans('messages.album_title') }}</th>
                        <th>{{ trans('messages.action_title') }}</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($songs as $song)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$song->title}}</td>
                        <td>{{$song->count}}</td>
                        <td>{{$song->score}}</td>
                        <td><input type="checkbox" @if($song->is_new) checked @endif disabled = "disabled"></td>
                        <td>{{$song->category->name}}</td>
                        <td>@foreach($song->artists as $artist)<a href="{{route('admin.artist.edit', ['artist_id' => $artist->id])}}">{{$artist->name}}</a> @endforeach</td>
                        <td>@foreach($song->albums as $album)<a href="{{route('admin.album.edit', ['album_id' => $album->id])}}">{{$album->name}} </a>@endforeach</td>
                        <td>
                            <a href="{{route('admin.song.edit', ['song_id' => $song->id])}}" class="btn btn-warning" title="Edit"> <i class="fas fa-pencil-alt"></i></a>
                            <a href="{{route('admin.song.delete', ['song_id' => $song->id])}}" class="btn btn-danger confirm-delete" title="Delete">
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
