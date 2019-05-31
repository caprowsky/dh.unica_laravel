@if ($item->id!="")

	<label for="foto" class="col-sm-2 control-label">Foto</label>
	<div class="col-sm-9">
		@if ($item->foto_url!=null)
		<img width='400' src=
			<?php 
				echo "'/".$item->foto_url;
				echo "?t=".time()."'";
			?>
			 id='imagini'>
		@else
		<img id='imagini'>
		
		@endif
		
	 <input type="hidden" id="foto_filename" name="foto_filename" value="">
	@can('edit rows')
	<input type="file" id="fileupload" name="dfile" data-url="./foto/upload" accept="image/*" />
	<span  class="label label-pill label-warning" id="loading"></span>
	<div id="progress">
		<div class="bar" style="width: 0%;height: 18px;background: green;"></div>
	</div>	
	@endcan
	</div>			
<hr>
@else
<div class="col-sm-9 offset-sm-3">
<i class="text-warning cosl-sm-2">NB Prima di caricare una foto bisogna salvare</i>
</div>
@endif

