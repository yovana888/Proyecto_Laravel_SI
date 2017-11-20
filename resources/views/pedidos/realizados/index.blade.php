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
          <h4><span style="color:#9c27b0;">Pedidos</span> Realizados</h4>
        </div>
        <div class="panel-body">

            <div class="table-responsive">
            <table id="datatables-default" class="table  m-1" >
              <thead>
                <tr style="text-align:center; " >
                  <th style="white-space: nowrap; width:2%; display:none;"></th>
                  <th style="white-space: nowrap; color:#888;">Fecha</th>
                  <th style="white-space: nowrap; color:#888;text-align:center;">Receptor</th>
                  <th style="white-space: nowrap; color:#888;text-align:center;">Estado</th>
                  <th style="white-space: nowrap; color:#888;text-align:center;">Nota Adicional</th>
                  <th style="white-space: nowrap;color:#888;text-align:center;">Detalles</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pedidos as $ped)
                  <tr style="color: #888;">
                    <td style="display: none;">{{$ped->idnotificacion_pedido}}</td>
                    <td>{{$ped->fecha_hora}}</td>

                          @if($ped->pedido_prov=='0')
                            <td style="text-align:center;">Sucursales</td>
                          @else
                            <td style="text-align:center;">Proveedores</td>
                          @endif

                          @if ($ped->estado=='En espera')
                                <td style="text-align:center;"><span class="label label-info" style="font-size:11px;">{{ $ped->estado}}</span></td>
                                @elseif ($ped->estado=='Aceptado')
                                <td style="text-align:center;"><span class="label label-success"  style="font-size:11px;">{{ $ped->estado}}</span></td>
                                @elseif($ped->estado=='Acep. Parcial')
                                <td style="text-align:center;"><span class="label label-default"  style="font-size:11px;">{{ $ped->estado}}</span></td>
                                @else
                                <td style="text-align:center;"><span class="label label-danger"  style="font-size:11px;">{{ $ped->estado}}</span></td>
                          @endif

                         <td>{{$ped->nota}}</td>
                         <td> 
                          @include('pedidos.realizados.show',[$details])
                          <a href=""  data-target="#modal-ag-{{$ped->idnotificacion_pedido}}" data-toggle="modal"><button class="btn btn-default btn-xs" style="background:#3C4858; color:#fff; margin-left:30%;"><i class="ti-menu"></i></button></a>
                        </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>

        </div>

        <div class="panel-footer clearfix">
         @include('pedidos.realizados.plus',[$sucursales])
         <a href=""  data-target="#modal-plus" data-toggle="modal"><button class="btn btn-pink btn-sm pull-left m-l-5" style="">Nuevo Pedido Sucursal</button></a>
        <!--Pedido Proveedor-->
         <a href=""  data-target="#modal-plus2" data-toggle="modal"><button class="btn btn btn-sm pull-left m-l-5" style="background:#bbb; color:#fff; ">Nuevo Pedido Proveedor</button></a>
         @include('pedidos.realizados.plus2',[$misarticulos_sin,$misarticulos_con])
        </div>
</div>
        @push ('scripts')
          <script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>
         @endpush
@endsection
