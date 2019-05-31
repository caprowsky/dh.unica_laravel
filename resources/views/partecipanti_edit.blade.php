

<div class="modal-dialog" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Partecipante</h4>
		</div>
		<div class="modal-body">
			<form id="frmitems" name="partecipanti_edit" class="form-horizontal" novalidate="">

				<div class="form-group">
					<label for="esecudori_id" class="col-sm-3 control-label">Esecutore</label>
					<div class="col-sm-7">
						<select class="form-control" name="esecudori_id" id="esecudori_id">
							@foreach($esecudoris as $a)
							  <option value="{{$a->id}}"
								@if (($item->esecutore_id!=null)&&($item->esecutore_id==$a->id))
									selected="selected"
								@endif
								>{{$a->nome}}&nbsp;{{$a->cognome}}</option>
							@endforeach
						</select>
					</div>
					
					<div class="col-sm-2">
						<button type="button" class="btn btn-info btn-sm add" onClick="addEsecudori()">+</button>		
					</div>
				</div>
				<div class="form-group">
					<label for="ruolo" class="col-sm-3 control-label">Ruolo</label>
					<div class="col-sm-9">
						<input type="text" class="form-control has-error" id="ruolo" name="ruolo" placeholder="Ruolo" value="{{$item->ruolo}}">
					</div>
				</div>
				
				<div class="form-group">
					<label for="descrizione" class="col-sm-3 control-label">Descrizione</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="Descrizione" value="{{$item->descrizione or ''}}">
					</div>
				</div>
				
				
				 <input type="hidden" id="item_id" name="id" value="{{$item->id}}">
				 <input type="hidden" id="eventu_id" name="eventu_id" value="{{$item->evento_id}}">
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-save_partecipant" value="add" >Salva</button>
			
		</div>
	</div>
</div>
<div class="modal fade" id="myModal_esecudoris" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>

<script>

// Nuovo aggregatore
// ****************
function addEsecudori() {
	AjaxCreate('/esecudoris', function (){
		var formData = {
            nome: esecudori_edit.nome.value,
            cognome: esecudori_edit.cognome.value,
            nascita: esecudori_edit.nascita.value,
            morte: esecudori_edit.morte.value,
            luogo_id: esecudori_edit.logu_id.value,
            descrizione: esecudori_edit.descrizione.value,
        }
		AjaxPP('/esecudoris',formData,0,addItemE);
	});
}

// Aggiorna

function addItemE(data,id) {
	
	$('#esecudori_id').append($('<option>', {value:data.id, text:data.nome+' '+data.cognome}));
	$('#esecudori_id').val(data.id);
}

</script>
