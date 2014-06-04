$(function(){
    setTimeout(function(){$('.page-content').fadeIn(300, function(){
            $(this).parent().animate({width: "800px", marginLeft: "0px"});
    });}, 300);
    $('#comment').focus(function(){$(this).removeClass('error-field');});
});

function addNewComment(){
    var comment = $('#comment').val();
    if (comment != ""){
        ajaxRequest(true, function(response) {
        if (response.data == 1){
            $('#output')
                    .text("Paldies! Jūsu atsauksme ir saņemta!")
                    .fadeIn(300);
            $('#comment').val('');
        }
        else if (response.data == -1){
            $('#output')
                    .html("<span class=\"txt-err\">Atvaino, bet atsauksmi var rakstīt tikai reģistrēti lietotāji!</span>")
                    .fadeIn(300);
        }
    }, "Contact", "AddNewComment",
              "&comment="+comment
    , undefined);
    }
    else{
        $('#comment').addClass('error-field');
    }
    
    
    
    return false;
}