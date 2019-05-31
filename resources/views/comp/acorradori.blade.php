<label for="acorradori_id" class="col-sm-2 control-label mhover" onClick="getAcorradori()">Aggregatore</label>

@can('edit rows')
<div class="col-sm-7">
	<select class="form-control" name="aggregatore_id" id="acorradori_id">
		@foreach($acorradoris as $a)
		  <option value="{{$a->id}}"
			@if (($item->aggregatore_id!=null)&&($item->aggregatore_id==$a->id))
				selected="selected"
			@endif
			>{{$a->nome}}</option>
		@endforeach
	</select>
</div>

<div class="col-sm-2">
	@can('add rows')
	<button type="button" class="btn btn-info btn-sm add" onClick="addAcorradori()">+</button>	
	@endcan	
</div>
@else
<input type="hidden" id="acorradori_id" name="id" value="{{$item->aggregatore_id}}">
<div class="col-sm-9">	
	<input type="text" class="form-control has-error" readonly value="{{$item->aggregatore->nome}}">
</div>

@endcan
