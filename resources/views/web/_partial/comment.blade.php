<div class="coment-form">
    <h4>{{ trans('messages.comment_with_name', ['name' => $username]) }}</h4>
    <form action="#" method="post">
        <textarea onfocus="this.value = '';" required="">{{ trans('messages.your_comment') }}</textarea>
        <input type="submit" value="Submit Comment">
    </form>
</div>
