Documentation = {
    InitInterface: function(){
        $('.doc-title').click(function(){
            var $el = $(this);
            
            if ($el.next().is(':visible')){
                $el.next().slideUp(200);
            }
            else{
                $('.doc-content').hide(0, function(){
                    setTimeout(function(){$el.next().slideDown(300);}, 5);
                });
            }
        });
    }  
};

$(function(){
    setTimeout(function(){$('.page-content').fadeIn(300, function(){
            $(this).parent().animate({width: "800px", marginLeft: "0px"});
    });}, 300);
    Documentation.InitInterface();
});