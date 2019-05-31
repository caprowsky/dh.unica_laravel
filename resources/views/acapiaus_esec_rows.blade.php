@foreach($item->acapiaus as $d)
	 <tr id="row_{{$d->id}}">
		<td><span class="mhover" onClick="AjaxGET('/esecudoris/{{$d->esecudoriA->id}}')">{{$d->esecudoriA->nome}}</span></td>
		<td><span class='label label-pill label-default'>{{$tipus_ac[$d->tipo]}}</span></td>
		<td>{{$d->descrizione}}</td>
		<td>
			<button type ="button" class="btn btn-danger btn-xs" onClick="delAcapiuEsec({{$d->id}})"><span class="glyphicon glyphicon-remove"></button>
		</td>
	</tr>
@endforeach
