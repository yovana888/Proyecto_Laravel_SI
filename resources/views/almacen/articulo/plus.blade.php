@extends ('layouts.admin')
@section ('contenido')
<style type="text/css">
    .zoom{
        /* Aumentamos la anchura y altura durante 2 segundos */
        transition: width 0.5s, height 0.5s, transform 0.5s;
        -moz-transition: width 0.5s, height 0.5s, -moz-transform 0.5s;
        -webkit-transition: width 0.5s, height 0.5s, -webkit-transform 0.5s;
        -o-transition: width 0.5s, height 0.5s,-o-transform 0.5s;
    }
    .zoom:hover{
        /* tranformamos el elemento al pasar el mouse por encima al doble de
           su tamaño con scale(2). */
        transform : scale(2);
        -moz-transform : scale(2);      /* Firefox */
        -webkit-transform : scale(2);   /* Chrome - Safari */
        -o-transform : scale(2);        /* Opera */
    }
</style>

<style>
.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
.btn-circle.btn-lg {
  width: 50px;
  height: 50px;
  padding: 10px 16px;
  font-size: 18px;
  line-height: 1.33;
  border-radius: 25px;
}
.btn-circle.btn-xl {
  width: 70px;
  height: 70px;
  padding: 10px 16px;
  font-size: 24px;
  line-height: 1.33;
  border-radius: 35px;
}


/*======================*/

