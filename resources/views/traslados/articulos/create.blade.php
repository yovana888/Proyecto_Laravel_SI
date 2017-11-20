
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-create">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#444; height:70px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										 <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
				</button>
          <h3 class="modal-title " style="color:#fff; "><i class="ti-bookmark"></i> Nuevo Articulo</h3>
			</div>
			<div class="modal-body" style="background:#f8f8f8; ">

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
      {!!Form::open(array('url'=>'traslados/articulos','method'=>'POST','autocomplete'=>'off'))!!}
      {{Form::token()}}

			<div class="row">
				<div class="col-md-12">
					<select name="idarticulo" id="idarticulo" class="form-control selectpicker selection" data-live-search="true" required>
						<option value="-">-Seleccione-</option>
						@foreach($listado as $li)
						<option value="{{$li->iddetalle_articulo}}">{{$li->articulo}} / {{$li->tam_nro1}} {{$li->UN1}} - {{$li->tam_nro2}} {{$li->UN2}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group" style="margin-top:4px;">
							<label for="nombre" style="color:#888;font-size:11px;" >Stock Actual</label>
							<div class="input-group">
								<input required type="text" name="val_stock" id="st_num" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
  					  	<span class="input-group-addon" id="st_uni">--</span>
						   </div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group" style="margin-top:4px;">
							<label for="nombre" style="color:#888;font-size:11px;" >Valor Unitario </label>
							<div class="input-group">
								<span class="input-group-addon" id="vu_uni">S/.</span>
								<input type="text" name="val_uni" id="vu_num" class="form-control"   style="color:#777;" aria-describedby="basic-addon2">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group" style="margin-top:4px;">
							<label for="nombre" style="color:#888;font-size:11px;" >Valor Detalle</label>
							<div class="input-group">
								<input type="text" name="val_det" id="vd_num" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
								<span class="input-group-addon" id="vd_uni">--</span>
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
										<input type="text" name="vol_1" id="vol_1" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
										<span class="input-group-addon" id="ct_1">--</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" style="margin-top:4px;">
									<label for="nombre" style="color:#888;font-size:11px;" >Precio Vol(1)</label>
									<div class="input-group">
										<span class="input-group-addon" id="">S/.</span>
										<input type="text" name="pre_1" id="pre_1" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group" style="margin-top:4px;">
									<label for="nombre" style="color:#888;font-size:11px;" >Cantidad Vol(2)</label>
									<div class="input-group">
										<input type="text" name="vol_2" id="vol_2" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
										<span class="input-group-addon" id="ct_2">--</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" style="margin-top:4px;">
									<label for="nombre" style="color:#888;font-size:11px;" >Precio Vol(2)</label>
									<div class="input-group">
										<span class="input-group-addon" id="">S/.</span>
										<input type="text" name="pre_2" id="pre_2" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group" style="margin-top:4px;">
									<label for="nombre" style="color:#888;font-size:11px;" >Cantidad Vol(3)</label>
									<div class="input-group">
										<input type="text" name="vol_3" id="vol_3" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
										<span class="input-group-addon" id="ct_3">--</span>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" style="margin-top:4px;">
									<label for="nombre" style="color:#888;font-size:11px;" >Precio Vol(3)</label>
									<div class="input-group">
										<span class="input-group-addon" id="">S/.</span>
										<input type="text" name="pre_3" id="pre_3" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--Aqui se cargara la imagen-->
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12" id="parimage">


						</div>
					</div>
					<div class="row">
							<div class="col-md-6">
								<div class="form-group" style="margin-top:20px;">
										<label for="nombre" style="color:#888;font-size:11px;" >Stock Det.</label>
										<div class="input-group">
											<input type="text" name="st_det" id="st_det" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">
											<span class="input-group-addon" id="st_tx">--</span>
									</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group" style="margin-top:20px;">
									<label for="nombre" style="color:#888;font-size:11px;" >Stock min.</label>

										<input type="text" required name="st_min" id="st_min" class="form-control"  placeholder="" style="color:#777;" aria-describedby="basic-addon2">


						</div>
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

  <!---<button class="btn btn-success" type="button" onclick="generarBarcode()">Generar</button>-->

</div>

@push ('scripts')
<script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript">
		$( document ).ready(function() {
		$('.selectpicker').selectpicker({
					size: 15
		});
		 $('#parimage').html('<span class="label label" style="background:#5cb85c;">Codigo:Color</span><br><img src="{{asset("imagenes/variaciones/002-thread.PNG")}}" class="img-rounded" width="120" height="115">');
		});
</script>
<script type="text/javascript">
	//EMPIEZA AJAX
	$('select#idarticulo').on('change',function(){
	  var id_articulo= $(this).val();
		if(id_articulo=="-"){
			//limpiamos campos
			$('#parimage').html('<span class="label label" style="background:#5cb85c;">Codigo:Color</span><br><img src="{{asset("imagenes/variaciones/002-thread.PNG")}}" class="img-rounded" width="120" height="115">');

			 $('#vd_num').removeAttr('disabled');
			 $('#st_det').removeAttr('disabled');
			 $('#st_uni').text('--');
			 $('#vd_uni').text('--');
			 $('#ct_1').text('--');
			 $('#ct_2').text('--');
			 $('#ct_3').text('--');
			 $('#vd_num').val('');
			 $('#st_det').val('');
			 $('#st_tx').text('--');

			  $(":text").each(function(){
 					$($(this)).val('');
 				});

		}else{
			$.get('/traslados/articulos/create/'+id_articulo+'/datos',function(data){

					//$('#vu_num').val(data[0].)
					var img_data=data[0].imagen;
					if(img_data=""){
						//que no crague imagen pero si el resto de los datos
						$('#parimage').html('<span class="label label" style="background:#5cb85c;">'+data[0].codigo+':'+data[0].etiqueta+'</span><br><img src="{{asset("imagenes/variaciones/002-thread.PNG")}}"  class="img-rounded" width="120" height="115">');

						//cambiamos los span

					}else{
						//que cargue la imagen + data
						$('#parimage').html('<span class="label label" style="background:#5cb85c;">'+data[0].codigo+':'+data[0].etiqueta+'</span><br><img src="/imagenes/variaciones/'+data[0].imagen+'" class="img-rounded" width="120" height="115">');

					}

					//seguimos con el resto
					$('#st_uni').text(data[0].medida_stock_gn+'(s)');
					//cargamos todas las unidades volumen :v
					$('#ct_1').text(data[0].medida_stock_gn+'(s)');
					$('#ct_2').text(data[0].medida_stock_gn+'(s)');
					$('#ct_3').text(data[0].medida_stock_gn+'(s)');
					//cargamos todas las cantidades volumen
					$('#vol_1').val(data[0].cantidad_vol1);
					$('#vol_2').val(data[0].cantidad_vol2);
					$('#vol_3').val(data[0].cantidad_vol3);
					$('#vu_num').val(data[0].precio_normal_u)
					//cargamos todos los precios vulumen
					$('#pre_1').val(data[0].precio_vol1 );
					$('#pre_2').val(data[0].precio_vol2);
					$('#pre_3').val(data[0].precio_vol3);

					//vemos si hay detalle precio, si hay ver si es 100 gr o 1 m
					var pre_deta=data[0].medida_stock_det;
					if(pre_deta=='-'){
						$('#vd_uni').text('--');
						$('#st_tx').text('--');
						$('#vd_num').val('');
						$('#st_det').val('');
						$('#vd_num').attr('disabled', true);
						$('#st_det').attr('disabled', true);

					}else{
						$('#vd_num').removeAttr('disabled');
						$('#st_det').removeAttr('disabled');
						$('#vd_num').val(data[0].precio_det_u);

						if(pre_deta=='m'){
						 $('#vd_uni').text('1m');
						 $('#st_tx').text('m');
						}else{
							//pq es gramo
							$('#vd_uni').text('100gr');
							$('#st_tx').text('gr');
						}
					}
			});
			//fin de AJAX
		}


	});
</script>
 @endpush
