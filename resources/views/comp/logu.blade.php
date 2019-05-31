

<label for="logu_id" class="col-sm-2 control-label mhover" onClick="getLogu()" >Luogo</label>
@can('edit rows')


<div class="col-sm-4">
	<select class="form-control" name="luogo_id" id="logu_id">
	@foreach($logus as $l)
		<option value="{{$l->id}}"
		@if (($item->luogo_id!=null)&&($item->luogo_id==$l->id))
			selected="selected"
		@endif
		>{{$l->nome}}</option>
	@endforeach
	</select>
</div>

<div class="col-sm-1">
	@can('add rows')
	<button type="button" class="btn btn-info btn-sm add" onClick="addLogu()">+</button>		
	@endcan
</div>
<div class="col-sm-4">
	<input type="text" class="form-control" ondblclick="json_modal(redump(JSON.parse(this.value)))"
	id="luogo_note" name="luogo_note" placeholder="Note" value="{{$item->luogo_note or ''}}" title="{{$item->luogo_note or ''}}" maxlength="1023">
</div>
@else
<input type="hidden" id="logu_id" name="id" value="{{$item->luogo_id}}">
<div class="col-sm-9">
	<input type="text" class="form-control has-error" readonly value="{{$item->luogo->nome}}">
</div>

@endcan
