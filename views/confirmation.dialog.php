
<div id="confirmation_dialog" class="modal fade" style="" role="dialog" aria-labelledby="edit_formLabel" aria-hidden="true" data-backdrop="static">
<div id="alert" style="display:none;" class="alert"></div>
<div class="modal-body">
    <input id="dialog_id" name="dialog_id" type="hidden" />
    <span id="confirmation_dialog_txt">Vai Jūs tiešām vēlaties dzēst šo ierakstu?</span>
</div>
    <div class="modal-footer">
        <button onclick="return deleteItem()" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Jā</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-floppy-saved"></span> Nē</button>
    </div>
</div>