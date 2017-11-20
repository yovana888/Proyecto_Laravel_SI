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

<!-- BEGIN panel-heading -->
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
            <h4><span class="" style="color:#9c27b0;">Categorías</span> Registradas</h4>
        </div>
<!-- END panel-heading -->
<!-- BEGIN panel-body -->
        <div class="panel-body">

          <div class="table-responsive">
          <table id="datatables-default" class="table  m-0 ">
				<thead>
					<tr >
						<th style="white-space: nowrap; width:2%; color:#888;"></th>
						<th style="white-space: nowrap; color:#888;">Nombre</th>
						<th style="white-space: nowrap; color:#888;">Descripción</th>
						<th style="white-space: nowrap; color:#888;">Estado</th>
						<th class="no-sort" style="width:10%">Opciones</th>
					</tr>
				</thead>
				<tbody>
          <!--Inicio Foreach-->
        @foreach ($categorias as $cat)
					<tr style="color:#888;">
						<td>{{ $cat->idcategoria}}</td>
						<td>{{ $cat->nombre}}</td>
						<td>{{ $cat->descripcion}}</td>
            @if ($cat->estado=='Activo')
            <td><span class="label label" style="background:#5cb85c;">{{ $cat->estado}}</span></td>
            @else
            <td><span class="label label" style="background:#8A8A8F;">{{ $cat->estado}}</span></td>
            @endif

						<td class="btn-col" style="white-space: nowrap">
              <a href=""  data-target="#modal-edit-{{$cat->idcategoria}}" data-toggle="modal"><button class="btn btn btn-xs" style="background:#00bcd4; color:#fff;font-weight: bold;"><i class="ti-pencil"></i></button></a>

              <a href="" data-target="#modal-delete-{{$cat->idcategoria}}" data-toggle="modal" ><button class="btn btn-pink btn-xs" style="background:; color:#fff;font-weight: bold;"
                ><i class="ti-close"></i></button></a>
						</td>
					</tr>
					@include('almacen.categoria.modal',[$cat->nombre])
					@include('almacen.categoria.edit',[$cat->nombre,$cat->descripcion,$cat])
          @endforeach
          <!--Fin Foreach-->
				</tbody>
			</table>
    </div>
        </div>
      </div>
<!-- END panel-body -->
        <!--
        <div class="panel-loading">
          <div class="spinner"></div>
        </div>
        -->
        <div class="panel-footer clearfix">

                 @include('almacen.categoria.create')
                 <a href=""  data-target="#modal-create" data-toggle="modal"><button class="btn btn-pink btn-sm pull-left m-l-5" >Nueva Categoría</button></a>

        </div>

        @push ('scripts')
          <script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>


          <script type="text/javascript">
          $(document).ready(function() {
            $('#m1').text("ALMACEN");
            $('#m2').text("CATEGORIAS");
          });

          </script>

         @endpush
@endsection
