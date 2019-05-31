@foreach ($items as $item)
	<tr id="item{{$item->id}}">
		<td>{{$item->nome}}</td>
		<td>{{$item->lat}},{{$item->lng}}</td>
		<td>{{$item->descrizione}}</td>
		   
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
