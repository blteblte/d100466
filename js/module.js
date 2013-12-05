$(document).ready(function() {
    ajaxRequest('getTable');
});

function ajaxRequest (action){
        var thisurl = "";
        if (action === 'getTable') thisurl = __home + "core/async/do.php?module=Module&command=functionname";

        $.ajax({
                dataType: "json",
                type: "POST",
                url: thisurl,
                data:{data:JSON.stringify({hash:window.location.hash})},
                success: function(data, textStatus, jqXHR) {
                    if (action === 'getTable') {fillTable(data);}
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
                        +'<td><span onclick="return showModal()" class="glyph-btn-edit glyphicon glyphicon-edit clickable"></span></td>'
                        +'<td><span class="glyph-btn-delete glyphicon glyphicon-remove clickable"></span></td></tr>';
                });
                
                _html += '</tbody></table><div class="clearfix"></div>';
        }
        else {
            _html = 'empty data';
        }
        
        
        $("#content").html(_html);
        return false;
    }
    
    function showModal () {
        
        $("#user_edit_modal").modal('show');
        return false;
    }

