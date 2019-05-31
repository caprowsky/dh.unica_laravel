@extends('layouts.rev')

@section('title','Cerca esecutore "'.$item->nome.' '.$item->cognome.'" in:')

@section('buttons')
<button class="btn btn-info" onClick="AjaxGETinPanel('/eventus',go(),null,'esecudori_id={{$item->id}}')" data-dismiss="modal"> 
	Eventi</button>	
	<button class="btn btn-info" onClick="AjaxGETinPanel('/tiers',go(),null,'esecudori_id={{$item->id}}')" data-dismiss="modal"> 
	Tier</button>	
	<button class="btn btn-info" onClick="AjaxGETinPanel('/documentus',go(),null,'esecudori_id={{$item->id}}')" data-dismiss="modal"> 
	Documenti</button>	
				
@endsection
