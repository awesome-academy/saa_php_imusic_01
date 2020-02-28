@extends('admin.master')
@section('content')
@include('admin._partial.flash')
<h1 class="h3 mb-2 text-gray-800">{{ trans('messages.category_title') }}</h1>
<div class="card shadow mb-4">
    <div class="card-body">
        <form action="{{route('admin.category.update', ['category_id' => $category->id])}}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label pl-lg-4">{{ trans('messages.title_title') }}</label>
                <div class="">
                    <input type="text" name="Category[title]" class="form-control" value="@if(old('Category.title') != ""){{old('Category.title')}}@else{{$category->name}}@endif" required>
                    @if ($errors->has('Category.title'))
                    <span class="help-block text-danger">{{ $errors->first('Category.title') }}</span>
                    @endif
                </div>
            </div>
            <input type="submit" class="btn btn-primary mt-2" value="{{ trans('messages.submit_title') }}">
        </form>
    </div>
</div>
@endsection
