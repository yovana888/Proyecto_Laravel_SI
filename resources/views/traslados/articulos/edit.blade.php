
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-edit-{{$det->idtraslado}}">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#444; height:70px;">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
                </button>
                  <h3 class="modal-title " style="color:#fff; "><i class="ti-pencil"></i> Editar Articulo</h3>
			</div>
			<div class="modal-body" style="background:#f8f8f8; ">
                     <!--Eso es pq me retorna categoria-->
        <p class="text-muted">@foreach($articulo_nom as $arn) {{$arn->nombre}}@endforeach color {{$det->color}}/{{$det->tam_nro1}} {{$det->UN1}} - {{$det->tam_nro2}} {{$det->UN2}} <span class="label label" style="background:#5cb85c;">{{$det->codigo}}</span></p>
                     @if (count($errors)>0)
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                </ul>
                            </div>
                         </div>
                     @endif

          {!!Form::model($det,['method'=>'PATCH','route'=>['traslados.articulos.update',$det->idtraslado]])!!}
          {{Form::token()}}
					<div class="row">
						<div class="col-md-4">
							<div class="form-group" style="margin-top:4px;">
									<label for="nombre" style="color:#888;font-size:11px;" >Stock Actual</label>
									<div class="input-group">
										<input required value="{{$det->stock}}" type="text" name="val_stock" id="st_num" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
										<span class="input-group-addon" id="st_uni">{{$det->medida_stock_gn}}</span>
									 </div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group" style="margin-top:4px;">
									<label for="nombre" style="color:#888;font-size:11px;" >Valor Unitario </label>
									<div class="input-group">
										<span class="input-group-addon" id="vu_uni">S/.</span>
										<input type="text" value="{{$det->precio_venta}}" name="val_uni" id="vu_num" class="form-control"   style="color:#777;" aria-describedby="basic-addon2">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group" style="margin-top:4px;">
									<label for="nombre" style="color:#888;font-size:11px;" >Valor Detalle</label>
									<div class="input-group">
								
										@if($det->medida_stock_det=='m')
										<input type="text" value="{{$det->precio_detalle}}" name="val_det" id="vd_num" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
										<span class="input-group-addon" id="vd_uni">1m</span>
										@elseif($det->medida_stock_det=='gr')
										<input type="text" value="{{$det->precio_detalle}}" name="val_det" id="vd_num" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
										<span class="input-group-addon" id="vd_uni">100gr</span>
										@else
										<input type="text" disabled="disabled" val="" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
										<span class="input-group-addon" id="vd_uni">--</span>
										@endif
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group" style="margin-top:4px;">
											<label for="nombre" style="color:#888;font-size:11px;" >Cantidad Vol(1)</label>
											<div class="input-group">
												<input value="{{$det->cantidad_volumen1}}"  type="text" name="vol_1" id="vol_1" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
												<span class="input-group-addon" id="ct_1">{{$det->medida_stock_gn}}</span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" style="margin-top:4px;">
											<label for="nombre" style="color:#888;font-size:11px;" >Precio Vol(1)</label>
											<div class="input-group">
												<span class="input-group-addon" id="">S/.</span>
												<input value="{{$det->precio_mayor1}}" type="text" name="pre_1" id="pre_1" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group" style="margin-top:4px;">
											<label for="nombre" style="color:#888;font-size:11px;" >Cantidad Vol(2)</label>
											<div class="input-group">
												<input value="{{$det->cantidad_volumen2}}" type="text" name="vol_2" id="vol_2" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
												<span class="input-group-addon" id="ct_2">{{$det->medida_stock_gn}}</span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" style="margin-top:4px;">
											<label for="nombre" style="color:#888;font-size:11px;" >Precio Vol(2)</label>
											<div class="input-group">
												<span class="input-group-addon" id="">S/.</span>
												<input value="{{$det->precio_mayor2}}"  type="text" name="pre_2" id="pre_2" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group" style="margin-top:4px;">
											<label for="nombre" style="color:#888;font-size:11px;" >Cantidad Vol(3)</label>
											<div class="input-group">
												<input value="{{$det->cantidad_volumen3}}" type="text" name="vol_3" id="vol_3" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
												<span class="input-group-addon" id="ct_3">{{$det->medida_stock_gn}}</span>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group" style="margin-top:4px;">
											<label for="nombre" style="color:#888;font-size:11px;" >Precio Vol(3)</label>
											<div class="input-group">
												<span class="input-group-addon" id="">S/.</span>
												<input type="text" value="{{$det->precio_mayor3}}"  name="pre_3" id="pre_3" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--Aqui se cargara la imagen-->
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-12" id="parimage">
									<div class="form-group" >
												<label for="nombre" style="color:#888;font-size:11px;margin-top:5px;" >Stock Det.</label>
												<div class="input-group">
													@if($det->medida_stock_det=='-')
														<input disabled="disabled" type="text" class="form-control" style="color:#777;" aria-describedby="basic-addon2">
														<span class="input-group-addon" >--</span>
													@else 
														<input type="text" name="st_det" value="{{$det->cantidad_detalle}}" class="form-control" style="color:#777;" aria-describedby="basic-addon2">
														<span class="input-group-addon">{{$det->medida_stock_det}}</span>
													@endif
												</div>
									</div>
								</div>
															
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group" >
											<label for="nombre" style="color:#888;font-size:11px;margin-top:6px;" >Stock min.</label>
											<input type="text" required name="st_min" id="st_min" class="form-control"  style="color:#777;" value="{{$det->stockmin}}" aria-describedby="basic-addon2">

									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									  <div class="form-group" style="margin-top:5px;">
					                     <label for="descripcion" style="color:#888;">Estado</label>
					            	     <select name="estado" class="form-control" style="color:#888;">
					                        @if ($det->estado=='Activo')
					                            <option value="Activo" selected>Activo</option>
					                            <option value="Inactivo">Inactivo</option>
					                        @else
					                           <option value="Inactivo" selected>Inactivo</option>
					                            <option value="Activo">Activo</option>
					                        @endif
					                    </select>
					                   </div>
								</div>
							</div>
					</div>


			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn" style="background:#ff5252;color:#fff;">Guardar</button>
			</div>
    {!!Form::close()!!}
		</div>
	</div>
</div>


