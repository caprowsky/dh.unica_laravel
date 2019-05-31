@foreach($item->agenti as $d)
	 <tr id="rowr_{{$d->pivot->id}}">
		<td><span class='label label-pill label-default'>{{$d->pivot->ruolo}}</span></td>
		<td><span class="mhover" onClick="AjaxGET('/esecudoris/{{$d->id}}')">{{$d->nome}}&nbsp;{{$d->cognome}}</span></td>
		<td>{{$d->pivot->descrizione}}</td>
		<td>
			<button type ="button" class="btn btn-warning btn-xs" onClick="editRuolu({{$d->pivot->id}})"><span class="glyphicon glyphicon-edit"></button>
			<button type ="button" class="btn btn-danger btn-xs" onClick="delRuolu({{$d->pivot->id}})"><span class="glyphicon glyphicon-remove"></button>
	
		</td>
	</tr>
@endforeach
