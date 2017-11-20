@extends ('layouts.admin')
@section ('contenido')
<div class="profile-header" id="rem2">

<div class="profile-header-cover" ></div>

<div class="profile-header-content">

  <div class="profile-header-info">

    <h4>Sistema de Gestión de Inventario</h4>

      <a href="#" class="btn btn-xs" style="background:#bd6eca; color:#fff;">{{Auth::user()->s_actual}} / {{Auth::user()->rol_actual}}</a>

  </div>

</div>

</div>

<br>
<ul class="breadcrumb " style="margin-left: 3%; ">
  <li class="active"><a href="#" id="m1" style="color:#e91e63;">PEDIDOS</a></li>

</ul>
  <div class="panel panel-default " style="margin-left: 3%; margin-right :3%;" id="rem1">

{!!Form::open(array('url'=>'compras/ingreso','method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="panel-heading" style="">
		<div class="panel-heading-btn" >
			<div class="dropdown dropdown-icon">
					<a href="javascript:;" class="btn" data-toggle="dropdown"><i class="glyphicon glyphicon-option-vertical"></i></a>
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#">IMPORT</a></li>
						<li><a href="#">EXPORT</a></li>
						<li class="divider"></li>
						<li><a href="#">SETTINGS</a></li>
					</ul>
				</div>
				<a href="javascript:;" class="btn" data-toggle="panel-expand"><i class="glyphicon glyphicon-resize-full"></i></a>
				<a href="javascript:;" class="btn" data-toggle="panel-reload"><i class="glyphicon glyphicon-repeat"></i></a>
				<a href="javascript:;" class="btn" data-toggle="panel-collapse"><i class="glyphicon glyphicon-chevron-up"></i></a>
				<a href="javascript:;" class="btn" data-toggle="panel-remove"><i class="glyphicon glyphicon-remove"></i></a>

		</div>

</div>

<div class="panel-body">

	<br>

<div class="row">
	<div class="col-md-12">
			<div class="row">
					<div class="col-md-8">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
														<label style="color:#888;">Tipo de Documento</label>
														<select name="tipo_comprobante" id="tipo_comprobante" class="form-control" style="color:#888;">
															  <option value="Factura">Factura</option>
																<option value="Boleta">Boleta</option>
																<option value="Ticket">Ticket</option>
																<option value="Guía de Remisión">Guía de Remisión</option>
														</select>
										</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
													<label style="color:#888;">Tipo de Pago</label>
													<select name="tipo_pago" id="tipo_pago" class="form-control" style="color:#888;">
															<option value="Contado">Contado</option>
															<option value="Crédito">Crédito</option>
													</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
														<label style="color:#888;">Serie</label>
														<input type="text" name="serie_comprobante" value="" class="form-control" style="color:#888;" placeholder="000">
										</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
													<label style="color:#888;">Número <span class="text-danger">*</span></label>
													<input type="text" name="num_comprobante" value="" class="form-control" style="color:#888;" placeholder="000000" required>
										</div>
								</div>
							</div>
							<div class="row">

								<div class="col-md-12">
									<select  name="pidarticulo" id="pidarticulo"  class="form-control selectpicker selection" data-live-search="true" required>
											<!--Se agrega con el Jquery y se hace refresh-->

									</select>
								</div>

								<input type="text"  value="" style="display:none;" id="id1" name="todo">
								<input type="text"  value="" style="display:none;" id="id2" name="subtodo">
								<input type="text"  value="" style="display:none;" id="id3" name="todoigv">
								<input type="text"  value="" style="display:none;" id="id4" name="contador"> <!--Esto es adicional para ver el precio real malditas facturas electronicas y letras :v pero... el anime yess ...Sukitte Ii na yo. - Slow dance-->
								<input type="text"  value="" style="display:none;" id="id5" name="inafecta">
								<input type="text"  value="" style="display:none;" id="id6" name="exo">
								<input type="text"  value="" style="display:none;" id="id7" name="gratis">
								<input type="text"  value="0" style="display:none;" id="id8" name="des">
							</div>
					</div>
					<div class="col-md-4">
						<div class="row">
						<label style="color:#888;">Proveedor <span class="text-danger">*</span></label>
							<div class="input-group">

								 <span class="input-group-addon">
									 <input type="checkbox" aria-label="Checkbox for following text input" id="filtro">
								 </span>
								 <select name="idproveedor" id="idproveedor" class="form-control selectpicker selection" data-live-search="true" required>
 												 <!--Poner por defecto en si general-->
 													@foreach($personas as $persona)
 													 <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
 													@endforeach
 								</select>
							 </div>
						</div>
						<br>
						<div class="row">
							<div class="" style="height:35px; background:	#FF2D55;text-align: center; border-radius:5px;margin-top:-3px;">
									<p style="color:#fff; font-size:20px;" id="total_tx">S/. 0</p>
							</div>
						</div>
					</div>
			</div>
<br>

			<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table" id="detalles">
								<thead>
									<tr style="color:#888;">
										<th>Opciones</th>
										<th>Articulo</th>
										<th>Cant. Detalle</th>
										<th>Medida</th>
										<th>V. Unitario</th>
										<th>Cantidad</th>
										<th>IGV</th>
										<th>Dscto(%)</th>
										<th>Importe</th>
									</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
						</div>
             <br>
						 <div class="row">
							<div class="col-md-3">
								<label style="color:#888;">OP. GRAVADAS</label>
							</div>
							<div class="col-md-4">
								<span style="color:#888;" id="subtotal_compra">S/. 0</span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<label style="color:#888;">OP. INAFECTAS</label>
							</div>
							<div class="col-md-4">
								<span style="color:#888;" id="subtotal_inafecta">S/. 0</span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<label style="color:#888;">OP. EXONERADAS</label>
							</div>
							<div class="col-md-4">
								<span style="color:#888;" id="subtotal_exo">S/. 0</span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<label style="color:#888;">OP. GRATUITAS</label>
							</div>
							<div class="col-md-4">
								<span style="color:#888;" id="subtotal_gra">S/. 0</span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<label style="color:#888;">TOTAL DESCUENTOS</label>
							</div>
							<div class="col-md-4">
								<span style="color:#888;" id="subtotal_des">S/. 0</span>
							</div>
						</div>

						<div class="row">
							<div class="col-md-3">
								<label style="color:#888;">IGV %</label>
							</div>
							<div class="col-md-4">
								<span style="color:#888;" id="igv_compra">S/. 0</span>
							</div>
						</div>

						<div class="row" style="border-bottom:1px solid #D3D3D3;">
							<div class="col-md-3">
								<label style="color:#888;">TOTAL</label>
							</div>
							<div class="col-md-4">
								<span style="color:#888;" id="total_compra">S/. 0</span>
							</div>
						</div>
					</div>
			</div>
			<div class="row">
				<div class="col-md-10">
					<span for="" class="label label-pink">Nota Adicional:</span>
					<input type="text" name="nota" class="form-control" style="color:#888;">
				</div>
				<div class="col-md-2">

						<button class="btn btn btn-sm pull-left m-l-5" type="submit" style="background:#5cb85c; color:#fff; margin-top:18px;"><i class="ti-save"></i></button>
						<a href=""><button class="btn btn btn-sm pull-left m-l-5" style="background:#de2668;color:#fff;margin-top:18px;"><i class="ti-eraser"></i></button></a>
						<a href="../ingreso"><button class="btn btn btn-sm pull-left m-l-5" style="background:#999;color:#fff;margin-top:18px;"><i class="ti-share-alt"></i></button></a>

				</div>
			</div>
			<br>
			<div class="row" style="display:none;" id="cred">
							<div class="col-md-3">
								<div class="form-group">
									<label style="color:#888;">Número de Letras <span class="text-danger">*</span></label>
									<input id="letras" type="number" name="letras" value="" min="1" class="form-control" style="color:#888;" placeholder="">
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label style="color:#888;">Monto <span class="text-danger">*</span></label>
									<input id="monto" type="text" name="monto" value="0" class="form-control" style="color:#888;" placeholder="S/.">
								</div>
							</div>
							<div class="col-md-3">
								<form class="" >
									<div class="form-group">
										<label class="control-label" style="color:#888;" >Fecha de Pago Prox. <span class="text-danger">*</span></label>
										<input id="fec" type="date" name="fecha_p" class="form-control">
									</div>
								</form>
							</div>

				</div>
	</div>
<!--Aqui era el col4-->

</div>


</div>
</div>

{!!Form::close()!!}
@push ('scripts')
	<script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>
	<script src="{{asset('assets\plugins\form\bootstrap-select\js\bootstrap-select.min.js')}}"></script>

	<script type="text/javascript">
	$(document).ready(function() {
		$('#m1').text("COMPRAS");
		$('#m2').text("NUEVA COMPRA");

		$('.selectpicker').selectpicker({
		      size: 10
		});
		var html_select0='<option value="-">-Seleccione Articulo-</option>';
		html_select0 +='	@foreach($articulos as $art)<option value="{{$art->iddetalle_articulo}}">{{$art->articulo}} / {{$art->tam_nro1}} {{$art->UN1}} - {{$art->tam_nro2}} {{$art->UN2}}</option>@endforeach';
		$('#pidarticulo').html( html_select0);
  	$('#pidarticulo').selectpicker('refresh');
	});

	</script>

<script type="text/javascript">
$('select#idproveedor').on('change',function(){
  var id_proveedor = $(this).val();
	if( $('#filtro').prop('checked') ) {
    //filtramos con AJAX
		$.get('/compras/ingreso/create/'+id_proveedor+'/filtro',function(data0){

	          var html_select0='<option value="-">-Seleccione Articulo-</option>';
	           $('#pidarticulo').empty();
	          if(data0.length==0){
							html_select0 +='	@foreach($articulos as $art)<option value="{{$art->iddetalle_articulo}}">{{$art->articulo}} / {{$art->tam_nro1}} {{$art->UN1}} - {{$art->tam_nro2}} {{$art->UN2}}</option>@endforeach';

							swal(
								  'Mensaje del Sistema',
								  'El proveedor no posee articulos designados, por lo que se cargará todos los Artículos',
								  'info'
								)
	          }else{
	          for(var i=0;i<data0.length;i++){
	              html_select0 +='<option value="'+data0[i].iddetalle_articulo+'">'+data0[i].articulo+'/ '+data0[i].tam_nro1+' '+data0[i].UN1+'-'+data0[i].tam_nro2+' '+data0[i].UN2+'</option>';
	             		//console.log(html_select0);
	              }
	          }
	          $('#pidarticulo').html( html_select0);
						$('#pidarticulo').selectpicker('refresh');
						//considerar que el select inicializamos en limpio, por lo que la data se carga desde el Controller
	      });
	}else{
	//traemos todo con otra ruta :v mejor directo :v
	//Clannad OST ~ Phases of the Moon
 var html_select0='<option value="-">-Seleccione Articulo-</option>';
 $('#pidarticulo').empty();
 html_select0 +='	@foreach($articulos as $art)<option value="{{$art->iddetalle_articulo}}">{{$art->articulo}} / {{$art->tam_nro1}} {{$art->UN1}} - {{$art->tam_nro2}} {{$art->UN2}}</option>@endforeach';
  $('#pidarticulo').html( html_select0);
}

});
</script>
<script type="text/javascript">
$('select#tipo_pago').on('change',function(){
  var valorcomp = $(this).val();
  if( valorcomp=="Crédito"){

    $("#cred").css("display", "block");
		$("#monto").prop('required',true);
		$("#fec").prop('required',true);
		$("#letras").prop('required',true);

  }else {
		  $("#cred").css("display", "none");
			$('#monto').removeAttr('required');
			$('#fec').removeAttr('required');
			$('#letras').removeAttr('required');

  }
});

$(function(){
		$('#pidarticulo').on('change',ondata);
});
var cont=0;
var numero=0;
var importe_ini=[];
var tipo_ini=[];
var descuento_ini=[];
var gratis_ini=[];
var igv_ini=[];
var exo_ini=[];
var ina_ini=[];
var total=0;
var subtotal=0;
var igv=0;
var gratis=0;
var porcentaje=0;
var exo=0;
var ina=0;
function ondata(){
	var art_id= $(this).val();
	if(!art_id==''){
			//vamos con el Ajax
				$.get('/compras/ingreso/create/'+art_id+'/detalles',function(data){
					var nombre_ar=data[0].articulo_com;
					var precio_c=data[0].precio_compra;
					var medida=data[0].medida_stock_gn;
					var idart=data[0].iddetalle_articulo;
					importe_ini[cont]=precio_c;
					descuento_ini[cont]=0;
					gratis_ini[cont]=0;
					exo_ini[cont]=0;
					ina_ini[cont]=0;
					tipo_ini[cont]='Gravada';

			//agrega fila

						subtotal=subtotal+parseFloat(precio_c);
						igv=igv+(parseFloat(precio_c)*0.18);
						igv_ini[cont]=igv.toFixed(2);
						total=total+ parseFloat(subtotal+igv);
						$("#id1").val(total.toFixed(2));
						$("#id2").val(subtotal.toFixed(2));
						$("#id3").val(igv.toFixed(2));

			  var fila='<tr style="color:#888;" class="selected" id="fila'+cont+'"><td class="btn-col" style="white-space: nowrap"><a onclick="eliminar('+cont+');" class="btn btn-danger btn-xs"><i class="ti-close"></i></a><a onclick="editar('+cont+');" class="btn btn-warning btn-xs"><i class="ti-reload"></i></a></td><td><input type="hidden" name="idarticulo[]" value="'+idart+'">'+nombre_ar+'</td><td class="form-col"><input type="number" class="form-control input-sm" value="1" name="cantidad_dt[]" id="ctd'+cont+'"></td><td class="form-col"><select class="form-control input-sm" name=med[] id="medt'+cont+'">@foreach($medidas_cont as $medi)<option value="{{$medi->nombre}}">{{$medi->nombre}}</option>@endforeach</select></td><td class="form-col"><input type="number" class="form-control input-sm" value="'+parseFloat(precio_c).toFixed(2)+'" name="precio_compra[]" id="pc'+cont+'"></td><td class="form-col"><input type="number" class="form-control input-sm" value="1" name="cantidad[]" id="ct'+cont+'"></td><td class="form-col"><select name="tipoigv[]"  id="tip_igv'+cont+'" class="form-control input-sm"  ><option value="Gravada">Gravada</option><option value="Exonerado">Exonerado</option><option value="Gratuita">Gratuita</option><option value="Inafecta"> Inafecta</option></select></td><td class="form-col"><input type="number" class="form-control input-sm" value="0" name="descuento[]" id="de'+cont+'"></td><td>S/.<span id="imp'+cont+'">'+parseFloat(importe_ini[cont]).toFixed(2)+'</span></td></tr>';

				  cont++;
          numero=numero+1;
					$("#id4").val(numero);
					$("#total_compra").html("S/. " +total.toFixed(2));
					$("#igv_compra").html("S/. " +igv.toFixed(2));
					$("#subtotal_compra").html("S/. " +subtotal.toFixed(2));
					$("#total_tx").html("S/. " +total.toFixed(2));
					$('#detalles').append(fila);

					});
	}else{
		//no hace nada
	}

}

function eliminar(index){

					if(tipo_ini[index]=='Gravada'){
						igv=igv-importe_ini[index]*0.18;
						subtotal =subtotal- ((importe_ini[index]*100)/(100-descuento_ini[index]));
						porcentaje=porcentaje-((importe_ini[index]*descuento_ini[index])/(100-descuento_ini[index]));
					}else if(tipo_ini[index]=='Exonerado'){
						//no disminuye IGV
						exo=exo-exo_ini[index];
						subtotal =subtotal- ((importe_ini[index]*100)/(100-descuento_ini[index]));
						porcentaje=porcentaje-((importe_ini[index]*descuento_ini[index])/(100-descuento_ini[index]));
					}else if(tipo_ini[index]=='Inafecta'){
						ina=ina-ina_ini[index];
						subtotal =subtotal- ((importe_ini[index]*100)/(100-descuento_ini[index]));
						porcentaje=porcentaje-((importe_ini[index]*descuento_ini[index])/(100-descuento_ini[index]));
					}else{
						//no resta nada a OP. GRAVADAS=SUbTOTAL
						gratis=gratis-gratis_ini[index];

					}
					total=subtotal+igv-porcentaje+exo+ina;
					$("#id3").val(parseFloat(igv).toFixed(2));
					$("#id2").val(parseFloat(subtotal).toFixed(2));
					$("#id7").val(parseFloat(gratis).toFixed(2));
					$("#id1").val(parseFloat(total).toFixed(2));
					$("#id8").val(parseFloat(porcentaje).toFixed(2));
					$("#id6").val(parseFloat(exo).toFixed(2));
					$("#id5").val(parseFloat(ina).toFixed(2));
					$("#subtotal_compra").html("S/. " +parseFloat(subtotal).toFixed(2));
					$("#subtotal_gra").html("S/. " +parseFloat(gratis).toFixed(2));
					$("#total_compra").html("S/. " +parseFloat(total).toFixed(2));
					$("#subtotal_des").html("S/. " +parseFloat(porcentaje).toFixed(2));
					$("#subtotal_exo").html("S/. " +parseFloat(exo).toFixed(2));
					$("#subtotal_inafecta").html("S/. " +parseFloat(ina).toFixed(2));
					$("#igv_compra").html("S/. " +parseFloat(igv).toFixed(2));
					$("#total_tx").html("S/. " +parseFloat(total).toFixed(2));
					importe_ini[index]=0;
					descuento_ini[index]=0;
					gratis_ini[index]=0;
					ina_ini[index]=0;
					exo_ini[index]=0;
					 $("#fila" + index).remove();

 }

 function editar(index){
 	 //extraemos el valor del precio de compra y la cantidad actual
	var pca = $("#pc" + index).val();
	var caa = $("#ct" + index).val();
	//sacamos el valor de porcentaje :v para descuento
	var des = $("#de" + index).val();
	descuento_ini[index]=des;
	var res = pca*caa;
	var res1=res-res*des/100; //esto es para sumar en descuentos generales s:v

	//extraemos el valor del select e inicializamos todo a 0
	gratis=0;
	igv=0;
	subtotal=0;
	porcentaje=0;
	total=0;
	exo=0;
	ina=0;

	var tipo = $("#tip_igv" + index).val();
	    console.log(tipo);
			if(tipo=='Gravada'){
				importe_ini[index]=res1.toFixed(2);
				$("#imp" + index).html(res1.toFixed(2));

			}else if(tipo=='Gratuita'){

				importe_ini[index]=res.toFixed(2);
				gratis_ini[index]=res;
				tipo_ini[index]='Gratuita';
				igv_ini[index]=0;
				descuento_ini[index]=0;
				$("#imp" + index).html(res.toFixed(2));


			}else if(tipo=='Exonerado'){
				importe_ini[index]=res1.toFixed(2);
				exo_ini[index]=res1;
				tipo_ini[index]='Exonerado';
				igv_ini[index]=0;
				$("#imp" + index).html(res1.toFixed(2));

			}else {
				importe_ini[index]=res1.toFixed(2);
				exo_ini[index]=res1;
				tipo_ini[index]='Inafecta';
				igv_ini[index]=0;
				$("#imp" + index).html(res1.toFixed(2));
			}
			//****************************************************
			//AHORA TODO ACTUALIZAMOS EN UN FOR
			for (var j=0; j<importe_ini.length; j++) {

            if(tipo_ini[j]=='Gravada'){
							igv=igv+importe_ini[j]*0.18;
							subtotal =subtotal+ ((importe_ini[j]*100)/(100-descuento_ini[j]));
							porcentaje=porcentaje+((importe_ini[j]*descuento_ini[j])/(100-descuento_ini[j]));
						}else if(tipo_ini[j]=='Exonerado'){
							//no aumenta IGV
							exo=exo+exo_ini[j];
							subtotal =subtotal+ ((importe_ini[j]*100)/(100-descuento_ini[j]));
							porcentaje=porcentaje+((importe_ini[j]*descuento_ini[j])/(100-descuento_ini[j]));
						}else if(tipo_ini[j]=='Inafecta'){
							ina=ina+ina_ini[j];
							subtotal =subtotal+ ((importe_ini[j]*100)/(100-descuento_ini[j]));
							porcentaje=porcentaje+((importe_ini[j]*descuento_ini[j])/(100-descuento_ini[j]));
						}else{
							//no aumenta IGV ni subtotal pq es gratis
								gratis=gratis+gratis_ini[j];
						}


				}

				total=subtotal+igv-porcentaje+exo+ina;
			  $("#id3").val(parseFloat(igv).toFixed(2));
				$("#id2").val(parseFloat(subtotal).toFixed(2));
				$("#id7").val(parseFloat(gratis).toFixed(2));
				$("#id1").val(parseFloat(total).toFixed(2));
				$("#id8").val(parseFloat(porcentaje).toFixed(2));
				$("#id6").val(parseFloat(exo).toFixed(2));
				$("#id5").val(parseFloat(ina).toFixed(2));
				$("#subtotal_compra").html("S/. " +parseFloat(subtotal).toFixed(2));
				$("#subtotal_gra").html("S/. " +parseFloat(gratis).toFixed(2));
				$("#total_compra").html("S/. " +parseFloat(total).toFixed(2));
				$("#subtotal_des").html("S/. " +parseFloat(porcentaje).toFixed(2));
				$("#subtotal_exo").html("S/. " +parseFloat(exo).toFixed(2));
				$("#subtotal_inafecta").html("S/. " +parseFloat(ina).toFixed(2));
				$("#igv_compra").html("S/. " +parseFloat(igv).toFixed(2));
				$("#total_tx").html("S/. " +parseFloat(total).toFixed(2));


  }


</script>
 @endpush
@endsection
