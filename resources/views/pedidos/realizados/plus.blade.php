

<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-plus">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#444; height:70px;">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
                </button>
          <h3 class="modal-title " style="color:#fff; "><i class="ti-bookmark"></i> Nuevo Pedido</h3>
			</div>
			<div class="modal-body" style="background:#f8f8f8;  ">

      {!!Form::open(array('url'=>'pedidos/realizados','method'=>'POST','autocomplete'=>'off'))!!}
			<div class="row">
				<input type="text" name="extra" hidden="hidden" id="extra">
				<div class="col-md-12">
							<span class="label label" style="background:#bbb; color:#fff; font-size:11px;">Mis Articulos</span>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="input-group">
						 <span class="input-group-addon">
							 <input type="checkbox" aria-label="Checkbox for following text input" id="filtro">
						 </span>
						 <select name="pidarticulo" id="pidarticulo" class="form-control selectpicker selection" data-live-search="true" required>
										 <!--Lo cargamos desde ej jquery-->

						</select>
					 </div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
							<span class="label label" style="background:#bbb; color:#fff; font-size:11px;">Sucursales</span>
				</div>
			</div>
				<div class="row">
					<input type="number" name="" value="{{Auth::user()->id_s}}" hidden="hidden" id="oculto" >
					<div class="col-md-9 col-xs-9">
						@foreach($sucursales as $suc)
							@if($suc->idsucursal==Auth::user()->id_s)
							@else
							<div class="radio">
												<input type="radio" name="id_sucursal" id="default_radio_{{$suc->idsucursal}}" value="{{$suc->idsucursal}}">
												<label for="default_radio_{{$suc->idsucursal}}" style="color:#888;">
														{{$suc->razon}} / Stock Actual:
												</label>
							</div>
							@endif
						@endforeach
					</div>
					<div class="col-md-3 col-xs-3">
						@foreach($sucursales as $suc)
						@if($suc->idsucursal==Auth::user()->id_s)
						@else
						<input type="text" name="" value="" style="height:24px;margin-top:3px;" class="form-control input-sm" disabled id="stock_suc{{$suc->idsucursal}}">
						<span id="suc_nom_{{$suc->idsucursal}}" hidden="hidden">{{$suc->razon}}</span>
						@endif
						@endforeach
					</div>

      	</div>

				<div class="row">
					<div class="col-md-12">
								<span class="label label" style="background:#bbb; color:#fff; font-size:11px;">Mis pedidos</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<input type="text" name="" value="" style="height:24px;margin-top:6px;" class="form-control input-sm" disabled id="mi_stock">
					</div>
					<div class="col-md-3">
						<input type="number" min="1"   style="height:24px;margin-top:6px;" class="form-control input-sm"  id="cantidad">
					</div>
					<div class="col-md-3">
						<button id="add" type="button" name="button" class="btn btn-warning btn-xs" style="margin-top:6px;"><i class="ti-plus"></i></button>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table " id="detalles">
								<thead style="color:#888;">
									<th>#</th>
									<th>Artículo</th>
									<th>Sucursal</th>
									<th>Cant.</th>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<span class="label label" style="background:#bbb; color:#fff; font-size:11px;">Nota</span>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<input type="text" name="nota" class="form-control" >
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

