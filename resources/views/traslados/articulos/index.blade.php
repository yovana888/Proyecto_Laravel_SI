@extends ('layouts.admin')
@section ('contenido')
<!-- BEGIN panel-heading -->
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
        transform : scale(1.5);
        -moz-transform : scale(1.5);      /* Firefox */
        -webkit-transform : scale(1.5);   /* Chrome - Safari */
        -o-transform : scale(1.5);        /* Opera */
    }
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
            <h4><span style="color:#9c27b0;">Artículos</span> Registrados</h4>
        </div>
<!-- END panel-heading -->
<!-- BEGIN panel-body -->
        <div class="panel-body">

          <div class="table-responsive">
          <table id="datatables-default" class="table  m-1">
				<thead>
					<tr style="text-align:center; " >
						<th style="white-space: nowrap; width:2%"></th>
						<th style="white-space: nowrap; color:#888;">Imagen</th>
						<th style="white-space: nowrap; color:#888;" >Nombre</th>
						<th style="white-space: nowrap; color:#888;">Etiqueta</th>
						<th style="white-space: nowrap; color:#888;">Categoría</th>
						<th style="white-space: nowrap; color:#888;">Descripcion</th>
						<th style="white-space: nowrap;color:#888;">Estado</th>
            <th style="white-space: nowrap;display:none;">Sub</code></th>
            <th style="white-space: nowrap;display:none;">Mat</code></th>
            <th style="white-space: nowrap;display:none;">Tip</code></th>
						<th style=" color:#888;">Variedades</th>
					</tr>
				</thead>
				<tbody>
          <!--Inicio Foreach-->
          @foreach ($articulos as $art)
					<tr style="color:#777;">
						<td>{{ $art->idarticulo}}</td>
						<td>

						  <a href=""  data-target="#" data-toggle="modal"><img src="{{asset('imagenes/articulos/'.$art->imagen)}}" alt="{{ $art->nombre}}" height="60px" width="60px" class="img-thumbnail zoom"></a>
						</td>
						<td >{{ $art->nombre}}</td>
						<td style="text-align : justify;">{{ $art->etiqueta}}</td>
						<td style="text-align : justify;">{{ $art->categoria}}</td>
						<td style="text-align : justify;">{{ $art->descripcion}}</td>

            @if ($art->estado=='Activo')
            <td style=""><span class="label label" style="background:#5cb85c;">{{ $art->estado}}</span></td>
            @else
            <td style=""><span class="label label" style="background:#8A8A8F;">{{ $art->estado}}</span></td>
            @endif

            <td style="text-align : justify;display:none;" >{{ $art->subcategoria}}</td>
            <td style="text-align : justify;display:none;">{{ $art->material}}</td>
            <td style="text-align : justify;display:none;">{{ $art->tipo}}</td>

						<td class="btn-col" style="white-space: nowrap" >
              <a  href="{{URL::action('ArticuloController2@show',$art->idarticulo)}}" ><button class="btn btn btn-xs" style="background:#00bcd4; color:#fff;font-weight: bold;"><i class="ti-menu"></i></button></a>
						</td>

					</tr>

          @endforeach
          <!--Fin Foreach-->
				</tbody>
			</table>

    </div>

        </div>

        <div class="panel-footer clearfix">
             @include('traslados.articulos.create',[$listado])
         <a href=""  data-target="#modal-create" data-toggle="modal"><button class="btn btn-pink btn-sm pull-left m-l-5" style="">Nuevo Artículo</button></a>
		     <a href=""  data-target="#" data-toggle="modal"><button class="btn btn btn-sm pull-left m-l-5" style="background:#bbb; color:#fff; ">Reporte Avanzado</button></a>
        </div>
</div>
        @push ('scripts')
        	<script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>

          <script >
          $(document).ready(function() {
            $('#m1').text("TRASLADOS");
            $('#m2').text("ARTICULOS");

          });


          </script>

         @endpush
@endsection
