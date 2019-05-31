@extends('layouts.table')

@section('title','Tabella '.$det['title'])


@section('columns')
	@foreach ($det['rows'] as $k=>$v)
	<th data-order="{{$v[0]}}"><span class="glyphicon glyphicon-sort text-success" onClick="ordina(this)"></span>&nbsp;{{$v[1]}}</th>
	@endforeach
@endsection

@section('values')
	
	@include ('logu_rows')
	
@endsection

@section ('scripts')
@endsection
