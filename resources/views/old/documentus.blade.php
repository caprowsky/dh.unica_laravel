@extends('layouts.table')

@section('title','Tabella documenti '.$aciunta)


@section('columns')
	<th>Titolo</th>
		
	<th>Data</th>
	<th>Tipo</th>
	
	<th>Identificatore</th>
	
	<th>Evento</th>
	<th>Collezione</th>
	
	
	<th>Azioni</th>
@endsection

@section('values')
	@foreach ($items as $item)
	<tr id="item{{$item->id}}">
		<td>{{$item->titolo}}</td>
		
		
		<td>{{$item->data}}</td>
		<td>{{$tipus[$item->tipo]}}</td>
	
		<td>{{$item->identificatore}}</td>
	
		
		<td>{{$item->evento->nome}}</td>
		<td>{{$item->collezione->nome}}</td>
		
	   
		<td>
			<button class="btn btn-success btn-xs" title="Textgrid e files" onClick="AjaxEdit(url+'/resources',{{$item->id}})"><span class="glyphicon glyphicon-list-alt"></span></button>
			<button class="btn btn-info btn-xs" title="Dettagli" onClick="AjaxGET(url+'/{{$item->id}}')"><span class="glyphicon glyphicon-info-sign"></span></button>
			<button class="btn btn-warning btn-xs" title="Modifica" onClick="AjaxEdit(url,{{$item->id}},{{$det['abb']}}_update)"><span class="glyphicon glyphicon-edit"></span></button>
			<button class="btn btn-danger btn-xs" title="Elimina" onClick="AjaxDelete(url,{{$item->id}},deleteRow)"><span class="glyphicon glyphicon-remove"></span></button>
		</td>
	</tr>
	@endforeach
	
@endsection

@section ('scripts')
	function {{$det['abb']}}_update(){
			
		var formData=$('form[name=documentu_edit]').serialize();       
        var id = documentu_edit.id.value;
		
		AjaxPP(url+'/'+id,formData,id,updateRow);
	}
		
	function {{$det['abb']}}_create(){
		
		var formData=$('form[name=documentu_edit]').serialize(); 
        
		AjaxPP(url,formData,0,updateRow);
	}
    function deleteRow(item_id) {
			$("#item" + item_id).remove();
	}
    function updateRow(data,item_id) {	
		
		
					
              var item = '<tr id="item' + data.id + '"><td>' + data.titolo + '</td>';
					item +=	'<td>' +  data.data + '</td><td>' +  data.tipo_str + '</td>';
					item +=	'<td>' +  data.identificatore + '</td><td>' +  data.evento + '</td><td>' +  data.collezione + '</td><td>';
					
					item += '<button class="btn btn-success btn-xs" title="Textgrid" onClick="AjaxEdit(url'+"'resources',"+data.id+')"><span class="glyphicon glyphicon-list-alt"></span></button>&nbsp';
					item += '<button class="btn btn-info btn-xs" title="Dettagli" onClick="AjaxGET(url+'+"'/'"+data.id+"'"+')"><span class="glyphicon glyphicon-info-sign"></span></button>&nbsp';
					item += '<button class="btn btn-warning btn-xs"  title="Modifica" onClick="AjaxEdit(url,'+data.id+',{{$det['abb']}}_update)"><span class="glyphicon glyphicon-edit"></span></button>&nbsp';					
					item += '<button class="btn btn-danger btn-xs" title="Elimina" onClick="AjaxDelete(url,' + data.id + ',deleteRow)"><span class="glyphicon glyphicon-remove"></span></button></td></tr>';
					 
					
					 
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
