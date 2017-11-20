@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	   @include('almacen.talla.create',$subcategorias)
		      <h4 style="color:#222">Listado de Tallas <a href=""  data-target="#modal-create" data-toggle="modal"><button class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="nuevo" >Nuevo</button></a> <a href="{{url('reportecategorias')}}" target="_blank"><button class="btn btn-primary">Reporte</button></a></h4>
		@include('almacen.talla.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Subcategoría</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($tallas as $tall)
				<tr>
					<td>{{ $tall->idtalla}}</td>
					<td>{{ $tall->nombre}}</td>
					<td>{{ $tall->subcategoria}}</td>
                   
                    @if ($tall->estado=='Activo')
					<td><span class="label label-success">{{ $tall->estado}}</span></td>
					@else
					<td><span class="label label-danger">{{ $tall->estado}}</span></td>
					@endif
					
					<td>
					<!--	<a href="{{URL::action('TallaController@edit',$tall->idtalla)}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>-->
                           <a href=""  data-target="#modal-edit-{{$tall->idtalla}}" data-toggle="modal"><button class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="editar" ><i class="fa fa-edit"></i></button></a>
                           
                         <a href="" data-target="#modal-delete-{{$tall->idtalla}}" data-toggle="modal" data-toggle="tooltip" data-placement="bottom" title="Inabilitar"><button class="btn btn-danger"><i class="fa fa-close"></i></button></a>
					</td>
				</tr>
				@include('almacen.talla.edit',[$tall->nombre,$tall->subcategoria,$tall,$subcategorias])
				@include('almacen.talla.modal')
				@endforeach
			</table>
		</div>
		{{$tallas->render()}}
	</div>
</div>
@push ('scripts')
<script>
$('#liAlmacen').addClass("treeview active");
$('#liTalla').addClass("active");
</script>
@endpush
@endsection