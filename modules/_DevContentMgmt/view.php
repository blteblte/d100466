<script src="<?=Site::base_url()?>core/include/codemirror.js"></script>
<script src="<?=Site::base_url()?>core/include/markdown.js"></script>
<script src="<?=Site::base_url()?>core/include/xml.js"></script>
<script src="<?=Site::base_url()?>core/include/javascript.js"></script>
<script src="<?=Site::base_url()?>core/include/css.js"></script>
<script src="<?=Site::base_url()?>core/include/htmlmixed.js"></script>
<link rel="stylesheet" type="text/css" href="<?=Site::base_url()?>core/include/codemirror.css" />

<script src="<?=Site::virtual_module() . get_class($this)?>/this.js"></script>
<link href="<?=Site::virtual_module() . get_class($this)?>/this.css" rel="stylesheet">

<h1>Moduļu pārvaldīšana</h1>
<div class="mgmt-left">
    <?=$this->GetModuleList()?>
</div>
<div class="mgmt-right">
    <button class="btn mgmt-new"> + Izveidot jaunu</button>
    <section class="mgmt-new-controls">
        <fieldset>
            <input placeholder="Modula nosaukums" class="input" type="text" id="mgmt-name" />
            <button class="btn mgmt-add">+</button>
            <input placeholder="Lapas virsraksts" class="input" type="text" id="mgmt-title" />
            <label class="mgmt-notification"></label>
        </fieldset>
    </section>
    <div class="mgmt-info"></div>
</div>
<div class="mgmt-edit">
    <textarea id="mgmt-view-edit"></textarea>
    <button class="btn mgmt-view-submit">SAGLABAT</button>
</div>