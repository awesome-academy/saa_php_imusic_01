@extends('web.master')
@section('content')
<div class="inner-content single">
    <div id="jquery_jplayer_1" class="jp-jplayer" style="width: 0px; height: 0px;"><img id="jp_poster_0" style="width: 0px; height: 0px; display: none;"><audio id="jp_audio_0" preload="metadata" src="http://jplayer.org/audio/m4a/Miaow-07-Bubble.m4a" title="Bubble"></audio></div>
    <div id="jp_container_1" class="jp-audio" role="application" aria-label="media player">
        <div class="jp-type-single">
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
                        <button class="jp-play" role="button" tabindex="0">play</button>
                        <button class="jp-stop" role="button" tabindex="0">stop</button>
                    </div>
                    <div class="jp-progress">
                        <div class="jp-seek-bar" style="width: 100%;">
                            <div class="jp-play-bar" style="width: 0%;"></div>
                        </div>
                    </div>
                    <div class="jp-current-time" role="timer" aria-label="time">00:00</div>
                    <div class="jp-duration" role="timer" aria-label="duration">-03:29</div>
                    <div class="jp-toggles">
                        <button class="jp-repeat" role="button" tabindex="0">repeat</button>
                    </div>
                </div>
            </div>
            <div class="jp-details">
                <div class="jp-title" aria-label="title">Bubble</div>
            </div>
            <div class="jp-no-solution" style="display: none;">
                <span>Update Required</span>
                To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
            </div>
        </div>
    </div>
</div>
<script>
    $('#jquery_jplayer_1').jPlayer({
 swfPath: '../dist/jplayer',
 solution: 'html, flash',
 supplied: 'm4a, oga',
 preload: 'metadata',
 volume: 0.8,
 muted: false,
 backgroundColor: '#000000',
 cssSelectorAncestor: '#jp_container_1',
 cssSelector: {
  videoPlay: '.jp-video-play',
  play: '.jp-play',
  pause: '.jp-pause',
  stop: '.jp-stop',
  seekBar: '.jp-seek-bar',
  playBar: '.jp-play-bar',
  mute: '.jp-mute',
  unmute: '.jp-unmute',
  volumeBar: '.jp-volume-bar',
  volumeBarValue: '.jp-volume-bar-value',
  volumeMax: '.jp-volume-max',
  playbackRateBar: '.jp-playback-rate-bar',
  playbackRateBarValue: '.jp-playback-rate-bar-value',
  currentTime: '.jp-current-time',
  duration: '.jp-duration',
  title: '.jp-title',
  fullScreen: '.jp-full-screen',
  restoreScreen: '.jp-restore-screen',
  repeat: '.jp-repeat',
  repeatOff: '.jp-repeat-off',
  gui: '.jp-gui',
  noSolution: '.jp-no-solution'
 },
 errorAlerts: false,
 warningAlerts: false
});


</script>
@endsection
