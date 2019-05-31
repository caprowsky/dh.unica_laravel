

<div class="modal-dialog" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Esecutore</h4>
		</div>
		<div class="modal-body">
			<form id="esecudori_edit" name="esecudori_edit" class="form-horizontal" novalidate="">

				<div class="form-group">
					<label for="nome" class="col-sm-2 control-label">Nome/Denom</label>
					<div class="col-sm-9">
						<input type="text" class="form-control " id="es_nome" name="nome" placeholder="Nome" value="{{$item->nome}}" maxlength="255">
					</div>
				</divA
				
				<div class="form-group">
					<label for="cognome" class="col-sm-2 control-label">Cognome</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="es_cognome" name="cognome" placeholder="Cognome" value="{{$item->cognome}}" maxlength="31">
					</div>
				</div>
								
								
				<div class="form-group">
					<label for="sesso" class="col-sm-2 control-label">Sesso</label>
					<div class="col-sm-9">
						<select class="form-control" name="sesso" id="es_sesso">
							@php
							$sex=App\EsecudoriModel::getSex();
							for ($i=0;$i<count($sex);$i++)
							{
							  echo '<option value="'.$sex[$i].'"';
								if (($item->sesso==$sex[$i]))
									echo 'selected="selected"';
								
								echo '>'.$sex[$i].'</option>';
							}
							@endphp
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="alias" class="col-sm-2 control-label">Alias</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="es_alias" name="alias" placeholder="Alias" value="{{$item->alias}}" maxlength="255">
					</div>
				</div>
				
				<div class="form-group">
					<label for="tipo" class="col-sm-2 control-label">Tipo</label>
					<div class="col-sm-9">
						<select class="form-control" name="tipo" id="es_tipo" onchange="tipoChanged()">
							@php
							$tipus=App\EsecudoriModel::getTipi();
							for ($i=0;$i<count($tipus);$i++)
							{
							  echo '<option value="'.$i.'"';
								if (($item->tipo!=null)&&($item->tipo==$i))
									echo 'selected="selected"';
								
								echo '>'.$tipus[$i].'</option>';
							}
							@endphp
						</select>
					</div>
					
				</div>
				
		
				<div class="form-group">
					<label for="nascita" class="col-sm-2 control-label">Data di nascita</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" style="display:inline;" id="es_d_nascita" name="nascita" placeholder="Data nascita" value="{{$item->nascita or ''}}" maxlength="12">
					</div>
					<div class="col-sm-offset-1 col-sm-4">
						<input type="text" class="form-control" id="es_datan_note" ondblclick="json_modal(redump(JSON.parse(this.value)))"
						name="datan_note" placeholder="Note" value="{{$item->datan_note or ''}}" title="{{$item->datan_note or ''}}" maxlength="1023">
					</div>
				</div>
				
				<div class="form-group">
					<label for="morte" class="col-sm-2 control-label">Data di morte</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" style="display:inline;" id="es_d_morte" name="morte" placeholder="Data morte" value="{{$item->morte or ''}}" maxlength="12">
					</div>
					<div class="col-sm-offset-1 col-sm-4">
						<input type="text" class="form-control" id="es_datam_note" ondblclick="json_modal(redump(JSON.parse(this.value)))"
						name="datam_note" placeholder="Note" value="{{$item->datam_note or ''}}" title="{{$item->datam_note or ''}}" maxlength="1023">
					</div>
				</div>
				
				<!-- TextArea descritzioni -->
				@include ('/comp/descr')	
				
				<hr>
				@if ($item->id!="")
				
				<div class="form-group">
					<label for="addAl" class="col-sm-2">Luoghi</label>
					
					<div class="col-sm-9">
						<button type="button" class="btn btn-info btn-sm add" id="addAl" onClick="addLoguEsec()">+</span></button>		
					</div>
				</div>
				 <div class="form-group">
					<label for="logus" class="col-sm-2"></label>
					<div class="col-sm-9">			
						 <table class="table table-striped" id="logus">
							<thead>
							  <tr>
								<th>Nome</th>
								<th>Note</th>
								<th>Azioni</th>
							  </tr>
							</thead>
							<tbody id="logus_rows">
							@php $edit=true; @endphp
							@include ('logus_esec_rows')
							</tbody>
						</table>					
					</div>
				</div>
				
				<hr>
				
				<div class="form-group">
					<label for="addAc" class="col-sm-2">Relazioni</label>
					
					<div class="col-sm-9">
						<button type="button" class="btn btn-info btn-sm add" id="addAc" onClick="addAcapiuEsec()">+</span></button>		
					</div>
				</div>
				 <div class="form-group">
					<label for="acapiaus" class="col-sm-2">Relazioni verso</label>
					<div class="col-sm-9">			
						 <table class="table table-striped" id="acapiaus">
							<thead>
							  <tr>
								<th>Esecutore</th>
								<th>Tipo</th>
								<th>Descrizione</th>
								<th>Azioni</th>
							  </tr>
							</thead>
							<tbody id="acapiaus_rows">
							@include ('acapiaus_esec_rows')
							</tbody>
						</table>					
					</div>
				</div>
				
				<div class="form-group">
					<label for="acapius" class="col-sm-2">Relazioni da</label>
					<div class="col-sm-9">			
						 <table class="table table-striped" id="acapius">
							<thead>
							  <tr>
								<th>Esecutore</th>
								<th>Tipo</th>
								<th>Descrizione</th>
								<th>Azioni</th>
							  </tr>
							</thead>
							<tbody id="acapius_rows">
							@include ('acapius_esec_rows')
							</tbody>
						</table>					
					</div>
				</div>
				
				<p class="text-warning cosl-sm-2">NB Le modifiche sulle relazioni e i luoghi hanno effetto immediato</p>
				<hr>
				@else
				<p class="text-warning cosl-sm-2">NB Prima di poter aggiungere relazioni e luoghi bisogna salvare l'esecutore</p>
				<hr>
				@endif
				
				<div class="form-group">
					@include ('comp/image')
				</div>
				
				 <input type="hidden" id="item_id" name="id" value="{{$item->id}}">
			</form>
		</div>
		<div class="modal-footer">
			@can('edit rows')
				<button type="button" class="btn btn-primary save" id="btn-save_esecudoris" value="add" onClick="abilita()">Salva</button>
			@else
			
				<script>
					var form = document.getElementById("esecudori_edit");
					var elements = form.elements;
					for (var i = 0, len = elements.length; i < len; ++i) {
						elements[i].readOnly = true;
					}
				</script>
			
			@endcan
			<button type="button" class="btn btn-warning"  onClick="$('#myModal_esecudoris').modal('hide');">Annulla</button>	
		</div>
	</div>
