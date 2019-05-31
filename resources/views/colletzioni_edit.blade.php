<div class="modal-dialog" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Collezione</h4>
		</div>
		<div class="modal-body">
			<form id="colletzioni_edit" name="colletzioni_edit" class="form-horizontal" novalidate="">

				<div class="form-group">
					<label for="nome" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="co_nome" name="nome" placeholder="Nome" value="{{$item->nome}}" maxlength="31">
					</div>
				</div>			
				
				<div class="form-group">
					<label for="data" class="col-sm-2 control-label">Data</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" style="display:inline;" id="co_d_data" name="data" placeholder="Data" value="{{$item->data or ''}}">
					</div>
					<div class="col-sm-offset-1 col-sm-4">
						<input type="text" class="form-control" ondblclick="json_modal(redump(JSON.parse(this.value)))"
						id="co_data_note" name="data_note" placeholder="Note" value="{{$item->data_note or ''}}" title="{{$item->data_note or ''}}" maxlength="1023">
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
				<button type="button" class="btn btn-primary save" id="btn-save_colletzionis" value="add" >Salva</button>
			@else
			
				<script>
					var form = document.getElementById("colletzioni_edit");
					var elements = form.elements;
					for (var i = 0, len = elements.length; i < len; ++i) {
						elements[i].readOnly = true;
					}
				</script>
			
			@endcan
			<button type="button" class="btn btn-warning"  onClick="$('#myModal_colletzionis').modal('hide');">Annulla</button>	
		</div>
	</div>
</div>
<div class="modal fade" id="myModal_logus" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
<script>
	
	datePick('colletzioni_edit');
	
	fileUp();
</script>
