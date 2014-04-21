<?php //globālie mainīgie, kas tiek var tikt pielietoti JS skriptā ?>
<script>
    __home = '<?=Site::base_url()?>';
</script>
<script src="<?=Site::virtual_module() . get_class($this)?>/this.js"></script>
<link href="<?=Site::virtual_module() . get_class($this)?>/this.css" rel="stylesheet">

<?php //tālāk HTML: ?>

<div>
    <h3>phpAJAX</h3>
    <p>
        <span class="first"></span>... ir ārkārtīgi viegla un vienkārša platforma ātrai AJAX bāzētu WEB lapu izveidei
        izmantojot tikai PHP un jQuery. Šinī mājaslapā Jūs varat iepazīties ar platformas darbības
        principiem un atrast noderīgas pamācības.
    </p>
    <section class="presentation-section">
        <div class="tile">
            <img src="<?=Site::virtual_module()?>Home/img/ajax-jquery.jpg" alt="AJAX" />
            <span>AJAX ir tehnoloģija kas ļauj asinhroni sūtīt un saņemt datus, kā arī
            parezi izmantojot izsaukt servera puses metodes nepārlādējot lappuse, vai pat
            vispār lietotājam to nemaz nemanot</span>
        </div>
        <div class="tile">
            <img src="<?=Site::virtual_module()?>Home/img/ajax-jquery.jpg" alt="AJAX" />
            <span>AJAX ir tehnoloģija kas ļauj asinhroni sūtīt un saņemt datus, kā arī
            parezi izmantojot izsaukt servera puses metodes nepārlādējot lappuse, vai pat
            vispār lietotājam to nemaz nemanot</span>
        </div>
        <div class="tile">
            <img src="<?=Site::virtual_module()?>Home/img/ajax-jquery.jpg" alt="AJAX" />
            <span>AJAX ir tehnoloģija kas ļauj asinhroni sūtīt un saņemt datus, kā arī
            parezi izmantojot izsaukt servera puses metodes nepārlādējot lappuse, vai pat
            vispār lietotājam to nemaz nemanot</span>
        </div>
        <div class="tile">
            <img src="<?=Site::virtual_module()?>Home/img/ajax-jquery.jpg" alt="AJAX" />
            <span>AJAX ir tehnoloģija kas ļauj asinhroni sūtīt un saņemt datus, kā arī
            parezi izmantojot izsaukt servera puses metodes nepārlādējot lappuse, vai pat
            vispār lietotājam to nemaz nemanot</span>
        </div>
    </section>
</div>