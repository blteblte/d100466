<?php //globālie mainīgie, kas tiek var tikt pielietoti JS skriptā ?>
<script>
    __home = '<?=Site::base_url()?>';
</script>
<script src="<?=Site::virtual_module() . get_class($this)?>/this.js"></script>

<?php //tālāk HTML: ?>

    <!-- MODULE CONTENT -->
    <div class="tab-content">    
        <div id="tab2" class="tab-pane fade in">
            <h4>Saturs <span title="iespējamas izmaiņas gan izkārtojumā gan struktūrā" style="cursor: help">*</span></h4>
            <ul>
                <li>Ievads</li>
                <li>Anotācija</li>
                <li><u>Teorētiskā daļa</u></li>
                <ul>
                    <li>Mājaslapas, to veidi un veidošanas iespējas</li>
                    <li>Prasības pret mājaslapām, jeb ko sagaida pasūtītājs un ko sagaida gala lietotājs</li>
                    <li>Mūsdienu tehnoloģijas mājaslapu un WEB projektu veidošanā</li>
                    <li>Online resursu izmantošana</li>
                    <li>Izvēlamies PHP, kapēc?</li>
                    <li>MySQL un PHP</li>
                    <li>CSS, dizains. Dažādu interneta pārlūku problēma</li>
                    <li>jQuery</li>
                    <li>AJAX nozīmīgums un aktualitāte</li>
                    <ul>
                        <li>Navigācija</li>
                        <li>Pārraidīto datu apjoms</li>
                    </ul>
                    <li>Drošība</li>
                    <ul>
                        <li>Kas jāzin par SQL injekcijām</li>
                        <li>Cross-site scripting (XSS)</li>
                        <li>Kāpēc nedrīks lietotājam atļaut injecēt HTML kodu? Kā no tā izvairīties?</li>
                        <li>Autentifikācijas un sesiju menedžments</li>
                        <li>Kāpēc ir svarīga kļūdu apstrāde?</li>
                        <li>Phishing. Apmācām un informējam savus lietotājus</li>
                    </ul>
                </ul>
                <li><u>Praktiskā daļa</u></li>
                <ul>
                    <li>AJAX balstītas platformas izveide</li>
                    <li>Programprodukta specifikācija</li>
                    <li>Funkcionalitāte</li>
                    <li>Dokumentācija</li>
                    <li>Drošība</li>
                </ul>
                <li>Secinājumi</li>
            </ul>
        </div>
    </div>
