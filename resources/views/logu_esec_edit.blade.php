<div class="modal-dialog" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">Luogo esecutore</h4>
		</div>
		<div class="modal-body">
			<form id="frmitems" name="loguesec_edit" class="form-horizontal">
		
								
				<div class="form-group">
					<label for="doc_title" class="col-sm-3 control-label">Luogo:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="es_luogo" name="es_luogo" placeholder="Luogo" value="{{$item->luogo->nome or ''}}">
					</div>
				</div>
				
				<div class="form-group">
					<label for="descrizione" class="col-sm-3 control-label">Descrizione</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="Descrizione" value="{{$item->descrizione or ''}}">
					</div>
				</div>
				 <input type="hidden" id="esecutore_id" name="esecutore_id" value="{{$item->esecutore_id}}">
				 <input type="hidden" id="luogo_id" name="luogo_id" value="{{$item->luogo_id}}">
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-save_loguesec" value="add">Salva</button>
			<button type="button" class="btn btn-warning"  onClick="$('#myModal_loguesec').modal('hide');">Annulla</button>		
		</div>
	</div>
</div>
<script>
$(function()
{	
	 $( "#es_luogo" ).autocomplete({
	  source: "logus/autocomplete",
	  minLength: 3,
	  select: function(event, ui) {
		 
	  	$('#es_luogo').val(ui.item.value);
	  	$('#luogo_id').val(ui.item.id);
	  	$('#es_luogo').css('color','green');
	  	
	  }
	});
	 $( "#es_luogo" ).keypress(function(){ 
		 $('#luogo_id').val('');
		 $('#es_luogo').css('color','orange');
		 });
});

function loguValidate(){
	if ($('#luogo_id').val()=='') {
			alert ("Scegli un luogo valido!");
		} else {
			return true;
		}
				
	}

</script>
