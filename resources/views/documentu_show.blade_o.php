

<div class="modal-dialog modal-lg" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Documento</h4>
		</div>
		
		<div class="modal-body">
			<div class="row">
				<div class="col-sm-8">
					<div class="panel panel-default">
					  <div class="panel-heading">Titolo</div>
					  <div class="panel-body"><strong>{{$item->titolo}}</strong></div>
					</div>
				</div>
					
				<div class="col-sm-4">
					<div class="panel panel-default ">
					  <div class="panel-heading">Data</div>
					  <div class="panel-body">{{$item->data}}</div>
					</div>
				</div>
				
			</div>	
			
				<div class="panel panel-default">
				  <div class="panel-heading">Descrizione</div>
				  <div class="panel-body">{{$item->descrizione}}</div>
				</div>				
			
			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-default ">
					  <div class="panel-heading">Tipo</div>
					  <div class="panel-body">{{$item->tipo_str}}</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-default">
					  <div class="panel-heading">Formato</div>
					  <div class="panel-body">{{$item->formato}}</div>
					</div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-default">
					  <div class="panel-heading">Evento</div>
					  <div class="panel-body">{{$item->evento->nome}}</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-default">
					  <div class="panel-heading">Collezione</div>
					  <div class="panel-body">{{$item->collezione->nome}}</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="panel panel-default">
					  <div class="panel-heading">Lingua</div>
					  <div class="panel-body">
						 @php	
						if (($item->lingua!="")&&($item->lingua!=null))
						{
							echo "<span class='label label-pill label-success'>";
							echo implode("</span>&nbsp;<span class='label label-pill label-success'>",explode(",", $item->lingua));												
							echo "</span>";
						}
						@endphp
						<br><br>
						<i>{{$item->lingua_det}}</i>
					  </div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="panel panel-default">
					  <div class="panel-heading">Identificatore</div>
					  <div class="panel-body">{{$item->identificatore}}</div>
					</div>
				</div>
			</div>
				<div class="panel panel-default">
				  <div class="panel-heading">Creatore</div>
				  <div class="panel-body">
					  
					@php	
					if (($item->creatore!="")&&($item->creatore!=null))
					{
						echo "<span class='label label-pill label-success'>";
						echo implode("</span>&nbsp;<span class='label label-pill label-success'>",explode(",", $item->creatore));												
						echo "</span>";
					}
					@endphp

				  </div>
				</div>
				
				<div class="panel panel-default">
				  <div class="panel-heading">Soggetto</div>
				  <div class="panel-body">
					  @php	
					if (($item->soggetto!="")&&($item->soggetto!=null))
					{
						echo "<span class='label label-pill label-success'>";
						echo implode("</span>&nbsp;<span class='label label-pill label-success'>",explode(",", $item->soggetto));												
						echo "</span>";
					}
					@endphp
				  </div>
				</div>
				
				<div class="panel panel-default">
				  <div class="panel-heading">Editore</div>
				  <div class="panel-body">
					 @php	
					if (($item->editore!="")&&($item->editore!=null))
					{
						echo "<span class='label label-pill label-success'>";
						echo implode("</span>&nbsp;<span class='label label-pill label-success'>",explode(",", $item->editore));												
						echo "</span>";
					}
					@endphp
				  </div>
				</div>
				
				<div class="panel panel-default">
				  <div class="panel-heading">Contributore</div>
				  <div class="panel-body">
					  @php	
					if (($item->contributore!="")&&($item->contributore!=null))
					{
						echo "<span class='label label-pill label-success'>";
						echo implode("</span>&nbsp;<span class='label label-pill label-success'>",explode(",", $item->contributore));												
						echo "</span>";
					}
					@endphp
				  </div>
				</div>
				
				<div class="panel panel-default">
				  <div class="panel-heading">Diritti</div>
				  <div class="panel-body">{{$item->diritti}}</div>
				</div>
				
				<div class="row">
					<div class="col-sm-6">
						<div class="panel panel-default">
						  <div class="panel-heading">Relazioni verso</div>
						  <div class="panel-body">
							   <table class="table table-striped" id="acapiaus">
									<thead>
									  <tr>
										<th>Documento</th>
										<th>Tipo</th>
										<th>Descrizione</th>
									  </tr>
									</thead>
									<tbody>
									@foreach($item->acapiaus as $d)
										 <tr id="row_{{$d->id}}">
											<td>{{$d->documentuA->titolo}}</td>	
											<td>{{$tipus_ac[$d->tipo]}}</td>									
											<td>{{$d->descrizione}}</td>
										</tr>
									@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="panel panel-default">
							<div class="panel-heading">Relazioni da</div>
							<div class="panel-body">
								 <table class="table table-striped" id="acapius">
										<thead>
										  <tr>
											<th>Documento</th>
											<th>Tipo</th>
											<th>Descrizione</th>								
										  </tr>
										</thead>
										<tbody>
										@foreach($item->acapius as $d)
											 <tr id="row_{{$d->id}}">
												<td>{{$d->documentuDe->titolo}}</td>
												<td>{{$tipus_ac[$d->tipo]}}</td>
												<td>{{$d->descrizione}}</td>										
											</tr>
										@endforeach
										</tbody>
								</table>	
							</div>
						</div>							
					</div>		
				</div>
				<div class="panel panel-default">
				  <div class="panel-heading">Info</div>
				  <div class="panel-body">
					  Creato: {{$item->created_at}} da {{$item->user_created->name}}
					  <br>
					  Modificato: {{$item->updated_at}} da {{$item->user_updated->name}}
					 </div>
				</div>
				
			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-quit" data-dismiss="modal">Esci</button>
			
		</div>
	</div>
</div>
