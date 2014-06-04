<?php
// en: Default template. Uses instance of preloaded modules and is cabaple of calling
// public functions of it. This template can be called either using static way via index 
// or asynchronous calls via phpAJAX core saving the needed instance of the module.
// lv: Noklusējuma šablons. Izmanto iepriekšielādētā moduļa instanci un ir spējīgs
// izsaukt publiskās moduļa funkcijas. Šo šablonu var izsaukt gan statiskā veidā caur
// index, gan asinhroni caur phpAJAX core saglabājot moduļu klases instanci.
//
// en: Example of calling module public function:
// lv: Piemērs moduļa statiskās funkcijas izsaukšanai:
//
//	en: $load - predefined instance of module
//	lv: $load - iepriekšdefinēta moduļa instance
//
//	$load->functionname();
//
// en: Also you can call here any static functions as you desire.
// lv: Tāpat protams iespējams izsaukt jebkuru statisku funkciju pēc nepieciešamības.
//
// en: ! jQuery is required for this framework !
// lv: ! jQuery ir obligāts !
// en: <meta url=""> is required for correct AJAX navigation!
// lv: <meta url=""> ir obligāts korektai AJAX navigācijai!
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?=ProjectConstants::TITLE_PREFIX?><?php $load->title(); ?></title>
        <meta url="<?=Site::base_url().Site::URL_PREFIX.get_class($load)?>" />
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width" />
        <script src="<?=Site::base_url()?>core/include/jquery-1.10.2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?=Site::css_url()?>default/main.css" />
    </head>
    <body>
        <div class="page-top-content">
            <?php if (UserManager::GetUserAccessLevel() >= AccessLevels::ADMIN_ACCESS_LEVEL){ ?>
                <div class="AdminPanel btn">
                    <a onclick="ajaxRequestCore('AdminFeedback')">Atsauksmes</a> |
                    <a onclick="ajaxRequestCore('AdminPage')">Administratora Lapa</a> |
                    <a onclick="ajaxRequestCore('AdminUsers')">Lietotāju kontrole</a> |
                    <?php if (UserManager::GetUserAccessLevel() >= AccessLevels::DEVELOPER_ACCESS_LEVEL){ ?>
                    <a onclick="ajaxRequestCore('_DevContentMgmt')">Satura daļu pārvalde</a> |
                    <a onclick="ajaxRequestCore('_DevDataMgmt')">Datu abstrakcija</a>
                    <?php } ?>
                </div>
            <?php }?>
        </div>
        
        <div class="global-wrapper">
            <?php include Site::home_url() . 'core/registration/registration.view.php'; ?>
            <header class="header parrent">
                <div class="logo"></div>
                <div class="corner"></div>
                <section class="user-info">
                    <span class="user" style="display:none;"><?=UserManager::ActiveUserName()?> | </span>
                    <span><a class="nav-list logout-btn" style="display:none;">IZIET</a></span>
                    <span><a class="nav-list login-open-btn">PIESLĒGTIES</a></span>
                    <span><a class="nav-list reg-open-btn">REĢISTRĒTIES</a></span>
                </section>
                <nav class="nav">
                    <ul>
                        <li><a class="nav-list" onclick="ajaxRequestCore('Home')">MĀJAS</a></li>
                        <li><a class="nav-list" onclick="ajaxRequestCore('Contact')">ATSAUKSME</a></li>
                        <li><a class="nav-list" onclick="ajaxRequestCore('Download')">LEJUPIELĀDĒT</a></li>
                        <li class="expandable"><a class="nav-list" onclick="ajaxRequestCore('Documentation')">DOKUMENTĀCIJA</a>
                            <ul class="nav-submenu">
                                <li><a class="nav-list" onclick="ajaxRequestCore('Saturs')">Saturs</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-list" onclick="ajaxRequestCore('Safety')">DROŠĪBA</a></li>
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
                <span id="datetime"> - <?php echo date('Y', time()); ?> - </span>
                <section class="footer-logos">
                    <a href="https://netbeans.org/" target="__blank"><img src="<?=Site::base_url()?>templates/default/images/netbeans-logo.png" alt="NetBeans"/></a>
                    <a href="http://www.wampserver.com/" target="__blank"><img src="<?=Site::base_url()?>templates/default/images/wamp-logo.png" alt="WAMP"/></a>
                    <a href="http://www.mysql.com/products/workbench/" target="__blank"><img src="<?=Site::base_url()?>templates/default/images/workbench-logo.png" alt="MySQL Workbench"/></a>
                </section>
            </footer>
            <div class="clearfix"></div>
        </div>
		<?php
		// en: Required script for phpAJAX navigation. You can use use either AJAX function to load
		// modules or static url request to index.
		// lv: Skripts nepieciešams phpAJAX navigācijai. Moduļus var izsaukt gan lietojot AJAX funkciju
		// gan statisku url pieprasījumu us index
		//
		//	en: AJAX navigation example:
		//	lv: AJAX navigācijas piemērs:
		//
		//	en: ModuleName - Name of module you want to call: CaseSensitive!
		//	en: PageTitle - The title of the page you want to be displayed for current module
		//	lv: ModuleName - Moduļa nosaukums ko nepieciešams ielādēt. Reģistrjūtīgs!
		//	lv: PageTitle - Lapas nosaukums ko nepieciešams attēlot ielādējot moduli
		//	ajaxRequestCore('ModuleName','PageTitle')
		?>
                <script>__home = '<?=Site::base_url()?>';</script>
		<script src="<?=Site::base_url()?>js/main.js"></script>
    </body>
</html>
