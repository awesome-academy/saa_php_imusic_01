<div class="coment-form">
    <h4>{{ trans('messages.comment_with_name', ['name' => $user->name]) }}</h4>
    <form action="#" method="post">
        {{ csrf_field() }}
        <input type="hidden" value="{{$user->id}}" id="comment_user_id" name="comment_user_id">
        <input type="hidden" value="{{$commentable_id}}" id="commentable_id" name="commentable_id">
        <input type="hidden" value="{{$commentable_type}}" id="commentable_type" name="commentable_type">
        <input type="hidden" data-url="{{route('comment.create')}}" id="route_create_comment">
        <textarea onfocus="this.value = '';" required="" minlength="3" id="comment_content" name="comment_content">{{ trans('messages.your_comment') }}</textarea>
        <input type="submit" value="{{ trans('messages.comment_title') }}" id="submit_comment">
    </form>
</div>
<div class="modal fade in" id="modalEditComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabe2" aria-hidden="false">
    <div class="modal-dialog" role="document" style="width:40%;">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
            </div>
            <div class="modal-body modal-spa">
                <form action="#" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" data-url="" id="route_update_comment">
                    <textarea class="form-control" required="" minlength="3" id="comment_update_content" name="comment_update_content">{{ trans('messages.your_comment') }}</textarea>
                    <p class="inform"></p>
                    <input class="btn" type="submit" value="{{ trans('messages.comment_title') }}" id="submit_update_comment">
                </form>
            </div>
        </div>
    </div>
</div>
@section('after-scripts')
<script src="{{url('web/js/comment.js')}}"></script>
@endsection
