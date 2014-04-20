function ajaxRequestCore (module, title){
        var thisurl = __home + "?module=" + module;
        var DOM;
            $.ajax({ type: "GET",
                     url: thisurl,
                     async: false,
                     success : function(text)
                     {
                         window.history.replaceState("page_" + title, title, thisurl);
                         document.title = title;
                         
                         var element = '.page-content';
                         var $content = $(element);
                         
                        $content.hide(0, function(){
                            DOM = $('<div>' + text + '</div>');
                            $content.html( DOM.find(element).html() );
                        });
                     }
            });
    }
    


