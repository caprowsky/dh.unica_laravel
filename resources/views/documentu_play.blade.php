<div class="modal-dialog modal-lg" id="wavesurf">
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="freeMem()"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title text-success" id="myModalLabel">{{$item->titolo}}<h4>
		</div>
		<div class="modal-body" id="content">
			
			<div id="waveform" style="width: 100%}">
				
			</div>
			<div id="waveform-timeline"></div>
			<hr>
			<div id="wave-spectrogram"></div>
			<div id="progressbar">
				CARICAMENTO ...</div>
			<hr>
			@if (count($item->tiers)>0)
			<div class="row">
				<div class="col-sm-3" id="tiers_name">
				</div>
				
				<div class="col-sm-9" id="tiers">
				</div>
			</div>
			
			<div class="row">
				<label for="tg_id" class="col-sm-3 control-label mhover" >Sottotitoli</label>
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
			<hr>
			@endif
			
			@if (count($item->getTrackFiles)!=0)
			<div class="row">
				<label for="tn_id" class="col-sm-3 control-label mhover" >Traccia</label>
				<div class="col-sm-7">
					<select class="form-control" name="tn_id" id="tn_id" onChange="changeTrack()">
						<option value="">
							Completo
						</option>
					@foreach($item->getTrackFiles as $t)
						<option value='{{substr(str_replace(".mp3","",$t->filename),strrpos($t->filename,"_tn")+3)}}'>
							Traccia {{substr(str_replace(".mp3","",$t->filename),strrpos($t->filename,"_tn")+3)}}
						</option>
					@endforeach
					</select>
					
				</div>
			</div>
			<hr>
			@endif
			
			<div class="row">
				
				<div class="col-xs-3">		
				  <button class="btn btn-primary" onclick="wavesurfer.playPause()" id="play">
					<i class="glyphicon glyphicon-play"></i>Play
				  </button>
				  <button class="btn btn-primary" onclick="rewind()" >
					<i class="glyphicon glyphicon-fast-backward"></i>Rewind
				  </button>
				</div>
				
				
				<div class="col-xs-2">
					<div>Velocità</div>
					<div>Zoom</div>
				</div>
				<div class="col-xs-4">
					<div>
						<input type="range" min="50" max="200" value="100" id="playback">
					</div>
					<div>
					  <input id="slider" type="range" min="1" max="200" value="1"/>
					</div>
				</div>
				<div class="col-xs-1">
					<div id="rate">1</div>
					<div id="zoom">1</div>		
				</div>
				<div class="col-xs-1">		
				  <button class="btn btn-primary" onclick="resetSliders()" >
					<i class="glyphicon glyphicon-reset"></i>Reset
				  </button>
				</div>
				<div class="col-xs-1">
					
				</div>
			
				
			</div>	
			<hr>
			
			
			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-quit" data-dismiss="modal" onClick="freeMem()">Esci</button>			
		</div>
	</div>
</div>

<script src="{{asset('js/wavesurfer/wavesurfer.min2.js')}}"></script>
<script src="{{asset('js/wavesurfer/wavesurfer.timeline.min.js')}}"></script>
<script src="{{asset('js/wavesurfer/wavesurfer.regions.min.js')}}"></script>
<script src="{{asset('js/wavesurfer/wavesurfer.pitch.js')}}"></script>

<script>
	
$('.modal').on('hidden.bs.modal', function (e) {
	freeMem();
    if($('.modal').hasClass('in')) {
    $('body').addClass('modal-open');
    }    
});

$(window).on('shown.bs.modal', function() { 
	
  wavesurfer.drawBuffer();
  if (spectrogram.wavesurfer==null) {	//primu carrigamentu sceti
		
		spectrogram.init({
				wavesurfer: wavesurfer,
				container: "#wave-spectrogram",
				height: 200,
				waveColor: wavecolors,
				labels:true,
				frequenciesDataUrl: "/documentus/resources/{{$item->id}}/json"
			});
		
	}
});

var tier=new Array();
var interval=new Array();
var regions=new Array();

var timeline = WaveSurfer.timeline;
var regs = WaveSurfer.regions;

var test
var wavecolors=['purple','red','green','blue','cyan']


var wavesurfer = WaveSurfer.create({
    container: '#waveform', 
    waveColor: 'orange',
    progressColor: 'gray',
    cursorColor: 'red',
    cursorWidth: 2,
    
    responsive: true,
    plugins: [
        timeline.create({
            container: '#waveform-timeline'       
        }),
        regs.create(),   
    ]
});
var spectrogram = Object.create(WaveSurfer.Spectrogram);

