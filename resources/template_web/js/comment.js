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
                update_link = result.data.update_link;
                update_title = result.data.update_title;
                content_comment_id = result.data.content_comment_id;

                array_data = {
                    comment_content: comment_content, 
                    comment_created_at: comment_created_at, 
                    user_avatar: user_avatar, 
                    user_name: user_name, 
                    delete_link: delete_link, 
                    delete_title: delete_title, 
                    update_link: update_link, 
                    update_title: update_title ,
                    content_comment_id : content_comment_id
                };
                comment = createComment(array_data);
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

function createComment(array_data) {
    comment_div = '<div class="comment_div"><div class="media-left response-text-left"><a href="#"><img class="media-object" src="' + array_data.user_avatar +'" alt="" style="width: 100px;"></a><h5><a href="#">' + array_data.user_name + '</a></h5></div><div class="media-body response-text-right"><p id="' + array_data.content_comment_id +'">' + array_data.comment_content + '</p><ul><li>' + array_data.comment_created_at + '</li></ul><a class="delete-comment" href = "javascript:void(0)"data-url="' + array_data.delete_link + '" style="float: right;" onclick="deleteComment(this)">' + array_data.delete_title + '</a>' + '<a class="edit-comment" href="javascript:void(0)" data-url="' + array_data.update_link +'" style="float: right;" onclick="showUpdateCommentForm(this)" data-content = "' + array_data.comment_content + '" data-content-id = "#' + array_data.content_comment_id +'">' + array_data.update_title +'| </a>' + '</div></div>';
    
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

function showUpdateCommentForm(e){
    $("#modalEditComment").toggle();
    $("#route_update_comment").attr('data-url', $(e).attr('data-url'));
    $("#route_update_comment").attr('data-content-id', $(e).attr('data-content-id'));
    $("#comment_update_content").text($(e).attr('data-content'));
}

$("#submit_update_comment").click(function (e){
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: $("#route_update_comment").attr('data-url'),
        data: {comment_content : $("#comment_update_content").val()},
        success: function(result){
            content_id = $("#route_update_comment").attr('data-content-id');
            $(content_id).text(result.data.comment_content);
            $("#modalEditComment").toggle();
        },
        error: function(data){
            console.log(data);
        }
    });
});