@foreach ($items as $item)			
<tr id="tier_{{$item->id}}">
	<td>{{$item->nome}} </td>
	<td>{{$item->descrizione}} </td>
	<td>{{$item->tipo}} </td>	
	<td>{{$item->tabella}} </td>
	<td>{{$item->user_created->name}} </td>
	
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
