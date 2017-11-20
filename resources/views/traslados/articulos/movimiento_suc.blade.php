	
<div  class="modal fade modal-slide-in-right " aria-hidden="true"
role="dialog" tabindex="-1" id="modal-mov-{{$det->idtraslado}}">
	<div class="modal-dialog modal-sm">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#444; height:70px;">

                 <h4 class="modal-title " style="color:#fff; "><i class="ti-exchange-vertical"></i>Agregar Movimiento</h4>
			</div>
		{!!Form::open(array('url'=>'movimientos/ultimos','method'=>'POST','autocomplete'=>'off'))!!}
				{{Form::token()}}
			<div class="modal-body" style="background:#f8f8f8; padding:15px 30px 30px 30px;">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
									<label style="color:#888;">Tipo de Movimiento</label>
									<br>

										<select name="tipo_movimiento" class="form-control" style="color:#888; width:100%;" >
												@foreach ($tipos as $tip)
											<option value="{{$tip->nombre}}">{{$tip->nombre}} / {{$tip->tipo_mov}}</option>
												@endforeach
										</select>

							 </div>
						</div>

					</div>

<br>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
									<label for="nombre" style="color:#888;">Cantidad</label>
									<br>
									<input type="number" name="cantidad" class="form-control "  placeholder="" style="color:#777;" min="1" required >
							</div>
						</div>
						<input type="text" name="st" value="{{$det->stock}}" style="display:none;">
						<input type="text" name="idtraslado" value="{{$det->idtraslado}}" style="display:none;">
						<input type="text" name="idarticulo" value="{{$det->iddetalle_articulo}}" style="display:none;">
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
									<label for="nombre" style="color:#888;">Nota</label>
									<br>
									<input type="text" name="nota" class="form-control "  placeholder="" style="color:#777;" >
							</div>
						</div>

					</div>
			</div>
			<div class="modal-footer" style="background:#f8f8f8; height:50px;">
				<button type="submit" class="btn btn" style="background:#5cb85c;color:#fff;margin-top:-8px;">Guardar</button>
			</div>
    {!!Form::close()!!}
		</div>
	</div>
</div>
