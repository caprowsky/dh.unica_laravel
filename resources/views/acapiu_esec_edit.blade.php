<div class="modal-dialog" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">Relazione</h4>
		</div>
		<div class="modal-body">
			<form id="frmitems" name="acapiu_edit" class="form-horizontal">
		
								
				<div class="form-group">
					<label for="tipo" class="col-sm-3 control-label">Tipo</label>
					<div class="col-sm-9">
						<select class="form-control" name="tipo" id="tipo">
							@foreach ($tipus_ac as $i=>$val)
							  <option value="{{$i}}"
								@if (($item->tipo!=null)&&($item->tipo==$i))
									selected="selected"
								@endif
								>{{$val}}</option>
							@endforeach
						</select>
					</div>
					
				</div>
								
				<div class="form-group">
					<label for="doc_title" class="col-sm-3 control-label">esecutore:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="es_esec" name="es_esec" placeholder="Nome/Denom" value="{{$item->a_id->nome or ''}}">
					</div>
				</div>
				
				<div class="form-group">
					<label for="descrizione" class="col-sm-3 control-label">Descrizione</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="Descrizione" value="{{$item->descrizione or ''}}">
					</div>
				</div>
					<input type="hidden" id="a_id" name="a_id" value="{{$item->a_id}}">
				 <input type="hidden" id="de_id" name="de_id" value="{{$item->de_id}}">
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-save_acapiu" value="add">Salva</button>
			<button type="button" class="btn btn-warning"  onClick="$('#myModal_acapiu').modal('hide');">Annulla</button>		
		</div>
	</div>
</div>
<script>
$(function()
{	
	 $( "#es_esec" ).autocomplete({
	  source: "esecudoris/autocomplete",
	  minLength: 3,
	  select: function(event, ui) {
		 
	  	$('#es_esec').val(ui.item.value);
	  	$('#a_id').val(ui.item.id);
	  	$('#es_esec').css('color','green');
	  	
	  }
	});
	 $( "#es_esec" ).keypress(function(){ 
		 $('#a_id').val('');
		 $('#es_esec').css('color','orange');
		 });
});
function acapiuValidate(){
	if ($('#a_id').val()=='') {
			alert ("Scegli un esecutore valido!");
		} else {
			return true;
		}
				
	}

</script>
