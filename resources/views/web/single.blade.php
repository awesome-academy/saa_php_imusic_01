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
                    <source src="web/media/Blue Browne.ogg" type="audio/ogg"></source>
                    <source src="web/media/Blue Browne.mp3" type="audio/mpeg"></source>
                    <source src="web/media/Georgia.ogg" type="audio/ogg"></source>
                    <source src="web/media/Georgia.mp3" type="audio/mpeg"></source>
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
            <!--audio-->
            <!---->
            
            
            <!--//-->
            <ul class="next-top">
                <li><a class="ar" href="#"> <img src="{{url('web/images/arrow.png')}}" alt=""/></a></li>
                <li><a class="ar2" href="#"><img src="{{url('web/images/arrow2.png')}}" alt=""/></i></a></li>
                
            </ul>	
        </div>
        <div class="col-md-6">
            @include('web._partial.rating')
        </div>
    </div>
    
    
    {{-- <div class="single_left">
        <!-- /agileinfo -->
    </div> --}}
    <div class="response" style="width: 100%!important;">
        <h4>Responses</h4>
        
        <div class="media response-info">
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
        </div>
    </div>
    <!-- /agileits -->
    <div class="clearfix"> </div>
    <!--//music-right-->
    
    <div class="coment-form">
        <h4>Leave your comment</h4>
        <form action="#" method="post">
            <input type="text" value="Name " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
            <input type="email" value="Email (will not be published)*" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email (will not be published)*';}" required="">
            <input type="text" value="Website" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Website';}" required="">
            <textarea onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your Comment...';}" required="">Your Comment...</textarea>
            <input type="submit" value="Submit Comment">
        </form>
    </div>
</div>
@endsection