var waveurl="/documentus/resources/{{$item->id}}/play/";
wavesurfer.load(waveurl);

wavesurfer.on('ready', function () {
	
	$( "#progressbar" ).hide();
	 wavesurfer.disableDragSelection({});
	
	if (spectrogram.wavesurfer==null) {	//primu carrigamentu sceti
		
		spectrogram.init({
				wavesurfer: wavesurfer,
				container: "#wave-spectrogram",
				height: 200,
				waveColor: wavecolors,
				labels:true,
				frequenciesDataUrl: "/documentus/resources/{{$item->id}}/json"
			});
		
	
	
	} else {
	resetSliders();
	
	}
	//wavesurfer.zoom(1);
	//spectrogram.zoom(1);

});

wavesurfer.on('audioprocess', function () {
	
	a=wavesurfer.getCurrentTime();
	for (i=0;i<tier.length;i++)
	{
	if ((a>=tier[i][interval[i]].inizio)&&(a<=tier[i][interval[i]].fine))
		{
			if (tier[i][interval[i]].nota!="")
			{
				$('#label'+i).text(tier[i][interval[i]].nota);
			
			}
			else 
				$('#label'+i).text("-");
				
			regions[i].update({start:tier[i][interval[i]].inizio,end:tier[i][interval[i]].fine});
						
		}
		else  {
				$('#label'+i).text("-");
				regions[i].update({start:0,end:0});
			}
		
	updateI(a,i);
	
	}
	
});

wavesurfer.on('pause', function () {
    $('#play').html('<i class="glyphicon glyphicon-pause"></i>Pausa');
});
wavesurfer.on('play', function () {
    $('#play').html('<i class="glyphicon glyphicon-play"></i>Play');
});

wavesurfer.on('loading', function (t) {
  
    $( "#progressbar" ).progressbar({
      value: t
    });
    $( "#progressbar" ).show();

  } );
  
wavesurfer.on('error', function (t) {
	alert ("Errore: verificare che esista un file audio associato");
});

var slider = document.querySelector('#slider');

var output2 = document.getElementById("zoom");

var zoomLevel=1;

slider.oninput = function () {
  zoomLevel = Number(slider.value);  
  output2.innerHTML=zoomLevel;
};

slider.onchange= function () {
	wavesurfer.zoom(zoomLevel);
	spectrogram.zoom(zoomLevel);
}

///////////////

var slider2 = document.getElementById("playback");
var output = document.getElementById("rate");
output.innerHTML = slider2.value/100; // Display the default slider value




// Update the current slider value (each time you drag the slider handle)
slider2.oninput = function() {
	rate=this.value/100;
    output.innerHTML = rate;
    wavesurfer.setPlaybackRate(rate);
} 

function resetSliders() {
	rate=1;
    output.innerHTML = rate;
    wavesurfer.setPlaybackRate(rate);
    zoomLevel = 1;  
	output2.innerHTML=zoomLevel;
	slider.value=zoomLevel;
	output.value=rate*100;
	slider2.value=rate*100;
	wavesurfer.zoom(zoomLevel);
	spectrogram.zoom(zoomLevel);
}

function changeTrack() {
	var tn=$('#tn_id').val();
	spectrogram.selectTrack(tn);
	wavesurfer.stop();
	waveurl="/documentus/resources/{{$item->id}}/play/"+tn;
	wavesurfer.load(waveurl);
	if (tn!="")
	wavesurfer.setWaveColor(wavecolors[spectrogram.tracks.indexOf(tn)]);
	else 
	wavesurfer.setWaveColor('orange');
	
}
function rewind() {
	wavesurfer.seekAndCenter(0);
	spectrogram.seekAndCenter(0);
}
function addTier(url){	
	$.getJSON( url, function( json ) {
		var h=(100*tier.length)%360;
		tier.push(json);
		interval.push(0);
		regions.push(wavesurfer.addRegion({color: 'hsla('+h+', 100%, 30%, 0.1)'}));
		
	});
}

function addNTier(){
	if (tier.length<10) {
		var url="/documentus/tier/"+$('#tg_id').val()+"/json";
		addTier(url);
		$("#tiers").append( "<h5 id='label"+tier.length+"'></h5>" );
		$("#tiers_name").append( "<h5>"+$('#tg_id').find('option:selected').text()+"</h5>" );
		var c="hsla("+(100*tier.length)%360+", 100%, 30%, 0.1)";
		$("#tiers_name").children().last().css("background-color",c);
		
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

function freeMem() {
wavesurfer.stop();
wavesurfer.destroy();
}

</script>
