<?php //globālie mainīgie, kas tiek var tikt pielietoti JS skriptā ?>
<script>
    __home = '<?=Site::base_url()?>';
</script>
<script src="<?=Site::virtual_module() . get_class($this)?>/this.js"></script>
<link href="<?=Site::virtual_module() . get_class($this)?>/this.css" rel="stylesheet">

<?php //tālāk HTML: ?>

<div>
    <h3>Lejupielādēt phpAJAX</h3>
    <p>phpAJAX ir bezmaksas projekta sagatave ko atļauts lejupielādēt ikvienam</p>
    <section>
        <a href="https://github.com/blteblte/d100466" target="__blank">
            <div class="download-btn">
                <p>Skatīt izejas kodu</p>
                <p>un LEJUPIELĀDĒT no github.com</p>
            </div>
        </a>
    </section>
</div>