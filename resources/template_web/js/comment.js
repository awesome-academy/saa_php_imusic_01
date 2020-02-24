$("#submit_comment").click(function(e){
    e.preventDefault();
    comments();
});
function comments(){
    $.ajax({
        type: 'POST',
        url: $("#route_create_comment").attr('data-url'),
        data: {comment_user_id: $("#comment_user_id").val(), commentable_id: $("#commentable_id").val(), comment_content : $("#comment_content").val(), commentable_type : $("#commentable_type").val()},
        success: function(result){
            if(result.success == true){
                comment_content = result.data.comment_content;
                comment_created_at = result.data.comment_created_at;
                user_avatar = result.data.user_avatar;
                user_name = result.data.user_name;
                delete_link = result.data.delete_link;
                delete_title = result.data.delete_title;
                comment = createComment(comment_content, comment_created_at, user_avatar, user_name, delete_link, delete_title);
                insertComment(comment);
            }
            
        },
        error: function(data){
            console.log(data);
        }
    });
}
function insertComment(){
    $( "#comment_list_box" ).append( comment );
}

function createComment(content, comment_created_at, avatar, username, delete_link, delete_title) {
    comment_div = '<div class="comment_div"><div class="media-left response-text-left"><a href="#"><img class="media-object" src="' + avatar +'" alt=""></a><h5><a href="#">' + username + '</a></h5></div><div class="media-body response-text-right"><p>' + content + '</p><ul><li>' + comment_created_at + '</li></ul><a class="delete-comment" href = "javascript:void(0)"data-url="' + delete_link + '" style="float: right;" onclick="deleteComment(this)">' + delete_title + '</a></div></div>';
    return comment_div;
}

function deleteComment(e) {
    var parent = $(e).parents('.comment_div');
    $.ajax({
        type: 'POST',
        url: $(e).attr('data-url'),
        data: {},
        success: function(result){
            if (result.success == true){
                parent.hide();
            }
        },
        error: function(data){
            console.log(data);
        }
    });
}
