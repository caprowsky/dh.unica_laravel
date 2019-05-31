

<div class="modal-dialog modal-lg" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Risorse documento: <i>"{{$item->titolo}}"</i></h4>
		</div>
		
		<div class="modal-body">
				
			
			<form>
				<div class="panel panel-default">
				  <div class="panel-heading">Files
									
						<input type="file" id="fileupload" name="dfiles[]" data-url="./documentus/upload" multiple />
						<span  class="label label-pill label-warning" id="loading"></span>
						<div id="progress">
							<div class="bar" style="width: 0%;height: 18px;background: green;"></div>
						</div>
					</div>
				  <div class="panel-body">
					<table class="table table-striped" id="files_list" >
						<thead>
							<tr><th>Nome</th><th>dimensione</th><th></th></tr>
						</thead>
						<tbody id='files-list'>
							@include ('documentu_resources_rows')
						</tbody>
					 </table>							
				<input type="hidden" name="doc_id" id="doc_id" value="{{$item->id}}" />
				
				</div>
			</div>
			
				<div class="panel panel-default">
				  <div class="panel-heading">TextGrid
						<input type="file" id="tgupload" name="tgfile" data-url="./documentus/tgupload" />
					
					</div>
				
				  <div class="panel-body">
					  <table class="table table-striped" id="tabella_tiers" data-order="" data-dir="ASC">
						  <thead>
							<tr>
								<th data-order="nome">
									<a onClick="ordinaT(this)">
										<span class="glyphicon glyphicon-sort text-success"></span>
										&nbsp;Nome
									</a>
								</th>
								
								<th data-order="descrizione">
									<a onClick="ordinaT(this)">
										<span class="glyphicon glyphicon-sort text-success"></span>
										&nbsp;Descrizione
									</a>
								</th>
								<th>
									Intervalli
									
								</th>
							</tr>
						</thead>
						<tbody id="tiers-list" name="tiers-list">
						
						</tbody>
				  </table>
				  </div>
				</div>
			
				
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-quit" data-dismiss="modal">Esci</button>
			
		</div>
	</div>
</div>
<div class="modal fade" id="myModal_tiers" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
</div>

<script>
 $(function () {
	 $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $('#fileupload').fileupload({
            dataType: 'json',
            add: function (e, data) {
                $('#loading').text('Uploading...');
                $('#progress .bar').css('width','0%');
                data.submit();
                
            },
            done: function (e, data) {
                
                $('#loading').text('');
                $('#progress .bar').css('width','0%');
                refreshF();
            },
             progressall: function (e, data) {
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$('#progress .bar').css(
					'width',
					progress + '%'
				);
			},
			error: function (e, data) {
              alert ("Errore :"+e.responseText);
        }
                
        });
        
       
    });

function refreshF(){
	$('#loading').show();
		$('#files-list').load('documentus/files/{{$item->id}}',null, function(){
				
			$('#files-list').show();
			$('#loading').hide();	
			
		});

}

function importTG() 
{
	var tiers = $("input:checkbox:checked").map(function(){
        return $(this).val();
    }).get();
    
    var tiers_es= $("select").map(function(){
        return $(this).attr('name');
    }).get();
    
    var tiers_es_es= $("select").map(function(){
		if ($(this).val()==null) 
		{
        return "";
         }
        else {
        return $(this).val();
	}
    }).get();
    
   
	var jqXHR = $('#tgupload').fileupload(
	'send', {
		files: tgname,
		url: '/documentus/tgimport',
		formData: { sel: tiers,doc_id: $('#doc_id').val(),tiers_es: tiers_es, tiers_es_es:tiers_es_es},
		success: function (result, textStatus) {
			alert(result);
			$('#myModal_tiers').modal('hide');
			refreshT();
		}
    });
    
		
}
    

function deleteFile(item_id) {

	$("#file_" + item_id).remove();

}
function deleteTier(item_id) {

	$("#tier_" + item_id).remove();

}
var lasturlT=null;
var turl=url+'/resources/{{$item->id}}/edit';

/*
function refresh() { // documentus 
	refreshT();
}*/
function refreshT() {
		
		if (lasturlT!=null) lurlT=lasturlT;
		else lurlT=turl+"?page=1";
		
		var data='order='+$('#tabella_tiers').data('order')+'&dir='+$('#tabella_tiers').data('dir')+'&'+$('#tabella_tiers').data('query');
	
		
		$('#loading').show();
		$('#tiers-list').load(lurlT,data, function(){
				
			$('#tiers-list').show();
			$('#loading').hide();	
			
		});
	
	}
function ordinaT(e) {
		$('#tabella_tiers').data('order',$(e).parent().data('order'));
		if ($('#tabella_tiers').data('dir')=='ASC') {
			$('#tabella_tiers').data('dir','DESC');
		}
		else {
			$('#tabella_tiers').data('dir','ASC');
		}
		refreshT();
		
	}

$(function() {
		
		$('#tiers-list').off().on('click', '.pagination a', function(e) {
			e.preventDefault();
			
			lasturlT = $(this).attr('href');
			
			refreshT();
		})
		refreshT();
	})
	
	//https://www.codepunker.com/blog/sync-audio-with-text-using-javascript
   
</script>
