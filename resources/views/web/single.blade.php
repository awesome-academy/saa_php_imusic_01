@extends('web.master')
@section('content')
<div class="inner-content single">
    <!--/music-right-->
    
    <div class="tittle-head">
        <h3 class="tittle">Single <span class="new">Page</span></h3>
        <div class="clearfix"> </div>
    </div>
    <div>
        <div class="col-md-6 player" style="background: #777;">
            <div class="audio-player">
                <audio id="audio-player"  controls="controls">
                    <source src="{{$song->link}}" type="audio/mpeg"></source>
                </audio>
            </div>
            <!---->
            <script type="text/javascript">
                $(function(){
                    $('#audio-player').mediaelementplayer({
                        alwaysShowControls: true,
                        features: ['playpause','progress','volume'],
                        audioVolume: 'horizontal',
                        iPadUseNativeControls: true,
                        iPhoneUseNativeControls: true,
                        AndroidUseNativeControls: true
                    });
                });
            </script>

            <ul class="next-top">
                <li><a class="ar" href="#"> <img src="{{url('web/images/arrow.png')}}" alt=""/></a></li>
                <li><a class="ar2" href="#"><img src="{{url('web/images/arrow2.png')}}" alt=""/></i></a></li>
            </ul>	
        </div>
        <div class="col-md-6">
            @include('web._partial.rating', [
                'rating' => $rating
            ])
            <span> <i class="lnr lnr-heart"></i> <i class="fa fa-headphones" aria-hidden="true">{{$song->count}}</i></span>
        </div>
    </div>
    
    
    {{-- <div class="single_left">
        <!-- /agileinfo -->
    </div> --}}
    <div class="response" style="width: 100%!important;">
        <h4>Bình luận</h4>
        
        @if(count($comments) == 0)
        <p>Chưa có bình luận nào cho ca khúc này</p>
        @else
        <div class="media response-info">
            @foreach($comments as $comment)
            <div class="media-left response-text-left">
                <a href="#">
                    <img class="media-object" src="web/images/c1.jpg" alt="">
                </a>
                <h5><a href="#">Username</a></h5>
            </div>
            <div class="media-body response-text-right">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <ul>
                    <li>Sep 21, 2015</li>
                    <li><a href="single.html">Reply</a></li>
                </ul>
                
            </div>
            <div class="clearfix"> </div>
            @endforeach
        </div>
        @endif
        
    </div>
    <!-- /agileits -->
    <div class="clearfix"> </div>
    <!--//music-right-->
    
    @include('web._partial.comment', [
        'username' => auth('web')->user()->name
    ])
</div>
@endsection
@section('after-scripts')
<script>
    $(document).ready(function(){
        audioPlayer();
    });
    function audioPlayer(){
        $("#audio-player")[0].play();
    }
</script>
@endsection
