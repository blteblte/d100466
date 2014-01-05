<?php //global string variables used in script ?>
<script>
    __home = '<?=Site::base_url()?>';
</script>
<script src="<?=Site::js_url()?>module.js"></script>
<link href="<?=Site::css_url()?>content_css/module.css" rel="stylesheet">

<?php //html ?>

    <!-- MODULE CONTENT -->
    <div class="tab-content">
        <div id="tab1" class="tab-pane fade in active">
            <h4>default.view.php</h4>
            <p>
            A home page, index page, or main page is a page on a website. A Home Page usually refers to:
            </p>
            <ul>
                <li>
                    The initial or main web page of a website, sometimes called the "front page" (by analogy with newspapers).
                </li>
                <li>
                    The first page that appears upon opening a web browser program, which is also sometimes called the start page.
                    This 'start page' can be a website or it can be a page with various browser functions such as the visual display
                    of websites that are often visited in the web browser.
                </li>
                <li>
                    The web page or local file that automatically loads when a web browser starts or when the browser's "home" 
                    button is pressed; this is also called a "home page". The user can specify the URL of the page to be loaded, 
                    or alternatively choose e.g. to re-load the most recent web page browsed.
                </li>
                <li>
                    A personal web page, for example at a web hosting service or a university web site, that typically is stored
                    in the home directory of the user.
                </li>
                <li>
                    In the 1990s the term was also used to refer to a whole web site, particularly a personal web site.
                </li>
            </ul>
            <p>
            A home page can also be used outside the context of websites, such as to refer to the principal screen of a user interface,
            which is also referred to as a home screen on mobile devices such as cell phones.
            </p>
        </div>
    
            <div id="tab2" class="tab-pane fade in">
                <button class="btn btn-default" onclick="return showModal()">Pievienot spēlētāju</button>
                <div id="content"></div>
            </div>
        </div>
