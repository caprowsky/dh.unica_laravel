@foreach ($items as $item)
	<tr id="item{{$item->id}}">
		<td><b>{{$item->name}}</b></td>
		<td>{{$item->email}}</td>
		<td>{{$item->getRoleNames()}}</td>  
		<td>
		@can('edit users')
			<button class="btn btn-warning btn-xs" onClick="AjaxEdit(url,{{$item->id}},{{$det['abb']}}_update)"><span class="glyphicon glyphicon-edit"></button>
		@endcan
		
		@can('delete users')
			<button class="btn btn-danger btn-xs" onClick="AjaxDelete(url,{{$item->id}},refresh)"><span class="glyphicon glyphicon-remove"></button>
		@endcan	
		
		</td>
	</tr>
	
@endforeach
	<tr>
		<td colspan='2'>
		{{ $items->appends('pag')->links() }}
		</td>
	</tr>
