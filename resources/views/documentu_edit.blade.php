

<div class="modal-dialog modal-lg" >
	<div class="modal-content" id="modal-content_doc_edit">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Documento</h4>
		</div>
		<div class="modal-body">
			<form id="frmitems" name="documentu_edit" class="form-horizontal" novalidate="" enctype="multipart/form-data" method="post">

				<div class="form-group">
					<label for="titolo" class="col-sm-2 control-label">Titolo</label>
					<div class="col-sm-9">
						<input type="text" class="form-control has-error" id="do_titolo" name="titolo" placeholder="Titolo" value="{{$item->titolo}}" maxlength="255">
					</div>
				</div>
				<div class="form-group">
					<label for="titolo_alt" class="col-sm-2 control-label">Titolo alternativo</label>
					<div class="col-sm-9">
						<input type="text" class="form-control has-error" ondblclick="json_modal(redump(JSON.parse(this.value)))"
						id="do_titolo_alt" name="titolo_alt" placeholder="Titolo alternativo" value="{{$item->titolo_alt}}" maxlength="1023">
					</div>
				</div>
				
				<div class="form-group">
					<label for="soggetto" class="col-sm-2 control-label">Soggetto</label>
					<div class="col-sm-9">
						<textarea style="resize: vertical;" class="form-control" ondblclick="json_modal(redump(JSON.parse(this.value)))"
						id="do_soggetto" name="soggetto" rows= "4" placeholder="Soggetto" maxlength="1023">{{$item->soggetto or ''}}</textarea>
					</div>
				</div>
				
				<!-- TextArea descritzioni -->
				@include ('/comp/descr')	
				
				@if ($item->id!="")
				<hr>
				<div class="form-group">
					<label for="addRu" class="col-sm-2">Ruoli</label>
					
					<div class="col-sm-9">
						<button type="button" class="btn btn-info btn-sm add" id="addRu" onClick="addRuolu()">+</span></button>		
					</div>
				</div>
				 <div class="form-group">
					
					<div class="col-sm-10 col-sm-offset-1">				
						 <table class="table table-striped" id="ruolus">
							<thead>
							  <tr>
								<th>Ruolo</th>
								<th>Nome Cognome</th>
								
								<th>Descrizione</th>
								<th>Azioni</th>
							  </tr>
							</thead>
							<tbody id="ruolus_rows">
							@include ('ruolus_rows')
							</tbody>
						</table>					
					</div>	
				</div>
					<p class="text-warning cosl-sm-2">NB Le modifiche sui ruoli hanno effetto immediato</p>
				@else
					<p class="text-warning cosl-sm-2">NB Prima di poter aggiungere ruoli bisogna salvare il documento</p>
				@endif
				<hr>
								
				<div class="form-group">
					<label for="data" class="col-sm-2 control-label">Data</label>
					<div class="col-sm-4">
						<input type="text" class="date form-control" style="display:inline;" id="do_d_data" name="data" placeholder="Data" value="{{$item->data or ''}}">
					</div>
					<div class="col-sm-offset-1 col-sm-4">
						<input type="text" class="form-control" ondblclick="json_modal(redump(JSON.parse(this.value)))"
						id="do_data_note" name="data_note" placeholder="Note" value="{{$item->data_note or ''}}" title="{{$item->data_note or ''}}" maxlength="1023">
					</div>
				</div>
				
				<div class="form-group">
					<label for="formato" class="col-sm-2 control-label">Formato</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="do_formato" name="formato" placeholder="Formato" value="{{$item->formato or ''}}">
					</div>
				</div>
				
				 <div class="form-group">
					<label for="tipo" class="col-sm-2 control-label">Tipo</label>
					<div class="col-sm-9">
						<select class="form-control" name="tipo" id="tipo">
							@for ($i=0;$i<count($tipus);$i++)
							  <option value="{{$i}}"
								@if (($item->tipo!=null)&&($item->tipo==$i))
									selected="selected"
								@endif
								>{{$tipus[$i]}}</option>
							@endfor
						</select>
					</div>
					
				</div>
				
				
				<div class="form-group">
					<label for="lingua" class="col-sm-2 control-label">Lingua</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="do_lingua" name="lingua" placeholder="Lingua" value="{{$item->lingua or ''}}">
					</div>
				</div>
				
				<div class="form-group">
					<label for="lingua_det" class="col-sm-2 control-label">Lingua (dettagli)</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" ondblclick="json_modal(redump(JSON.parse(this.value)))"
						id="do_lingua_det" name="lingua_det" placeholder="Dettagli" value="{{$item->lingua_det or ''}}" maxlength="1023">
					</div>
				</div>
				
				<div class="form-group">
					<label for="identificatore" class="col-sm-2 control-label">Identificatore</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="do_identificatore" name="identificatore" 
						placeholder="Identificatore" value="{{$item->identificatore or ''}}">
					</div>
				</div>
				
				<div class="form-group">
					<label for="diritti" class="col-sm-2 control-label">Diritti</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="do_diritti" name="diritti" placeholder="Diritti" value="{{$item->diritti or ''}}">
					</div>
				</div>
				<hr>
				
				@if ($item->id!="")
				<div class="form-group">
					<label for="addAc" class="col-sm-2">Relazioni</label>
					
					<div class="col-sm-9">
						<button type="button" class="btn btn-info btn-sm add" id="addAc" onClick="addAcapiu()">+</span></button>		
					</div>
				</div>
				 <div class="form-group">
					<label for="acapiaus" class="col-sm-2">Relazioni verso</label>
					<div class="col-sm-9">			
						 <table class="table table-striped" id="acapiaus">
							<thead>
							  <tr>
								<th>Tipo</th>
								<th>Documento</th>
								<th>Descrizione</th>
								<th>Azioni</th>
							  </tr>
							</thead>
							<tbody id="acapiaus_rows">
							@include ('acapiaus_rows')
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
								<th>Documento</th>
								<th>Tipo</th>
								<th>Descrizione</th>
								<th>Azioni</th>
							  </tr>
							</thead>
							<tbody id="acapius_rows">
							@include ('acapius_rows')
							</tbody>
						</table>					
					</div>
				</div>
				<p class="text-warning cosl-sm-2">NB Le modifiche sulle relazioni hanno effetto immediato</p>
				<hr>
				@else
				<p class="text-warning cosl-sm-2">NB Prima di poter aggiungere relazioni bisogna salvare il documento</p>
				<hr>
				@endif
				<div class="form-group">
					<label for="inizio" class="col-sm-2 control-label">Tempo iniziale (s)</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="do_inizio" name="inizio" value="{{$item->inizio or ''}}" onchange="tempus(1)">
					</div>
					<label for="fine" class="col-sm-2 control-label">Tempo finale (s)</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="do_fine" name="fine" value="{{$item->fine or ''}}" onchange="tempus(2)">
					</div>
				
					<label for="dur" class="col-sm-2 control-label">Durata (s)</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" id="do_dur" name="dur" onchange="tempus(3)" value="{{$item->fine-$item->inizio}}">
					</div>
				</div>
				<hr>
				 <div class="form-group">
					<label for="eventu_id" class="col-sm-2 control-label mhover" onClick="getEventu()">Evento</label>
					<div class="col-sm-7">
						<select class="form-control" name="evento_id" id="eventu_id">
							@foreach($eventus as $l)
							  <option value="{{$l->id}}"
								@if (($item->evento_id!=null)&&($item->evento_id==$l->id))
									selected="selected"
								@endif
								>{{$l->nome}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-sm-2">
						<button type="button" class="btn btn-info btn-sm add" onClick="addEventu()">+</span></button>		
					</div>
				</div>
				
				<div class="form-group">
					<label for="colletzioni_id" class="col-sm-2 control-label mhover" onClick="getColletzioni()">Collezione</label>
					<div class="col-sm-7">
						<select class="form-control" name="collezione_id" id="colletzioni_id">
							@foreach($colletzionis as $l)
							  <option value="{{$l->id}}"
								@if (($item->collezione_id!=null)&&($item->collezione_id==$l->id))
									selected="selected"
								@endif
								>{{$l->nome}}</option>
							@endforeach
						</select>
					</div>
					<div class="col-sm-2">
						<button type="button" class="btn btn-info btn-sm add" onClick="addColletzioni()">+</span></button>		
					</div>
				</div>
				
				
				 <input type="hidden" id="item_id" name="id" value="{{$item->id}}">
					
			</form>
				
		</div>
		<div class="modal-footer">
			
			<div style="float:right">
				<button type="submit" class="btn btn-primary" id="btn-save_documentus" value="add" >Salva</button>
				<button type="button" class="btn btn-warning"  onClick="$('#myModal_documentus').modal('hide');">Annulla</button>
			</div>
			@if ($item->id!="")
			<div style="float:left">
				<button type="button" class="btn btn-info"  onClick="clona({{$item->id}});">Clona (Metadati)</button>
				<button type="button" class="btn btn-info"  onClick="clona_totu({{$item->id}});">Clona (Tutto)</button>
				<a href='documentus/{{$item->id}}/esporta'><button type="button" class="btn btn-info">Esporta</button></a>
			</div>
			@else
			<div style="float:left">
				<div>
				<button type="button" class="btn btn-info"  onClick="importa({{$item->id}});">Importa (Metadati)</button>
				
				<input type="file" id="fileupload" name="dfile" accept=".json" style="display:inline;"/>
				</div>
			</div>
			@endif
		</div>
	</div>
</div>

<div class="modal fade" id="myModal_json" tabindex="13" role="dialog"  >
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" >
			<div class="modal-header">
				
				<h4 class="modal-title" id="myModalLabel">JSON</h4>
			</div>
			<div class="modal-body" id="json">
			AAA</div>
		</div>

	</div>
</div>

<div class="modal fade" id="myModal_eventus" tabindex="10" role="dialog" ></div>
<div class="modal fade" id="myModal_colletzionis" tabindex="11" role="dialog"    ></div>
<div class="modal fade" id="myModal_acapiu" tabindex="12" role="dialog"  ></div>
<div class="modal fade" id="myModal_ruolu" tabindex="13" role="dialog"  ></div>

<script>
	var mousex;
	var mousey;
	var tgname;
	var id="{{$item->id}}";
	
	$("input[id*='d_']").datepicker({
		container:'#documentu_edit',
		dateFormat: 'yy-mm-dd',
		showOn: "button",
		buttonText: "Data",
		buttonImage: "https://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
		buttonImageOnly: false,
	}); 
	
// Nuova relazione
//*******************

function addAcapiu() {
	AjaxCreate('/documentus/{{$item->id}}/acapiu', function (){
		if (acapiuValidate()) {	//In acapiu edit
		var formData=$('form[name=acapiu_edit]').serialize();
        
		AjaxPP('/documentus/{{$item->id}}/acapiu',formData,0,refreshAcapius,'acapiu');
	}
	},'acapiu');
}
// Refresh!
function refreshAcapius() {

	$.get( "documentus/{{$item->id}}/acapius", function( data ) {
	  $( "#acapius_rows" ).html( data );	 
	});
	$.get( "documentus/{{$item->id}}/acapiaus", function( data ) {
	  $("#acapiaus_rows").html( data );	 
	});
}
// Cancella
function delAcapiu(id) {
		AjaxDelete('/documentus/'+id+'/acapiu','');
		$('#row_'+id).closest('tr').remove();
		
		
}

function addRuolu() {
	
		AjaxCreate('/documentus/{{$item->id}}/ruolu', function (){
			if (ruoluValidate()) {	//In ruolu edit
			var formData=$('form[name=ruolu_edit]').serialize();
			
			AjaxPP('/documentus/{{$item->id}}/ruolu',formData,0,refreshRuolus,'ruolu');
		}
		},'ruolu');
	}

function editRuolu(rid) {
	AjaxEdit('/documentus/'+id+'/ruolu/',rid, function (){
		if (ruoluValidate()) {	//In ruolu edit
		var formData=$('form[name=ruolu_edit]').serialize();
        
		AjaxPP('/documentus/'+rid+'/ruolu',formData,rid,refreshRuolus,'ruolu');
	}
	},'ruolu');
}
// Cancella
function delRuolu(id) {
		AjaxDelete('/documentus/'+id+'/ruolu','');
		$('#rowr_'+id).closest('tr').remove();		
		
}
function refreshRuolus() {

	$.get( "documentus/{{$item->id}}/ruolus", function( data ) {
	  $( "#ruolus_rows" ).html( data );	 
	});

}

function clona() {
	$.get("/documentus/"+id+"/clona",function () { $('#myModal_documentus').modal('hide'); refresh();});
}
function clona_totu() {
	$.get("/documentus/"+id+"/clona_totu",function () { $('#myModal_documentus').modal('hide'); refresh();});
}
function importa() {
	var f = $('#fileupload').val();
	if (f=="")	{	
		alert("Selezionare un file");
	}
	else {
		
	var form_data = new FormData();

	form_data.append('dfile',$('#fileupload')[0].files[0]);
	
	
	$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
	$.ajax({
		type: 'POST',
		cache: false,
		processData: false,
		contentType: false,
		data: form_data,
		url: '/documentus/importa',

		success: function(data) {
			 
				$('#myModal_documentus').html(data);                        
                $('#myModal_documentus').modal('show');
				$('#btn-save_documentus').on("click",do_create);
				
		}
	});
}
}

function tempus(n) {
		var i=$('#do_inizio').val()*1;
		var f=$('#do_fine').val()*1;
		var d=$('#do_dur').val()*1;
		
		switch (n) {
			case 1:	//inizio
			if (f=="") f=i+d;
			else d=f*1-i*1;
			break;
			case 2: //fine
			if (i=="") i=f-d;
			else d=f*1-i*1;
			break;
			case 3: //dur
			if (i=="") i=d-f;
			else f=i+d;
			break;
		}
	if (i<0) i=0;
	if (f<0) f=0;
	if (f<i) f=i;
	if (d<0) d=0;
	
	$('#do_inizio').val(i);
	$('#do_fine').val(f);
	$('#do_dur').val(d);
				
}
</script>

