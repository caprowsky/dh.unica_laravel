@extends('layouts.rev')

@section('title','Cerca aggregatore "'.$item->nome.'" in:')

@section('buttons')
<button class="btn btn-info" onClick="AjaxGETinPanel('/eventus',go(),null,'acorradori_id={{$item->id}}')" data-dismiss="modal"> 
	Eventi</button>			
@endsection
