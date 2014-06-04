<script src="<?=Site::virtual_module() . get_class($this)?>/this.js"></script>
<link href="<?=Site::virtual_module() . get_class($this)?>/this.css" rel="stylesheet">

<h4>Lietotāju administrācija</h4>
<section class="users-table">
    <div class="row table-header">
        <span>Lietotājvārds</span>
        <span>E-pasts</span>
        <span>Alias</span>
        <span>Vārds</span>
        <span>Uzvārds</span>
        <span>Piekļuves ID</span>
        <span>Reģistrējies</span>
    </div>
    <hr />
    <?=$this->RenderUsersTableRows()?>
</section>