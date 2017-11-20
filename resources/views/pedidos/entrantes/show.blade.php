
<div class="modal fade" id="modal-show-{{$ped->idnotificacion_pedido}}" role="dialog">
<div class="modal-dialog" style="width:60% !important; ">
      <div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
        <div class="modal-header" style="background:#444; height:70px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
          </button>        
           <h3 class="modal-title " style="color:#fff; "><i class="ti-bookmark"></i>Detalles del Pedido</h3>      
        </div>
        <div class="modal-body" style="background:#fff;  ">
       
        
      
      <div class="alert  alert-info m-b-10 alert-dismissable" id="men" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" style="margin-top:-10px; margin-right: 15px;">&times;</button>
                <strong>¡En hora buena!</strong>  el detalle se editó correctamente
      </div> 


         <div class="table-responsive">
          <table class="table m-1"  >
            <thead > <!--mandando variable-->
              <tr style="color: #888;">            
                <th style="display:none;">id</th>
                <th>Articulo</th>
                <th>Cant.</th>
                <th>Mi stock</th>
                <th>Cant. prov.</th>
                <th>Op.</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($details as $del)
                       @if($del->idnotificacion_pedido==$ped->idnotificacion_pedido)
                        <tr  style="color: #888;" >   
                            <td style="display:none;">
                            <input type="number" name="" value="{{$del->iddetalle_pedido}}" class="form-control" id="edit0-{{$del->iddetalle_pedido}}" style="width:60px; text-align:center;"></td>

                            <td>{{ $del->articulo}}/{{$del->tam_nro1}} {{$del->UN1}} - {{$del->tam_nro2}} {{$del->UN2}}</td>
                            <td class="form-col"><input type="number" name="" value="{{ $del->cantidad}}" class=" input-sm form-control" disabled id="edit1-{{$del->iddetalle_pedido}}" style="width:60px; text-align:center;"></td>

                            <td>{{ $del->num_stock_gn}}</td>
                            <td class="form-col"> <input type="number" name="" value="{{$del->cant_pp}}" class="form-control input-sm"  disabled id="edit2-{{$del->iddetalle_pedido}}" style="width:60px; text-align:center;"></td>
                            
                              <td>
                                <button class="btn btn btn-xs" id="btn1-{{$del->iddetalle_pedido}}" data-toggle="tooltip" data-placement="bottom" title="Editar" style="background: rgba(48, 67, 83, 0.8); color:#fff;"><i class="ti-pencil"></i></button>
                                <button class="btn btn  btn-xs" id="btn2-{{$del->iddetalle_pedido}}" data-toggle="tooltip" data-placement="bottom" title="Guardar" style="background:rgba(0, 200, 83, 0.9); color:#fff;" disabled="disabled"><i class="ti-save"></i></button>
                                <button class="btn btn btn-xs"  id="btn3-{{$del->iddetalle_pedido}}" data-toggle="tooltip" data-placement="bottom" style="background:rgba(255, 53, 68, 0.8); color:#fff;" title="Cancelar" ><i class="ti-close"></i></button>


                              </td>

                           
                        </tr>

                        @endif
                @endforeach
              
            </tbody>
          </table>
         </div>
         
      
    </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn" style="background:#ff5252;color:#fff;">Trasladar</button>
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
 
@push ('scripts')

<script>
 
    
</script>

@endpush
