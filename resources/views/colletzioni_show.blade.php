

<div class="modal-dialog" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
		
			<h4 class="modal-title" id="myModalLabel">Collezione</h4>
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
			  <div class="panel-heading">Data</div>
			  <div class="panel-body">{{$item->data}}</div>
			</div>
			
			
			<div class="panel panel-default">
			  <div class="panel-heading">Luogo</div>
			  <div class="panel-body"><strong>{{$item->luogo->nome}}</strong></div>
			</div>
								
		</div>
		
	</div>
</div>
<div class="modal fade" id="myModal_colletzionis" tabindex="10" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
</div>
