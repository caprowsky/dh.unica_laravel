@extends('layouts.table')

@section('title','Tabella eventi '.$aciunta)


@section('columns')
	<th>Evento</th>
	<th>Data inizio</th>
	<th>Data fine</th>
	<th>Descrizione</th>
	<th>Aggregatore</th>
	<th>Luogo</th>
	
	
	
	<th>Azioni</th>
@endsection

@section('values')
	@foreach ($items as $item)
	<tr id="item{{$item->id}}">
		<td>{{$item->nome}}</td>
		<td>{{$item->inizio}}</td>
		<td>{{$item->fine}}</td>
		<td>{{$item->descrizione}}</td>
		<td>{{$item->aggregatore->nome}}</td>
		<td>{{$item->luogo->nome}}</td>
		
	   
		<td>
			<button class="btn btn-info btn-xs" onClick="AjaxGET(url+'/rev/'+{{$item->id}},null,'search')"><span class="glyphicon glyphicon-search"></span></button>						
			<button class="btn btn-warning btn-xs btn-detail" onClick="AjaxEdit(url,{{$item->id}},{{$det['abb']}}_update)"><span class="glyphicon glyphicon-edit"></button>			
			<button class="btn btn-danger btn-xs btn-delete delete" onClick="AjaxDelete(url,{{$item->id}},deleteRow)"><span class="glyphicon glyphicon-remove"></button>
		</td>
	</tr>
	@endforeach
	
@endsection

@section ('scripts')
	function {{$det['abb']}}_update(){
		
		var formData=$('form[name=eventu_edit]').serialize();	
        
        var id = eventu_edit.id.value;
		
		AjaxPP(url+'/'+id,formData,id,updateRow);
	}
	
	function {{$det['abb']}}_create(){
		
		var formData=$('form[name=eventu_edit]').serialize();	
        
		AjaxPP(url,formData,0,updateRow);
	}
    function deleteRow(item_id) {
			$("#item" + item_id).remove();
	}
    function updateRow(data,item_id) {	
					
              var item = '<tr id="item' + data.id + '"><td>' + data.nome + '</td><td>' + data.inizio + '</td><td>' + data.fine + '</td><td>'+ data.descrizione + '</td>';
					item +=	'<td>'+ data.aggregatore+ '</td><td>'+ data.luogo + '</td>';
					item += '<td><button class="btn btn-warning btn-xs btn-detail edit" onClick="AjaxEdit(url,'+data.id+',{{$det['abb']}}_update)"><span class="glyphicon glyphicon-edit"></button>&nbsp';
					item += '<button class="btn btn-danger btn-xs btn-delete delete" onClick="AjaxDelete(url,' + data.id + ',deleteRow)"><span class="glyphicon glyphicon-remove"></button></td></tr>';
					 
                if (item_id==0){ //if user added a new record
                    $('#items-list').append(item);
                    
                }else{ //if user updated an existing record

                    $("#item" + item_id).replaceWith( item );
                }
				
            }
    function {{$det['abb']}}_search(){
	alert ("Non implementato");
	}
@endsection
