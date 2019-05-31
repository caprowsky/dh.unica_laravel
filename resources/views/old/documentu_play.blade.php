<div class="modal-dialog" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Play : {{$item->titolo}}<h4>
		</div>
		<div class="modal-body" id="content">
			<div class="row">
				<div class="col-sm-3" id="tiers_name">
				</div>
				
				<div class="col-sm-9" id="tiers">
				</div>
			</div>
			<center>
				<hr>
				<audio id="audio" controls>
					<source src="/documentus/resources/{{$item->id}}/play" type="audio/mpeg">
				</audio>
			</center>
			
			<div class="row">
				<label for="tg_id" class="col-sm-3 control-label mhover" >TextGrid</label>
				<div class="col-sm-7">
					<select class="form-control" name="tg_id" id="tg_id">
					@foreach($item->tiers as $t)
						<option value="{{$t->id}}">
							{{$t->nome}}
						</option>
					@endforeach
					</select>
					
				</div>

				<div class="col-sm-2">
					<button type="button" class="btn btn-info btn-sm" onClick="addNTier()">+</button>	
					<button type="button" class="btn btn-warning btn-sm" onClick="removeTier()">-</button>		
				
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-quit" data-dismiss="modal">Esci</button>			
		</div>
	</div>
</div>

<script>
	
$('.modal').on('hidden.bs.modal', function (e) {
    if($('.modal').hasClass('in')) {
    $('body').addClass('modal-open');
    }    
});

var tier=new Array();
var interval=new Array();
var t=0;

//addTier("/documentus/tier/55/json");
//addTier("/documentus/tier/73/json");

audio.ontimeupdate = function() {
	a=audio.currentTime;
	for (i=0;i<tier.length;i++)
	{
	if ((a>=tier[i][interval[i]].inizio)&&(a<=tier[i][interval[i]].fine))
		{
			if (tier[i][interval[i]].nota!="")
				$('#label'+i).text(tier[i][interval[i]].nota);
			else 
				$('#label'+i).text("-");
		}
		updateI(a,i);
	}
	
}
audio.onseeked = function() {
	a=audio.currentTime;
	if (a<audio.duration) {
		for (i=0;i<tier.length;i++)
		{
			while (!((a>=tier[i][interval[i]].inizio)&&(a<=tier[i][interval[i]].fine)))
			{
				updateI(a,i);
			}
		}
	}
}
function addTier(url){	
	$.getJSON( url, function( json ) {
		tier.push(json);
		interval.push(0);
		t++;
	});
}

function addNTier(){
	if (tier.length<10) {
		var url="/documentus/tier/"+$('#tg_id').val()+"/json";
		addTier(url);
		$("#tiers").append( "<h3 id='label"+tier.length+"'></h3>" );
		$("#tiers_name").append( "<h3 class='label-info'>"+$('#tg_id').find('option:selected').text()+"</h3>" );
	}
}
function removeTier(){
	if (tier.length>0) {
		$("#tiers").children().last().remove();
		$("#tiers_name").children().last().remove();
		tier.pop();
		interval.pop();
	}

}
function updateI(a,i){
	if (a>tier[i][interval[i]].fine) interval[i]++;
	else if (a<tier[i][interval[i]].inizio) interval[i]--;
		
	if (interval[i]>=tier[i].length) interval[i]=tier[i].length-1;
	if (interval[i]<0) interval[i]=0;
}

</script>
