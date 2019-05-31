@foreach ($items as $item)
	<tr id="item{{$item->id}}">
		<td><b>{{$item->nome}}</b></td>		
		<td title="{{$item->data_note or ''}}" onclick="alertnote('{{$item->data_note}}')">
		@if ($item->data_note)
		<b>N</b>&nbsp;
		@endif
		{{$item->data}}
		</td>
		<td>{{$item->descrizione}}</td>
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
