@extends ('layouts.admin')
@section ('contenido')
<!-- BEGIN panel-heading -->
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

        <div class="panel-heading" >
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
            <h4><span class="text-purple " >Materiales</span> Registrados</h4>
        </div>
<!-- END panel-heading -->
<!-- BEGIN panel-body -->
        <div class="panel-body">

          <div class="table-responsive">
          <table id="datatables-default" class="table  m-0 ">
				<thead>
					<tr style="color:#888;">
						<th style="white-space: nowrap; width:2%"></th>
						<th style="white-space: nowrap">Nombre</th>
						<th style="white-space: nowrap">Subcategoría</th>
						<th style="white-space: nowrap">Estado</th>
						<th class="no-sort" style="width:10%">Opciones</th>
					</tr>
				</thead>
				<tbody>
          <!--Inicio Foreach-->
           @foreach ($materiales as $mat)
					<tr style="color:#888;">
						<td>{{ $mat->idmaterial}}</td>
						<td>{{ $mat->nombre}}</td>
						<td>{{ $mat->subcategoria}}</td>
            @if ($mat->estado=='Activo')
            <td><span class="label label" style="background:#5cb85c;">{{ $mat->estado}}</span></td>
            @else
            <td><span class="label label" style="background:#8A8A8F;">{{ $mat->estado}}</span></td>
            @endif

						<td class="btn-col" style="white-space: nowrap">
              <a href=""  data-target="#modal-edit-{{$mat->idmaterial}}" data-toggle="modal"><button class="btn btn btn-xs" style="background:#00bcd4; color:#fff;font-weight: bold;"><i class="ti-pencil"></i> </button></a>

              <a href="" data-target="#modal-delete-{{$mat->idmaterial}}" data-toggle="modal" ><button class="btn btn-pink btn-xs" style="background:; color:#fff;font-weight: bold;"
                ><i class="ti-close"></i></button></a>
						</td>
					</tr>
					@include('almacen.material.edit',[$mat->nombre,$mat->subcategoria,$mat,$subcategorias])
					@include('almacen.material.modal')
          @endforeach
          <!--Fin Foreach-->
				</tbody>
			</table>
    </div>
        </div>
<!-- END panel-body -->
        <!--
        <div class="panel-loading">
          <div class="spinner"></div>
        </div>
        -->
        <div class="panel-footer clearfix">

                 @include('almacen.material.create',$subcategorias)
                 <a href=""  data-target="#modal-create" data-toggle="modal"><button class="btn btn-pink btn-sm pull-left m-l-5" >Nuevo Material</button></a>

        </div>
</div>
@push ('scripts')
  <script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>
<script>

   $(document).ready(function() {
     $('#m1').text("ALMACEN");
     $('#m2').text("UNIDADES");
     $('#alm').addClass("active");
     $('#alma').addClass("active");
     $('#alm6').addClass("active");
   });

 </script>

 @endpush
@endsection
