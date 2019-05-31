@foreach($item->logusEsec as $d)
	 <tr id="row_{{$d->id}}">
		<td>{{$d->luogo->nome}}</td>
		<td>{{$d->descrizione}}</td>
		@if (isset($edit))
		<td>
			<button type ="button" class="btn btn-danger btn-xs" onClick="delLoguEsec({{$d->id}})"><span class="glyphicon glyphicon-remove"></button>
		</td>
		@endif
	</tr>
@endforeach
