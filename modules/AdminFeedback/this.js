CommentControl = {
    Delete: function(id){
        ajaxRequest(false, function(response){
            if (response == 1) { $('#fb_'+id).fadeOut(200); console.log(response) }
        }, "AdminFeedback", "DeleteComment", "&comment_id=" + id, undefined);
    }
};

$(function(){
    setTimeout(function(){$('.page-content').fadeIn(300, function(){
            $(this).parent().animate({width: "800px", marginLeft: "0px"});
    });}, 300);
    
});