<div class="form-group">
		<label for="descrizione" class="col-sm-2 control-label">Descrizione</label>
		<div class="col-sm-9">
			<textarea style="resize: vertical;" class="form-control" ondblclick="json_modal(redump(JSON.parse(this.value)))" id="{{get_class($item)}}_descrizione" 
		name="descrizione" rows= "4" placeholder="Descrizione" maxlength="1023">{{$item->descrizione or ''}}</textarea>
		</div>
</div>
