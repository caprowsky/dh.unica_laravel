@foreach ($items as $item)
	<tr id="item{{$item->id}}">
		<td title="{{$item->alias or ''}}" onclick="alertnote('{{$item->alias}}')">
		@if ($item->alias)
		<b>A</b>&nbsp;
		@endif
		{{$item->nome}}
		</td>
		@if ($item->tipo==0)
		<td>{{$item->cognome}}</td>
		@else
		<td>-</td>
		@endif
		<td>{{$item->sesso}}</td>
		<td>{{$tipus[$item->tipo]}}</td>
		<td title="{{$item->datan_note or ''}}" onclick="alertnote('{{$item->datan_note}}')">
		@if ($item->datan_note)
		<b>N</b>&nbsp;
		@endif
		{{$item->nascita}}
		</td>
		<td title="{{$item->datam_note or ''}}" onclick="alertnote('{{$item->datam_note}}')">
		@if ($item->datam_note)
		<b>N</b>&nbsp;
		@endif
		{{$item->morte}}
		</td>
		<td>{{$item->descrizione}}</td>
		  
		<td>
		<button class="btn btn-default btn-xs" title="Dettagli" onClick="AjaxGET(url+'/{{$item->id}}')"><span class="glyphicon glyphicon-info-sign"></span></button>
		
		@include ('comp/butonis')	
		</td>
	</tr>
	
@endforeach
	<tr>
		<td colspan='2'>
		{{ $items->appends('pag')->links() }}
		</td>
	</tr>
