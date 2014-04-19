
<div id="player_edit_modal" class="modal fade" style="" role="dialog" aria-labelledby="edit_formLabel" aria-hidden="true" data-backdrop="static">
<div class="modal-header">
	<button type="button" class="close notauto" data-dismiss="modal" aria-hidden="true">×</button>
        <span id="player_modal_title"><h4>IZVEIDOT JAUNU SPĒLĒTĀJU</h4></span>
</div>
<div id="alert" style="display:none;" class="alert"></div>
<div class="modal-body">
    
    <input id="modal_action" type="hidden" value="create" />
    <form id="player_edit_form" method="post">
        <input id="player_id" name="player_id" type="hidden" value="0" />
        <div class="row control-group">
            <span class="pull-left"><label>Niks: </label></span><input id="nick" name="nick" type="text" class="pull-right form-control">
        </div>
        <div class="row control-group">
            <span class="pull-left"><label>Vērtība: </label></span><input id="value" name="value" type="text" class=" pull-right form-control">
        </div>
    </form>
</div>
    <div class="modal-footer">
        <button onclick="return save_modal()" class="btn btn-info"><span class="glyphicon glyphicon-floppy-saved"></span> SAGLABĀT</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-floppy-remove"></span> ATCELT</button>
    </div>
</div>