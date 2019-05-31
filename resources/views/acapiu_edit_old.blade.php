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
					<label class="col-sm-3 control-label">Opzioni</label>
					<div class="col-sm-9">
						<label for="so" class="checkbox-inline">																		
							<input type="checkbox" id="so" name="so" onclick="sorgente()">E' sorgente del
						</label>
						<label for="a_ch" class="checkbox-inline">					
							<input type="checkbox" id="a_ch" name="a_ch" >Ha relazione verso il
						</label>					
						<label for="de_ch" class="checkbox-inline">				
							<input type="checkbox"  id="de_ch" name="de_ch" >Ha relazione dal	
						</label>					
					</div>
				</div>
				
				
				<div class="form-group">
					<label for="doc_title" class="col-sm-3 control-label">documento:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="doc_title" name="doc_title" placeholder="Titolo" value="{{$item->a_id->titolo or ''}}">
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
		</div>
	</div>
</div>
<script>
$(function()
{	
	 $( "#doc_title" ).autocomplete({
	  source: "documentus/autocomplete",
	  minLength: 3,
	  select: function(event, ui) {
		 
	  	$('#doc_title').val(ui.item.value);
	  	$('#a_id').val(ui.item.id);
	  	$('#doc_title').css('color','green');
	  	
	  }
	});
	 $( "#a_id" ).keypress(function(){ 
		 $('#a_id').val('');
		 $('#doc_title').css('color','orange');
		 });
});
function acapiuValidate(){
	if ($('#a_id').val()=='')
	{
		alert ("Scegli un documento valido!");
	} else {
		if (($('#a_ch').prop( "checked"))||($('#de_ch').prop( "checked" ))||($('#so').prop( "checked" )))
		{
			$('#descrizione').removeAttr("disabled");
			$('#a_ch').removeAttr("disabled");
			$('#de_ch').removeAttr("disabled");
			return true;
		}
		else {
			alert ("Scegli almeno un'opzione per la relazione!");
		}
		
	}
}
function sorgente() {
	if ($('#so').prop( "checked" ))
	{
		$('#a_ch').prop( "checked",true);
		$('#de_ch').prop( "checked",false);
		$('#a_ch').attr("disabled", true);
		$('#de_ch').attr("disabled", true);
		$('#descrizione').val("Sorgente");
		$('#descrizione').attr("disabled", true);
	}
	else
	{
		$('#a_ch').removeAttr("disabled");
		$('#de_ch').removeAttr("disabled");
		$('#descrizione').removeAttr("disabled");
		$('#descrizione').val("");
	}

}
</script>
