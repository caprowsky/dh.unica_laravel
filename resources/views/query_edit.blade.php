
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Query</h4>
		</div>
		<div class="modal-body">
			<form id="frmitems" name="query_edit" class="form-horizontal" novalidate="">

				<div class="form-group">
					<label for="nome" class="col-sm-3 control-label">Nome</label>
					<div class="col-sm-9">
						<input type="text" class="form-control has-error" id="q_nome" name="nome" placeholder="Nome" 
						value="{{$item->nome}}" >
						
					</div>
				</div>

				<div class="form-group">
					<label for="descrizione" class="col-sm-3 control-label">Descrizione</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="q_descrizione" name="descrizione" placeholder="Descrizione" value="{{$item->descrizione}}">
					</div>
				</div>
				
				 <div class="form-group">
					<label for="tipo" class="col-sm-3 control-label">Tipo</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="q_tipo" name="tipo" placeholder="tipo" value="{{$item->tipo}}">
					</div>
				</div>
				
				
				<div class="form-group">
					<label for="query" class="col-sm-3 control-label">Query</label>
					<div class="col-sm-9">
						<textarea readonly style="resize: vertical;" class="form-control" id="q_query" name="query" placeholder="query" spellcheck="false">{{$item->query}}</textarea>
					</div>
				</div>
				
				<div class="form-group">
					<label for="tabella" class="col-sm-3 control-label">Tabella</label>
					<div class="col-sm-9">
						<span class="text text-warning" >{{$item->tabella}}</span>
					</div>
				</div>
				
				<input type="hidden" id="query_id" name="id" value="{{$item->id}}">
			</form>
		</div>
		<div class="modal-footer">			
			<button type="button" class="btn btn-primary save" id="btn-save_queries" value="add" >Salva</button>
			<button type="button" class="btn btn-warning" onClick="$('#myModal_queries').modal('hide')" >Annulla</button>
		</div>
	</div>
</div>

