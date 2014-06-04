<script src="<?=Site::virtual_module() . get_class($this)?>/this.js"></script>
<link href="<?=Site::virtual_module() . get_class($this)?>/this.css" rel="stylesheet">

<section class="doc-selector">
    <div class="doc-title">UZSTĀDĪŠANA UN KONFIGURĀCIJA</div>
    <div class="doc-content">
        <p>
            phpAJAX: WEB platforma spējai uz AJAX balstītu lietotņu izveidei autors: Mārtiņš Bitenieks, DU 2014
        </p>
        <p>produkta versija: 0.9</p>
        <p>ATBALSTĪTĀS PLATFORMAS: Windows, OS X, Linux</p>
        <p>
            TEHNISKĀS PRASĪBAS: Platforma ir saderīga ar jebkuru izstrādes vidi un operētājsistēmu,
            kas spēj sevī nodrošināt PHP instalācijas distributīvu, kā arī datu bāzes distributīvu
            kas saderīgs ar PHP PDO draiveri.
        </p>
        <p>
            IETEICAMĀS PAPILDPLATFORMAS: PHP v4.3 un augstāk, MySQL 5.1 un augstāk
        </p>
        <p>
            UZSTĀDĪŠANAS INSTRUKCIJA:<br />
            <ul>
                <li>1. Nokopē pirmkoda failus projekta saknes direktorijā. Ja projekta sakne nav arī
                    servera sakne, tad norāda konfigurācijas failā apakš- direktoriju: FAILS: /core/conf/configuration.php MAINĪGAIS:
                    $root = "/projektaSakne"
                </li>
                <li>
                    Izveidot nepieciešamo datubāzi projektam un norādīt pieslēgšanās parametrus:
                    FAILS: /code/conf/db_connect.php MASĪVS: host - DB serveris dbname - DB nosaukums
                    user - DB lietotājvārds pass - DB parole
                </li>
                <li>
                    Izpilda SQL skriptu reģistrēšanās moduļa darbībai: FAILS:
                    /sql_db/tables.sql IZPILDE: izpilda izmantojamajā datu bāzē
                </li
            </ul>
        </p>
    </div>
</section>
<section class="doc-selector">
    <div class="doc-title">JAUNU SATURA DAĻU VEIDOŠANA</div>
    <div class="doc-content">
        <h4>phpAJAX ļauj viegli veidot jaunas satura daļas:</h4>
        <p>
            <ol>
                <li>
                    Satura daļas atrodas mapītē /modules. Lai izveidotu jaunu satura daļu
                    vienkārši kopē standarta moduļa "Home" mapīti ar tādu pašu nosaukumu.
                </li>
                <li>
                    Nosauc moduļa mapīti unikālā nosaukumā, kā arī pašu moduli tieši tādā pašā. Arī
                    moduļa klases nosaukumam ir jāsakrīt.<br />
                    <strong>P: Mapīte: "Home" -> "About", Modulis: "Home.php" -> "About.php", Klase: "Home" -> "About"</strong>
                </li>
                <li>
                    view.php būs vails kur tu rakstīsi dotā moduļa HTML.<br />
                    this.css un this.js respektīvi CSS un JavaScript kodam
                </li>
            <ol>
            
            
        </p>
    </div>
</section>
<section class="doc-selector">
    <div class="doc-title">ŠABLONS</div>
    <div class="doc-content">
        <p>
            Šablons atrodas mapītē: /templates/default un tiek ielādēts no index.php
        </p>
        <p>
            Tu vari pārdefinēt jebkuru citu šablonu index.php pēdējā rindiņā (87)
        </p>
    </div>
</section>
<section class="doc-selector">
    <div class="doc-title">FAILU STRUKTŪRA</div>
    <div class="doc-content">
        <img style="margin-left: 156px" src="<?=Site::virtual_module() . get_class($this)?>/img/failu_shema.png" alt="Failu Shema" height="400" />
    </div>
</section>
<section class="doc-selector">
    <div class="doc-title">MODUĻA STRUKTŪRA</div>
    <div class="doc-content">
        <h4>Modulis sastāv no 4 atribūtiem: </h4>
        <p><?=var_dump($this)?></p>
        <p>
            $db - satur pieslēguma instanci datubāzei<br />
            $query - satur $_GET datus<br />
            $data - satur $_POST datus<br />
            $title - norādi lapas virsrakstu, kas parādīsies cilnē
        </p>
        <h4>Moduļa standartfunkcijas: </h4>
        <p>
           <strong>AccessLevel()</strong> - norādi dotā moduļa pieejas līmeni. Noklusējuma pieejas līmeņus
           skaties /core/AccessLevels.php.<br />
           <strong>__construct()</strong> - moduļa konstruktors<br />
           <strong>$this->db()</strong> - izmanto šo funckiju datubāzes pieslēguma instances nodošanai
           citiem objektiem<br />
           <strong>$load->title()</strong> - izmanto šo funkciju moduļa nosaukuma izvadei šablonā<br />
           <strong>renderHTML()</strong> - funkcija, kas tiek izsaukta no šablona dotās satura daļas ielādei<br />
           <strong>$this->renderDataLayer()</strong> - izmanto šo funkciju lai pieslēgtu nepieciešamās datu slāņa<br />
           abstrakcionētās klases<br />
           <strong>async__functionname()</strong> - izmanto šo funkcijas prototipu asinhrono funkciju veidošanai modulī.<br />
        </p>
    </div>
