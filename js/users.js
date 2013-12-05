$(document).ready(function() {
    ajaxRequest('getUsers');
});

function ajaxRequest (action){
        var thisurl = "";
        if (action === 'getUsers') thisurl = __home + "core/async/do.php?module=Users&command=getusers";

        $.ajax({
                dataType: "json",
                type: "POST",
                url: thisurl,
                data:{data:JSON.stringify({hash:window.location.hash})},
                success: function(data, textStatus, jqXHR) {
                    if (action === 'getUsers') {fillUsersTable(data);}
                }
        });
        
        return false;
    }
    
    function fillUsersTable(data) {
        if (data.data.length > 0) {
            
            var _html = '<table id="user-list-table" class="table table-hover"><thead>';
                _html+='<th id="user-list-table-id">ID</th><th id="user-list-table-nick">Nick</th><th>Name</th><th>Surname</th><th>User Created</th>'
                       +'<th>Last Activity</th><th>Type</th>'
                        +'<th class="user-list-table-glyph"></th><th class="user-list-table-glyph"></th></thead><tbody>';
                
                $.each(data.data, function(index, val){
                    _html += '<tr><td>' +val.id+'</td><td>'+val.nick+'</td><td>'+val.name+'</td>'
                            +'<td>'+val.surname+'</td><td>'+val.created+'</td><td>'+val.activity+'</td>'
                            +'<td>'+val.type+'</td>'
                        +'<td><span onclick="return showModal()" class="glyph-btn-edit glyphicon glyphicon-edit clickable"></span></td>'
                        +'<td><span class="glyph-btn-delete glyphicon glyphicon-remove clickable"></span></td></tr>';
                });
                
                _html += '</tbody></table><div class="clearfix"></div>';
        }
        else {
            _html = 'empty data';
        }
        
        $("#users_table").html(_html);
        return false;
    }
    
    function showModal () {
        
        $("#user_edit_modal").modal('show');
        return false;
    }

