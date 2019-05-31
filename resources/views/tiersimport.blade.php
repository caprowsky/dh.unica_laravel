<div class="modal-dialog modal-lg" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Importa TextGrid</h4>
		</div>
		<div class="modal-body" style="overflow-x:scroll;">
		<p class="text-danger"><i>I tier in rosso sono già presenti, se spuntati verranno sovrascritti!</i></p>

 <table class="table table-striped" id="partecipantis" >
						<thead>
						  <tr>
							  <th>Seleziona</th>
	<th>Nome</th>
	<th>Descrizione</th>
	<th>Classe</th>
	<th>Num. intervalli</th>	
	
  </tr>
						</thead>
						<tbody>
	@foreach ($items as $item)
	<form>
	<tr id="item{{$item->id}}">
	
	<td><input name="sel" value='{{$item->id}}' type="checkbox" checked></td>
		@if ($item->overwrite)
		<td><p class="text-danger">{{$item->nome}}</span></td>
		@else
		<td>{{$item->nome}}</td>
		@endif
		
		<td>{{$item->descrizione}}</td>
		<td>{{$item->classe}}</td>
		<td>{{$item->intervalli}}</td>
		
	   
		@if ($item->esecudori!=null)
	<td> 
		<select name="{{$item->id}}">
			
			@foreach ($item->esecudori as $esec)
			<option value="{{$esec->id}}">{{$esec->nome}} {{$esec->cognome}}</option>
			@endforeach
		</select>
	</td>
	@else
	<td></td>
	@endif
	</tr>
	@endforeach
	</tbody>
					</table>
					
					
				
			</form>
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary" id="btn-save_tiers" value="add" onClick="importTG()">Importa</button>
			
		</div>
	</div>
</div>
