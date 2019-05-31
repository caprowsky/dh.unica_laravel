@extends('layouts.rev')

@section('title','Cerca documento "'.$item->titolo.'" in:')

@section('buttons')
<button class="btn btn-info" onClick="AjaxGETinPanel('/tiers',go(),null,'documento_id={{$item->id}}')" data-dismiss="modal"> 
	Tiers</button>			
@endsection
