@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Créditos  <a href="{{url('reporteclientes')}}" target="_blank"><button class="btn btn-primary" disabled>Reporte</button></a></h3>
		@include('ventas.credito.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th style="display:none;">idc</th>
					<th style="display:none;">idventa</th>
					<th>Comprobante</th>
					<th>Cliente</th>
					<th>Teléfono</th>
					<th>Total Venta</th>
					<th>Resto</th>
					<th>Fecha de Px. Pago</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($creditos as $cre)
                @if($cre->idsucursal==Auth::user()->id_s)
               @if($hoy==$cre->fecha_px)
				<tr class="info">
				    <td style="display:none;">{{ $cre->idc}}</td>
				     <td style="display:none;">{{ $cre->idventa}}</td>
				     @if($cre->num_guia=='')
				    <td>{{ $cre->tipo_comprobante.' : '.$cre->serie_comprobante.'-'.$cre->num_comprobante}}</td>
				    @else
				    <td>{{ $cre->tipo_comprobante.' : '.$cre->serie_comprobante.'-'.$cre->num_comprobante. ' / ' .$cre->serie_guia. '-' . $cre->num_guia}}</td>
				    @endif

					<td>{{ $cre->nombre}}</td>
					<td>{{ $cre->telefono}}</td>
					<td>{{ $cre->total}}</td>
					<td>{{ $cre->resto}}</td>
					<td>{{ $cre->fecha_px}}</td>
					 @if ($cre->estado=='Pagado')
					<td><span class="label label-success">{{ $cre->estado}}</span></td>
					@else
					<td><span class="label label-warning">{{ $cre->estado}}</span></td>
					@endif
					<td>
                         @include('ventas.credito.plus',[$cre,$detalles,$cre->idventa,$cre->total,$cre->resto])        
                  <a href=""  data-target="#modal-ag-{{$cre->idc}}" data-toggle="modal"><button class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Detalles" style="background:#3C4858; color:#fff;"><i class="fa fa-list"></i></button></a>
                         
					</td>
				</tr>
			    @else
			    <tr>
				    <td style="display:none;">{{ $cre->idc}}</td>
				     <td style="display:none;">{{ $cre->idventa}}</td>
				     @if($cre->num_guia=='')
				    <td>{{ $cre->tipo_comprobante.' : '.$cre->serie_comprobante.'-'.$cre->num_comprobante}}</td>
				    @else
				    <td>{{ $cre->tipo_comprobante.' : '.$cre->serie_comprobante.'-'.$cre->num_comprobante. ' / ' .$cre->serie_guia. '-' . $cre->num_guia}}</td>
				    @endif

					<td>{{ $cre->nombre}}</td>
					<td>{{ $cre->telefono}}</td>
					<td>{{ $cre->total}}</td>
					<td>{{ $cre->resto}}</td>
					<td>{{ $cre->fecha_px}}</td>
					 @if ($cre->estado=='Pagado')
					<td><span class="label label-success">{{ $cre->estado}}</span></td>
					@else
					<td><span class="label label-warning">{{ $cre->estado}}</span></td>
					@endif
					<td>
                         @include('ventas.credito.plus',[$cre,$detalles,$cre->idventa,$cre->total,$cre->resto])        
                  <a href=""  data-target="#modal-ag-{{$cre->idc}}" data-toggle="modal"><button class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Detalles" style="background:#3C4858; color:#fff;"><i class="fa fa-list"></i></button></a>
                         
					</td>
				</tr>
               @endif
			   @endif
				@endforeach
			</table>
		</div>
		{{$creditos->render()}}
	</div>
</div>
@push ('scripts')
<script src="{{asset('js/sweetalert.js')}}"></script>
  <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')

<script>
$('#liVentas').addClass("treeview active");
$('#liCre').addClass("active");
</script>
@endpush
@endsection