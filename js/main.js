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
    


