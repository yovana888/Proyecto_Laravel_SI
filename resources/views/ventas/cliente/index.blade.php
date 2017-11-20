@extends ('layouts.admin')
@section ('contenido')
<div class="row">
   @include('ventas.cliente.create')
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Clientes  <a href=""  data-target="#modal-create" data-toggle="modal"><button class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="nuevo" > Nuevo</button></a> <a href="{{url('reporteclientes')}}" target="_blank"><button class="btn btn-primary">Reporte</button></a></h3>
		@include('ventas.cliente.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th style="display:none;">id</th>
					<th>Nombre</th>
					<th>DNI</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Email</th>
					<th>RUC</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($personas as $per)
               @if($per->idsucursal==Auth::user()->id_s)
				<tr>
				    <td style="display:none;">{{ $per->idpersona}}</td>
					<td>{{ $per->nombre}}</td>
					<td>{{ $per->num_documento}}</td>
					<td>{{ $per->direccion}}</td>
					<td>{{ $per->telefono}}</td>
					<td>{{ $per->email}}</td>
					<td>{{ $per->ruc}}</td>
					 @if ($per->estado=='Activo')
					<td><span class="label label-success">{{ $per->estado}}</span></td>
					@else
					<td><span class="label label-danger">{{ $per->estado}}</span></td>
					@endif
					<td>
                          <a href=""  data-target="#modal-edit-{{$per->idpersona}}" data-toggle="modal"><button class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="editar" ><i class="fa fa-edit"></i></button></a>
                       
                         <a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-close"></i></button></a>
					</td>
				</tr>
				@endif
				@include('ventas.cliente.modal')
				@include('ventas.cliente.edit',[$per->nombre,$per->num_documento,$per->direccion,$per->telefono,$per->email,$per->ruc,$per])
				@endforeach
			</table>
		</div>
		{{$personas->render()}}
	</div>
</div>
@push ('scripts')
<script src="{{asset('js/sweetalert.js')}}"></script>
  <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')

<script>
$('#liVentas').addClass("treeview active");
$('#liClientes').addClass("active");
</script>
@endpush
@endsection