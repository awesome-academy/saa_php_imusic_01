@extends('web.master')
@section('content')
<div class="inner-content single">
    <div class="tittle-head">
        <h3 class="tittle">Album <span class="new">Page</span></h3>
        <div class="clearfix"> </div>
    </div>
    
    <div class="single_left" style="width: 45%;">
        <div id="jquery_jplayer_1" class="jp-jplayer" style="width: 0px; height: 0px;">
            <img id="jp_poster_0" style="width: 0px; height: 0px; display: none;"><audio id="jp_audio_0" preload="metadata" src="http://jplayer.org/audio/m4a/Miaow-07-Bubble.m4a" title="Bubble"></audio>
        </div>
        <div class="col-md-12 player" style="background: #777; width:100%;">
            <div class="audio-player" id="jquery_jplayer_1">
                <audio id="audio-player"  controls="controls">
                <source src="{{$songs->first()->link}}" type="audio/mpeg"></source>
                </audio>
            </div>
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
        <div class="video-main">
            <div class="video-record-list">
                <div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
                    <div class="jp-type-playlist">
                        <div id="jquery_jplayer_1" class="jp-jplayer" >
                            <audio id="audio-player"  controls="controls">
                                <source src="{{$songs->first()->link}}" type="audio/mpeg"></source>
                            </audio>
                        </div>
                        {{-- <div class="jp-gui">
                            <div class="jp-video-play" style="display: block;">
                                <button class="jp-video-play-icon" role="button" tabindex="0">play</button>
                            </div>
                            <div class="jp-interface">
                                <div class="jp-progress">
                                    <div class="jp-seek-bar" style="width: 100%;">
                                        <div class="jp-play-bar" style="width: 0%;"></div>
                                    </div>
                                </div>
                
                            </div>
                        </div> --}}
                        <div class="jp-gui jp-interface">
                            <div class="jp-volume-controls">
                                <button class="jp-mute" role="button" tabindex="0">mute</button>
                                <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                                <div class="jp-volume-bar">
                                    <div class="jp-volume-bar-value" style="width: 80%;"></div>
                                </div>
                            </div>
                            <div class="jp-controls-holder">
                                <div class="jp-controls">
                                    <button class="jp-previous" role="button" tabindex="0">previous</button>
                                    <button class="jp-play" role="button" tabindex="0">play</button>
                                    <button class="jp-stop" role="button" tabindex="0">stop</button>
                                    <button class="jp-next" role="button" tabindex="0">next</button>
                                </div>
                                <div class="jp-progress">
                                    <div class="jp-seek-bar" style="width: 100%;">
                                        <div class="jp-play-bar" style="width: 2.97671%;"></div>
                                    </div>
                                </div>
                                <div class="jp-current-time" role="timer" aria-label="time">00:05</div>
                                <div class="jp-duration" role="timer" aria-label="duration">02:56</div>
                                <div class="jp-toggles">
                                    <button class="jp-repeat" role="button" tabindex="0">repeat</button>
                                    <button class="jp-shuffle" role="button" tabindex="0">shuffle</button>
                                </div>
                            </div>
                        </div>
                        <div class="jp-playlist">
                            <ul style="display: block;">
                                <?php $i = 1; ?>
                                @foreach ($songs as $song)
                                <li class=" @if($i == 1)jp-playlist-current @endif">
                                    <div>
                                        <a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a>
                                        <a href="javascript:;" class="jp-playlist-item  @if($i == 1)jp-playlist-current @endif" tabindex="0"  @if($i == 1) style="background-color: #45B39D!important; color:black!important;" @endif>{{$i++}}. {{$song->title}}  <span class="jp-artist">by @foreach($song->artists as $artist) {{$artist->name}}@endforeach</span></a>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        {{-- <div class="jp-no-solution" style="display: none;">
                            <span>Update Required</span>
                            To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        
        
        <script type="text/javascript" src="web/js/jquery.jplayer.min.js"></script>
        <script type="text/javascript" src="web/js/jplayer.playlist.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                
                new jPlayerPlaylist({
                    jPlayer: "#jquery_jplayer_1",
                    cssSelectorAncestor: "#jp_container_1"
                }, [
                
                {
                    title:"1. Ellie-Goulding",
                    artist:"",
                    mp3: "web/video/Blue Browne.mp3",
                },
                {
                    title:"2. Ellie-Goulding",
                    artist:"",
                    mp3: "web/video/Blue Browne.mp3",
                },
                ], {
                    swfPath: "../../dist/jplayer",
                    supplied: "mp3",
                    useStateClassSkin: true,
                    autoBlur: false,
                    smoothPlayBar: true,
                    keyEnabled: true
                });
                
            });
        </script>
    </div>
    <div class="response" style="width: 55%;">
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
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="web/images/c2.jpg" alt="">
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>Apr 17, 2016</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>		
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="media response-info">
            <div class="media-left response-text-left">
                <a href="#">
                    <img class="media-object" src="web/images/c3.jpg" alt="">
                </a>
                <h5><a href="#">Username</a></h5>
            </div>
            <div class="media-body response-text-right">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <ul>
                    <li>May 21,2016</li>
                    <li><a href="single.html">Reply</a></li>
                </ul>		
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="media response-info">
            <div class="media-left response-text-left">
                <a href="#">
                    <img class="media-object" src="web/images/c4.jpg" alt="">
                </a>
                <h5><a href="#">Username</a></h5>
            </div>
            <div class="media-body response-text-right">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <ul>
                    <li>Mar 28, 2016</li>
                    <li><a href="single.html">Reply</a></li>
                </ul>
                <div class="media response-info">
                    <div class="media-left response-text-left">
                        <a href="#">
                            <img class="media-object" src="web/images/c5.jpg" alt="">
                        </a>
                        <h5><a href="#">Username</a></h5>
                    </div>
                    <div class="media-body response-text-right">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <ul>
                            <li>Feb 19, 2016</li>
                            <li><a href="single.html">Reply</a></li>
                        </ul>		
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="media response-info">
            <div class="media-left response-text-left">
                <a href="#">
                    <img class="media-object" src="web/images/c6.jpg" alt="">
                </a>
                <h5><a href="#">Username</a></h5>
            </div>
            <div class="media-body response-text-right">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                <ul>
                    <li>Jan 20, 2016</li>
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
</div>
@endsection
