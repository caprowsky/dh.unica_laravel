<!DOCTYPE html>


	<script type="text/javascript">
		var url = "/{{$det['table']}}";
		var lasturl=null;
	</script>
	 <script src="{{asset('/jqb/js/query-builder.standalone.js')}}"></script>
	 <script src="{{asset('/js/redump.js')}}"></script>

    
		
			
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<div class="navbar-header">
				 
					<span class="navbar-brand">Tabella&nbsp;<span class="text-warning">{{$det['title']}}</span>&nbsp;{{$aciunta}}</span>
				
				</div>
			
				<ul class="nav navbar-nav">
				 @can('add rows')
					@if (!isset($noadd))
				 
					  
					  <button id="btn-add" name="btn-add" class="btn  btn-s navbar-btn" title="Add" onClick="AjaxCreate(url,{{$det['abb']}}_create)">
					  <span class="glyphicon glyphicon-plus"></span>
					  </button>	
					  		
				  
					@endif
				@endcan
				
				<button id="btn-search" name="btn-search" class="btn  btn-s navbar-btn" title="Filter" onClick="AjaxGET(url+'/jqb',function (){scrollTo('#panel');},'search')"><span class="glyphicon glyphicon-search"></span></button>
				
				</ul>
			  </div>
			</nav>
			
		
		
			<div class="table-responsive">
					<!-- Table-to-load-the-data Part -->
					<table class="table" id="tabella" data-order="" data-dir="ASC" data-query="{{$query}}">
						<thead>
							<tr>
							<?php $i=1; ?>
							@foreach ($det['rows'] as $k=>$v)
								@if ($v[2]=='y')
								<th data-order="{{$v[0]}}">
									<a onClick="ordina(this)">
										<span class="glyphicon glyphicon-sort text-success"></span>
										&nbsp;{{$v[1]}}
									</a>
								
								@else
								<th>{{$v[1]}}
								@endif
								@if ($i>1)
									<a onClick="hide({{$i}})">
										<span class="glyphicon glyphicon-eye-open text-warning" ></span>
									</a>
								@endif
								</th>
								<?php $i++;?>
							@endforeach
							
							<th>Azioni</th> 
							</tr>
						</thead>
						<tbody id="items-list" name="items-list">
							
							 
						   
						</tbody>
					</table>
														
					<!-- End of Table-to-load-the-data Part -->
					<!-- Modal (Pop up when detail button clicked) -->
					<div class="modal fade" id="myModal_{{$det['table']}}" tabindex="-1" role="dialog" >
				
					</div>
					
				
			</div>
	
   
    <meta name="_token" content="{!! csrf_token() !!}" />
    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   -->
    <script src="{{ asset('/js/buttons_f.js') }}"></script>
    <script type="text/javascript">
		
	
	
	function {{$det['abb']}}_update(){	
		var formData=$('form[name={{$det['single']}}_edit]').serialize();	
        
        var id = {{$det['single']}}_edit.id.value;
						
		AjaxPP(url+'/'+id,formData,id,refresh);
	}
	
	function {{$det['abb']}}_create(){
		var formData=$('form[name={{$det['single']}}_edit]').serialize();		
		AjaxPP(url,formData,0,refresh);
	}
    function deleteRow(item_id) {
			$("#item" + item_id).remove();
	}
	
	function refresh() {
		
		if (lasturl!=null) lurl=lasturl;
		else lurl=url+"?page=1";
		
		var data='order='+$('#tabella').data('order')+'&dir='+$('#tabella').data('dir')+'&'+$('#tabella').data('query');
	
		
		$('#loading').show();
		$('#items-list').load(lurl,data, function(){
				
			$('#items-list').show();
			$('#loading').hide();	
			
		});
	
	}
	
	function ordina(e) {
		$('#tabella').data('order',$(e).parent().data('order'));
		if ($('#tabella').data('dir')=='ASC') {
			$('#tabella').data('dir','DESC');
		}
		else {
			$('#tabella').data('dir','ASC');
		}
		refresh();
		
	}
	
	function hide(n){
	alert("Da fare");
	}
	
	
	$(function() {
		
		$('#items-list').off().on('click', '.pagination a', function(e) {
			e.preventDefault();
			
			lasturl = $(this).attr('href');
			
			refresh();
		})
		refresh();
		
	});
	function alertnote(s){
	if (s!="") alert(s);
	}
	
	
</script>
