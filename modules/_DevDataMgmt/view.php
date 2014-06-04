<script src="<?=Site::virtual_module() . get_class($this)?>/this.js"></script>
<link href="<?=Site::virtual_module() . get_class($this)?>/this.css" rel="stylesheet">

<h1>Tabulas</h1>
<div class="mgmt-left">
    <?=$this->GetTableList()?>
</div>
<div class="mgmt-right">
    <button class="btn mgmt-new"> + Izveidot jaunu</button>
    <div class="mgmt-info"></div>
    <section class="mgmt-new-controls">
        <form id="data-abstraction-form" method="POST">
            <fieldset>
                <input placeholder="Tabulas nosaukums bez (s)" class="input data-table-name" type="text" name="data-table-name" />
                <button class="btn mgmt-add">+</button>
                <p>
                    <input placeholder="Primārā atslēga" class="input" type="text" name="data-pk" />
                    <select placeholder="Datu tips" class="input" type="text" name="data-type">
                        <option value="BIT">BIT</option>
                        <option value="TINYINT">TINYINT</option>
                        <option value="SMALLINT">SMALLINT</option>
                        <option value="MEDIUMINT">MEDIUMINT</option>
                        <option value="INT" selected="selected">INT</option>
                        <option value="INTEGER">INTEGER</option>
                        <option value="BIGINT">BIGINT</option>
                        <option value="REAL">REAL</option>
                        <option value="DOUBLE">DOUBLE</option>
                        <option value="FLOAT">FLOAT</option>
                        <option value="DECIMAL">DECIMAL</option>
                        <option value="NUMERIC">NUMERIC</option>
                        <option value="DATE">DATE</option>
                        <option value="TIME">TIME</option>
                        <option value="TIMESTAMP">TIMESTAMP</option>
                        <option value="DATETIME">DATETIME</option>
                        <option value="YEAR">YEAR</option>
                        <option value="CHAR">CHAR</option>
                        <option value="VARCHAR">VARCHAR</option>
                        <option value="BINARY">BINARY</option>
                        <option value="VARBINARY">VARBINARY</option>
                        <option value="TINYBLOB">TINYBLOB</option>
                        <option value="BLOB">BLOB</option>
                        <option value="MEDIUMBLOB">MEDIUMBLOB</option>
                        <option value="LONGBLOB">LONGBLOB</option>
                        <option value="TINYTEXT">TINYTEXT</option>
                    </select>
                    <input placeholder="Izmērs" class="input data-size" type="text" name="data-size" />
                </p>
                <p class="add-new-col">
                    <span class="btn data-new-col">+</span>
                </p>
                <label class="mgmt-notification"></label>
            </fieldset>
        </form>
    </section>
</div>