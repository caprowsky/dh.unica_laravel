<div class="modal-dialog">
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" >Salva query <span class="text-warning">@yield('title')</span></h4>
		</div>
		<div class="modal-body">
			<form id="frmitems" name="query_save" class="form-horizontal" novalidate="">

				<div class="form-group">
					<label for="nome" class="col-sm-3 control-label">Nome</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="q_nome" name="nome" placeholder="Nome">
					</div>
				</div>			
				
				<div class="form-group">
					<label for="descrizione" class="col-sm-3 control-label">Descrizione</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="q_descrizione" name="descrizione" placeholder="Descrizione" >
					</div>
				</div>
				
				<div class="form-group">
					<label for="tipo" class="col-sm-3 control-label">Tipo</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="q_tipo" name="tipo" placeholder="Tipo" value="0">
					</div>
				</div>
				
				<input type="hidden" name="tabella" value="@yield('table')" >
				<input type="hidden" name="query" id="query"  >
				
				
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-warning" onClick="$('#myModal_qsave').modal('hide')" >Annulla</button>
			<button type="button" class="btn btn-primary" id="btn-save" onClick="save_query()">Salva</button>
			
		</div>
	</div>
</div>
<script>
function save() {
	$('#query_modal').modal('hide');
	document.getElementById("query_save").reset(); 
	
}
function save_query() {	
	$('#query').val(JSON.stringify($('#builder').queryBuilder('getRules')));
	var formData=$('form[name=query_save]').serialize();
		
	
	AjaxPP('/queries',formData,0,save_ok,'qsave');
	
}
function save_ok() {
	alert ("Query salvata con successo");
}
</script>
