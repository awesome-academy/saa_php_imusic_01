@extends('admin.master')
@section('content')
<h1 class="h3 mb-2 text-gray-800">{{ trans('messages.album_title') }}</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('admin.album.create')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label pl-lg-4">{{ trans('messages.title_title') }}</label>
                <div class="">
                    <input type="text" name="Album[title]" class="form-control" value="{{old('Album.title')}}" required>
                    @if ($errors->has('Album.title'))
                    <span class="help-block text-danger"><strong>{{ $errors->first('Album.title') }}</strong></span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="customCheck" name="Album[is_hot]" @if(old('Album.is_hot')) checked @endif>
                    <label class="custom-control-label" for="customCheck">{{ trans('messages.hot_album_title') }}</label>
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">{{ trans('messages.image_title') }}</span>
                </div>
                <div class="custom-file">
                    <input class="image_file" type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="Album[image]" id="image_file" required>
                    <label class="custom-file-label" for="image_file" id="label_album_image">{{ trans('messages.choose_file_title') }}</label>
                </div>
            </div>
            <div>
                <output class="mt-2" id="result" style="display: none;">
                </output>
            </div>
            <input type="submit" class="btn btn-primary mt-2" value="{{ trans('messages.submit_title') }}">
        </form>
    </div>
</div>
@endsection
