<!DOCTYPE html>
<html>
    <head>
        <title><?php $load->title(); ?></title>
        <meta charset="utf-8"> 
        <link href="<?=Site::css_url()?>default.css" rel="stylesheet">
        <link href="<?=Site::css_url()?>bootstrap-modal.css" rel="stylesheet">
        <link href="<?=Site::css_url()?>modal.css" rel="stylesheet">
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://cdnjs.cloudflare.com/ajax/libs/select2/3.4.4/select2.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/select2/3.4.4/select2.min.js"></script>
    </head>
    <body>
        
        <div class="super-global">MARTIN</div>
        
        <div class="global-wrapper">
            
            <div class="title-content">
                <div class="logo-content"><img src="<?=Site::img_url()?>logo.png" alt="logo"></div>
            </div>
            <div class="menu-content"><?php include ('default_menu.php'); ?></div>
            <div class="left-menu-content pull-left">MENU 1<br/>MENU 2<br/>MENU 3</div>
            
            <div class="module-content pull-right"><?php $load->renderHTML(); ?></div>
            <div class="clearfix"></div>
            <div class="footer-content"><hr /><?php echo date('Y', time()); ?></div>
        </div>
        
    </body>
</html>

<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

