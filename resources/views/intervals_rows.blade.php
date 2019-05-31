@foreach ($items as $item)			
<tr id="tier_{{$item->id}}">
	<td>{{$item->seq}}</td>
	<td><b>{{$item->nota}}</b> </td>
	<td>{{$item->inizio}} </td>
	<td>{{$item->fine}} </td>
	<td class="btn-link" onClick="AjaxGETinPanel('/tiers',go(),null,'tier_id={{$item->tier_id}}')">{{$item->tier->nome}} </td>
	<td class="btn-link" onClick="AjaxGETinPanel('/documentus',go(),null,'documentu_id={{$item->tier->documento_id}}')">{{$item->tier->documentu->titolo}} </td>
	<td>
		<button type="button" class="btn btn-info btn-xs" onClick="Play('./documentus/interval/{{$item->id}}',this,{{$item->fine-$item->inizio}})"><span class="glyphicon glyphicon-play"></span></button>					
		@include ('comp/delete_button')
	</td>								
</tr>
@endforeach

<tr>
	<td colspan='2'>
	{{ $items->appends('pag')->links() }}
	</td>
</tr>

<script>
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
