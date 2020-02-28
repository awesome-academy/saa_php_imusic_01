@extends('admin.master')
@section('content')
<?php use Illuminate\Support\Facades\Config; 
$status_define = \Config::get('constants.status');
?>
<h1 class="h3 mb-2 text-gray-800">{{ trans('messages.lyric_title') }}</h1>
@include('admin._partial.flash')
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('admin.lyric.update', ['lyric_id' => $lyric->id])}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label">{{ trans('messages.lyric_title') }}</label>
                <div>
                    <textarea class="form-control" cols="30" rows="20" name="lyric_content" readonly>{{$lyric->content}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">{{ trans('messages.status_title') }}</label>
                <div>
                    <?php $old_status = old('status') ?? $lyric->status; ?>
                    <select name="status" id="" class="form-control">
                        @foreach ($status_define as $key => $value)
                        <option value="{{$value}}" @if($value == $old_status) selected @endif>{{$key}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="submit" class="btn btn-primary mt-2" value="{{ trans('messages.submit_title') }}">
        </form>
    </div>
</div>
@endsection
