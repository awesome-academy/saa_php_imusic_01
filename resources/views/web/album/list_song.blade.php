@extends('web.master')
@section('content')
<div class="single_left" style="width: 45%;">
    <div id="jp_container_1">
        <div class="jp-type-playlist1">
            <div>
                <div class="col-md-12 player" style="background: #777; width:100%;">
                    <div class="audio-player" id="jquery_jplayer_1">
                        <audio id="audioPlayer"  controls="controls">
                            <source src="" type="audio/mpeg"></source>
                        </audio>
                    </div>
                    <script type="text/javascript">
                        $(function(){
                            $('#audioPlayer').mediaelementplayer({
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
                        <li><a class="ar" href="#" onclick="previousSong()"> <img src="{{url('web/images/arrow.png')}}" alt="" /></a></li>
                        <li><a class="ar2" href="#" onclick="nextSong()"><img src="{{url('web/images/arrow2.png')}}" alt="" /></i></a></li>
                    </ul>
                </div>
            </div>
            
            <div>
                <div class="jp-playlist" style="margin-top : 20px">
                    <ul style="display: block;">
                        <?php $i = 1; ?>
                        @foreach ($songs as $song)
                        <li>
                            <div class="jp-playlist-item1">
                                <a href="{{$song->link}}" class="song-item @if($i == 1)jp-playlist-current1 @endif" tabindex="0">{{$i++}}. {{$song->title}}  <span class="jp-artist">by @foreach($song->artists as $artist) {{$artist->name}}@endforeach</span></a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</div>

<div class="response" style="width: 52%;">
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
<div class="clearfix"></div>
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

<script>
    var currentSong = 0;
    $(document).ready(function(){
        audioPlayer();
    });
    
    function audioPlayer(){
        $("#audioPlayer")[0].src = $("a.song-item")[0];
        $("#audioPlayer")[0].play();
        $("#audioPlayer")[0].addEventListener("ended", function(){
            currentSong++;
            if(currentSong == $("a.song-item").length){
                currentSong = 0;
            }
            $("a.song-item")[currentSong].click();
            
        });
        $("a.song-item").click(function(e){
            e.preventDefault();
            $("#audioPlayer")[0].src = this;
            $("#audioPlayer")[0].play();
            $("a.song-item").removeClass("jp-playlist-current1");
            $(this).addClass("jp-playlist-current1");
        });
    }
    
    function nextSong(){
        currentSong++;
        if(currentSong == $("a.song-item").length){
            currentSong = 0;
        }
        $("a.song-item")[currentSong].click();
    }

    function previousSong(){
        currentSong--;
        if(currentSong < 0){
            currentSong = 0;
        }
        $("a.song-item")[currentSong].click();
    }
</script>
@endsection
@section('after-styles')
<style>
    .jp-playlist-current1 {
        background-color: #45B39D!important;
        color:#fff!important;
    }
    .jp-playlist ul li {
        background: #222;
    }
    a.song-item {
        display: block;
        color: #999;
        font-size: 1.4em;
        padding: 13px 20px 16px 20px!important;
        text-decoration: none;
    }
    div.jp-playlist a:hover {
        color: #fff!important;
        background: #45B39D!important;
    }
    span.jp-artist {
        color: #fff;
    }
</style>
@endsection
