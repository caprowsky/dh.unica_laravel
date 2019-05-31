
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">Luogo</h4>
		</div>
		<div class="modal-body">
			<form id="logu_edit" name="logu_edit" class="form-horizontal" novalidate="">

				<div class="form-group">
					<label for="inputlogu" class="col-sm-3 control-label">Nome</label>
					<div class="col-sm-9">
						<input type="text" class="form-control has-error" id="lg_nome" name="nome" placeholder="Luogo" 
						value="{{$item->nome}}" >
						
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Descrizione</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="lg_descrizione" name="descrizione" placeholder="Descrizione" value="{{$item->descrizione}}">
					</div>
				</div>
				
				 <div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Latitudine</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="lg_lat" name="lat" placeholder="Latitudine" value="{{$item->lat}}">
					</div>
				</div>
				
				 <div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Longitudine</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" id="lg_lng" name="lng" placeholder="Longitudine" value="{{$item->lng}}">
					</div>
				</div>
				<input type="hidden" id="luogo_id" name="id" value="{{$item->id}}">
			</form>
		</div>
		<div class="modal-footer">
			@can('edit rows')
				<button type="button" class="btn btn-primary save" id="btn-save_logus" value="add" >Salva</button>
			@else
			
				<script>
					var form = document.getElementById("logu_edit");
					var elements = form.elements;
					for (var i = 0, len = elements.length; i < len; ++i) {
						elements[i].readOnly = true;
					}
				</script>
			
			@endcan
			<button type="button" class="btn btn-warning"  onClick="$('#myModal_logus').modal('hide');">Annulla</button>	
		</div>
	</div>
</div>

<script> function initMap() {
	

	var autocomplete = new google.maps.places.Autocomplete((document.getElementById('lg_nome')),
            {types: ['geocode']});

		autocomplete.addListener('place_changed', function() {
          
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            document.getElementById('lg_nome').style.color='orange';	
            alert("No details available for input: '" + place.name + "'");
            return;
          } 
          else 
          {
		  document.getElementById('lg_nome').style.color='green';	
		  document.getElementById('lg_lng').value=place.geometry.location.lng();
		  document.getElementById('lg_lat').value=place.geometry.location.lat();
		  }
		   $.get("/logus/ver/?nome="+document.getElementById('lg_nome').value, function(data, status){
			   if (data!="") document.getElementById('lg_nome').style.color='red';
    });
	  
	  });


}

</script>
<style>
    .pac-container {
        z-index: 10000 !important;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDj8keeGJAQUcTwcTQD-4loX8IqVPF_iJU&libraries=places&callback=initMap"
        async defer></script>


