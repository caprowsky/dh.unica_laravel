@extends('layouts.rev')

@section('title','Cerca luogo "'.$item->nome.'" in:')

@section('buttons')
<button class="btn btn-info" onClick="AjaxGETinPanel('/eventus',go(),null,'logu_id={{$item->id}}')" data-dismiss="modal"> 
	Eventi</button>		
<button class="btn btn-info" onClick="AjaxGETinPanel('/colletzionis',go(),null,'logu_id={{$item->id}}')" data-dismiss="modal"> 
	Collezioni</button>	
<button class="btn btn-info" onClick="AjaxGETinPanel('/esecudoris',go(),null,'logu_id={{$item->id}}')" data-dismiss="modal"> 
	Esecutori</button>
<button class="btn btn-info" onClick="AjaxGETinPanel('/acorradoris',go(),null,'logu_id={{$item->id}}')" data-dismiss="modal"> 
	Aggregatori</button>		
@endsection
