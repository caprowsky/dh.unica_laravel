

<div class="modal-dialog" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Evento</h4>
		</div>
		<div class="modal-body">
			<form id="eventu_edit" name="eventu_edit" class="form-horizontal" novalidate="">

				<div class="form-group">
					<label for="nome" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="ev_nome" name="nome" placeholder="Nome" value="{{$item->nome}}" maxlength="255">
					</div>
				</div>

				<div class="form-group">
					<label for="inizio" class="col-sm-2 control-label">Data inizio</label>
					
					<div class="col-sm-4">
						<input type="text" class="form-control" style="display:inline;" id="ev_d_inizio" name="inizio" placeholder="Data inizio" value="{{$item->inizio or ''}}">
					</div>
					<div class="col-sm-offset-1 col-sm-4">
						<input type="text" class="form-control" id="ev_datai_note" name="datai_note" placeholder="Note" value="{{$item->datai_note or ''}}" title="{{$item->datai_note or ''}}" maxlength="255">
					</div>
					
				</div>
				
				<div class="form-group">
					<label for="fine" class="col-sm-2 control-label">Data fine</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" style="display:inline;" id="ev_d_fine" name="fine" placeholder="Data fine" value="{{$item->fine or ''}}">
					</div>
					<div class="col-sm-offset-1 col-sm-4">
						<input type="text" class="form-control" id="ev_dataf_note" name="dataf_note" placeholder="Note" value="{{$item->dataf_note or ''}}" title="{{$item->dataf_note or ''}}" maxlength="255">
					</div>
				</div>
				
				<!-- TextArea descritzioni -->
				@include ('/comp/descr')	
				
				<div class="form-group">
					@include ('comp/logu')
				</div>
				
				<div class="form-group">
					@include ('comp/acorradori')
				</div>
				<hr>
				
				@if ($item->id!=0)	
				<h4 class="modal-title">Partecipanti
				@can('add rows')			
					<button type="button" class="btn btn-primary btn-xs add " onClick="addPartecipanti()">+</button>
				@endcan
				</h4>		
				 <table class="table table-striped" id="partecipantis">
					<thead>
					  <tr>
						<th>Esecutore</th>
						<th>Ruolo</th>
						<th>Descrizione</th>
						<th>Azioni</th>
					  </tr>
					</thead>
					<tbody>
					@foreach($partecipantis as $p)
						 <tr id="row_{{$p->id}}">
							<td>{{$p->esecutore->nome}}&nbsp;{{$p->esecutore->cognome}}</td>
							<td>{{$p->ruolo}}</td>
							<td>{{$p->descrizione}}</td>
							<td>
								@can('edit rows')
								<button type ="button" class="btn btn-warning btn-xs btn-detail" onClick="editPartecipanti({{$p->id}})"><span class="glyphicon glyphicon-edit"></button>
								@endcan
								@can('delete rows')
								<button type ="button" class="btn btn-danger btn-xs btn-delete" onClick="delPartecipanti({{$p->id}})"><span class="glyphicon glyphicon-remove"></button>
								@endcan
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				@else
				@can('edit rows')
				<i class="text-warning">NB Prima di poter aggiungere partecipanti occorre salvare l'evento</i>
				@endcan
				@endif				
				
				<div class="form-group">
					@include ('comp/image')
				</div>
				
				<input type="hidden" id="item_id" name="id" value="{{$item->id}}">
				
			</form>
		</div>
		<div class="modal-footer">
			@can('edit rows')
				<button type="button" class="btn btn-primary save" id="btn-save_eventus" value="add" >Salva</button>
			@else
			
				<script>
					var form = document.getElementById("eventu_edit");
					var elements = form.elements;
					for (var i = 0, len = elements.length; i < len; ++i) {
						elements[i].readOnly = true;
					}
				</script>
			
			@endcan
			<button type="button" class="btn btn-warning"  onClick="$('#myModal_eventus').modal('hide');">Annulla</button>	
		</div>
	</div>
</div>

<div class="modal fade" id="myModal_logus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>

<div class="modal fade" id="myModal_acorradoris" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>

<div class="modal fade" id="myModal_partecipant" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>

<script>
	
	datePick('eventu_edit');
	
	fileUp();

// Nuovo partecipante
//*******************

function addPartecipanti() {
	AjaxCreate('/eventus/{{$item->id}}/partecipant', function (){
		var formData = {
            ruolo: partecipanti_edit.ruolo.value,           
            descrizione: partecipanti_edit.descrizione.value,
            esecutore_id: partecipanti_edit.esecudori_id.value,
            evento_id: partecipanti_edit.eventu_id.value,
        }
        
		AjaxPP('/eventus/{{$item->id}}/partecipant',formData,0,addItemP,'partecipant');
	},'partecipant');
}

function editPartecipanti(id) {
	AjaxEdit('/eventus/{{$item->id}}/partecipant',id, function (){
		var formData = {
            ruolo: partecipanti_edit.ruolo.value,           
            descrizione: partecipanti_edit.descrizione.value,
            esecutore_id: partecipanti_edit.esecudori_id.value,
            evento_id: partecipanti_edit.eventu_id.value,
        }
        
		AjaxPP('/eventus/{{$item->id}}/partecipant/'+id,formData,id,addItemP,'partecipant');
	},'partecipant');
}

// Aggiorna

function addItemP(data,id) {
	
	
		var item='<tr id=row_'+data.id+'><td>'+data.partecipante+'</td>'+
		'<td>'+data.ruolo+'</td><td>'+data.descrizione+'</td><td><button type="button" class="btn btn-warning btn-xs btn-detail" onClick="editPartecipanti('+data.id+')"><span class="glyphicon glyphicon-edit"></button>&nbsp;'+
		'<button type="button" class="btn btn-danger btn-xs btn-delete delete" onClick="delPartecipanti('+data.id+')"><span class="glyphicon glyphicon-remove"></button></td></tr>';
		
		if (id==0){ //if user added a new record
                    $('#partecipantis tr:last').after(item);
                    
                }else{ //if user updated an existing record

                    $('#partecipantis tr#row_' + id).replaceWith( item );
                }

}

// Cancella
function delPartecipanti(id) {
		AjaxDelete('/eventus/{{$item->id}}/partecipant',id,deleteRowP);
		
}

function deleteRowP(id) {
	
	
	$('#row_'+id).closest('tr').remove();
	
}



</script>
