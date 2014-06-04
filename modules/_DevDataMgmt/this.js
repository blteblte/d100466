
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
        var _html = '<p>'
                    +'<input placeholder="Lauka nosaukums" class="input" type="text" name="data-pk" />'
                    +'<select placeholder="Datu tips" class="input" type="text" name="data-type">'
                        +'<option value="BIT">BIT</option>'
                        +'<option value="TINYINT">TINYINT</option>'
                        +'<option value="SMALLINT">SMALLINT</option>'
                        +'<option value="MEDIUMINT">MEDIUMINT</option>'
                        +'<option value="INT" selected="selected">INT</option>'
                        +'<option value="INTEGER">INTEGER</option>'
                        +'<option value="BIGINT">BIGINT</option>'
                        +'<option value="REAL">REAL</option>'
                        +'<option value="DOUBLE">DOUBLE</option>'
                        +'<option value="FLOAT">FLOAT</option>'
                        +'<option value="DECIMAL">DECIMAL</option>'
                        +'<option value="NUMERIC">NUMERIC</option>'
                        +'<option value="DATE">DATE</option>'
                        +'<option value="TIME">TIME</option>'
                        +'<option value="TIMESTAMP">TIMESTAMP</option>'
                        +'<option value="DATETIME">DATETIME</option>'
                        +'<option value="YEAR">YEAR</option>'
                        +'<option value="CHAR">CHAR</option>'
                        +'<option value="VARCHAR">VARCHAR</option>'
                        +'<option value="BINARY">BINARY</option>'
                        +'<option value="VARBINARY">VARBINARY</option>'
                        +'<option value="TINYBLOB">TINYBLOB</option>'
                        +'<option value="BLOB">BLOB</option>'
                        +'<option value="MEDIUMBLOB">MEDIUMBLOB</option>'
                        +'<option value="LONGBLOB">LONGBLOB</option>'
                        +'<option value="TINYTEXT">TINYTEXT</option>'
                    +'</select>'
                    +'<input placeholder="Izmērs" class="input data-size" type="text" name="data-size" />'
                +'</p>';
        //var _new_html = '<p class="add-new-col"><span class="btn data-new-col">+</span></p>';
        
        $($el).parent().prepend(_html);
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

