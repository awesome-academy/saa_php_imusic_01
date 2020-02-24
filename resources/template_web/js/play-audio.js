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