</div>
<div class="modal fade" id="myModal_logus" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div class="modal fade" id="myModal_acapiu" tabindex="12" role="dialog"  ></div>
<div class="modal fade" id="myModal_loguesec" tabindex="14" role="dialog"  ></div>

<script>
	var temp="{{$item->cognome}}";
	
	datePick('esecudori_edit');
	
	tipoChanged();
	
	fileUp();
	
function tipoChanged(){
	var t=$('#es_tipo').val();
	if (t!=0) {
		temp=$('#es_cognome').val();
		$('#es_cognome').val("-");
		$('#es_cognome').attr('disabled','disabled');
	}
	else {
		$('#es_cognome').removeAttr('disabled','disabled');
		$('#es_cognome').val(temp);
	}
}
function abilita() {
	$('#es_cognome').removeAttr('disabled','disabled');
}
// Nuova relazione
//*******************

function addAcapiuEsec() {
	AjaxCreate('/esecudoris/{{$item->id}}/acapiu', function (){
		if (acapiuValidate()) {	//In acapiu edit
		var formData=$('form[name=acapiu_edit]').serialize();
        
		AjaxPP('/esecudoris/{{$item->id}}/acapiu',formData,0,refreshAcapius,'acapiu');
	}
	},'acapiu');
}
// Refresh!
function refreshAcapius() {

	$.get( "esecudoris/{{$item->id}}/acapius", function( data ) {
	  $( "#acapius_rows" ).html( data );	 
	});
	$.get( "esecudoris/{{$item->id}}/acapiaus", function( data ) {
	  $("#acapiaus_rows").html( data );	 
	});
}
// Cancella
function delAcapiuEsec(id) {
		AjaxDelete('/esecudoris/'+id+'/acapiu','');
		$('#row_'+id).closest('tr').remove();
		
		
}
// Logus

function addLoguEsec() {
	AjaxCreate('/esecudoris/{{$item->id}}/logu', function (){
		if (loguValidate()) {	//In logu edit
		var formData=$('form[name=loguesec_edit]').serialize();
        
		AjaxPP('/esecudoris/{{$item->id}}/logu',formData,0,refreshLogus,'loguesec');
	}
	},'loguesec');
}
// Cancella
function delLoguEsec(id) {
		AjaxDelete('/esecudoris/'+id+'/logu','');
		$('#row_'+id).closest('tr').remove();
		
		
}
// Refresh!
function refreshLogus() {

	$.get( "esecudoris/{{$item->id}}/logus", function( data ) {
	  $( "#logus_rows" ).html( data );	 
	});
	
}
</script>
