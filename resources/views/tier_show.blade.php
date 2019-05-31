<div class="modal-dialog" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">TextGrid {{$nome}}<h4>
		</div>
		<div class="modal-body" id="content">
			 <table class="table table-striped" id="partecipantis">
				<thead>
					<tr>	
						<th>N. seq.</th>					
						<th>Annotazione</th>
						<th>Inizio - fine</th>
						<th></th>
					</tr>
				</thead>
				<tbody id='intervals-list'>
				
				</tbody>
			</table>
						
		</div>
		<div class="modal-footer">
		
		</div>
	</div>
</div>

<script>

var lasturlTI=null;
var tiurl='tiers/{{$id}}';	

function refreshTI() {
		
		if (lasturlTI!=null) lurl=lasturlTI;
		else lurl=tiurl+"?page=1";
		
		$('#loading').show();
		$('#intervals-list').load(lurl,function(){
				
			$('#intervals-list').show();
			$('#loading').hide();	
			
		});
	
	}
 
$(function() {
		
		$('#intervals-list').off().on('click', '.pagination a', function(e) {
			e.preventDefault();
			
			lasturlTI = $(this).attr('href');
			
			refreshTI();
		})
		refreshTI();
	})
	
$('.modal').on('hidden.bs.modal', function (e) {
    if($('.modal').hasClass('in')) {
    $('body').addClass('modal-open');
    }    
});

var audio = new Audio();
var last;

function Play(url,ob,dur) {
	if ((last==ob)&&(!audio.ended)) {	
		
			audio.pause();	
			audio.ontimeupdate=null;	
			last=null;
			ob.style.background='#5bc0de';
			
			return;	
	}
	else {
		audio.src= url;
		audio.play();
		if (last!=null) {
			last.style.background='#5bc0de';
		}
		last=ob;
		audio.ontimeupdate = function() {
			if ((audio.currentTime>1)&&(audio.currentTime<1+dur)){
				ob.style.background='red'
			}
			else {
				ob.style.background='blue'
			}		
			
		};
		audio.onerror = function() {
		alert("Errore: verificare che esista un file audio associato");
		}; 
		audio.onended = function() {
			ob.style.background='#5bc0de';
		}; 
	}
}
</script>
