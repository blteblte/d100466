
<div id="user_edit_modal" class="modal fade" style="" role="dialog" aria-labelledby="edit_formLabel" aria-hidden="true" data-backdrop="static">
<div class="modal-header">
	<button type="button" class="close notauto" data-dismiss="modal" aria-hidden="true">×</button>
        <span id="modal_title"><h4>CREATE A NEW CHILD</h4></span>
</div>
<div id="alert" style="display:none;" class="alert"></div>
<div class="modal-body">
    
    <input id="children_id" type="hidden" value="0" />
    <input id="modal_action" type="hidden" value="create" />
    
    <div class="row">
        <span class="pull-left"><label>TAG: </label></span><input id="tag" type="text" class="pull-right">
    </div>
    <div class="row">
        <span class="pull-left"><label>VALUE: </label></span><input id="value" type="text" class=" pull-right">
    </div>
    <div class="row">
        <span class="pull-left"><label>TYPE: </label></span><input type="hidden" id="parrent" class="pull-right">
    </div>
    
</div>
    <div class="modal-footer">
        <button onclick="return false" class="btn btn-info"><span class="glyphicon glyphicon-floppy-saved"></span> SAVE</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-floppy-remove"></span> CLOSE</button>                
    </div>
</div>