
DataMgmt = {
    
    Button: $('.mgmt-new'),
    Controls: $('.mgmt-new-controls'),
    Input: $('#mgmt-name'),
    Title: $('#mgmt-title'),
    Notification: $('.mgmt-notification'),
    SubmitBtn: $('.mgmt-add'),
    Dir: $('.mgmt-dir'),
    Info: $('.mgmt-info'),
    NewCol: $('.data-new-col'),
    
    InitControls: function(){
        this.Button.click(function(){
            if (!DataMgmt.Controls.hasClass('visible')) DataMgmt.Controls.addClass('visible').fadeIn(300);
            else DataMgmt.Controls.removeClass('visible').fadeOut(200);
        });
        
        this.SubmitBtn.click(function(e){
            e.preventDefault();
            return DataMgmt.SubmitData();
        });
        
        this.Input.focus(function(){
            $(this).removeClass('mgmt-error');
        });
        
        this.Dir.click(function(){
            var html = 'Abstrakcijas izmantošana:<br/><br/>$obj = new ';
            DataMgmt.Info.html(html + $(this).html() + '($this->db());');
        });
        
        this.NewCol.click(function(){
            DataMgmt.CreateNewColFields(this);
        });
    },
    
    CreateNewColFields: function($el){
        var _html = "";
        var _new_html = '<p class="add-new-col"><span class="btn data-new-col">+</span></p>';
        
        $($el).parent().html(_html);
        $($el).parent().append(_new_html);
    },
    
    SubmitData: function(){
        
        return false;
    },
    
    CreateNewAbstraction: function(){
        ajaxRequest(false, function(response){
            
            if (response == 1) {
                ajaxRequestCore('_DevDataMgmt');
            }
            else{
                DataMgmt.Info.html(response).show();
            }
            
        }, '_DevDataMgmt', 'AddNewDataAbstraction' ,
        '', $('#data-abstraction-form'));
    }
};

$(function(){
    setTimeout(function(){$('.page-content').fadeIn(300, function(){
            $(this).parent().animate({width: "1200px", marginLeft: "-200px"});
    });}, 300);
    
    DataMgmt.InitControls();
});

