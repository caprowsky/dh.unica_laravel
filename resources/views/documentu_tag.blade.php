<div class="modal-dialog modal-lg" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick=""><span aria-hidden="true">×</span></button>
			<h4 class="modal-title text-success" id="myModalLabel">{{$item->titolo}}<h4>
		</div>
		<div class="modal-body" id="content">
			
			<div id="photo"  style="overflow:auto">
				<img src="/documentus/resources/{{$item->id}}/view" id="immagine" style="width:100%"/>
			</div>
			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-quit" data-dismiss="modal" onClick="">Esci</button>			
		</div>
	</div>
</div>

<script>
	// http://qnimate.com/facebook-style-face-detection-and-tagging-with-javsscript/
	function printMousePos(evt) {
		//variabilis globalis in documentu_edit
		mousex = (evt.pageX - $('#immagine').offset().left);// + self.frame.scrollLeft();
		mousey = (evt.pageY - $('#immagine').offset().top);// + self.frame.scrollTop();
		  console.log("clientX: " + mousex +" - clientY: " + mousey);
		}
	
	document.addEventListener("click", printMousePos);
	
</script>
