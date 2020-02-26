<div class="contact">
    @if($lyric)
    <div class="contact-right1" style="width: 100%; margin-top: 20px">
        <h3><span>{{$song->title}}</span></h3>
        <pre style="background: #444; color: white; outline: none; border: none;">{{$lyric->content}}</pre>
        <h4>{{ trans('messages.by') }} {{$lyric->user->name}}</h4>
    </div>
    <div class="clearfix"> </div>
    @else
    <div class="clearfix"> </div>
    <h4 style="color: #777;">{{ trans('messages.no_lyric') }}</h4>
    @endif
    @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    @foreach($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
        @endforeach
    @if( ($lyric != null && !$lyric->is($user_lyric)) || $lyric == null)
    <div style="margin-top: 10px;">
        <div id="lyric_box" style="display:none;">
            <form action="" method="post" id="frm_lyric_box">
                {{ csrf_field() }}
                <input type="hidden" name="lyric_song_id" id="lyric_song_id" value="{{$song->id}}">
                <textarea class="form-control" required="" minlength="3" id="lyric_content" name="lyric_content" rows="10">@if($user_lyric){{$user_lyric->content}}@endif</textarea>
                <input type="submit" class="form-control btn btn-primary submit-form-lyric" value="Submit" style="margin-top:10px;" data-url="@if(!$user_lyric){{route('lyric.create')}}@else{{route('lyric.update', ['lyric_id' => $user_lyric->id])}}@endif">
            </form>
        </div>
        <button class="btn btn-primary" id="btn_add_lyric" style="margin-top: 10px;">@if($user_lyric) {{ trans('messages.see_your_lyric') }} @else {{ trans('messages.add_lyric') }} @endif</button>
        @if($user_lyric)
        <button class="btn btn-danger submit-form-lyric" id="btn_delete_lyric" style="margin-top: 10px; display: none;" data-url="{{route('lyric.delete', ['lyric_id' => $user_lyric->id])}}">{{ trans('messages.delete_title') }}</button>
        @endif
        <button class="btn btn-warning" style="display: none; margin-top: 10px;" id="btn_cancel_lyric">{{ trans('messages.cancel_title') }}</button>
    </div>
    @endif
</div>
<script>
    $("#btn_add_lyric").click(function (){
        $("#lyric_box").slideDown();
        $("#btn_cancel_lyric").show();
        $("#btn_delete_lyric").show();
        $("#btn_add_lyric").hide();
    });
    
    $("#btn_cancel_lyric").click(function (){
        $("#lyric_box").slideUp();
        $("#btn_add_lyric").show();
        $("#btn_cancel_lyric").hide();
        $("#btn_delete_lyric").hide();
    });

    $(".submit-form-lyric").click(function (e){
        e.preventDefault();
        route = $(this).attr('data-url');
        $("#frm_lyric_box").attr('action', route);
        $("#frm_lyric_box").submit();
    })
</script>
