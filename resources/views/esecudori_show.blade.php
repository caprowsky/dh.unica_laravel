

<div class="modal-dialog modal-lg" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Agente: <strong>{{$item->nome}}&nbsp;{{$item->cognome}}</strong></h4>
		</div>
		
		<div class="modal-body">
			<div class="row">
				
				<div class="col-sm-2">
					<div class="panel panel-default ">
						<div class="panel-heading">Sesso</div>
						<div class="panel-body">
						  {{$item->sesso}}
						</div>
					</div>
				</div>
				<div class="col-sm-2">
					<div class="panel panel-default ">
						<div class="panel-heading">Tipo</div>
						<div class="panel-body">
						  {{App\EsecudoriModel::getTipi()[$item->tipo]}}
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="panel panel-default ">
					  <div class="panel-heading">Date</div>
					  <div class="panel-body">
						  Nascita: {{$item->nascita}} 
						  @if ($item->datan_note!="")
						   (<i>{{$item->datan_note}}</i>)
						   @endif
						   <br>
						  Morte: {{$item->morte}}
						  @if ($item->datam_note!="")
						   (<i>{{$item->datam_note}}</i>)
						   @endif
						  </div>
					</div>
				</div>
			</div>
			@if (($item->alias!="")&&($item->alias!=null))
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
					  <div class="panel-heading">Alias</div>
					  <div class="panel-body">
						  @php	
						
							echo "<span class='label label-pill label-info'>";
							echo implode("</span>&nbsp;<span class='label label-pill label-info'>",explode(",", $item->alias));												
							echo "</span>";
						
						@endphp
					  </div>
					</div>
				</div>
			</div>
			@endif
			@if ($item->descrizione!="")
			<div class="row">
				<div class="col-sm-12">		
					<div class="panel panel-default">
					  <div class="panel-heading">Descrizione</div>
					  <div class="panel-body">
						  {{$item->descrizione}}
						 </div>
					</div>				
				</div>
			</div>
			@endif
			@if (count($item->logusEsec)>0)
			<div class="row">
				<div class="col-sm-12">		
					<div class="panel panel-default">
					  <div class="panel-heading">Luoghi</div>
					  <div class="panel-body">
						  <table class="table table-striped" id="logus">
							<thead>
							  <tr>
								<th>Nome</th>
								<th>Note</th>
								
							  </tr>
							</thead>
							<tbody id="logus_rows">
							
							@include ('logus_esec_rows')
							</tbody>
						</table>		
						 </div>
					</div>				
				</div>
		</div>
		@endif
		@if (count($item->partecipant)>0)
			<div class="row">
				<div class="col-sm-12">		
					<div class="panel panel-default">
					  <div class="panel-heading">Partecipazione ad eventi</div>
					  <div class="panel-body">
						  <table class="table table-striped" id="logus">
							<thead>
							  <tr>
								<th>Evento</th>
								<th>Ruolo</th>
								<th>Note</th>
								
							  </tr>
							</thead>
							<tbody>
							@foreach($item->partecipant as $p)
								 <tr >
									<td>{{$p->evento->nome}}</td>
									<td>{{$p->ruolo}}</td>
									<td>{{$p->descrizione}}</td>
								</tr>
							@endforeach
							</tbody>
						</table>		
						 </div>
					</div>				
				</div>
		</div>
		@endif
		@if (count($item->esec_documentu)>0)
			<div class="row">
				<div class="col-sm-12">		
					<div class="panel panel-default">
					  <div class="panel-heading">Contributo a documenti</div>
					  <div class="panel-body">
						  <table class="table table-striped" id="logus">
							<thead>
							  <tr>
								<th>Documento</th>
								<th>Ruolo</th>
								<th>Note</th>
								
							  </tr>
							</thead>
							<tbody>
							@foreach($item->esec_documentu as $d)
								 <tr >
									<td>{{$d->documento->titolo}}</td>
									<td>{{$d->ruolo}}</td>
									<td>{{$d->descrizione}}</td>
								</tr>
							@endforeach
							</tbody>
						</table>		
						 </div>
					</div>				
				</div>
		</div>
		@endif
		@if (count($item->acapiaus)>0)
			<div class="row">
				<div class="col-sm-12">		
					<div class="panel panel-default">
					  <div class="panel-heading">Relazioni con</div>
					  <div class="panel-body">
						  <table class="table table-striped" id="logus">
							<thead>
							  <tr>
								  <th>Tipo</th>
								<th>Agente</th>
								
								<th>Descrizione</th>
								
							  </tr>
							</thead>
							<tbody>
							@foreach($item->acapiaus as $a)
								 <tr >
									 <td> {{App\AcapiuEsecModel::getTipiIt()[$a->tipo]}}</td>
									<td>{{$a->EsecudoriA->nome}}&nbsp;{{$a->EsecudoriA->cognome}}</td>
									
									<td>{{$a->descrizione}}</td>
								</tr>
							@endforeach
							</tbody>
						</table>		
						 </div>
					</div>				
				</div>
		</div>
		@endif
		
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-quit" data-dismiss="modal">Esci</button>
			
		</div>
	</div>
</div>
