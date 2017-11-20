@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	    @include('almacen.marca.create')
	     <h4 style="color:#222">Listado de Marcas <a href=""  data-target="#modal-create" data-toggle="modal"><button class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="nuevo" >Nuevo</button></a> <a href="{{url('reportecategorias')}}" target="_blank"><button class="btn btn-primary">Reporte</button></a></h4>
		@include('almacen.marca.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($marcas as $mar)
				<tr>
					<td>{{ $mar->idmarca}}</td>
					<td>{{ $mar->nombre}}</td>
				    @if ($mar->estado=='Activo')
					<td><span class="label label-success">{{ $mar->estado}}</span></td>
					@else
					<td><span class="label label-danger">{{ $mar->estado}}</span></td>
					@endif
					<td>
					<!--	<a href="{{URL::action('MarcaController@edit',$mar->idmarca)}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>-->

                         <a href=""  data-target="#modal-edit-{{$mar->idmarca}}" data-toggle="modal"><button class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="editar" ><i class="fa fa-edit"></i></button></a>

                         <a href="" data-target="#modal-delete-{{$mar->idmarca}}" data-toggle="modal" data-toggle="tooltip" data-placement="bottom" title="Inabilitar" ><button class="btn btn-danger"><i class="fa fa-close"></i></button></a>
					</td>
				</tr>
				@include('almacen.marca.edit',[$mar->nombre,$mar])
				@include('almacen.marca.modal')
				@endforeach
			</table>
		</div>
		{{$marcas->render()}}
	</div>
</div>
@push ('scripts')
<script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>
<script>
$('#liAlmacen').addClass("treeview active");
$('#liMarca').addClass("active");
</script>
@endpush
@endsection
