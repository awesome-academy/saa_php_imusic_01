$(".toggle_favourite").click(function(){
    status = parseInt($(this).attr('data-status'));
    song_id = $(this).attr('data-song-id');
    if (status == 0) {
        route = $(this).attr('data-url-add');
    } else {
        route = $(this).attr('data-url-delete');
    }
    var e = $(this);
    console.log(route);
    $.ajax({
        type: 'POST',
        url: route,
        data: {song_id : song_id},
        success: function(result){
            if(result.success == true)
            {
                $("#icon_heart").toggleClass('red');
                new_status = (parseInt(status) + 1) % 2;
                e.attr('data-status', new_status);
            }
        },
        error: function(data){
        }
    });
});
