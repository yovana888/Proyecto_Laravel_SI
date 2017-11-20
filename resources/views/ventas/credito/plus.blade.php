
<div class="modal fade" id="modal-ag-{{$cre->idc}}" role="dialog">
<div class="modal-dialog">
      <div class="modal-content" style="border-radius: 15px 15px 15px 15px;">
        <div class="modal-header" style="background:#333; border-radius: 10px 10px 0px 0px;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close" style="color:#fff"></i></button>
          
           <h5 class="modal-title" style="color:#fff;"><span class="label label" style="color:#fff; background:#019299; font-size:12px;">Cliente:</span><span style="color:#d9d6d8;"> {{ $cre->nombre}}</span></h5>
			
        </div>
        <div class="modal-body" style="background:#f8f8f8; border-radius: 0px 0px 10px 10px; ">
    
      
      
		  <h5 class=""><span class="label label" style="color:#fff; font-size:12px; background:#5cb85c;">Cuotas de Pago</span></h5>
         <div class="table-responsive">
               <table class="table table-striped table-bordered table-condensed table-hover" id="tblGrid">
            <thead id="tblHead">
              <tr>
                <th>ID</th>
                <th>Fecha de Pago</th>
                <th>Monto Pagado</th>
             
                
              </tr>
            </thead>
            <tbody>
              @foreach ($detalles as $det)
                @if($det->idcredito==$cre->idc)      
                        <tr>
                            <td>{{ $det->idcredito}}</td>
                            <td>{{ $det->fecha_pago}}</td>
                            <td>{{ $det->monto}}</td>
                          
                        </tr>
                @endif
                @endforeach
              
            </tbody>
          </table>
         </div>
        
  {!!Form::open(array('url'=>'ventas/credito','method'=>'POST','autocomplete'=>'off'))!!}
                        {{Form::token()}}
          <div class="row">
          
             @if (count($errors)>0)
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                </ul>
                            </div>
                         </div>
                     @endif
                     
   
      <input type="number" name="total" value="{{$cre->total}}" style="display:none;"/>
      <input type="number" name="restopre" value="{{$cre->resto}}" style="display:none;"/>
      <input type="number" name="idcre" value="{{$cre->idc}}" style="display:none;"/>
      <input type="number" name="idv" value="{{$cre->idventa}}" style="display:none;"/>
              
               <h5 class=""><span class="label label" style="color:#fff; font-size:12px; background:#5cb85c; margin-left:2%;">Nuevo de Pago</span></h5>
               
               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                   <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Monto S/.</span>
                      <input type="text" class="form-control" placeholder="Monto..." aria-describedby="basic-addon1" name="monto" required>
                    </div>

               </div>  
               
               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                     <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Fecha Prox.</span>
                      <input type="date" class="form-control" aria-describedby="basic-addon1" name="fecha_px" >
                    </div>
               </div> 
               
          </div>
          
          
      
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		@if($cre->resto=='0')		
        <a href="" ><button type="submit" class="btn btn-danger" style=" background:#019299; border:none;" disabled>Agregar</button ></a>
        @else
         <a href="" ><button type="submit" class="btn btn-danger" style=" background:#019299; border:none;" >Agregar</button></a>
        @endif
        </div>
		 {!!Form::close()!!}		
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
 
@push ('scripts')
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script>
 
   
    
    $("#a").click(alice);
    
    function alice(){
         var id_1= $('#select-idarticulo').val();
        
     
        
    }
</script>

@endpush
