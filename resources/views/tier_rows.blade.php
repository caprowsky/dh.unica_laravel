@foreach ($items as $item)			
<tr id="tier_{{$item->id}}">
	<td><b>{{$item->nome}}</b> </td>
	<td>{{$item->descrizione}} </td>
	<td>{{count($item->intervals)}} </td>	
	<td class="btn-link"  
	@if (!isset($nolink))
	onClick="AjaxGETinPanel('/documentus',go(),null,'documentu_id={{$item->documentu->id}}')"
	@endif
	>
		{{$item->documentu->titolo}} </td>
	<td class="btn-link"
	@if (!isset($nolink))
	@if (($item->esecudori)!=null)
	onClick="AjaxGETinPanel('/esecudoris',go(),null,'esecudori_id={{$item->esecudori->id}}')"
	@endif
	@endif
	>
	@if (($item->esecudori)!=null)
		{{$item->esecudori->nome}} {{$item->esecudori->cognome}}
	@endif
	</td>
		
	<td>
	
		<button type ="button" class="btn btn-info btn-xs" onClick="AjaxGET('/tiers/{{$item->id}}',null,'tiers')"><span class="glyphicon glyphicon-eye-open"></span></button>						
		@can('delete rows')
			<button type ="button" class="btn btn-danger btn-xs" onClick="AjaxDelete('./tiers',{{$item->id}},refresh)"><span class="glyphicon glyphicon-remove"></button>
		@endcan		

	</td>								
</tr>
@endforeach

<tr>
	<td colspan='2'>
	{{ $items->appends('pag')->links() }}
	</td>
</tr>
