$(function(){
    $('.page-content').fadeIn(300);
});


function ajaxRequest (action, id){
    var thisurl = "";
    if (action === 'getTable') thisurl = __home + "core/async/do.php?module=Module&command=functionname";
    if (action === 'deleteItem')thisurl = __home + "core/async/do.php?module=Module&command=deleteItem&id="+id;

    $.ajax({
            dataType: "json",
            type: "POST",
            url: thisurl,
            data:{data:JSON.stringify({hash:window.location.hash})},
            success: function(data, textStatus, jqXHR) {
                if (action === 'getTable') {fillTable(data);}
                if (action === 'deleteItem') {ajaxRequest('getTable'); $('#confirmation_dialog').modal('hide');}
            }
    });

    return false;
}
    
function ajaxSerialize (action){
    var thisurl = "";
    var form = "";
    
    if (action === 'editPlayer') {
        thisurl = __home + "core/async/do.php?module=Module&command=editPlayer";
        form = $('#player_edit_form').serialize();
    }
    //addPlayer
    if (action === 'addPlayer') {
        thisurl = __home + "core/async/do.php?module=Module&command=addPlayer";
        form = $('#player_edit_form').serialize();
    }
    
    $.ajax({
            dataType: "json",
            type: "POST",
            url: thisurl,
            data:form,
            success: function(data, textStatus, jqXHR) {
                if (action === 'editPlayer') {ajaxRequest('getTable'); $("#player_edit_modal").modal('hide');}
                if (action === 'addPlayer') {ajaxRequest('getTable'); $("#player_edit_modal").modal('hide');}
            }
    });
    
    return false;
}
    

