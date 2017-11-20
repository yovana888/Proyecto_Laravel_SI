@extends ('layouts.admin')
@section ('contenido')
<!-- BEGIN panel-heading -->
<div class="profile-header" id="rem2">
<!-- BEGIN profile-header-cover -->
<div class="profile-header-cover" ></div>
<!-- END profile-header-cover -->
<!-- BEGIN profile-header-content -->
<div class="profile-header-content">

  <div class="profile-header-info">

    <h4>Sistema de Gestión de Inventario</h4>

      <a href="#" class="btn btn-xs" style="background:#bd6eca; color:#fff;">{{Auth::user()->s_actual}} / {{Auth::user()->rol_actual}}</a>

  </div>
  <!-- END profile-header-info -->
</div>

</div>


<br>
  <ul class="breadcrumb " style="margin-left: 3%; ">
    <li><a href="#" id="m1" style="color:#e91e63;">MOVIMIENTOS</a></li>
    <li class="active" id="m2">ULTIMOS</li>
  </ul>

   <div class="panel panel-default " style="margin-left: 3%; margin-right :3%;" id="rem1">
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
            <h4><span style="color:#9c27b0;">Ultimos</span> Movimientos</h4>
        </div>
<!-- END panel-heading -->
<!-- BEGIN panel-body -->
        <div class="panel-body">

          <div class="table-responsive">
          <table id="datatables-default" class="table  m-1">
				<thead>
					<tr style="text-align:center; " >
						<th style="white-space: nowrap; color:#888;"></th>
						<th style="white-space: nowrap; color:#888;" >Articulo</th>
						<th style="white-space: nowrap; color:#888;">Tipo de Mov.</th>
						<th style="white-space: nowrap; color:#888;">Motivo</th>
						<th style="white-space: nowrap; color:#888;">Fecha</th>
						<th style="white-space: nowrap; color:#888;">Cantidad</th>
						<th style="white-space: nowrap; color:#888;">Nota</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($movimientos as $mov)

						<tr style="color:#888;">
							<td>{{ $mov->idmovimiento}}</td>
							<td>{{ $mov->nombre}} color {{$mov->color}}</td>
							<td>{{ $mov->tipo_movimiento}}</td>
							<td>{{ $mov->motivo}}</td>
							<td>{{ $mov->fecha_mov}}</td>
							<td>{{ $mov->cantidad}}</td>
							<td>{{ $mov->nota}}</td>

						</tr>

						@endforeach
				</tbody>
			</table>

    </div>

        </div>

        <div class="panel-footer clearfix">

								  <a href=""  data-target="#" data-toggle="modal"><button class="btn btn btn-sm pull-left m-l-5" style="background:#FF2D55;color:#fff;">Reporte Avanzado</button></a>

        </div>
</div>
        @push ('scripts')
        	<script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>
         @endpush
@endsection
