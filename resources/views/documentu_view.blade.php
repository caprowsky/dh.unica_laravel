<div class="modal-dialog modal-lg" >
	<div class="modal-content" id="modal-content_doc_view">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick=""><span aria-hidden="true">×</span></button>
			<h4 class="modal-title text-success" id="myModalLabel">{{$item->titolo}}<h4>
		</div>
		<div class="modal-body" id="photo_content">
			
			<div id="photo"  style="width:100%; position:inherit;">
				<img src="/documentus/resources/{{$item->id}}/view" id="immagine" style="width:100%">
				@if ($tagga)
				<a class="box" id="boxa"></a>
				@else
					@foreach ($item->taggaus as $t)
					
					@php
					$d=$t->pivot->descrizione;
					$i=strpos($d,"tag[");
					$f=strpos($d,"]");
					$tag=substr($d,$i+4,$f-$i-4);
					$coord=explode(",", $tag);
					if (isset($coord[2])) $n="(".$coord[2].")"; else $n="";
					@endphp		
					
					<a class="box" id="box{{$t->id}}" style="left:{{$coord[0]}}%; top: {{$coord[1]}}%; height: 50px; width:50px">
					<span class="label label-info tag" onclick="showEsecudori({{$t->id}})">{{$t->nome}}&nbsp;{{$t->cognome}}&nbsp;{{$n}}</span></a>
				
					
					@endforeach
				@endif
				</img>
				
			</div>
			
		</div>
		<div class="modal-footer">
			@if ($tagga)
				<button type="button" class="btn btn-primary" id="btn-save_tag" >Tagga</button>
			@else
				<button type="button" class="btn btn-info" id="btn-toggle" onclick="toggle_tag()">Nascondi i tag</button>
				<button type="button" class="btn btn-primary" id="btn-quit" data-dismiss="modal">Esci</button>
				
			@endif
		</div>
	</div>
</div>
<div class="modal fade" id="myModal_esecudori" tabindex="13" role="dialog"  ></div>
<script>
	@if ($tagga)
	// http://qnimate.com/facebook-style-face-detection-and-tagging-with-javsscript/
	
	function printMousePos(evt) {
		//variabilis globalis in documentu_edit
		
		mousex = ((evt.pageX-$('#photo').offset().left)*100/$('#photo_content').width()).toFixed(4);//2.5=metadi cuadrau;
		mousey = ((evt.pageY-$('#photo').offset().top)*100/$('#photo_content').height()).toFixed(4);// + self.frame.scrollTop();
		
		document.getElementById("boxa").remove();
		var box = "<a class='box' id='boxa' style='left:" + (mousex-2.5) + "%; top: " + (mousey-2.5) + "%; height: 5%; width:5%'></a>";
        document.getElementById("photo").innerHTML = document.getElementById("photo").innerHTML + box;
       document.getElementById('immagine').addEventListener("click", printMousePos);
	}
	
	document.getElementById('immagine').addEventListener("click", printMousePos);
	
	@endif
	function showEsecudori(n) {
	
		AjaxGET('/esecudoris/'+n, function (){
		
		
		},'esecudori');
	}
	function toggle_tag() {
		if ($('.box')[0].style.display=='') {
			$('.box').hide();
			$('#btn-toggle').text('Mostra i tag');
		}
		else {
			$('.box').show();
			$('#btn-toggle').text('Nascondi i tag');
		}
	
	}
</script>
