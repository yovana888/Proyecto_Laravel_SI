{!! Form::open(array('url'=>'traslados/stock','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}" style="border-radius:6px;">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-default" style="background:#5f5f5f; color:#fff; margin-left:-5px;"><i class="fa fa-search"></i></button>
		</span>
	</div>
</div>

{{Form::close()}}