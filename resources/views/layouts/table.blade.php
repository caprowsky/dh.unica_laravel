<!DOCTYPE html>

	<script type="text/javascript">
		var url = "/{{$det['table']}}";
	</script>
	 <script src="{{asset('jqb/js/query-builder.standalone.min.js')}}"></script>

    <div class="container" >
		<div class="row">
			<div class="col-md-12">
				<h2>
					@yield('title')
				</h2>
			</div>
		</div>
		<div class="col-md-12">
			<div class="row">
				<button id="btn-add" name="btn-add" class="btn btn-primary btn-xs" title="Add" onClick="AjaxCreate(url,{{$det['abb']}}_create)"><span class="glyphicon glyphicon-plus"></span></button>			
				<button id="btn-search" name="btn-search" class="btn btn-primary btn-xs" title="Filter" onClick="AjaxGET(url+'/jqb',{{$det['abb']}}_search,'search')"><span class="glyphicon glyphicon-search"></span></button>
			</div>
		</div>
		<div class="row">
		<div class="col-md-12">
				<br>			
				<div class="table-responsive">
					<!-- Table-to-load-the-data Part -->
					<table class="table" id="tabella" data-order="id" data-dir="ASC">
						<thead>
							<tr>
								
						   @yield('columns')
							
							<th>Azioni</th> 
							</tr>
						</thead>
						<tbody id="items-list" name="items-list">
							
							 @yield('values')
						   
						</tbody>
					</table>
														
					<!-- End of Table-to-load-the-data Part -->
					<!-- Modal (Pop up when detail button clicked) -->
					<div class="modal fade" id="myModal_{{$det['table']}}" tabindex="-1" role="dialog" >
				
					</div>
					
				</div>
			</div>
        </div>
    </div>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   -->
    <script src="{{ asset('js/buttons_f.js') }}"></script>
    <script type="text/javascript">
		
	@yield('scripts')
	var lasturl;
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
		
		var data='order='+$('#tabella').data('order')+'&dir='+$('#tabella').data('dir')
	
		
		$('#loading').show();
		$('#items-list').load(lurl,data, function(){
				
			$('#items-list').show();
			$('#loading').hide();	
			
		});
	
	}
	
	function ordina(e) {
		$('#tabella').data('order',$(e).parent().data('order'));
		refresh();
		
	}
	
	$(function() {
		
		$('body').on('click', '.pagination a', function(e) {
			e.preventDefault();
			
			lasturl = $(this).attr('href');
			
			refresh();
		})
		
	})
	
	
   </script>
