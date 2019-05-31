<div class="modal-dialog" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick=""><span aria-hidden="true">×</span></button>
			<h4 class="modal-title text-success" id="myModalLabel">{{$item->titolo}}<h4>
		</div>
		<div class="modal-body" id="content">
			
			<div id="immagine" align="center" style="overflow:auto;" >
				<a href="/documentus/resources/{{$item->id}}/view" target="_blank">Scarica <br><b>{{$nome}}</b></a>
			</div>
			
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-quit" data-dismiss="modal" onClick="">Esci</button>			
		</div>
	</div>
</div>

<script>

</script>
