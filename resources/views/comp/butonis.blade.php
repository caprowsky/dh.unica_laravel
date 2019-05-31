
<button class="btn btn-info btn-xs" onClick="AjaxGET(url+'/rev/'+{{$item->id}},null,'search')"><span class="glyphicon glyphicon-search"></span></button>			

@can('edit rows')
<button class="btn btn-warning btn-xs" onClick="AjaxEdit(url,{{$item->id}},{{$det['abb']}}_update)"><span class="glyphicon glyphicon-edit"></span></button>
@else
<button class="btn btn-success btn-xs" onClick="AjaxEdit(url,{{$item->id}})"><span class="glyphicon glyphicon-info-sign"></span></button>
@endcan
@include ('comp/delete_button')	
