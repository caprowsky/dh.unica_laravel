<div class="modal-dialog" >
	<div class="modal-content" id="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			<h4 class="modal-title" id="myModalLabel">
				@yield('title')
			</h4>
		</div>
		<div class="modal-body">
			@yield('buttons')
		</div>													
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" id="btn-quit" data-dismiss="modal">Esci</button>		
		</div>
	</div>
</div>

