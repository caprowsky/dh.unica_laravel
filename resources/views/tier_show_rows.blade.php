@foreach ($items as $item)
	
	<tr id="item{{$item->id}}">
		<td>{{$item->seq}}</td>
		<td class="text-success">{{$item->nota}}</td>
		<td>{{$item->inizio}}-{{$item->fine}}</td>
		<td>
			<button type="button" class="btn btn-info btn-xs" onClick="Play('./documentus/interval/{{$item->id}}',this,{{$item->fine-$item->inizio}})"><span class="glyphicon glyphicon-play"></span></button>					
		</td>
	</tr>
@endforeach
<tr>
	<td colspan='2'>
	{{ $items->appends('pag')->links() }}
	</td>
</tr>
