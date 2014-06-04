<script src="<?=Site::virtual_module() . get_class($this)?>/this.js"></script>
<link href="<?=Site::virtual_module() . get_class($this)?>/this.css" rel="stylesheet">

<h1>Izveidot/Rediģēt satura daļas</h1>
<div class="mgmt-left">
    <?=$this->GetModuleList()?>
</div>
<div class="mgmt-right">
    <button class="btn mgmt-new"> + Izveidot jaunu</button>
    <section class="mgmt-new-controls">
        <fieldset>
            <input placeholder="Moduļa nosaukums" class="input" type="text" id="mgmt-name" />
            <button class="btn mgmt-add">+</button>
            <input placeholder="Lapas virsraksts" class="input" type="text" id="mgmt-title" />
            <label class="mgmt-notification"></label>
        </fieldset>
    </section>
    <div class="mgmt-info"></div>
</div>