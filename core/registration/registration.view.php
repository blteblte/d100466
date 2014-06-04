<link rel="stylesheet" type="text/css" href="<?=Site::base_url()?>core/registration/registration.css">

<div class="registration-popup registration" style="display:none">
    <span class="reg-close-btn"><img src="<?=Site::base_url()?>core/registration/img/close.png" alt="AIZVĒRT" /></span>
    <form method="post" id="registration-form">
        <fieldset class="first">
            <label for="reg-uname">Lietotājvārds: </label>
            <input class="input" type="text" id="reg-uname" name="reg-uname" /><br />
            <label class="error" for="reg-uname"></label><br />
            
            <label for="reg-email">E-pasts: </label>
            <input class="input" type="email" id="reg-email" name="reg-email" /><br />
            <label class="error" for="reg-email"></label><br />

            <label for="reg-pw">Parole: </label>
            <input class="input" type="password" id="reg-pw" name="reg-pw" /><br />
            <label class="error" for="reg-pw"></label><br />

            <label for="reg-pw-c">Apstiprināt paroli: </label>
            <input class="input" type="password" id="reg-pw-c" /><br />
            <label class="error" for="reg-pw-c"></label><br />
            
            <label class="error" for="reg-submit-btn"></label><br />
            <button id="reg-submit-btn" class="btn" type="submit">PIESLĒGTIES</button>
        </fieldset>
    </form>
    <div class="reg-logo"></div>
</div>

<div class="registration-popup login" style="display:none">
    <span class="login-close-btn"><img src="<?=Site::base_url()?>core/registration/img/close.png" alt="AIZVĒRT" /></span>
    <form method="post" id="login-form">
        <fieldset class="second">
            <label for="login-uname">Lietotājvārds: </label>
            <input class="input" type="text" id="login-uname" name="login-uname" /><br />
            <label class="error" for="login-uname"></label><br />

            <label for="login-pw">Parole: </label>
            <input class="input" type="password" id="login-pw" name="login-pw" /><br />
            <label class="error" for="login-pw"></label><br />
            
            <label class="error" for="login-submit-btn"></label><br />
            <button id="login-submit-btn" class="btn" type="submit">PIESLĒGTIES</button>
        </fieldset>
    </form>
    <div class="reg-logo"></div>
</div>

<script> $(function(){ ___user_is_registered = "<?=UserManager::UserIsLogedIn()?>";}); </script>
<script> $(function(){ __username = "<?=UserManager::ActiveUserName()?>";}); </script>
<script src="<?=Site::base_url()?>core/registration/registration.js" type="text/javascript"></script>
