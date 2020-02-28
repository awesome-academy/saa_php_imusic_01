@extends('admin.master')
@section('after-styles')
<link href="{{url('template_admin/css/gijgo.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
@include('admin._partial.flash')
<h1 class="h3 mb-2 text-gray-800">{{ trans('messages.artist_title') }}</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('admin.artist.update', ['artist_id' => $artist->id])}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label">{{ trans('messages.name_title') }}</label>
                <div class="">
                    <input type="text" name="Artist[name]" class="form-control" value="@if(old('Artist.name')){{old('Artist.name')}}@else{{$artist->name}}@endif" required>
                    @if ($errors->has('Artist.name'))
                    <span class="help-block text-danger"><strong>{{ $errors->first('Artist.name') }}</strong></span>
                    @endif
                </div>
            </div>
            <div class="input-group form-group date" data-provide="datepicker">
                <label class="control-label">{{ trans('messages.dob_title') }}</label>
                <input type="text" class="form-control" id="datepicker" placeholder="{{ trans('messages.dob_title') }}" name="Artist[dob]" value="{{$artist->dob}}" readonly>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                </div>
                @if ($errors->has('Artist.dob'))
                <span class="help-block text-danger"><strong>{{ $errors->first('Artist.dob') }}</strong></span>
                @endif
            </div>
            <div class="form-group">
                <label class="control-label">{{ trans('messages.description_title') }}</label>
                <div class="">
                    <textarea type="text" name="Artist[information]" class="form-control" rows="5" required>@if(old('Artist.information')){{old('Artist.information')}}@else{{$artist->infomation}}@endif</textarea>
                    @if ($errors->has('Artist.information'))
                    <span class="help-block text-danger"><strong>{{ $errors->first('Artist.information') }}</strong></span>
                    @endif
                </div>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">{{ trans('messages.avatar_title') }}</span>
                </div>
                <div class="custom-file">
                    <input class="image_file" type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="Artist[avatar]" id="image_file">
                    <label class="custom-file-label" for="image_file" id="label_album_image">{{$artist->getOriginal('avatar')}}</label>
                </div>
            </div>
            @if ($errors->has('Artist.avatar'))
            <span class="help-block text-danger"><strong>{{ $errors->first('Artist.avatar') }}</strong></span>
            @endif
            <div>
                <output class="mt-2" id="result">
                    <div class="a">
                        <img src="{{$artist->avatar}}" alt="">
                    </div>
                </output>
            </div>
            <input type="submit" class="btn btn-primary mt-2" value="{{ trans('messages.submit_title') }}">
        </form>
    </div>
</div>
@endsection
@section('after-scripts')
<script src="{{url('template_admin/js/gijgo.min.js')}}" type="text/javascript"></script>
<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'dd-mm-yyyy'
    });
</script>
@endsection
