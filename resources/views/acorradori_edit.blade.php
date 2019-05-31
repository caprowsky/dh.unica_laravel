

<div class="modal-dialog" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">Aggregatore</h4>
		</div>
		<div class="modal-body">
			<form id="acorradori_edit" name="acorradori_edit" class="form-horizontal" novalidate="">

				<div class="form-group">
					<label for="nome" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="ac_nome" name="nome" placeholder="Nome" value="{{$item->nome}}" maxlength="31">
					</div>
				</div>
				
				<div class="form-group">
					<label for="data" class="col-sm-2 control-label">Data</label>
					<div class="col-sm-4">
						<input type="text" class="form-control date" style="display:inline;" id="ac_d_data" name="data" placeholder="Data" value="{{$item->data or ''}}" maxlength="12">
					</div>
					
					<div class="col-sm-offset-1 col-sm-4">
						<input type="text" class="form-control" ondblclick="json_modal(redump(JSON.parse(this.value)))"
						id="ac_data_note" name="data_note" placeholder="Note" value="{{$item->data_note or ''}}" title="{{$item->data_note or ''}}" maxlength="1023">
					</div>
				</div>
				
				<!-- TextArea descritzioni -->
				@include ('/comp/descr')	
				
				
				 <div class="form-group">	
					@include ('comp/logu')		
				</div>
				<div class="form-group">
					@include ('comp/image')
				</div>
				 <input type="hidden" id="item_id" name="id" value="{{$item->id}}">
			</form>
		</div>
		<div class="modal-footer">
			@can('edit rows')
				<button type="button" class="btn btn-primary save" id="btn-save_acorradoris" value="add" >Salva</button>
			@else
			
				<script>
					var form = document.getElementById("acorradori_edit");
					var elements = form.elements;
					for (var i = 0, len = elements.length; i < len; ++i) {
						elements[i].readOnly = true;
					}
				</script>
			
			@endcan
			<button type="button" class="btn btn-warning"  onClick="$('#myModal_acorradoris').modal('hide');">Annulla</button>	
		</div>
	</div>
</div>
<div class="modal fade" id="myModal_logus" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<script>
	
	datePick('accoradori_edit');
	
	fileUp();
	
</script>
