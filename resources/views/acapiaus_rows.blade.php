@foreach($item->acapiaus as $d)
	 <tr id="row_{{$d->id}}">
		<td><span class='label label-pill label-default'>{{$tipus_ac[$d->tipo]}}</span></td>
		<td><span class="mhover" onClick="AjaxGET('/documentus/{{$d->documentuA->id}}')">{{$d->documentuA->titolo}}</span></td>
		<td>{{$d->descrizione}}</td>
		<td>
			<button type ="button" class="btn btn-danger btn-xs" onClick="delAcapiu({{$d->id}})"><span class="glyphicon glyphicon-remove"></button>
		</td>
	</tr>
@endforeach
