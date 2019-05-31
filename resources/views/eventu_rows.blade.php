@foreach ($items as $item)
	<tr id="item{{$item->id}}">
		<td><b>{{$item->nome}}</b></td>
		<td title="{{$item->datai_note or ''}}" onclick="alertnote('{{$item->datai_note}}')">
		@if ($item->datai_note)
		<b>N</b>&nbsp;
		@endif
		{{$item->inizio}}
		</td>
		<td title="{{$item->dataf_note or ''}}" onclick="alertnote('{{$item->dataf_note}}')">
		@if ($item->dataf_note)
		<b>N</b>&nbsp;
		@endif
		</td>
		{{$item->fine}}
		<td>{{$item->descrizione}}</td>
		<td class="btn-link" onClick="AjaxGETinPanel('/acorradoris',go(),null,'acorradori_id={{$item->aggregatore->id}}')">{{$item->aggregatore->nome}}</td>
		<td title="{{$item->luogo_note or ''}}" onclick="alertnote('{{$item->luogo_note}}')">
		@if ($item->luogo_note)
		<b>N</b>&nbsp;
		@endif
		{{$item->luogo->nome}}
		</td>
		<td>
		@include ('comp/butonis')	
		</td>
	</tr>
	
@endforeach
	<tr>
		<td colspan='2'>
		{{ $items->appends('pag')->links() }}
		</td>
	</tr>
