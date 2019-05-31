
<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			
			<h4 class="modal-title" id="myModalLabel">Luogo</h4>
		</div>
		<div class="modal-body">
			
			<div class="panel panel-default">
			  <div class="panel-heading">Nome</div>
			  <div class="panel-body"><strong>{{$item->nome}}</strong></div>
			</div>

			
			<div class="panel panel-default">
			  <div class="panel-heading">Descrizione</div>
			  <div class="panel-body"><strong>{{$item->descrizione}}</strong></div>
			</div>
			
			
			<div class="panel panel-default">
			  <div class="panel-heading">Coordinate</div>
			  <div class="panel-body"><strong>{{$item->lat}}-{{$item->lng}}</strong></div>
			</div>
				
			
		</div>
		<!--
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-quit" data-dismiss="modal">Esci</button>
			
		</div>-->
	</div>
</div>
<div class="modal fade" id="myModal_eventus" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
