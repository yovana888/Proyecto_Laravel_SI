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
            <h4><span style="color:#9c27b0;">Compras</span> Registradas</h4>
        </div>
<!-- END panel-heading -->
<!-- BEGIN panel-body -->
        <div class="panel-body">

          <div class="table-responsive">
          <table id="datatables-default" class="table  m-1">
				<thead>
					<tr style="text-align:center; " >
						<th  style="white-space: nowrap; color:#888;"></th>
						<th  style="white-space: nowrap; color:#888;">Fecha</th>
						<th  style="white-space: nowrap; color:#888;">Proveedor</th>
						<th  style="white-space: nowrap; color:#888;">Comprobante</th>
            <th  style="white-space: nowrap; color:#888;">Gravada</th>
            <th  style="white-space: nowrap; color:#888;">Inafecta</th>
            <th  style="white-space: nowrap; color:#888;">Exonerado</th>
            <th  style="white-space: nowrap; color:#888;">Gratuita</th>
            <th  style="white-space: nowrap; color:#888;">Dscto</th>
						<th  style="white-space: nowrap; color:#888;">IGV</th>
						<th  style="white-space: nowrap; color:#888;">Total</th>
						<th  style="white-space: nowrap; color:#888;">Estado</th>
						<th  style="white-space: nowrap; color:#888; " >Opciones</th>
					</tr>
				</thead>
        	<tbody>
        @foreach($ingresos as $ing)
     				<tr style="color:#888;">
              <td>{{ $ing->idingreso}}</td>
     					<td>{{ $ing->fecha_hora}}</td>
     					<td>{{ $ing->nombre}}</td>
     					<td>{{ $ing->tipo_comprobante}}:{{$ing->serie_comprobante}} - {{$ing->num_comprobante}}</td>
              <td>{{ $ing->subtotal}}</td>
              <td>{{ $ing->inafecto}}</td>
              <td>{{ $ing->exonerado}}</td>
              <td>{{ $ing->gratuito}}</td>
              <td>{{ $ing->descuento}}</td>
     					<td>{{ $ing->impuesto}}</td>
     					<td>{{ $ing->total}}</td>

              @if ($ing->estado=='Aceptado')
             <td><span class="label label-success">{{ $ing->estado}}</span></td>
             @elseif($ing->estado=='Por Pagar')
             <td><span class="label label-warning">{{ $ing->estado}}</span></td>
             @elseif($ing->estado=='Anulado')
             <td><span class="label label-danger">{{ $ing->estado}}</span></td>
             @else
               <td><span class="label label-info">{{ $ing->estado}}</span></td>
             @endif

     					<td >
                @include('compras.ingreso.show',[$detalles,$ing->idingreso,$ing->tipo_comprobante,$ing->serie_comprobante,$ing->num_comprobante,$ing->nota])
                <a href=""  data-target="#modal-show-{{$ing->idingreso}}" data-toggle="modal"><button class="btn btn btn-xs" data-toggle="tooltip" data-placement="bottom" title="Detalles" style="background:#00bcd4; color:#fff;"><i class="ti-menu"></i></button></a>
                <a href="" data-target="#modal-delete-{{$ing->idingreso}}" data-toggle="modal"><button class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="bottom" title="Cambiar estado" ><i class="ti-close"></i></button></a>
              </td>
     				</tr>
            @include('compras.ingreso.modal',[$ing->tipo_comprobante,$ing->serie_comprobante,$ing->num_comprobante])
            @endforeach
          </tbody>
			</table>

    </div>

        </div>

        <div class="panel-footer clearfix">


            <a href="ingreso/create"  ><button class="btn btn-pink btn-sm pull-left m-l-5" >Nueva Compra</button></a>
              <a href=""  data-target="#" data-toggle="modal"><button class="btn btn btn-sm pull-left m-l-5" style="background:#999;color:#fff;">Reporte Avanzado</button></a>

        </div>
</div>
        @push ('scripts')
        	<script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>
					<script type="text/javascript">
					$(document).ready(function() {
						$('#m1').text("COMPRAS");
						$('#m2').text("Registro de Compras");
					});

					</script>

         @endpush
@endsection
