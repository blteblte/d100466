<script src="<?=Site::virtual_module() . get_class($this)?>/this.js"></script>
<link href="<?=Site::virtual_module() . get_class($this)?>/this.css" rel="stylesheet">

<div>
    <h3>Sazinies ar mums!</h3>
    <p>Iesniedz arsauksmi par projektu! Norādi ar kādām problēmām saskāries, kādas kļūdas ieraudzīji
    vai arī ko jaunu varētu ieviest. Mums Tavas domas ir svarīgas!</p>
    <fieldset class="cont-fieldset">
        <textarea class="input cont-textarea" rows="10" cols="50" id="comment"><?=$this->getComment()?></textarea>
        <div>
            <button id="submit" class="btn cont-button" onclick="return addNewComment()">COMMENT</button>
        </div>
        <div id="output"></div>
    </fieldset>
</div>