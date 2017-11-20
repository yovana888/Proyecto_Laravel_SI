@extends ('layouts.admin')
@section ('contenido')
<div class="row" >
   @include('traslados.stock.plus',[$sucursales,$misucursal])
 <h4  style="color:rgba(0,0,0,.5); margin-left:1%;">Traslados/Stock Bajos</h4>
	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
		<a href=""  data-target="#modal-plus" data-toggle="modal"><button type="button" class="btn btn-info" style="border:none; background:#4CAF50;  "><i class="fa fa-plus"></i><span > Nuevo Traslado</span></button></a>
		<br>
	</div>

  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
		<button type="button" class="btn btn-primary" style="border:none; background:#3C4858;"><i class="fa fa-file"></i><span > Reporte de Stock</span></button>
		<br>
	</div>
	
	<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
		          
		@include('traslados.stock.search')
	
		<br>
	</div>
	
</div>

<div class="row" style="">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" style="text-align:center;">
				<thead style="background:#a2b0b7; color:#fff;text-align:center;">
					<th style="text-align:center;">Id</th>
					<th style="text-align:center;">Nombre del Artículo</th>
					<th style="text-align:center;">Código</th>
					<th style="display:none;">P.Venta</th>
					<th style="text-align:center;">Stock</th>
                    <th style="text-align:center;">Stock Min.</th>
                    
				</thead>
               @if(Auth::user()->s_actual=='Almacen-Central')
               @foreach ($articulos as $art)
               @if($art->stock !=  $art->stockmin)
               
                    <tr class="danger">
                       
                        <td >{{ $art->idarticulo}}</td>
                        <td>{{ $art->nombre}}</td>
                        <td>{{ $art->codigo}}</td>
                        <td style="display:none;">{{ $art->precio_venta}}</td>			
                         <td>{{ $art->stock}}</td> 
                        <td>{{ $art->stockmin}}</td> 


                    </tr>
               @else
               
                    <tr >
                       
                        <td >{{ $art->idarticulo}}</td>
                        <td>{{ $art->nombre}}</td>
                        <td>{{ $art->codigo}}</td>
                        <td style="display:none;">{{ $art->precio_venta}}</td>			
                         <td>{{ $art->stock}}</td> 
                        <td>{{ $art->stockmin}}</td> 


                    </tr>
                   
               @endif <!--fin condi. mayor-->
               @endforeach
               @else
                 @foreach ($articulos as $art)
                @if($art->stock !=  $art->stockmin)
               
                    <tr class="danger">
                        <td>{{ $art->idtraslado}}</td>
                        <td>{{ $art->nombre}}</td>
                        <td>{{ $art->codigo}}</td>
                        <td style="display:none;">{{ $art->precio_venta}}</td>			
                         <td>{{ $art->stock}}</td> 
                        <td>{{ $art->stockmin}}</td> 


                    </tr>
               @else
               
                    <tr >
                        <td>{{ $art->idtraslado}}</td>
                        <td>{{ $art->nombre}}</td>
                        <td>{{ $art->codigo}}</td>
                        <td style="display:none;">{{ $art->precio_venta}}</td>			
                         <td>{{ $art->stock}}</td> 
                        <td>{{ $art->stockmin}}</td> 


                    </tr>
                   
               @endif <!--fin condi. mayor-->
               @endforeach
               
              
               @endif
				
			</table>
		</div>
		{{$articulos->render()}}
	</div>
	

</div>
</div>
@push ('scripts')
<!---<script src="{{asset('js/custom-file-input.js')}}"></script>
<script src="{{asset('js/jquery-v1.min.js')}}"></script>-->
<script src="{{asset('js/JsBarcode.all.min.js')}}"></script>
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/sweetalert.js')}}"></script>
  <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
<script>

$('#liTraslado').addClass("treeview active");
$('#liStock').addClass("active");
    
</script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
@endpush
@endsection