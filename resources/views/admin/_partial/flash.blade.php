@if (Session::has('error'))
    <div class="alert alert-danger flash-alert in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h5>Error</h5>
        <p>{!! session('error') !!}</p>
    </div>
    <?php Session::forget('error')?>
@endif

@if (Session::has('success'))
    <div class="alert alert-success flash-alert in">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h5>Success</h5>
        <p>{!! session('success') !!}</p>
    </div>
    <?php Session::forget('success')?>
@endif