._select_color{
    font-size: 14px;
    padding: 10px 12px;
    font-weight: 300;
    line-height: 28px;
    border-radius: 4px;
    border: 1px solid #ccc;
    -webkit-appearance: none;
    width: 100%;
    height: auto;
    box-shadow: none;
        text-align: left;
    background-image: none;
    color: #796652;
    background: white;
}
._select_color_drop {
    margin: 0;
    padding: 0;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    top: 99%;
    border-top: 0;
    width: 100%;
}
._select_color_drop > li {
    display: inline-block;
    padding: 7px;
    border-right: 1px solid rgba(192, 192, 192, 0.55);
    cursor: pointer;
    float: left;
}
._select_color_drop > li > .color,.btn > span.color{
    width: 25px;
    height: 25px;
    border-radius: 4px;
    float: left;
}
.btn > span.color{margin-right:10px}
.btn .caret{
    float: right;
    border-top: 7px solid;
    font-size: 14px;
    padding-top: 5px;
    vertical-align: middle;
    position: absolute;
    right: 20px;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    top: 20px;
}
/*inicio de rojos y naranja*/
._select_color_drop > li > .DORADO ,.btn._select_color > span.DORADO{background-image:url('{{asset("img/dorado.jpg")}}');}
._select_color_drop > li > .PLATEADO ,.btn._select_color > span.PLATEADO{background-image:url('{{asset("img/plata.jpg")}}');}
.DORADO{background-image:url('{{asset("img/dorado.jpg")}}');}
.PLATEADO{background-image:url('{{asset("img/plata.jpg")}}');}
</style>
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
    <li><a href="#" id="m1" style="color:#e91e63;">TABLES</a></li>
    <li class="active" id="m2">DATATABLES</li>
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
        <h4><span style="color:#9c27b0;">Variedades del Articulo:</span>@foreach($articulo_nom as $arn) {{$arn->nombre}}@endforeach</h4>
    </div>
      <div class="panel-body">
        <div class="table-responsive">
                <table  id="datatables-default" class="table  m-1">
                  <thead>
                    <tr style="text-align:center; " >
                      <th style="display:none;">id</th>
                      <th style="white-space: nowrap; color:#888;">Código</th>
                      <th style="white-space: nowrap; color:#888;">Imagen</th>
                        <th style="white-space: nowrap; color:#888;" >Color</th>
                      <th style="text-align:center; color:#888;">Tamaño</th>
                      <th style="text-align:center; color:#888;">Stock</th>
                      <th style="text-align:center; color:#888;">StockMin</th>
                      <th style="text-align:center; color:#888;">P. V</th>
                      <th style="text-align:center; color:#888;">P. D</th>
                      <th  style="text-align:center; color:#888;">PvM(1)</th>
                      <th  style="text-align:center; color:#888;">PvM(2)</th>
                      <th  style="text-align:center; color:#888;">PvM(3)</th>
                      <th style="color:#888;">Est</th>
                      <th style="color:#888;">Opcion</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($detalles as $det)

                        <tr style="color:#777;">
                          <td style="display:none;">{{$det->iddetalle_articulo}}</td>
                          <td ><span data-toggle="tooltip" data-placement="right" title="{{$det->etiqueta}}" style="margin-top:25px;">{{$det->codigo}}</span></td>
                          <td>
                            @if($det->imagen=="")
                            <img  src="{{asset('imagenes/variaciones/002-thread.png')}}"   height="60px" width="60px" class="img-thumbnail zoom">
                            @else
                            <img  src="{{asset('imagenes/variaciones/'.$det->imagen)}}" alt="{{ $det->codigo}}"  height="60px" width="60px" class="img-thumbnail zoom">
                            @endif

                          </td>
                          <td><input class="{{$det->color}} form-control" style="border:none; width: 25px;height: 25px; border-radius: 4px; cursor:pointer; margin-top:5px;" data-toggle="tooltip" data-placement="right" title="{{$det->color}}"/></td>
                          @if($det->UN1=='N°')
                          <td ><span style="margin-top:15px;">{{$det->UN1}} {{$det->tam_nro1}} / {{$det->tam_nro2}} {{$det->UN2}}</span> </td>
                          @elseif($det->UN1=='-')
                          <td>--</td>
                          @else
                          <td>{{$det->tam_nro1}} {{$det->UN1}} / {{$det->tam_nro2}} {{$det->UN2}} </td>
                          @endif

                          @if($det->medida_stock_det=='-')
                          <td>{{$det->num_stock_gn}} {{$det->medida_stock_gn}}</td>
                          @else
                          <td>{{$det->num_stock_gn}} {{$det->medida_stock_gn}} con {{$det->num_stock_det}} {{$det->medida_stock_det}}</td>
                          @endif

                          <td>{{$det->stockmin}} {{$det->medida_stock_gn}}</td>
                          <td>S/.{{$det->precio_normal_u}}</td>

                          @if($det->medida_stock_det=='m')
                          <td>S/.{{$det->precio_det_u}} ->1m</td>
                          @elseif($det->medida_stock_det=='gr')
                          <td>S/.{{$det->precio_det_u}}->100g</td>
                          @else
                          <td>--</td>
                          @endif

                          <td>{{$det->cantidad_vol1}} {{$det->medida_stock_gn}} ->S/.{{$det->precio_vol1}}</td>
                          <td>{{$det->cantidad_vol2}} {{$det->medida_stock_gn}} ->S/.{{$det->precio_vol2}}</td>
                          <td>{{$det->cantidad_vol3}} {{$det->medida_stock_gn}} ->S/.{{$det->precio_vol3}}</td>
                          @if($det->estado=='Inactivo')
                          <td><i class="ti-close" style="color:#2F4F4F;font-weight: bold;"></i></td>
                          @else
                          <td><i class="ti-check" style="color:#3fa143;font-weight: bold;"></i></td>
                          @endif
                          <td>

                            <a href=""  data-target="#modal-edit-{{$det->iddetalle_articulo}}" data-toggle="modal"><button class="btn btn btn-xs" style="background:#00bcd4; color:#fff;font-weight: bold;"><i class="ti-pencil"></i></button></a>
                              @include('almacen.articulo.plusedit',[$det,$medidas])
                            <a href="" data-target="#modal-mov-{{$det->iddetalle_articulo}}" data-toggle="modal" ><button class="btn btn btn-xs" style="background:#ff5160; color:#fff;"><i class="ti-exchange-vertical"></i> </button></a>
                            @include('almacen.articulo.movimiento',[$tipos,$det->iddetalle_articulo,$det->num_stock_gn])
                          </td>
                        </tr>

                    @endforeach
                  </tbody>
                </table>
              </div>

      </div>
  </div>

  @push ('scripts')
    <script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>

    <script >
    $(document).ready(function() {
      $('#m1').text("ALMACEN");
      $('#m2').text("ARTICULOS / VARIACIONES");
      $('#alm').addClass("active");
      $('#al1').addClass("active");
    });


    </script>

   @endpush
  @endsection
