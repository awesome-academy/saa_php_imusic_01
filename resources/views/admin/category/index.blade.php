@extends('admin.master')
@section('content')
<h1 class="h3 mb-2 text-gray-800">{{ trans('messages.category_title') }}</h1>
@include('admin._partial.flash')
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>{{ trans('messages.title_title') }}</th>
                        <th style="width: 30%;">{{ trans('messages.action_title') }}</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>{{ trans('messages.title_title') }}</th>
                        <th>{{ trans('messages.action_title') }}</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td> 
                            <a href="{{route('admin.category.edit', ['category_id' => $category->id])}}" class="btn btn-warning" title="Edit"> <i class="fas fa-pencil-alt"></i></a>
                            <a href="{{route('admin.category.delete', ['category_id' => $category->id])}}" class="btn btn-danger confirm-delete" title="Delete">
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
@section('after-scripts')
<script>
    $(".confirm-delete").click(function (e) {
        e.preventDefault();
        href = $(this).attr('href');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.href = href;
            }
        })
    })
</script>
@endsection
