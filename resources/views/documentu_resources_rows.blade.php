@foreach ($item->files as $t)			
	<tr id="file_{{$t->id}}">
		<td>{{$t->filename}} </td>									
		<td>{{$t->size}}kB</td>
		<td>
			<a href='/documentus/file/{{$t->id}}'><button type ="button" class="btn btn-success btn-xs" ><span class="glyphicon glyphicon-download"></span></button></a>	
			<button type ="button" class="btn btn-danger btn-xs" onClick="AjaxDelete('/documentus/upload',{{$t->id}},deleteFile)"><span class="glyphicon glyphicon-remove"></span></button>		
		</td>										
	</tr>
@endforeach
