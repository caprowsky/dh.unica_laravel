<div class="modal-dialog">
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" >Carica query <span class="text-warning" id="query_title">@yield('title')</span></h4>
		</div>
		<div class="modal-body">
			<form id="frmitems" name="query_load" class="form-horizontal" novalidate="">

				<div class="form-group">
					<label for="nome" class="col-sm-3 control-label">Nome</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="ql_nome" name="nome" placeholder="Nome">
					</div>
				</div>	
				
				<div class="form-group">
					<label for="nome" class="col-sm-3 control-label">Descrizione</label>
					<div class="col-sm-9">
						<span class="form-control" id="ql_desc"></span>
					</div>
				</div>			
								
				<input type="hidden" id="tab" name="tab" value="@yield('table')" >
				<input type="hidden" id="ql_id" name="ql_id">			
				
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-warning" onClick="$('#myModal_qload').modal('hide')" >Annulla</button>
			<button type="button" class="btn btn-primary" id="load_q" onClick="load_query()" data-dest="#builder">Carica</button>
			
		</div>
	</div>
</div>
<script>
function load(table,dest,title) {
	$('#query_modal').modal('hide');
	$('#tab').attr('value',table);
	$('#load_q').data('dest',dest);
	if (title!=null) {
		 $('#query_title').text(title); 
	}
	$('#ql_nome').val("");
		
}
function load_query() {	
	var url="/queries/"+$('#ql_id').val();
	
	
	$.getJSON( url, {})
		.done(function( data ) {
			
		  $($('#load_q').data('dest')).queryBuilder('setRules', JSON.parse(data.query));	
		  	
		 });
		 
	$('#myModal_qload').modal('hide');
}

$(function()
{	
	 $( "#ql_nome" ).autocomplete({
		 source: function(request, response) {
				$.getJSON("queries/autocomplete", { tab: $('#tab').val(),term: $('#ql_nome').val() }, 
					response);
			},
	  minLength: 1,
	  select: function(event, ui) {
		 
	  	$('#ql_nome').val(ui.item.value);
	  	$('#ql_id').val(ui.item.id);
	  	$('#ql_desc').text(ui.item.desc);
	  	$('#ql_nome').css('color','green');
	  	
	  }
	});
	 $( "#ql_nome" ).keypress(function(){ 
		 $('#ql_id').val('');
		 $('#ql_desc').text('');
		 $('#ql_nome').css('color','orange');
		 });
});
</script>
