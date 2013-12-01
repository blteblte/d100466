
function ajaxRequestCore (action){
        var thisurl = "";
        if (action === 'action') thisurl = "/LatInSoft/core/async/do.php?module=Module&command=functionname";

        $.ajax({
                dataType: "json",
                type: "POST",
                url: thisurl,
                data:{data:JSON.stringify({hash:window.location.hash})},
                success: function(data, textStatus, jqXHR) {
                    if (action === 'action') {}
                }
        });
        
        return false;
    }
    


