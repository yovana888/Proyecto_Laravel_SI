@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ventas <a href="venta/create"><button class="btn btn-default" style="border: 1px solid #337ab7;">Nuevo</button></a> <a href="{{url('crear_reporte_ventas/general')}}" target="_blank"><button class="btn btn-primary">Reporte</button></a></h3>
		@include('ventas.venta.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				    <th>Id</th>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Tipo Venta</th>
					<th>Comprobante</th>
					<th>Total</th>
					<th>Estado</th>
					<th>Opciones</th>

				</thead>
               @foreach ($ventas as $ven)
                @if($ven->idsucursal==Auth::user()->id_s)
				<tr>
				    <td>{{ $ven->idventa}}</td>
					<td>{{ $ven->fecha_hora}}</td>
					<td>{{ $ven->nombre}}</td>
				    <td>{{ $ven->tipo_venta}}</td>
				    @if($ven->num_guia=='')
				    <td>{{ $ven->tipo_comprobante.' : '.$ven->serie_comprobante.'-'.$ven->num_comprobante}}</td>
				    @else
				    <td>{{ $ven->tipo_comprobante.' : '.$ven->serie_comprobante.'-'.$ven->num_comprobante. ' / ' .$ven->serie_guia. '-' . $ven->num_guia}}</td>
				    @endif

				<!--	<td>{{ $ven->impuesto}}</td> el ultimo es cancelado-->
					<td>{{ $ven->total_venta}}</td>
                
				    @if ($ven->estado=='Aceptado')
					<td><span class="label label-success">{{ $ven->estado}}</span></td>
					@elseif($ven->estado=='Por Cobrar')
					<td><span class="label label-warning">{{ $ven->estado}}</span></td>
					@elseif($ven->estado=='Anulado')
					<td><span class="label label-danger">{{ $ven->estado}}</span></td>
					@else
				    <td><span class="label label-info">{{ $ven->estado}}</span></td>
					@endif
				    
				    @if($ven->tipo_comprobante=='Ticket')
				    <td>
						<a href="{{URL::action('VentaController@show',$ven->idventa)}}"><button class="btn btn-success"  data-toggle="tooltip" data-placement="top" title="Detalles" style="background:#4CAF50; "><i class="fa fa-eye"></i></button></a>
                         
                         <a target="_blank" href="{{URL::action('VentaController@ticket',$ven->idventa)}}"><button class="btn btn-info"  data-toggle="tooltip" data-placement="top" title="Reporte-Ticket"><i class="fa fa-file-text-o"></i></button></a>
                        
                         <a href="" data-target="#modal-delete-{{$ven->idventa}}" data-toggle="modal"><button class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="Anular"><i class="fa fa-close"></i></button></a>
					</td>
				    @elseif($ven->tipo_comprobante=='Boleta')
				    	<td>
						<a href="{{URL::action('VentaController@show',$ven->idventa)}}"><button class="btn btn-success"  data-toggle="tooltip" data-placement="top" title="Detalles" style="background:#4CAF50;"><i class="fa fa-eye"></i></button></a>
                         
                          <a target="_blank" href="{{URL::action('VentaController@boleta',$ven->idventa)}}"><button class="btn btn-warning"  data-toggle="tooltip" data-placement="top" title="Reporte-boleta"><i class="fa fa-file-text-o"></i></button></a>
                          
                        
                         <a href="" data-target="#modal-delete-{{$ven->idventa}}" data-toggle="modal"><button class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="Anular"><i class="fa fa-close"></i></button></a>
					</td>
				    @elseif($ven->tipo_comprobante=='Factura')
				    
				    <td>
						<a href="{{URL::action('VentaController@show',$ven->idventa)}}"><button class="btn btn-success"  data-toggle="tooltip" data-placement="top" title="Detalles" style="background:#4CAF50;"><i class="fa fa-eye" ></i></button></a>
                         
                         <a target="_blank" href="{{URL::action('VentaController@factura',$ven->idventa)}}"><button class="btn btn-success"  data-toggle="tooltip" data-placement="top" title="Reporte-Factura"><i class="fa fa-file-text-o"></i></button></a>
                          
                        
                         <a href="" data-target="#modal-delete-{{$ven->idventa}}" data-toggle="modal"><button class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="Anular"><i class="fa fa-close"></i></button></a>
					</td>
				    @elseif($ven->tipo_comprobante=='Boleta/Guía de R.')
				      <td>
						<a href="{{URL::action('VentaController@show',$ven->idventa)}}"><button class="btn btn-success"  data-toggle="tooltip" data-placement="top" title="Detalles" style="background:#4CAF50;"><i class="fa fa-eye"></i></button></a>
                         
                          <a target="_blank" href="{{URL::action('VentaController@boleta',$ven->idventa)}}"><button class="btn btn-warning"  data-toggle="tooltip" data-placement="top" title="Reporte-boleta"><i class="fa fa-file-text-o"></i></button></a>
                          
                           <a target="_blank" href="{{URL::action('VentaController@guia',$ven->idventa)}}"><button class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Reporte-Guía de R."><i class="fa fa-file-text-o"></i></button></a>
                          
                        
                         <a href="" data-target="#modal-delete-{{$ven->idventa}}" data-toggle="modal"><button class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="Anular"><i class="fa fa-close"></i></button></a>
					</td>
				    @elseif($ven->tipo_comprobante=='Factura/Guía de R.')
				      <td>
						<a href="{{URL::action('VentaController@show',$ven->idventa)}}"><button class="btn btn-success"  data-toggle="tooltip" data-placement="top" title="Detalles" style="background:#4CAF50;"><i class="fa fa-eye"></i></button></a>
                         
                         <a target="_blank" href="{{URL::action('VentaController@factura',$ven->idventa)}}"><button class="btn btn-success"  data-toggle="tooltip" data-placement="top" title="Reporte-Factura"><i class="fa fa-file-text-o">
                          
                           <a target="_blank" href="{{URL::action('VentaController@guia',$ven->idventa)}}"><button class="btn btn-default"  data-toggle="tooltip" data-placement="top" title="Reporte-Guía de R."><i class="fa fa-file-text-o"></i></button></a>
                          
                        
                         <a href="" data-target="#modal-delete-{{$ven->idventa}}" data-toggle="modal"><button class="btn btn-danger"  data-toggle="tooltip" data-placement="top" title="Anular"><i class="fa fa-close"></i></button></a>
					</td>
				    @endif
				
				
				</tr>
				@endif
				@include('ventas.venta.modal')
				@endforeach
			</table>
		</div>
		{{$ventas->render()}}
	</div>
</div>
@push ('scripts')
<script src="{{asset('js/sweetalert.js')}}"></script>
  <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
<script>
$('#liVentas').addClass("treeview active");
$('#liVentass').addClass("active");
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
@endpush

@endsection