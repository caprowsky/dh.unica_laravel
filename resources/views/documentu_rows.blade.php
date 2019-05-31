@foreach ($items as $item)
	<tr id="item{{$item->id}}">
		<td><b>{{$item->titolo}}</b><br><font size=1> {{$item->titolo_alt or ''}}</font></td>	
		<td title="{{$item->data_note or ''}}" onclick="alertnote('{{$item->data_note}}')">
		@if ($item->data_note)
		<b>N</b>&nbsp;
		@endif
		{{$item->data}}
		</td>
		<td>{{$tipus[$item->tipo]}}</td>
		<td>{{$item->identificatore}}</td>	
		<td class="btn-link" onClick="AjaxGETinPanel('/eventus',go(),null,'eventu_id={{$item->evento_id}}')">{{$item->evento->nome}}</td>
		<td class="btn-link" onClick="AjaxGETinPanel('/colletzionis',go(),null,'colletzioni_id={{$item->collezione_id}}')">{{$item->collezione->nome}}</td>
					
		<td>
			<button class="btn btn-primary btn-xs" title="Play" onClick="AjaxGET(url+'/{{$item->id}}'+'/play')"><span class="glyphicon glyphicon-play"></span></button>
			@can('edit rows')
				<button class="btn btn-success btn-xs" title="Textgrid e files" onClick="AjaxEdit(url+'/resources',{{$item->id}})"><span class="glyphicon glyphicon-list-alt"></span></button>
			@endcan
			<button class="btn btn-default btn-xs" title="Dettagli" onClick="AjaxGET(url+'/{{$item->id}}')"><span class="glyphicon glyphicon-info-sign"></span></button>
			<button class="btn btn-info btn-xs" onClick="AjaxGET(url+'/rev/'+{{$item->id}},null,'search')"><span class="glyphicon glyphicon-search"></span></button>			

			@can('edit rows')
				<button class="btn btn-warning btn-xs" onClick="AjaxEdit(url,{{$item->id}},{{$det['abb']}}_update)"><span class="glyphicon glyphicon-edit"></span></button>
			@endcan
			@include ('comp/delete_button')	

		</td>
	</tr>
	
@endforeach
	<tr>
		<td colspan='2'>
		{{ $items->appends('pag')->links() }}
		</td>
	</tr>
