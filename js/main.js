function ajaxRequestCore (module){
        var thisurl = __home + "?module=" + module;
        var url = '';
        var DOM;
            $.ajax({ type: "GET",
                     url: thisurl,
                     async: false,
                     success : function(text)
                     {
                         DOM = $('<div>' + text + '</div>');
                         var title = DOM.find('title').html();
                         url = DOM.find('meta[url]').attr('url');
                         window.history.replaceState("page_" + title, title, url);
                         document.title = title;
                         
                         var element = '.page-content';
                         var $content = $(element);
                         
                        $content.hide(0, function(){
                            $content.html( DOM.find(element).html() );
                        });
                        console.log(thisurl + " | " + url);
                        if (thisurl != url) {$('.registration-popup.login').slideDown(400);}
                     }
            });
    }
    
    function ajaxRequest (async, callback, module, command, get, form){
        var thisurl = __home + "core/async/do.php?module="+module+"&command="+command+get;
        var type, data;


        if (form !== undefined) {
            data = form.serialize();
            type = "POST";
        }
        else {
            data = {data:JSON.stringify({hash:window.location.hash})};
            type = "GET";
        }

        $.ajax({
                async: async,
                dataType: "json",
                type: type,
                url: thisurl,
                data: data,
                success: callback
        });
        return false;
    }
    


