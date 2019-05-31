@extends('layouts.table')

@section('title','Tabella esecutori '.$aciunta)


@section('columns')
	<th>Nome</th>
	<th>Cognome</th>
	
	<th>Nascita</th>
	<th>Morte</th>
	
	<th>Descrizione</th>
	<th>Luogo</th>
	
	
	<th>Azioni</th>
@endsection

@section('values')
	@foreach ($items as $item)
	<tr id="item{{$item->id}}">
		<td>{{$item->nome}}</td>
		<td>{{$item->cognome}}</td>
		<td>{{$item->nascita}}</td>
		<td>{{$item->morte}}</td>
		<td>{{$item->descrizione}}</td>
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
	function getFormData(){
		var formData = {
            nome: {{$det['sing']}}_edit.nome.value,
            cognome: {{$det['sing']}}_edit.cognome.value,
            nascita: {{$det['sing']}}_edit.nascita.value,
            morte: {{$det['sing']}}_edit.morte.value,
            descrizione: {{$det['sing']}}_edit.descrizione.value,
            luogo_id: {{$det['sing']}}_edit.logu_id.value
        }
        return formData;
	}
	function {{$det['abb']}}_update(){
		       
        var formData=getFormData();
        var id = {{$det['sing']}}_edit.id.value;
		
		AjaxPP(url+'/'+id,formData,id,updateRow);
	}
	
	function {{$det['abb']}}_create(){
		
		var formData=getFormData();
        
		AjaxPP(url,formData,0,updateRow);
	}
    function deleteRow(item_id) {
			$("#item" + item_id).remove();
	}
    function updateRow(data,item_id) {	
					
              var item = '<tr id="item' + data.id + '"><td>' + data.nome + '</td><td>' + data.cognome + '</td><td>' +  data.nascita + '</td>';
					item += '<td>' +  data.morte + '</td><td>'+ data.descrizione + '</td><td>'+ data.luogo+ '</td>';
					item += '<td><button class="btn btn-warning btn-xs btn-detail edit" onClick="AjaxEdit(url,'+data.id+',{{$det['abb']}}_update)"><span class="glyphicon glyphicon-edit"></button>&nbsp';
					item += '<button class="btn btn-danger btn-xs btn-delete delete" onClick="AjaxDelete(url,' + data.id + ',deleteRow)"><span class="glyphicon glyphicon-remove"></button></td></tr>';
					 
                if (item_id==0){ //if user added a new record
                    $('#items-list').append(item);
                    
                }else{ //if user updated an existing record

                    $("#item" + item_id).replaceWith( item );
                }
				
            }
@endsection
