
Mgmt = {
    
    Button: $('.mgmt-new'),
    Controls: $('.mgmt-new-controls'),
    Input: $('#mgmt-name'),
    Title: $('#mgmt-title'),
    Notification: $('.mgmt-notification'),
    SubmitBtn: $('.mgmt-add'),
    Dir: $('.mgmt-dir'),
    Info: $('.mgmt-info'),
    
    InitControls: function(){
        this.Button.click(function(){
            if (!Mgmt.Controls.hasClass('visible')) Mgmt.Controls.addClass('visible').fadeIn(300);
            else Mgmt.Controls.removeClass('visible').fadeOut(200);
        });
        
        this.SubmitBtn.click(function(){
            Mgmt.SubmitModule();
        });
        
        this.Input.focus(function(){
            $(this).removeClass('mgmt-error');
        });
        
        this.Dir.click(function(){
            var html = 'Lai grieztos pie šī moduļa izsauc sekojošu funkciju klikšķa notikumā:<br/><br/>ajaxRequestCore(\'';
            Mgmt.Info.html(html + $(this).html() + '\');');
        });
    },
    
    SubmitModule: function(){
        var err = '<ul>';
        var regex = /^[A-Z_][a-zA-Z_\d]*$/i;
        this.Input.val(this.Input.val().charAt(0).toUpperCase() + this.Input.val().slice(1));
        
        if (!this.Input.val().match(regex))
        {
            err += "<li>Izmanto tikai angļu burtus, ciparus un apakšsvītru!</li>"
                 +  "<li>Nedrīkst sākties ar ciparu!</li>";
            
        }
        if (this.Input.val().length < 4)
        {
            err += "<li>Minimālais moduļa nosaukuma garums ir 4 simboli!</li>";
        }
        err += '</ul>';
        this.Notification.html(err);
        
        if (err != '<ul></ul>')
        {
            this.Notification.fadeIn(300);
            this.Input.addClass('mgmt-error');
        }
        else
        {
            this.CreateNewModule();
        }
    },
    
    CreateNewModule: function(){
        ajaxRequest(false, function(response){
            
            if (response == 1) {
                ajaxRequestCore('_DevContentMgmt');
            }
            else{
                Mgmt.Info.html(response).show();
            }
            
        }, '_DevContentMgmt', 'AddNewModule' ,
        '&M=' + this.Input.val() +
        '&T=' + this.Title.val(), undefined);
    }
};

$(function(){
    setTimeout(function(){$('.page-content').fadeIn(300, function(){
            $(this).parent().animate({width: "1200px", marginLeft: "-200px"});
    });}, 300);
    
    Mgmt.InitControls();
});

