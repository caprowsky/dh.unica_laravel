<div class="modal-dialog" >
	<div class="modal-content" id="modal-content_ruolu_edit">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<h4 class="modal-title" id="myModalLabel">Ruolo</h4>
		</div>
		<div class="modal-body">
			<form id="frmitems" name="ruolu_edit" class="form-horizontal">
		
								
				<div class="form-group">
					<label for="tipo" class="col-sm-3 control-label">Ruolo</label>
					<div class="col-sm-9">
						<select class="form-control" name="ruolo" id="ruolo">
							@foreach ($tipus_ru as $val)
							  <option value="{{$val}}"
								@if (($item->ruolo!=null)&&($item->ruolo==$val))
									selected="selected"
								@endif
								>{{$val}}</option>
							@endforeach
						</select>
					</div>
					
				</div>
								
				<div class="form-group">
					<label for="ag_nome" class="col-sm-3 control-label">Agente:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="ag_nome" name="ag_nome" placeholder="Agente" value="{{$item->esecutore->nome or ''}} {{$item->esecutore->cognome or ''}}">
					</div>
				</div>
				
				<div class="form-group">
					<label for="descrizione" class="col-sm-3 control-label">Descrizione</label>
				@if ($item->taggable)
				
					<div class="col-sm-7">
						<input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="Descrizione" value="{{$item->descrizione or ''}}">
					</div>
					<div class="col-sm-2">
						<button type="button" class="btn btn-info btn-sm add" onClick="addTag()">TAGGA</span></button>						
				@else
					<div class="col-sm-9">
						<input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="Descrizione" value="{{$item->descrizione or ''}}">									
				@endif
					</div>
				</div>
					<input type="hidden" id="ag_id" name="ag_id" value="{{$item->esecutore_id}}">
					
				 	<input type="hidden" id="doc_id" name="doc_id" value="{{$item->documento_id}}">
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-save_ruolu" value="add">Salva</button>
			<button type="button" class="btn btn-warning"  onClick="$('#myModal_ruolu').modal('hide');">Annulla</button>		
		</div>
	</div>
</div>
<div class="modal fade" id="myModal_tag" tabindex="13" role="dialog"  ></div>
<script>
$(function()
{	
	 $( "#ag_nome" ).autocomplete({
	  source: "esecudoris/autocomplete",
	  minLength: 3,
	  select: function(event, ui) {
		 
	  	$('#ag_nome').val(ui.item.value);
	  	$('#ag_id').val(ui.item.id);
	  	$('#ag_nome').css('color','green');
	  	
	  }
	});
	 $( "#ag_nome" ).keypress(function(){ 
		 $('#ag_id').val('');
		 $('#ag_nome').css('color','orange');
		 });
});
function ruoluValidate(){
	if ($('#ag_id').val()=='') {
			alert ("Scegli un esecutore valido!");
		} else {
			return true;
		}
				
	}

function addTag() {
	AjaxGET('/documentus/{{$item->documento_id}}/tag', function (){
		$('#myModal_tag').modal('hide');
		$('#descrizione').val("tag["+mousex+","+mousey+"]");
		
	},'tag');

}


/*
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
*/
</script>
