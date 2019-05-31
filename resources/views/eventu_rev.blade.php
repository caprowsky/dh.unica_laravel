@extends('layouts.rev')

@section('title','Cerca evento "'.$item->nome.'" in:')

@section('buttons')
<button class="btn btn-info" onClick="AjaxGETinPanel('/esecudoris',go(),null,'eventu_id={{$item->id}}')" data-dismiss="modal"> 
	Esecutori</button>		

<button class="btn btn-info" onClick="AjaxGETinPanel('/documentus',go(),null,'eventu_id={{$item->id}}')" data-dismiss="modal"> 
	Documenti</button>			
@endsection
