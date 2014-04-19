

<!DOCTYPE html>
<html>
    <head>
        <title><?php $load->title(); ?></title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <script src="<?=Site::base_url()?>core/include/jquery-1.10.2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?=Site::css_url()?>default/main.css" />
    </head>
    <body>
        <div class="global-wrapper">
            <?php include Site::home_url() . 'core/registration/registration.view.php'; ?>
            <header class="header parrent">
                <div class="logo"><img src="<?=Site::css_url()?>default/images/dummy-logo.png" alt="dummy logo" /></div>
                <div class="corner"></div>
                <section class="user-info">
                    <span class="user" style="display:none;"><?=UserManager::ActiveUserName()?></span>
                    <span><a class="nav-list logout-btn" style="display:none;">IZIET</a></span>
                    <span><a class="nav-list login-open-btn">PIESLĒGTIES</a></span>
                    <span><a class="nav-list reg-open-btn">REĢISTRĒTIES</a></span>
                </section>
                <nav class="nav">
                    <ul>
                        <li><a class="nav-list" onclick="ajaxRequestCore('Home','Mājas')">MĀJAS</a></li>
                        <li class="expandable"><a class="nav-list">DOKUMENTĀCIJA</a>
                            <ul class="nav-submenu">
                                <li><a class="nav-list" onclick="ajaxRequestCore('Saturs','Saturs')">Saturs</a></li>
                                <li><a class="nav-list" onclick="ajaxRequestCore('Module','Modulis')">Module</a></li>
                                <li><a class="nav-list" onclick="ajaxRequestCore('AdminUsers','Lietotāju Administrēšana')">Users</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-list">DROŠĪBA</a></li>
                        <li><a class="nav-list">PIEMĒRI</a></li>
                        <li><a class="nav-list">LIETOŠANAS NOTEIKUMI</a></li>
                        <li><a class="nav-list">PAR AUTORU</a></li>
                        
                    </ul>
                </nav>
            </header>
            <div class="clearfix"></div>
                <div class="content parrent">
                    <div class="page-content" style="display:none">
			<?php $load->renderHTML(); ?>
                </div>
            </div>
            <footer class="footer parrent">
                <span id="datetime"><?php echo date('Y', time()); ?></span>
            </footer>
            <div class="clearfix"></div>
        </div>
		
		<script src="<?=Site::base_url()?>js/main.js"></script>
		
    </body>
</html>