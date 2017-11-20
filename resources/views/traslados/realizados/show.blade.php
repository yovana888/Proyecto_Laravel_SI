
<div class="modal fade" id="modal-ag-{{$tra->idnotificacion_traslado}}" role="dialog">
<div class="modal-dialog" style="width:55% !important; ">
      <div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
        <div class="modal-header" style="background:#444; height:70px;">
         
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
          </button>
          
           <h3 class="modal-title " style="color:#fff; "><i class="ti-list-ol"></i> Detalle Traslado</h3>
			
        </div>
        <div class="modal-body" style="background:#fff;">       
         <div class="table-responsive">
              <table class="table table" id="tblGrid" >
            <thead id="tblHead"> <!--mandando variable-->
              <tr style="color:#888;">
               @if($tra->nuevo=='1') <!--si es nuevo :v-->
                <th style="display:none;">idk</th>
                <th>id</th>
                <th>Articulo</th>
                <th>Cant.</th>
                <th>P.V</th>
                <th>C.1</th>
                <th>P.V.1</th>
                <th>C.2</th>
                <th>P.V.2</th>
                <th>C.3</th>
                <th>P.V.3</th>
                <th>Op.</th>
                @else
                <th style="display:none;">idk</th>
                <th>id</th>
                <th>Articulo</th>
                <th>Cantidad</th>
                <th>Op.</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($detalles as $det)
                       @if($det->idnotificacion_tras==$tra->idnotificacion_traslado)
                        <tr style="color:#888;">
                            @if($tra->nuevo=='1')
                            <td style="display:none;">{{$det->iddetalle_traslado}}</td>
                            <td>{{ $det->idarticulo}}</td>
                            <td>{{ $det->articulo}} / {{$det->tam_nro1}} {{$det->UN1}} - {{$det->tam_nro2}} {{$det->UN2}}</td>
                            <td>{{ $det->cantidad}}</td>
                            <td>{{ $det->precio_venta}}</td>
                            <td>{{ $det->cantidad_volumen1}}</td>
                            <td>{{ $det->precio_mayor1}}</td>
                            <td>{{ $det->cantidad_volumen2}}</td>
                            <td>{{ $det->precio_mayor2}}</td>
                            <td>{{ $det->cantidad_volumen3}}</td>
                            <td>{{ $det->precio_mayor3}}</td>
                            @else
                            <td style="display:none;">{{$det->iddetalle_traslado}}</td>
                            <td>{{ $det->idarticulo}}</td>
                            <td>{{ $det->articulo}} / {{$det->tam_nro1}} {{$det->UN1}} - {{$det->tam_nro2}} {{$det->UN2}}<</td>
                            <td>{{ $det->cantidad}}</td>
                            @endif
                            
                            @if($tra->estado=='En espera')
                              <td>
                                 <a href="{!!route('Eliminar_detalle_not',['id_act'=>$det->	
                                  iddetalle_traslado])!!}"><button class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="bottom" title="Eliminar" ><i class="ti-close"></i></button></a>
                              </td>
                            @else
                              <td>
                                 <a href="#"><button class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="bottom" title="Eliminar" disabled><i class="ti-close"></i></button></a>     
                              </td>
                            @endif
                           
                        </tr>

                        @endif
                @endforeach
              
            </tbody>
          </table>
         </div>
         
      
		</div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
		 		
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
 
@push ('scripts')
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script>
 


$( document ).ready(function() {
$('.selectpicker').selectpicker({
      size: 8
});
});
    
</script>

@endpush
