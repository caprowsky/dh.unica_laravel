

<div class="modal-dialog" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
		
			<h4 class="modal-title" id="myModalLabel">Evento</h4>
		</div>
		<div class="modal-body">
		
			<div class="panel panel-default">
			  <div class="panel-heading">Nome</div>
			  <div class="panel-body"><strong>{{$item->nome}}</strong></div>
			</div>
			
			<div class="panel panel-default">
			  <div class="panel-heading">Descrizione</div>
			  <div class="panel-body">{{$item->descrizione}}</div>
			</div>
			
			
			<div class="panel panel-default ">
			  <div class="panel-heading">Data inizio</div>
			  <div class="panel-body">{{$item->inizio}}</div>
			</div>
			
			<div class="panel panel-default ">
			  <div class="panel-heading">Data fine</div>
			  <div class="panel-body">{{$item->fine}}</div>
			</div>
			
			
			<div class="panel panel-default">
			  <div class="panel-heading">Luogo</div>
			  <div class="panel-body"><strong>{{$item->luogo->nome}}</strong></div>
			</div>
			
			<div class="panel panel-default">
			  <div class="panel-heading">Aggregatore</div>
			  <div class="panel-body"><strong>{{$item->aggregatore->nome}}</strong></div>
			</div>
								
		</div>
		
	</div>
</div>
<!--
<div class="modal fade" id="myModal_eventus" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>-->
