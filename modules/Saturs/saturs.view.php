<?php //globālie mainīgie, kas tiek var tikt pielietoti JS skriptā ?>
<script>
    __home = '<?=Site::base_url()?>';
</script>
<script src="<?=Site::virtual_module()?>Home/this.js"></script>

<?php //tālāk HTML: ?>

    <!-- MODULE CONTENT -->
    <div class="tab-content">
        <div id="tab1" class="tab-pane fade in active">
            <h4>Par darbu:</h4>
            <p>
                Darba galvenais mērķis ir sniegt iespēju tā lasītājam vieglāk saprast dinamiskas
                mājaslapas veidošanas paņēmienus balstoties uz reāliem piemēriem.
            </p>
            <p>
                Darbs sastāv no divām daļām:
                <ul>
                    <li>Teorētiskā daļa</li>
                    <li>Praktiskā daļa</li>
                </ul>
            </p>
            <p>
                <strong>Teorētiskā daļa</strong> iekļaus sevī vispārēju aprakstu par mūsdienīgām
                mājaslapas veidošanas tehnoloģijām, kā nepieļaut ļoti vienkārši pielaižamas
                kļūdas kas spēj apdraudēt mājaslapas datu drošību, kā var zīmēt dinamisku datu grafikus
                un tamlīdzīgi.
            </p>
            <p>
                <strong>Praktiskā daļa</strong> iekļaus sevī pašu mājas lapu. Mājaslapa ietvers
                sevī realizētus piemērus dažādu uzdevumu atrisināšanai, kā arī daļu no teksta
                praktiskās daļas.
            </p>
        </div>
    
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
                    <li>Kāpēc jāizgudro savs velisopēds ja mums ir internets? (izmantojam citu pieredzi un zināšanas)</li>
                    <li>Izvēlamies PHP, kapēc?</li>
                    <li>MySQL un PHP</li>
                    <li>CSS, dizains un "kopā likšana". Dažādu interneta pārlūku problēma</li>
                    <li>Izvēlamies jQuery, kapēc?</li>
                    <li>jQuery UI</li>
                    <li>Select2</li>
                    <li>Izvēlamies AJAX, kapēc?</li>
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
                    <li>Darba teorētiskais izklāsts statiskajās lapās</li>
                    <li>AJAX balstītas platformas izveide (tikai viens no viediem)</li>
                    <li>Klases, klašu metodes un statiskās funkcijas</li>
                    <li>Daudzvalodība</li>
                    <li>Lietotāja ievades formas. Ievadīto datu apastrāde (php datu tipu problēma)</li>
                    <li>Select2</li>
                    <li>Kā praktiski izvairīties no SQL injekcijām un HTML/skriptu injecēšanas WEB lietotnē</li>
                    <li>Dinamisku datu izvade tabulā, to rediģēšana, dzēsšana un jaunu datu pievienošana izmantojot AJAX</li>
                    <li>Autorizēšanās</li>
                    <ul>
                        <li>Lietotāju paroles</li>
                        <li>Lietotāju IP adreses</li>
                        <li>Lietotāja sesija</li>
                        <li>Lietotāju grupas</li>
                    </ul>
                    <li>Dinamisku datu izvade grafikos. Dažādi varianti (sākot no Google.aps, līdz d3.js un tml.)</li>
                    <li>Sociālā vide</li>
                </ul>
                <li>Secinājumi</li>
            </ul>
        </div>
    </div>
