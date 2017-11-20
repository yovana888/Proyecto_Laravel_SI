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
            <h4><span style="color:#9c27b0;">Créditos</span> Registrados</h4>
        </div>
<!-- END panel-heading -->
<!-- BEGIN panel-body -->
        <div class="panel-body">

          <div class="table-responsive">
          <table id="datatables-default" class="table  m-1">
				<thead>
					<tr style="text-align:center;">
            <th></th>
						<th style="display:none;"></th>
						<th style="white-space: nowrap; color:#888;">Comprobante</th>
						<th style="white-space: nowrap; color:#888;">Proveedor</th>
						<th style="white-space: nowrap; color:#888;">Cuenta</th>
						<th style="white-space: nowrap; color:#888;">Total Compra</th>
						<th style="white-space: nowrap; color:#888;">Resto</th>
						<th style="white-space: nowrap; color:#888;">Num. Letras</th>
						<th style="white-space: nowrap; color:#888;">Fecha de Px. Pago</th>
						<th style="white-space: nowrap; color:#888;">Estado</th>
						<th style="white-space: nowrap; color:#888;">Opciones</th>

					</tr>
				</thead>
        	<tbody>
        @foreach($creditos as $cr)
     				<tr style="color:#888;">
              <td></td>
              <td style="display:none;">{{ $cr->idcredito}}</td>
							<td>{{ $cr->tipo_comprobante}}: {{ $cr->serie_comprobante}} {{ $cr->num_comprobante}}</td>
     					<td>{{ $cr->nombre}}</td>
							<td>{{ $cr->cuenta}}</td>
							<td>{{ $cr->total}}</td>
							<td>{{ $cr->resto}}</td>
							<td>{{ $cr->cant_letras}}</td>
							<td>{{ $cr->fecha_px}}</td>

             @if ($cr->estado=='Finalizado')
             <td><span class="label label-success">{{ $cr->estado}}</span></td>
             @elseif($cr->estado=='Por Cobrar')
             <td><span class="label label-warning">{{ $cr->estado}}</span></td>
             @elseif($cr->estado=='Anulado')
             <td><span class="label label-danger">{{ $cr->estado}}</span></td>
             @else
               <td><span class="label label-info">{{ $cr->estado}}</span></td>
             @endif

     					<td >
								 @include('compras.credito.plus',[$cr->total,$cr->resto,$cr->idcredito,$detalles, $cr->tipo_comprobante,$cr->serie_comprobante,$cr->num_comprobante])

                 <a href=""  data-target="#modal-edit-{{$cr->idcredito}}" data-toggle="modal"><button class="btn btn-pink btn-xs" data-toggle="tooltip" data-placement="bottom" title="Editar" style="background:; color:#fff;"><i class="ti-pencil"></i></button></a>

                <a href=""  data-target="#modal-plus-{{$cr->idcredito}}" data-toggle="modal"><button class="btn btn btn-xs" data-toggle="tooltip" data-placement="bottom" title="Detalles" style="background:#00bcd4; color:#fff;"><i class="ti-menu"></i></button></a>

                <a href="" data-target="#modal-delete-{{$cr->idcredito}}" data-toggle="modal"><button class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="bottom" title="Anular" ><i class="ti-close"></i></button></a>
              </td>
     				</tr>
            @include('compras.credito.edit',[$cr])
            @include('compras.credito.modal',[$cr])
            @endforeach
          </tbody>
			</table>

    </div>

        </div>

        <div class="panel-footer clearfix">
            <a href="#"  ><button class="btn btn-pink btn-sm pull-left m-l-5" >Reporte Avanzado</button></a>
        </div>
</div>
        @push ('scripts')
        	<script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>
					<script type="text/javascript">
					$(document).ready(function() {
						$('#m1').text("COMPRAS");
						$('#m2').text("Creditos-Proveedor");
					});
					</script>
         @endpush
@endsection
