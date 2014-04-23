$(function(){
    $('.page-content').fadeIn(300);
});

function deleteUser(id){
    ajaxRequest(true, function(response) {
        if (response.data == 1){
            $('#user_'+id+', .option_'+id).fadeOut(400);
            $('#hr_'+id).fadeOut(400);
        }
    }, "AdminUsers", "DeleteUser", "&id="+id, undefined);
}

function showEditPanel(id){
    $('#user_'+id+', .option_'+id).fadeOut(200, function(){
        $('#edit_'+id+', .edit_option_'+id).fadeIn(200);
    });
}

function hideEditPanel(id){
    $('#edit_'+id+', .edit_option_'+id).fadeOut(200, function(){
        $('#user_'+id+', .option_'+id).fadeIn(200);
    });
}

function saveUserData(id){
    var data = [];
    data[0] = $('#username_'+id).val();
    data[1] = $('#email_'+id).val();
    data[2] = $('#nickname_'+id).val();
    data[3] = $('#fname_'+id).val();
    data[4] = $('#lname_'+id).val();
    data[5] = $('#user'+id+' .dt').html();
    
    ajaxRequest(true, function(response) {
        if (response.data == 1){
            $.each($('#user_'+id+' span'), function(index, val){
                $(val).text(data[index]);
            });
            hideEditPanel(id);
        }
    }, "AdminUsers", "EditUser",
              "&id="+id
            + "&username="+data[0]
            + "&email="+data[1]
            + "&nickname="+data[2]
            + "&fname="+data[3]
            + "&lname="+data[4]
    , undefined);
}