@push ('scripts')
	<script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>
	<script src="{{asset('assets\plugins\form\bootstrap-select\js\bootstrap-select.min.js')}}"></script>
	<script type="text/javascript">
	$(document).ready(function() {

		$('.selectpicker').selectpicker({
		      size: 15
		});
		var html_select0='<option value="-">-Seleccione Articulo-</option>';
		html_select0 +='	@foreach($misarticulos_sin as $art)<option value="{{$art->iddetalle_articulo}}">{{$art->articulo}} / {{$art->tam_nro1}} {{$art->UN1}} - {{$art->tam_nro2}} {{$art->UN2}}</option>@endforeach';
		$('#pidarticulo').html( html_select0);
  		$('#pidarticulo').selectpicker('refresh');
	});

	</script>
	<script type="text/javascript">
	$("#filtro").on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
				var html_select1='<option value="-">-Seleccione Articulo-</option>';
				html_select1 +='	@foreach($misarticulos_con as $art)<option value="{{$art->iddetalle_articulo}}">{{$art->articulo}} / {{$art->tam_nro1}} {{$art->UN1}} - {{$art->tam_nro2}} {{$art->UN2}}</option>@endforeach';
				$('#pidarticulo').html( html_select1);
		  		$('#pidarticulo').selectpicker('refresh');
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
				var html_select0='<option value="-">-Seleccione Articulo-</option>';
				html_select0 +='	@foreach($misarticulos_sin as $art)<option value="{{$art->iddetalle_articulo}}">{{$art->articulo}} / {{$art->tam_nro1}} {{$art->UN1}} - {{$art->tam_nro2}} {{$art->UN2}}</option>@endforeach';
				$('#pidarticulo').html( html_select0);
		  		$('#pidarticulo').selectpicker('refresh');
    }
});

	</script>
	<script type="text/javascript">
		$("select#pidarticulo").on( 'change', function() {

			var valorcomp = $(this).val(); //valor del articulo seleccionado en este caso seria iddetalle_articulo
			if(valorcomp=="-" || valorcomp==" "){
				//limpiamos todos los campos
				  $(":text").each(function(){
							$($(this)).val('');
					});
					 $('#cantidad').val('');
					 $('#mi_stock').val('');
					 $('#extra').val('plus');
			}else{

				//extraemos data
				  $.get('/pedidos/realizados/plus/'+valorcomp+'/stock',function(data){
						var stock_al=data[0];
						// borramos su data anterior, ya q una sucursal no puede tener dicho art.
						$(":text").each(function(){
							 $($(this)).val('');
					 });
					 $('#extra').val('plus');
					 $('#cantidad').val('');
						if(stock_al=='mensaje'){
							//pq estoy en almacen... y el valor lo saco de mi $stock
							var mi_st=data[2][0].num_stock_gn;
							$('#mi_stock').val(mi_st);
							var ex=data[1];

							for (var i=0;i<ex.length;i++){
								 var cube1=data[1][i].idsucursal;
								 var cube2=data[1][i].stock;
								 //como mi id_actual lo guardo en un input. oculto para ponerlo en el input de mi tabla, lo comparo
								 var mi_id=$('#oculto').val();
									 if(mi_id==cube1){
										 //entonces no hago nada , ya q mi stok ya lo llene
									 }else{
											//llenamos para los demas input es decir la de lateral
										 $("#stock_suc"+cube1).val(cube2);
									 }
							 }

						}else{

							 //no estoy en almacen
 								var val_stock_al=data[0][0].num_stock_gn;
 								$('#stock_suc3').val(val_stock_al);
 								//mistock :v, evidentemente viene de la tabla de traslado, por lo q mi stock_suc
 								//viene como mensaje incluido, es decir lo hare correr con un array, pero antes
								var ex=data[1];
								for (var i=0;i<ex.length;i++){
									 var cube1=data[1][i].idsucursal;
									 var cube2=data[1][i].stock;
									 //como mi id_actual lo guardo en un input. oculto para ponerlo en el input de mi tabla, lo comparo
									 var mi_id=$('#oculto').val();
										 if(mi_id==cube1){
											 //entonces coloco mi stok en ese input
											 $('#mi_stock').val(cube2);
										 }else{
											 	//llenamos para los demas input es decir la de lateral
											 $("#stock_suc"+cube1).val(cube2);
										 }
								 }

						}

					});
			}
		});

	</script>
	<script type="text/javascript">
		//lo siguiente sera ver el btn agregar :v nice song: Black Clover Ending Full : Itowokashi – Iolite / Aoi Honoo
		$('#add').click(function(){
			agregar();
		});
    var cont=0;
		function agregar(){
			var val = $('input:radio[name=id_sucursal]:checked').val();
			var nom_suc=$("#suc_nom_"+val).text();
			var cant = $('#cantidad').val();
			if(typeof(val) === "undefined" || cant==" " || cant <= '0'){

				//es decir no hizo click en ningun radio btn o simplemente el valor q ingreso no es valido
				sweetAlert("Error", "Seleccione una sucursal o ingrese un valor valido para la cantidad a pedir", "error");
			}else{
				//verifiquemos de acuerdo al input, es decir si la cantidad q el pide es mayor a la q la sucursal tiene
				var st_suc_sel=$("#stock_suc"+val).val();
				var todo=parseInt(st_suc_sel); //para la comparacion, ya q el otro es text
				var idarticulo=$("#pidarticulo").val();
				var articulo=$("#pidarticulo option:selected").text();
				console.log(val);
				
				
				if(st_suc_sel!=" " && idarticulo!="-" && todo >= cant){
					//entonces agregamos a la tabla
					var fila='<tr class="selected" id="fila'+cont+'" style="color:#888;"><td><button type="button" class="btn btn-danger btn-xs" onclick="eliminar('+cont+');">x</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="hidden" name="idsuc[]" value="'+val+'">'+nom_suc+'</td><td class="form-col"><input type="number" class="form-control input-sm" name="cantidad[]" id="c_t" value="'+cant+'" size="10"></td></tr>';
			        cont++;
			        $('#detalles').append(fila);
			        $('#cantidad').val('');

				}else{
					  sweetAlert("Alerta", "La cantidad a pedir supera el stock de dicha sucursal, o seleccione un articulo válido", "warning");

				}

			}


		}
		//Lo ultimo... el eliminar :v
		function eliminar(index){
        $("#fila" + index).remove();
       }
	</script>
@endpush
