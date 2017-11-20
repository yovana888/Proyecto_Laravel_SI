
<div class="modal fade" id="modal-salida-{{$art->idtraslado}}" role="dialog">
<div class="modal-dialog">
      <div class="modal-content" style="border-radius: 15px 15px 15px 15px;">
        <div class="modal-header" style="background:#333; border-radius: 10px 10px 0px 0px;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close" style="color:#fff"></i></button>
          
           <h5 class="modal-title" style="color:#fff;"><span class="label label" style="color:#fff; background:#019299; font-size:12px;">Articulo:</span><span style="color:#d9d6d8;"> {{ $art->nombre}}</span></h5>
			
        </div>
        <div class="modal-body" style="background:#f8f8f8; border-radius: 0px 0px 10px 10px; ">
		 
          <div class="form-group wr">
                {!!Form::open(array('url'=>'movimientos/ultimos','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
             <h5 class=""><span class="label label" style="color:#fff; font-size:12px; background:#5cb85c;">Nueva Salida</span></h5>
                   
                   <div class="row">
                       <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="nombre" style="color:#019299;">Cantidad</label>
                                <input type="number" name="cantidad" required  class="form-control" min="1">
                            </div>
                        </div>
                        
                           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label style="color:#019299;">Motivo</label>
                                    <select name="motivo" class="form-control">
                                        @foreach ($tipom as $tm)
                                           <option value="{{$tm->nombre}}">{{$tm->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                        </div>
                        
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label for="nombre" style="color:#019299;">Nota</label>
                                <input type="text" name="nota"   class="form-control" placeholder="Nota...." >
                            </div>
                        </div>
                        
                   </div>
                 
                    
                    <input id="idtraslado" type="text"  style="display:none;" name="idtraslado" value="{{$art->idtraslado}}">
                    
                    <input id="idarticulo" type="text"  style="display:none;" name="idarticulo" value="{{$art->idarticulo}}">
                    
                     <input id="tipo_movimiento" type="text"  style="display:none;" name="tipo_movimiento" value="Salida">
                     
                     <input id="stock" type="text"  style="display:none;" name="stock" value="{{$art->stock}}">
                     
                     <input id="ds" type="text"  style="display:none;" name="ds" value="Sucursal">
                    
             
             
          </div>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				
        <a href="" ><button type="submit" class="btn btn-danger" style=" background:#019299; border:none;" >Disminuir</button></a>
        
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
