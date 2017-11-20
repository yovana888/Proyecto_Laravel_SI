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
  <li class="active"><a href="#" id="m1" style="color:#e91e63;">TRASLADOS</a></li>

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
            <h4><span style="color:#9c27b0;">Traslados</span> Entrantes</h4>
        </div>
<!-- END panel-heading -->
<!-- BEGIN panel-body -->
        <div class="panel-body">

          <div class="table-responsive">
          <table id="datatables-default" class="table  m-1">
				<thead>
					<tr style="text-align:center; " >
						<th style="white-space: nowrap; width:2%; display:none;"></th>
						<th style="white-space: nowrap; color:#888;text-align:center;">Fecha</th>
						<th style="white-space: nowrap; color:#888;text-align:center;" >Sucursal Emisor</th>
						<th style="white-space: nowrap; color:#888;text-align:center;">Art. Nuevos</th>
						<th style="white-space: nowrap; color:#888;text-align:center;">Estado</th>
						<th style="white-space: nowrap; color:#888;text-align:center;">Nota Adicional</th>
						<th style="white-space: nowrap;color:#888;text-align:center;">Detalles</th>
					</tr>
				</thead>
				<tbody>
               @foreach ($traslados as $tra)
                <tr>
                    <td style="display:none;color:#888;">{{ $tra->idnotificacion_traslado}}</td>
                    <td style="text-align:center;color:#888;">{{ $tra->fecha_hora}}</td>
                    @foreach($sucursales as $su)
                        @if($su->idsucursal==$tra->idemisor)
                        <td style="text-align:center;color:#888;">{{$su->razon}}</td>
                        @endif
                    @endforeach

                    @if($tra->nuevo=='1')
                    <td style="text-align:center;"><i class="ti-check" style="color:#4CAF50;"></i></td>
                    @else
                    <td style="text-align:center;"><i class="ti-close" style="color:#888;"></i></td>
                    @endif


                    @if ($tra->estado=='En espera')
                    <td style="text-align:center;"><span class="label label-info" style="font-size:11px;">{{ $tra->estado}}</span></td>
                    @elseif ($tra->estado=='Aceptado')
                    <td style="text-align:center;"><span class="label label-success"  style="font-size:11px;">{{ $tra->estado}}</span></td>
                    @else
                    <td style="text-align:center;"><span class="label label-default"  style="font-size:11px;">{{ $tra->estado}}</span></td>
                    @endif
                    <td style="text-align:justify;color:#888;">{{ $tra->nota}}</td>

                    <td>
                         @include('traslados.entrantes.show',[$tra->nuevo,$tra,$detalles])
                         <a href=""  data-target="#modal-ag-{{$tra->idnotificacion_traslado}}" data-toggle="modal"><button class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="Articulos" style="background:#3C4858; color:#fff; margin-left:30%;"><i class="ti-menu"></i></button></a>
                    </td>
                </tr>
            @endforeach
				</tbody>
			</table>

    </div>

        </div>

        <div class="panel-footer clearfix">
         <a href=""  data-target="#" data-toggle="modal"><button class="btn btn-pink btn-sm pull-left m-l-5" style="">Reporte Avanzado</button></a>
        </div>
</div>
        @push ('scripts')
        	<script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>



         @endpush
@endsection
