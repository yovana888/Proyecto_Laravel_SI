
<div class="modal fade" id="modal-ag-{{$ped->idnotificacion_pedido}}" role="dialog">
<div class="modal-dialog" style="width:60% !important; ">
      <div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
        <div class="modal-header" style="background:#444; height:70px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
          </button>        
           <h3 class="modal-title " style="color:#fff; "><i class="ti-bookmark"></i>Detalles del Pedido</h3>			
        </div>
        <div class="modal-body" style="background:#f8f8f8;  ">
		    <h5 class=""><span class="label label" style="color:#fff; font-size:12px; background:#5cb85c;">Articulos Solicitados</span></h5>       
         <div class="table-responsive">
          <table class="table m-1"  >
            <thead > <!--mandando variable-->
              <tr style="color: #888;">            
                <th style="display:none;">id</th>
                <th>Articulo</th>
                <th>Cant.</th>
                <th>Sucursal</th>
                <th>Estado</th>
                <th>Cant. prov.</th>
                <th>Op.</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($details as $del)
                       @if($del->idnotificacion_pedido==$ped->idnotificacion_pedido)
                        <tr  style="color: #888;">   
                            <td style="display:none;">{{$del->iddetalle_pedido}}</td>
                            <td>{{ $del->articulo}}/{{$del->tam_nro1}} {{$del->UN1}} - {{$del->tam_nro2}} {{$del->UN2}}</td>
                            <td>{{ $del->cantidad}}</td>
                            @foreach($sucursales as $su)
                               @if($su->idsucursal==$del->idsucursal)
                                  <td>{{ $su->razon}}</td>
                               @endif
                            @endforeach

                            @if($del->pp==1)
                             <td><i class="ti-check" style="color: #4CD964;"></i></td>
                            @else
                            <td><i class="ti-close" style="color: #888;"></i></td>
                            @endif
                            <td>{{$del->cant_pp}}</td>
                            @if($ped->estado=='En espera' )
                              <td>
                                 <a href="{!!route('Eliminar_detalle_not',['id_act'=>$del->	
                                  iddetalle_pedido])!!}"><button class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="bottom" title="Eliminar" ><i class="ti-trash"></i></button></a>
                              </td>
                            @else 
                              <td>
                                 <a href="#"><button class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="bottom" title="Eliminar" disabled><i class="ti-trash"></i></button></a>     
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
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
		 		
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
 
@push ('scripts')

<script>
 
    
</script>

@endpush
