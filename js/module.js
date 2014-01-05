$(document).ready(function() {
    ajaxRequest('getTable');
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
    
    function fillTable(data) {
        if (data.data.length > 0) {
            
            var _html = '<table id="user-list-table" class="table table-hover"><thead>';
                _html+='<th id="user-list-table-id">ID</th><th id="user-list-table-nick">Nick</th><th id="user-list-table-value">Value</th>'
                        +'<th class="user-list-table-glyph"></th><th class="user-list-table-glyph"></th></thead><tbody>';
                
                $.each(data.data, function(index, val){
                    _html += '<tr><td>' +val.user_id+'</td><td>'+val.user_name+'</td><td>'+val.user_value+'</td>'
                        +'<td><span onclick="return showModal(\'edit\', '+val.user_id+', \''+val.user_name+'\', '+val.user_value+')" class="glyph-btn-edit glyphicon glyphicon-edit clickable"></span></td>'
                        +'<td><span onclick="return callConfirmationDialog(\'deleteItem\', '+val.user_id+')" class="glyph-btn-delete glyphicon glyphicon-remove clickable"></span></td></tr>';
                });
                
                _html += '</tbody></table><div class="clearfix"></div>';
        }
        else {
            _html = 'empty data';
        }
        
        
        $("#content").html(_html);
        return false;
    }
    
    function showModal (action, id, nick, value) {
        if (action === "edit"){
            $('#player_modal_title').html('REDIĢĒT SPĒLĒTĀJU');
            $('#player_id').val(id);
            $('#nick').val(nick);
            $('#value').val(value);
        }
        else{
            $('#player_modal_title').html('IZVEIDOT JAUNU SPĒLĒTĀJU');
            $('#player_id').val(0);
            $('#nick').val('');
            $('#value').val('');
        }
        $("#player_edit_modal").modal('show');
        return false;
    }
    
    function save_modal() {
        if ($('#player_id').val() === '0') {
            ajaxSerialize('addPlayer');
        }
        else {
            ajaxSerialize('editPlayer');
        }
    }
    
    function callConfirmationDialog(action, id){
        if (action === 'deleteItem') {$('#dialog_id').val(id); $('#confirmation_dialog').modal('show');}
    }
    
    function deleteItem(){
        var id = $('#dialog_id').val();
        ajaxRequest('deleteItem', id);
    }

