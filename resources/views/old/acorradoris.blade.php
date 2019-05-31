@extends('layouts.table')

@section('title','Tabella aggregatori '.$aciunta)


@section('columns')
	<th>Aggregatore</th>
	<th>Data</th>	
	<th>Descrizione</th>
	<th>Luogo</th>
@endsection

@section('values')
	@include ('acorradori_rows')
@endsection

@section ('scripts')

    function updateRow(data,item_id) {	
					
              var item = '<tr id="item' + data.id + '"><td>' + data.nome + '</td><td>' +  data.data + '</td><td>'+ data.descrizione + '</td><td>'+ data.luogo+ '</td>';
					item += '<td><button class="btn btn-warning btn-xs btn-detail edit" onClick="AjaxEdit(url,'+data.id+',{{$det['abb']}}_update)"><span class="glyphicon glyphicon-edit"></button>&nbsp';
					item += '<button class="btn btn-danger btn-xs btn-delete delete" onClick="AjaxDelete(url,' + data.id + ',deleteRow)"><span class="glyphicon glyphicon-remove"></button></td></tr>';
					 
                if (item_id==0){ //if user added a new record
                    $('#items-list').append(item);
                    
                }else{ //if user updated an existing record

                    $("#item" + item_id).replaceWith( item );
                }
				
            }
@endsection
