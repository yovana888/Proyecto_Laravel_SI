@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
	    @include('almacen.club.create')
        <h4 style="color:#222">Listado de Clubes <a href=""  data-target="#modal-create" data-toggle="modal"><button class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="nuevo" >Nuevo</button></a> <a href="{{url('reportecategorias')}}" target="_blank"><button class="btn btn-primary">Reporte</button></a></h4>
		<!---@include('almacen.club.search')--->
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="myTable">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($clubs as $cl)
				<tr>
					<td>{{ $cl->idclub}}</td>
					<td>{{ $cl->nombre}}</td>
				    @if ($cl->estado=='Activo')
					<td><span class="label label-success">{{ $cl->estado}}</span></td>
					@else
					<td><span class="label label-danger">{{ $cl->estado}}</span></td>
					@endif
					<td>
				         <!--<a href="{{URL::action('ClubController@edit',$cl->idclub)}}"><button class="btn btn-warning"><i class="fa fa-edit"></i></button></a>-->

                         <a href=""  data-target="#modal-edit-{{$cl->idclub}}" data-toggle="modal"><button class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="editar" ><i class="fa fa-edit"></i></button></a>

                         <a href="" data-target="#modal-delete-{{$cl->idclub}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-close"></i></button></a>
					</td>
				</tr>
				@include('almacen.club.modal')
				@include('almacen.club.edit',[$cl->nombre,$cl])
				@endforeach
			</table>
		</div>
	<!---->

	</div>
</div>
@push ('scripts')
<script>
$('#liAlmacen').addClass("treeview active");
$('#liClub').addClass("active");

$(document).ready(function() {
    $('#myTable').DataTable();
} );

</script>
@endpush
@endsection
