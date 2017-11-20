@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	
@include('seguridad.usuario.create')
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Usuarios  <a href=""  data-target="#modal-create" data-toggle="modal"><button class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="nuevo" > Nuevo</button></a> <a href="{{url('reporteclientes')}}" target="_blank"><button class="btn btn-primary">Reporte</button></a></h3>
		@include('seguridad.usuario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th style="display:none;">Idsu</th>
				    <th style="display:none;">Id</th>
					<th>Nombre</th>
				    <th>E-mail</th>
					<th>Dirección</th>
					<th>DNI</th>
				    <th>Telefono</th>
				    <th>Foto</th>
				    <th>Estado</th>
					<th>Opciones</th>
				</thead>
               @foreach ($usuarios as $usu)
                @if(Auth::user()->id==$usu->iduser)
                <!--NO MOSTRARÁ EL REGISTRO YA QUE EN SI YA TENDRA SU INTERFAZ PARA SU PROPIA CUENTA :V -->
                @else
				<tr>
					<td  style="display:none;">{{ $usu->iduser_sucursal}}</td>
					<td  style="display:none;">{{ $usu->iduser}}</td>
					<td>{{ $usu->name}}</td>
					<td>{{ $usu->email}}</td>
					<td>{{ $usu->direccion}}</td>
					<td>{{ $usu->dni}}</td>
					<td>{{ $usu->telefono}}</td>
					<!--Si no tiene se dara uno por default-->
					@if($usu->foto=='')
					<td>
					 <img src="{{asset('imagenes/usuarios/F3.png')}}" alt="{{Auth::user()->foto}}" height="50px" width="50px" class="img-thumbnail" >
                    </td>
                    @else
                    <td>
                    <img src="{{asset('imagenes/usuarios/'.$usu->foto)}}" alt="{{ $usu->foto}}" height="60px" width="60px" class="img-thumbnail">
                    </td>
                    @endif
                    
				    @if ($usu->estado=='Activo')
					<td><span class="label label-success">{{ $usu->estado}}</span></td>
					@else
					<td><span class="label label-danger">{{ $usu->estado}}</span></td>
					@endif
					
					<td>
							@include('seguridad.usuario.edit',[$usu->name,$usu->email,$usu->direccion,$usu->telefono,$usu->dni,$usu->estado,$usu,$usu->iduser,$usu->iduser_sucursal])
                        <a href=""  data-target="#modal-edit-{{$usu->iduser_sucursal}}" data-toggle="modal"><button class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="editar" style="background:#3C4858; color:#fff; border:none;"><i class="fa fa-edit"></i></button></a>
                        
                         <a href="" data-target="#modal-delete-{{$usu->iduser_sucursal}}" data-toggle="modal"><button class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Cambiar estado"><i class="fa fa-close"></i></button></a>
					</td>
				</tr>
				@include('seguridad.usuario.modal',[$usu->name])
			
				@endif
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>
@push ('scripts')
<script src="{{asset('js/sweetalert.js')}}"></script>
  <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
<script>
$('#liAcceso').addClass("treeview active");
$('#liUsuarios').addClass("active");
</script>
@endpush
@endsection