</section>
<section class="doc-selector">
    <div class="doc-title">ASINHRONO IZSAUKUMU VEIKŠANA</div>
    <div class="doc-content">
        <p>
            Asinhroni satura daļu maina aprakstot sekojošu funkciju klikšķa notikumā:<br />
            <strong>ajaxRequestCore("ModuļaNosaukums")</strong>
        </p>
        <p>
            Citu asinhrono funkciju veikšanai deklarē modulī asinhronu funkciju (funkcijai
            jābūt prefiksētai ar "async__" un tad dotās funkcijas nosaukums).<br /><br />
            
            Tad to būs iespējams izsaukt izmantojot sekojošu metodi:
            <p>
                ajaxRequest (async, callback, module, command, get, form)<br /><br />
                    
                <strong>async</strong> - (true/false) - norādi vai funkcijai jāizpildās sinhroni vai asinhroni<br/>
                <strong>callback</strong> - ( function(){} ) - norādi anonīmo funkciju, kas tiks izpildīta saņemot asinhronā izsaukuma atbildi<br/>
                <strong>module</strong> - (string) - norādi moduļa nosaukumu kura asinhrono funkciju vēlies izsaukt<br/>
                <strong>command</strong> - (string) - norādi funkcijas nosaukumu kuru vēlies izsaukt (izsaucot neizmanto prefiksu)<br/>
                <strong>get</strong> - (string) - norādi GET parametrus (p: "&a=1&b=2"), vai atsāj šo parametru tukšu (""), ja izmantosi POST metodi
                <strong>form</strong> - ( $(DOM) ) norādi jQuery selektora objekta formu ar tās identifikatoru. Forma tiks serializētā un tās dati pieejami
                asinhronajā funkcijā modulī.
            </p>
            <p>
                Ar GET metodi sūtītie parametri pieejami asinhronajā funkcijā caur $query['nosaukums'],
                bet POST parametri $data['nosaukums']!
            </p>
            <p>
                <strong>Neaizmirsti pārbaudīt lietotāja pieejas tiesības asinhronajā funkcijā:</strong><br/>
                p: if (UserManager::GetUserAccessLevel() >= AccessLevels::REGISTERED_ACCESS_LEVEL)
            </p>
        </p>
    </div>
</section>
<section class="doc-selector">
    <div class="doc-title">TABULAS PIEVIENOŠANA DATU ABSTRAKCIJAS SLĀNIM</div>
    <div class="doc-content">
        <p>
            Lai pievienotu tabulu datu abstrakcijas slānim nepieciešams nokopēt noklusējuma
            datu abstrakcijas klasi /data/User.php un nosaukt to jaunās tabulas vārdā.<br/>
            <strong>Nosaukums vienmēr bez "s", bet tabulas nosaukumā tam jābūt!</strong><br />
            p: tabula: Users -> klase: User
        </p>
        <p>
             - Tad nomaini arī pašas klases nosaukumu uz tādu pašu faila nosaukumu.<br />
             - protected $pk - norādi primārās atslēgas nosaukumu<br />
             - Kolonnu definīcijas abgabalā norādi publiskos klases parametrus ar tādiem pašiem nosaukumiem kādi tie ir datu bāzes
            kolonnām.<br/>
             -  public $data = array() - norādi šo kolonnu nosaukumus bez primārās atslēgas
        </p>
        <p>
            Konteksta klase (pašā faila apakšā) paredzēta ērtākai datu abstrakcijas izmantošanai.<br />
            Pārsauc šo klasi kā vēlies to izmantot, un pārdefinē tās funkcijas jaunās klases izmantošanai, vai arī nodzēs
            konteksta klasi vispār, ja tā tev nav nepiciešama
        </p>
    </div>
</section>
<section class="doc-selector">
    <div class="doc-title">DATU ABSTRAKCIJAS IZMANTOŠANA</div>
    <div class="doc-content">
        <p>
            Inicializē abstragēto klasi kā jebkurā citā programmēšanas valodā nododot tai
            pieslēgumu pie datu bāzes:
        </p>
            $Com = new Comment($this->db());<br/><br/>
        <p>
            Norādi nepieciešamos datus:
        </p>
            $Com->content = $query['comment'];<br/>
            $Com->user_id = UserManager::GetActiveUser();<br/>
        <p>
            Veic nepieciešamo darbību:
        </p>
            $newCommentId = $Com->Insert(), vai $Com->Update(), vai $Com->Delete();<br/>
            <p>
                $newCommentId - vari saņemt pievienotā ieraksta ID<br/>
                Atceries, ka dzēsšanas vai atjaunināšanas operācijai vispirms ir jāizvēlas objekts
                (skatīt kontektsta klasi, vai izmantot Get() funckiju)
            </p>
    </div>
</section>