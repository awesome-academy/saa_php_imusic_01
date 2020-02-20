@extends('web.master')
@section('content')
<div class="inner-content single">
    <!--/music-right-->
    
    <div class="tittle-head">
        <h3 class="tittle">Album <span class="new">Page</span></h3>
        <div class="clearfix"> </div>
    </div>
    <div class="single_left">
        <!--/video-main-->
        <div class="video-main">
            <div class="video-record-list">
                <div id="jp_container_1" class="jp-video jp-video-270p" role="application" aria-label="media player">
                    <div class="jp-type-playlist">
                        <div id="jquery_jplayer_1" class="jp-jplayer" style="width: 480px; height: 270px;"><img id="jp_poster_0" src="web/video/play1.png" style="width: 480px; height: 270px; display: inline;"><video id="jp_video_0" preload="metadata" src="http://192.168.30.9/vijayaa/2015/Dec/mosaic/web/video/Ellie-Goulding.webm" title="1. Ellie-Goulding" style="width: 0px; height: 0px;"></video></div>
                        <div class="jp-gui">
                            <div class="jp-video-play" style="display: block;">
                                <button class="jp-video-play-icon" role="button" tabindex="0">play</button>
                            </div>
                            <div class="jp-interface">
                                <div class="jp-progress">
                                    <div class="jp-seek-bar" style="width: 100%;">
                                        <div class="jp-play-bar" style="width: 0%;"></div>
                                    </div>
                                </div>
                                <div class="jp-current-time" role="timer" aria-label="time">00:00</div>
                                <div class="jp-duration" role="timer" aria-label="duration">00:18</div>
                                <div class="jp-controls-holder">
                                    <div class="jp-controls">
                                        <button class="jp-previous" role="button" tabindex="0">previous</button>
                                        <button class="jp-play" role="button" tabindex="0">play</button>
                                    </div>
                                    <div class="jp-volume-controls">
                                        <button class="jp-mute" role="button" tabindex="0">mute</button>
                                        <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value" style="width: 100%;"></div>
                                        </div>
                                    </div>
                                    <div class="jp-toggles">
                                        
                                        <button class="jp-full-screen" role="button" tabindex="0">full screen</button>
                                    </div>
                                </div>
                                <div class="jp-details" style="display: none;">
                                    <div class="jp-title" aria-label="title">1. Ellie-Goulding</div>
                                </div>
                            </div>
                        </div>
                        <div class="jp-playlist">
                            <ul style="display: block;"><li class="jp-playlist-current"><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item jp-playlist-current" tabindex="0">1. Ellie-Goulding <span class="jp-artist">by Pixar</span></a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="0">2. Mark-Ronson-Uptown <span class="jp-artist">by Pixar</span></a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="0">3. Ellie-Goulding <span class="jp-artist">by Pixar</span></a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="0">4. Maroon-Sugar <span class="jp-artist">by Pixar</span></a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="0">5. Pharrell-Williams <span class="jp-artist">by Pixar</span></a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="0">6. Ellie-Goulding <span class="jp-artist">by Pixar</span></a></div></li><li><div><a href="javascript:;" class="jp-playlist-item-remove" style="display: none;">×</a><a href="javascript:;" class="jp-playlist-item" tabindex="0">7. Pharrell-Williams <span class="jp-artist">by Pixar</span></a></div></li></ul>
                        </div>
                        <div class="jp-no-solution" style="display: none;">
                            <span>Update Required</span>
                            To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- script for play-list -->
        
        <script type="text/javascript" src="web/js/jquery.jplayer.min.js"></script>
        <script type="text/javascript" src="web/js/jplayer.playlist.min.js"></script>
        <script type="text/javascript">
            //<![CDATA[
            $(document).ready(function(){
                
                new jPlayerPlaylist({
                    jPlayer: "#jquery_jplayer_1",
                    cssSelectorAncestor: "#jp_container_1"
                }, [
                
                {
                    title:"1. Ellie-Goulding",
                    artist:"",
                    mp4: "web/video/Ellie-Goulding.mp4",
                    ogv: "web/video/Ellie-Goulding.ogv",
                    webmv: "web/video/Ellie-Goulding.webm",
                    poster:"web/video/play1.png"
                },
                {
                    title:"2. Mark-Ronson-Uptown",
                    artist:"",
                    mp4: "web/video/Mark-Ronson-Uptown.mp4",
                    ogv: "web/video/Mark-Ronson-Uptown.ogv",
                    webmv: "web/video/Mark-Ronson-Uptown.webm",
                    poster:"web/video/play2.png"
                },
                {
                    title:"3. Ellie-Goulding",
                    artist:"",
                    mp4: "web/video/Ellie-Goulding.mp4",
                    ogv: "web/video/Ellie-Goulding.ogv",
                    webmv: "web/video/Ellie-Goulding.webm",
                    poster:"web/video/play1.png"
                },
                {
                    title:"4. Maroon-Sugar",
                    artist:"",
                    mp4: "web/video/Maroon-Sugar.mp4",
                    ogv: "web/video/Maroon-Sugar.ogv",
                    webmv: "web/video/Maroon-Sugar.webm",
                    poster:"web/video/play4.png"
                },
                {
                    title:"5. Pharrell-Williams",
                    artist:"",
                    mp4: "web/video/Pharrell-Williams.mp4",
                    ogv: "web/video/Pharrell-Williams.ogv",
                    webmv: "web/video/Pharrell-Williams.webm",
                    poster:"web/video/play5.png"
                },
                {
                    title:"6. Ellie-Goulding",
                    artist:"",
                    mp4: "web/video/Ellie-Goulding.mp4",
                    ogv: "web/video/Ellie-Goulding.ogv",
                    webmv: "web/video/Ellie-Goulding.webm",
                    poster:"web/video/play1.png"
                },
                {
                    title:"7. Pharrell-Williams",
                    artist:"",
                    mp4: "web/video/Pharrell-Williams.mp4",
                    ogv: "web/video/Pharrell-Williams.ogv",
                    webmv: "web/video/Pharrell-Williams.webm",
                    poster:"web/video/play5.png"
                }
                ], {
                    swfPath: "../../dist/jplayer",
                    supplied: "webmv,ogv,mp4",
                    useStateClassSkin: true,
                    autoBlur: false,
                    smoothPlayBar: true,
                    keyEnabled: true
                });
                
            });
            //]]>
        </script>
        <!-- //script for play-list -->
        <!--//video-main-->
        <!-- /agileinfo -->
    </div>
    <div class="response">
        <h4>Responses</h4>
        <div class="media response-info">
            <div class="media-left response-text-left">
                <a href="#">
                    <img class="media-object" src="web/images/c1.jpg" alt="">
                </a>
                <h5><a href="#">Username</a></h5>
            </div>
            <div class="media-body response-text-right">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
                                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
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
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,There are many variations of passages of Lorem Ipsum available, 
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                        <ul>
                                            <li>Jan 20, 2016</li>
                                            <li><a href="single.html">Reply</a></li>
                                        </ul>		
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <!-- /agileits -->
                            <div class="clearfix"></div>
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