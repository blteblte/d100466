<?php //global string variables used in script ?>
<script>
    __home = '<?=Site::base_url()?>';
</script>
<script src="<?=Site::virtual_module()?>AdminUsers/this.js"></script>
<link href="<?=Site::virtual_module()?>AdminUsers/this.css" rel="stylesheet">

<?php //html ?>

<h4>Lietotāju administrācija</h4>
<p>
    Šis ir tikai piemērs!
</p>
<section class="users-table">
    <div class="row table-header">
        <span>Lietotājvārds</span>
        <span>E-pasts</span>
        <span>Alias</span>
        <span>Vārds</span>
        <span>Uzvārds</span>
        <span>Reģistrācijas datums</span>
    </div>
    <hr />
    <?=$this->RenderUsersTableRows()?>
</section>