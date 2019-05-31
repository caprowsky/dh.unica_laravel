@foreach ($tiers as $t)			
<tr id="tier_{{$t->id}}">
	<td>{{$t->nome}} </td>
	<td>{{$t->inizio}} </td>
	<td>{{$t->fine}} </td>
	<td>{{count($t->intervals)}} </td>	
	<td>
		<button type ="button" class="btn btn-info btn-xs" onClick="AjaxGET('/documentus/tier/{{$t->id}}',null,'tiers')"><span class="glyphicon glyphicon-search"></span></button>						
		
		<button type ="button" class="btn btn-danger btn-xs btn-delete delete" onClick="AjaxDelete('/documentus/tier',{{$t->id}},deleteTier)"><span class="glyphicon glyphicon-remove"></button>

	</td>								
</tr>
@endforeach

<tr>
	<td colspan='2'>
	{{ $tiers->appends('pag')->links() }}
	</td>
</tr>
