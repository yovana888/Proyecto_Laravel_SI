
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-plus2">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#444; height:70px;">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
                </button>
            <h3 class="modal-title " style="color:#fff; "><i class="ti-bookmark"></i> Nuevo Pedido Proveedor</h3>
			</div>
			<div class="modal-body" style="background:#f8f8f8;  ">
      		{!!Form::open(array('url'=>'pedidos/realizados','method'=>'POST','autocomplete'=>'off'))!!}
      		<input type="text" name="extra" hidden="hidden"  id="extra2">
			<div class="row">
				<div class="col-md-12">
					<span class="label label" style="background:#bbb; color:#fff; font-size:11px;">Mis Articulos</span>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-12">
					<div class="input-group">
						 <span class="input-group-addon">
							 <input type="checkbox" aria-label="Checkbox for following text input" id="filtro2">
						 </span>
						 <select name="pidarticulo2" id="pidarticulo2" class="form-control selectpicker selection" data-live-search="true" required>
										 <!--Lo cargamos desde ej jquery-->
						</select>
					 </div>
				</div>
			</div>
			<br>
			<div class="row">
					<div class="col-md-12">
						<span class="label label" style="background:#bbb; color:#fff; font-size:11px;">Mi Stock</span>
					</div>
			</div>
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<input type="text" name="" value="" style="height:24px;margin-top:6px;" class="form-control input-sm" disabled id="mi_stock2">
					</div>
					<div class="col-md-3 col-xs-6">
						<input type="number" min="1" name="" value="" style="height:24px;margin-top:6px;" class="form-control input-sm"  id="cantidad2">
					</div>
					<div class="col-md-3">
						<button id="add2" type="button" name="button" class="btn btn-warning btn-xs" style="margin-top:6px;"><i class="ti-plus"></i></button>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table " id="detalles2">
								<thead style="color:#888;">
									<th>#</th>
									<th>Artículo</th>
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
						<input type="text" name="nota2" class="form-control" >
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

	<script type="text/javascript">
	$(document).ready(function() {

		$('.selectpicker').selectpicker({
		      size: 15
		});
		var html_select='<option value="-">-Seleccione Articulo-</option>';
		html_select +='	@foreach($misarticulos_sin as $art)<option value="{{$art->iddetalle_articulo}}">{{$art->articulo}} / {{$art->tam_nro1}} {{$art->UN1}} - {{$art->tam_nro2}} {{$art->UN2}}</option>@endforeach';
		$('#pidarticulo2').html( html_select);
  		$('#pidarticulo2').selectpicker('refresh');
	});

	</script>
	<script type="text/javascript">
	$("#filtro2").on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
				var html_select11='<option value="-">-Seleccione Articulo-</option>';
				html_select11 +='	@foreach($misarticulos_con as $art)<option value="{{$art->iddetalle_articulo}}">{{$art->articulo}} / {{$art->tam_nro1}} {{$art->UN1}} - {{$art->tam_nro2}} {{$art->UN2}}</option>@endforeach';
				$('#pidarticulo2').html( html_select11);
		  		$('#pidarticulo2').selectpicker('refresh');
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
				var html_select='<option value="-">-Seleccione Articulo-</option>';
				html_select +='	@foreach($misarticulos_sin as $art)<option value="{{$art->iddetalle_articulo}}">{{$art->articulo}} / {{$art->tam_nro1}} {{$art->UN1}} - {{$art->tam_nro2}} {{$art->UN2}}</option>@endforeach';
				$('#pidarticulo2').html( html_select);
		  		$('#pidarticulo2').selectpicker('refresh');
    }
	});
	

	</script>
	<script type="text/javascript">
		$("select#pidarticulo2").on( 'change', function() {
			//AJAX 
			var valorcomp2 = $(this).val();
			if(valorcomp2=="-" || valorcomp2==" "){
				 $('#cantidad2').val('');
				 $('#mi_stock2').val('');
				 $('#extra2').val('plus2');

			}else{
				//extraemos data
				  $.get('/pedidos/realizados/plus/'+valorcomp2+'/stock2',function(datak){
				  	var suc=datak[1];
					  	if(suc=='mensaje1'){
					  		//estoy en almacen_central
					  		var stkk=datak[0];
					  		
					  	}else{
					  		var stkk=datak[0];
					  		console.log(stkk);
					  	}
				   $('#mi_stock2').val(stkk);

          		});

			}

		});

		$('#add2').click(function(){
			agregar2();
		});

		var cont2=0;
		function agregar2(){
			var idarticulo2=$("#pidarticulo2").val();
			var cant2 = $('#cantidad2').val();
			if(idarticulo2=="-" || idarticulo2==" "){
				sweetAlert("Error", "Seleccione un artículo válido", "error");
				$('#cantidad2').val('');
			}else{
				var articulo2=$("#pidarticulo2 option:selected").text();
				if(cant2!=" " && cant2 >= '0'){
					//entonces agregamos a la tabla
					var fila2='<tr class="selected" id="filak'+cont2+'" style="color:#888;"><td><button type="button" class="btn btn-danger btn-xs" onclick="eliminar2('+cont2+');">x</button></td><td><input type="hidden" name="idarticulo2[]" value="'+idarticulo2+'">'+articulo2+'</td><td class="form-col"><input type="number" class="form-control input-sm" name="cantidad2[]" id="c_t" value="'+cant2+'" size="15"></td></tr>';
			        cont++;
			        $('#detalles2').append(fila2);
			        $('#cantidad2').val('');

				}else{
					  sweetAlert("Alerta", "La cantidad pedida no es válida", "warning");

				}

			}
		}

		function eliminar2(index2){
        $("#filak" + index2).remove();
       }
	</script>
@endpush
