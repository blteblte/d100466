

$(function(){
    $('.reg-close-btn').click(function(){
        $('.registration-popup.registration').slideUp(400);
    });
    $('.reg-open-btn').click(function(){
        $('.registration-popup.registration').slideDown(400);
    });
    
    $('.login-close-btn').click(function(){
        $('.registration-popup.login').slideUp(400);
    });
    $('.login-open-btn').click(function(){
        $('.registration-popup.login').slideDown(400);
    });
    
    $('#reg-submit-btn').bind('click', function(){
        return submitRegistration();
    });
    
    $('#login-submit-btn').bind('click', function(){
        return submitLogin();
    });
    
    $('.logout-btn').bind('click', function(){
        return UserLogout();
    });
    
    $('.registration-popup form fieldset input').bind('focus', function(){
        $('.registration-popup fieldset label[for='+$(this).attr("id")+'].error').html('').fadeOut(300);
    });
    
    if (___user_is_registered){
        $('.user-info .user').fadeIn(300);
        $('.reg-open-btn, .login-open-btn').hide(0, function(){
            $('.logout-btn').fadeIn(300);
        });
    }
});

    function showError($el, txt){
        $('.registration-popup fieldset label[for='+$el.attr("id")+'].error').text(txt).fadeIn(300);
        return false;
    }
    
    function regexEmail(email) { 
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
    
    function UserLogout(){
        
            $.ajax({
                type: "POST",
                url: __home + "core/async/do.php?system=true&sysmodule=registration"
                        + "&module=registration&command=Logout",
                success: function(){
                    
                    $('.user-info .user').fadeOut(200, function(){
                        $('.user-info .user').html('');
                    });
                    $('.logout-btn').fadeOut(200, function(){
                        $('.reg-open-btn, .login-open-btn').fadeIn(300);
                    });
                }
            });
            
        return false;
    }
    
    function submitLogin(){
        var valid = true;
        valid = validateUserName(valid, 'login');
        valid = validateLoginPWFast(valid);
        
        if (valid)
        {
            $.ajax({
                    async: false,
                    dataType: "json",
                    type: "POST",
                    url: __home + "core/async/do.php?system=true&sysmodule=registration"
                        + "&module=registration&command=VerifyUser&login=1",
                    data: $('#login-form').serialize(),
                    success: function(response) {
                        if (response.success == 1) {
                            $('.registration-popup').slideUp(400, function(){
                                $('.user-info .user').text(response.username + ' | ').fadeIn(300);
                                $('.reg-open-btn, .login-open-btn').hide(0, function(){
                                    $('.logout-btn').fadeIn(300);
                                });
                                ajaxRequestCore('Home', 'Mājas');
                            });
                        }
                        else {
                            $('.registration-popup form fieldset label[for=login-submit-btn]')
                                    .html('Pieslēgšanā nav izdevusies, lūdzu mēģiniet vēlreiz!')
                                    .fadeIn(300, function(){
                                        setTimeout(function(){
                                            $('.registration-popup form fieldset label[for=login-submit-btn]').fadeOut(300);
                                        }, 6000);
                                    });
                        }
                    }
                });
        }
        
        return false;
    }
    
    function validateLoginPWFast(valid){
        var $el = $('.registration-popup form fieldset #login-pw');
        var pw = $el.val();
        
        if (pw == '')
        {
            valid = showError($el, 'Šis lauks ir obligāts!');
        }
        else
        {
            if (pw.length < 5) valid = showError($el, 'Parolei ir jābūt vismaz 5 simbolus garai!');
        }
        return valid;
    }
    
    function submitRegistration(){
        var valid = true;
            valid = validateUserName(valid, 'reg');
            valid = validateEmail(valid);
            valid = validatePasswords(valid);
            
            if (valid){
                
                $.ajax({
                    async: false,
                    dataType: "json",
                    type: "POST",
                    url: __home + "core/async/do.php?system=true&sysmodule=registration"
                        + "&module=registration&command=RegisterNewUser",
                    data: $('#registration-form').serialize(),
                    success: function(response) {
                        if (response == 1) {
                            $('.registration-popup').slideUp(400, function(){
                                $('.user-info .user').text($('.registration-popup form fieldset #reg-uname').val()) + ' | '.fadeIn(300);
                                $('.reg-open-btn, .login-open-btn').hide(0, function(){
                                    $('.logout-btn').fadeIn(300);
                                });
                                ajaxRequestCore('Home', 'Mājas');
                            });
                        }
                        else {
                            $('.registration-popup form fieldset label[for=reg-submit-btn]')
                                    .html('Reģistrēšanās nav izdevusies, lūdzu mēģiniet vēlreiz!')
                                    .fadeIn(300, function(){
                                        setTimeout(function(){
                                            $('.registration-popup form fieldset label[for=reg-submit-btn]').fadeOut(300);
                                        }, 6000);
                                    });
                        }
                    }
                });
            }
            
        return false;
    }
    
    function validateUserName(valid, action){
        var $el = $('.registration-popup form fieldset #'+action+'-uname');
        var uname = $el.val();
        
        if (uname == '')
        {
            valid = showError($el, 'Šis lauks ir obligāts!');
        }
        else
        {
            if (uname.length < 5){
                valid = showError($el, 'Lietotājvārdam jābūt vismaz 5 simbolus garam!');
            }
            else
            {
                $.ajax({
                    async: false,
                    type: "GET",
                    url: __home + "core/async/do.php?system=true&sysmodule=registration"
                        + "&module=registration&command=CheckIfUnameIsFree&uname=" + uname,
                    success: function(response) {
                        if (response != 1)
                        {
                            if (action == 'reg') valid = showError($el, 'Atvainojiet, bet šis lietotājvārds jau ir aizņemts!');
                            else if (action == 'login') {
                                valid = true;
                            }
                        }
                        else
                        {
                            if (action == 'login') {
                                valid = showError($el, 'Šāda lietotāja mūsu datubāzē nav!');
                            }
                        }
                    },
                    error: function(){valid = false;}
                });
            }
        }
        return valid;
    }
    
    function validateEmail(valid){
        var $el = $('.registration-popup form fieldset #reg-email');
        var email = $el.val();
        if (email == '') {
            valid = showError($el, 'Šis lauks ir obligāts!');
        }
        else
        {
            if (regexEmail(email))
            {
                $.ajax({
                    async: false,
                    type: "GET",
                    url: __home + "core/async/do.php?system=true&sysmodule=registration"
                        + "&module=registration&command=CheckIfEmailIsFree&email=" + email,
                    success: function(response) {
                        if (response != 1) {
                            valid = showError($el, 'Atvainojiet, bet šī e-pasta adrese jau ir aizņemta!');
                        }
                    },
                    error: function(){valid = false;}
                });
            }
            else
            {
                valid = showError($el, 'Lūdzu ievadiet derīgu e-pasta adresi!');
            }
        }
        return valid;
    }
    
    function validatePasswords(valid){
        var $pw1 = $('.registration-popup fieldset #reg-pw');
        var $pw2 = $('.registration-popup fieldset #reg-pw-c');
        
        var pw1 = $pw1.val();
        var pw2 = $pw2.val();
        
        if (pw2 != pw1) {
            valid = showError($pw2, 'Parolēm ir jāsakrīt!');
        }
        
        if (pw1 == '')
        {
            valid = showError($pw1, 'Šis lauks ir obligāts!');
        }
        else
        {
            if (pw1.length < 5) {
                valid = showError($pw1, 'Parolei ir jābūt vismaz 5 simbolus garai!');
            }
        }
        return valid;
    }
