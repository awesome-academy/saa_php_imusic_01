@extends('admin.master')
@section('content')
@include('admin._partial.flash')
<h1 class="h3 mb-2 text-gray-800">{{ trans('messages.album_title') }}</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('admin.album.update', ['album_id' => $album->id])}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label pl-lg-4">{{ trans('messages.title_title') }}</label>
                <div class="">
                    <input type="text" name="Album[title]" class="form-control" value="@if(old('Album.title') != null){{old('Album.title')}}@else{{$album->name}}@endif" required>
                    @if ($errors->has('Album.title'))
                    <span class="help-block text-danger"><strong>{{ $errors->first('Album.title') }}</strong></span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="Album[is_hot]" @if(old('Album.is_hot')) checked @else @if($album->is_hot) checked @endif @endif>
                    <label class="custom-control-label" for="customCheck">{{ trans('messages.hot_album_title') }}</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">{{ trans('messages.image_title') }}</span>
                </div>
                <div class="custom-file">
                    <input class="image_file" type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="Album[image]" id="image_file">
                    <label class="custom-file-label" for="image_file" id="label_album_image">{{ trans('messages.choose_file_title') }}</label>
                </div>
                @if ($errors->has('Album.image'))
                <span class="help-block text-danger"><strong>{{ $errors->first('Album.image') }}</strong></span>
                @endif
            </div>
            <div>
                <output class="mt-2" id="result">
                    <div class="a">
                        <img src="{{$album->image}}" alt="">
                    </div>
                </output>
            </div>
            <input type="submit" class="btn btn-primary mt-2" value="{{ trans('messages.submit_title') }}">
        </form>
    </div>
</div>
@endsection
