@extends('layouts.rev')

@section('title','Cerca collezione "'.$item->nome.'" in:')

@section('buttons')
<button class="btn btn-info" onClick="AjaxGETinPanel('/documentus',go(),null,'colletzioni_id={{$item->id}}')" data-dismiss="modal"> 
	Documenti</button>		
@endsection
