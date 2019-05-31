
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Utente</h4>
		</div>
		<div class="modal-body">
			<form id="user_edit" name="user_edit" class="form-horizontal" novalidate="">

				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">Nome</label>
					<div class="col-sm-9">
						
						<input type="text" class="form-control" id="us_nome" name="name" placeholder="Nome" value="{{$item->name}}">
					</div>
						
					
				</div>
				
				 <div class="form-group">
					<label for="email" class="col-sm-3 control-label">mail</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="us_mail" name="email" placeholder="mail" value="{{$item->email}}">
					</div>
				</div>
				<div class="form-group">
				@hasrole('super-admin')
					@if($item->hasrole('super-admin'))
					<div class="col-sm-3">
						<span class='label label-pill label-warning'>Super amministratore</span>
					</div>
					@else
					
						<label for="editor" class="col-sm-3 control-label">Editor</label>
						<div class="col-sm-1">
						
						<input type="checkbox" class="form-control" id="us_editor" name="editor"
						@if($item->hasrole('editor'))
						checked
						@endif
						>
					</div>
					
					
					@endif
				@endhasrole
				</div>
				<input type="hidden" id="user_id" name="id" value="{{$item->id}}">
			</form>
		</div>
		<div class="modal-footer">
			@can('edit rows')
				<button type="button" class="btn btn-primary save" id="btn-save_users" value="add" >Salva</button>
			@else
			
				<script>
					var form = document.getElementById("user_edit");
					var elements = form.elements;
					for (var i = 0, len = elements.length; i < len; ++i) {
						elements[i].readOnly = true;
					}
				</script>
			
			@endcan
			<button type="button" class="btn btn-warning" onClick="$('#myModal_users').modal('hide')" >Annulla</button>
		</div>
	</div>
</div>

