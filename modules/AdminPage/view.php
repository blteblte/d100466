<?php //globālie mainīgie, kas tiek var tikt pielietoti JS skriptā ?>
<script>
    __home = '<?=Site::base_url()?>';
</script>
<script src="<?=Site::virtual_module()?>Home/this.js"></script>
<link href="<?=Site::virtual_module()?>Home/this.css" rel="stylesheet">

<?php //tālāk HTML: ?>

<div>
    <h3>This Page Is Is Accessible only to registered users</h3>
</div>