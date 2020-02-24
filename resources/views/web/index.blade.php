@extends('web.master')
@section('content')
<div class="inner-content">
    <div class="music-left">
        @include('web._partial.banner')
        <link href="{{url('web/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all">
        <script src="{{url("web/js/jquery.magnific-popup.js")}}" type="text/javascript"></script>
        <script>
            $(document).ready(function() {
                $('.popup-with-zoom-anim').magnificPopup({
                    type: 'inline',
                    fixedContentPos: false,
                    fixedBgPos: true,
                    overflowY: 'auto',
                    closeBtnInside: true,
                    preloader: false,
                    midClick: true,
                    removalDelay: 300,
                    mainClass: 'my-mfp-zoom-in'
                });
            });
        </script>		
        <!--//pop-up-box -->
        <div class="albums">
            <div class="tittle-head">
                <h3 class="tittle">{{ trans('messages.new_releases') }}<span class="new">{{ trans('messages.new') }}</span></h3>
                <div class="clearfix"></div>
            </div>
            <?php $i = 1; ?>
            @foreach($new_release_songs as $song)
            <div class="col-md-3 content-grid @if($i++%4 == 0) last-grid @endif">
                <a class="play-icon" href="#small-dialog"><img src="{{$song->image}}" title="allbum-name"></a>
                <a class="button play-icon" href="#small-dialog">{{$song->title}}</a>
            </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
        @include("web._partial.list_artist", [
            'artists' => $artists
        ])
    </div>
    @include('web._partial.music_right', ['top_20_songs' => $top_20_songs])
    <!--//music-right-->
    <div class="clearfix"></div>
    <!-- /w3l-agile-its -->
    @include('web._partial.wrapper')
</div>
@endsection
