<style>
 /* Hiding the checkbox, but allowing it to be focused */
.badgebox
{
    opacity: 0;
}

.badgebox + .badge
{
    /* Move the check mark away when unchecked */
    text-indent: -999999px;
    /* Makes the badge's width stay the same checked and unchecked */
	width: 27px;
}

.badgebox:focus + .badge
{
    /* Set something to make the badge looks focused */
    /* This really depends on the application, in my case it was: */
    
    /* Adding a light border */
    box-shadow: inset 0px 0px 5px;
    /* Taking the difference out of the padding */
}

.badgebox:checked + .badge
{
    /* Move the check mark back when checked */
	text-indent: 0;
}
    
input[type="radio"] {
  display: none;
}

input[type="radio"] + label {
  color: #292321;
  font-family: Arial, sans-serif;
  font-size: 12px;
}

input[type="radio"] + label span {
  display: inline-block;
  width: 19px;
  height: 19px;
  margin: -1px 4px 0 0;
  vertical-align: middle;
  cursor: pointer;
  -moz-border-radius: 50%;
  border-radius: 50%;
}

input[type="radio"] + label span {
  background-color: #292321;
}

input[type="radio"]:checked + label span {
  background-color: #4CAF50;
}

input[type="radio"] + label span,
input[type="radio"]:checked + label span {
  -webkit-transition: background-color 0.4s linear;
  -o-transition: background-color 0.4s linear;
  -moz-transition: background-color 0.4s linear;
  transition: background-color 0.4s linear;
}
</style> 

<div class="modal fade" id="modal-plus" role="dialog" >
<div class="modal-dialog" style="width:65% !important; ">
      <div class="modal-content" style="border-radius: 15px 15px 15px 15px;">
        <div class="modal-header" style="background:#333; border-radius: 10px 10px 0px 0px;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close" style="color:#fff"></i></button>
          
           <h5 class="modal-title" style="color:#fff;"><span class="label label" style="color:#fff; background:#019299; font-size:12px;">Nuevo Traslado/Selecione </span>
			
        </div>
        
        {!!Form::open(array('url'=>'traslados/stock','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}} 
        <div class="modal-body" style="background:#f8f8f8; border-radius: 0px 0px 10px 10px; ">
           <div class="row" style="">
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <input type="radio" id="radio01" name="radio" checked value="ex" />
                    <label for="radio01"><span></span> Articulo Existente  </label>
              </div>
          
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                     <input type="radio" id="radio02" name="radio" value="nw" style="margin-left:10px;"/>
                     <label for="radio02"><span></span>Articulo Nuevo</label>
                </div>    
           </div>
             
            
            <div class="row" id="existente" style="padding:5px;">
                  <label for="success" class="btn btn-success"   style="background:#f8f8f8; border:none; font-weight: bold;" ><label class="label label" style="background:#16a085; font-size:12px;" id="texto" >Traslado en base a mi Sucursal y la Otra</label><input type="checkbox" id="success" class="badgebox"  name="tipo1" value="1" checked><span class="badge">&check;</span></label>
                  
                  <div class="row" id="cs"  style="padding:12px;display:none;"> <!--Con stock, es decir veo el stock bajo de la otra sucursal-->
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="input-group">
                                <span class="input-group-addon" id="btnGroupAddon"  style=" ">Sucursal Destino ..</span>
                               <select name="receptor0" id="select-sucursal0" class="form-control">
                                   <option value="">--Seleccione--</option>
                                  @foreach($sucursales as $suc)
                                  @if($suc->idsucursal==Auth::user()->id_s)
                                  @else
                                   <option value="{{$suc->idsucursal}}">{{$suc->razon}}</option>
                                  @endif
                                 @endforeach
                              </select>
                        </div>
                      </div>
                      <br>
                      <br>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon"  style=" ">Art. con stock bajo</span>
                           <select name="select-articulo0" id="select-articulo0" class="form-control">
                           </select>
                        </div>
                    </div>
                                
                     <br>
                    <br>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">Mi Stock</span>
                     
                           <input name="mistock0" id="mistock0" class="form-control " type="text" disabled>
                      
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">Su Stock</span>
                     
                           <input name="sustock0" id="sustock0" class="form-control " type="text" disabled>
                      
                        </div>
                    </div>
                    
                   
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">Cantidad</span>
                     
                           <input name="can" id="can0" class="form-control " type="number" >
                      
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="input-group" style="">
                             <button type="button" id="bt_add0" class="btn btn-success  btn-block" style="background:#16a085; border:none;"> Agregar <i class="fa fa-plus"></i></button>
                      
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                    <table id="detalles0" class="table table-striped table-bordered table-condensed table-hover " style="border:1px solid #2c3e50;">
                        <thead style="background-color:#2c3e50; color:rgb(224, 216, 216);">
                            <th>Opción</th>
                            <th>Artículo</th>
                            <th>Cant.</th>
                        </thead>
                        <tfoot>
                   
                        </tfoot>
                        <tbody>
                            
                        </tbody>
                    </table>
                    
                     <label class="label label-success" style="font-size:12px;">Nota Adicional:</label>
                    
                            <div class="form-group" >
                                <input type="text" name="nota0"  class="form-control" 
                                style="border-radius:6px;">
                            </div>
                 </div>
                  </div> <!--fin en base al stock de la otra sucursal-->
                  
                  <div class="row" id="ss" style="padding:12px;"> <!--Sin stock osea es libre-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <div class="input-group">
                                <span class="input-group-addon" id="btnGroupAddon"  style=" ">Sucursal Destino </span>
                               <select name="receptor" id="select-sucursal" class="form-control">
                                   <option value="">--Seleccione--</option>
                                  @foreach($sucursales as $suc)
                                  @if($suc->idsucursal==Auth::user()->id_s)
                                  @else
                                   <option value="{{$suc->idsucursal}}">{{$suc->razon}}</option>
                                  @endif
                                 @endforeach
                              </select>
                            </div>
                    </div>
                    
                    <br>
                    <br>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <div class="input-group">
                        
                        <span class="input-group-addon" id="btnGroupAddon">Articulos Destino</span>
                     
                       <select name="articulo" id="select-articulo" class="form-control " >
                       </select>
                        
                        </div>
                    </div>
                    
                     <br>
                    <br>
                
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">Mi Stock</span>
                     
                           <input name="mistock" id="mistock" class="form-control " type="text" disabled>
                      
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">Su Stock</span>
                     
                           <input name="sustock" id="sustock" class="form-control " type="text" disabled>
                      
                        </div>
                    </div>
                    
              
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">Cantidad</span>
                     
                           <input name="can" id="can" class="form-control " type="number">
                      
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="input-group" style="">
                             <button type="button" id="bt_add" class="btn btn-success  btn-block" style="background:#16a085; border:none;"> Agregar <i class="fa fa-plus"></i></button>
                      
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover " style="border:1px solid #2c3e50;">
                        <thead style="background-color:#2c3e50; color:rgb(224, 216, 216);">
                            <th>Opción</th>
                            <th>Artículo</th>
                            <th>Cant.</th>
                        </thead>
                        <tfoot>
                   
                        </tfoot>
                        <tbody>
                            
                        </tbody>
                    </table>
                    
                     <label class="label label-success" style="font-size:12px;">Nota Adicional:</label>
                    
                            <div class="form-group" >
                                <input type="text" name="nota"  class="form-control" 
                                style="border-radius:6px;">
                            </div>
                 </div>
                  </div>
                
            </div>
            
            <div class="row" id="nuevo" style="padding:5px; display:none;">
             <!-- >:v END/ Youjo Senki opening--> 
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <div class="input-group">
                                <span class="input-group-addon" id="btnGroupAddon"  style=" ">Sucursal Destino </span>
                               <select name="receptork" id="select-sucursalk" class="form-control">
                                   <option value="">--Seleccione--</option>
                                  @foreach($sucursales as $suc)
                                  @if($suc->idsucursal==Auth::user()->id_s)
                                  @else
                                   <option value="{{$suc->idsucursal}}">{{$suc->razon}}</option>
                                  @endif
                                 @endforeach
                              </select>
                            </div>
                    </div>
                    <br>
                    <br>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <div class="input-group">
                        
                        <span class="input-group-addon" id="btnGroupAddon"><i class="fa fa-tags"></i> Mis Articulos <label>.</label></span>
                     
                       <select name="articulok" id="select-articulok" class="form-control selectpicker selection" data-live-search="true">
                        <option value="">--Seleccione--</option>
                         @foreach($misucursal as $mio)
                                   <option value="{{$mio->idarticulo}}">{{$mio->nombrecompleto}}</option>
                        @endforeach
                       </select>
                        
                        </div>
                    </div>
                    <br>
                    <br>
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">Mi Stock</span>
                     
                           <input name="mistockk" id="mistockk" class="form-control " type="text" disabled>
                      
                        </div>
                    </div>
        
                   
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">P. Venta</span>
                     
                           <input name="pv" id="pv" class="form-control " type="number" min="0">
                      
                        </div>
                    </div>
                    
                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">Cant.x Vol.</span>
                     
                           <input name="cv" id="cv" class="form-control " type="number"  min="0">
                      
                        </div>
                    </div>
                    <br>
                    <br>
                       <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">P.Un.x Vol.</span>
                     
                           <input name="pu" id="pu" class="form-control " type="number" min="0">
                      
                        </div>
                    </div>
                    
                    
                    <div
                         class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">Cantidad</span>
                     
                           <input name="cank" id="cank" class="form-control " type="number" >
                      
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                         <div class="input-group" style="">
                             <button type="button" id="bt_addk" class="btn btn-success  btn-block" style="background:#16a085; border:none;"> Agregar <i class="fa fa-plus"></i></button>
                      
                        </div>
                    </div>
                    <br>
                    <br>
                      
                       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                    <table id="detallesk" class="table table-striped table-bordered table-condensed table-hover " style="border:1px solid #2c3e50;">
                        <thead style="background-color:#2c3e50; color:rgb(224, 216, 216);">
                            <th>Opción</th>
                            <th>Artículo</th>
                            <th>Cant.</th>
                            <th>PV</th>
                            <th>Cant.Vol</th>
                            <th>PU.xVol</th>
                        </thead>
                        <tfoot>
                   
                        </tfoot>
                        <tbody>
                            
                        </tbody>
                    </table>
                    
                     <label class="label label-success" style="font-size:12px;">Nota Adicional:</label>
                    
                            <div class="form-group" >
                                <input type="text" name="notak"  class="form-control" 
                                style="border-radius:6px;">
                            </div>
                 </div>
                    
                
            </div>
             
          
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				
        <a href="" ><button type="submit" class="btn btn-danger" style=" background:#019299; border:none;" id="vere">Trasladar</button></a>
        
        </div>		
        {!!Form::close()!!}	
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
 
@push ('scripts')


 <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
$( document ).ready(function() {
$('.selectpicker').selectpicker({
      size: 10
});
});
</script>
<script>
    $('input:radio[name=radio]').on('change',function() {
var valr = $('input:radio[name=radio]:checked').val(); 
    if(valr=="ex"){
        $("#existente").css("display", "block");
         $("#nuevo").css("display", "none");
        
    }else{
       $("#existente").css("display", "none");
         $("#nuevo").css("display", "block"); 
      

    }
});
    
    
      $("#success").on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
         $("#cs").css("display", "none");
       $("#ss").css("display", "block");
        $("#texto").text('Traslado en base a mi Sucursal y la Otra');
        
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
     
        $("#cs").css("display", "block");
         $("#ss").css("display", "none");
        	$("#texto").text('Traslado en base de la otra sucursal');
        
    }
});
    
    
</script>

<script>
    $(function(){
    $('#select-sucursal').on('change',ondata);
    
});

function ondata(){
  $('#select-articulo').empty();
            $('#mistock').val(""); 
             $('#sustock').val("");
   var subcat_id= $(this).val();
    //AJAX
 if(subcat_id!=="-" && subcat_id!==" "){
         $.get('/traslados/stock/plus/'+subcat_id+'/articulos',function(data){
        
         if(data.length==0){
            $('#select-articulo').empty();
         }else{
               $('#select-articulo').append( '<option value="-">--Selecione--</option>' );  
               for (var i=0;i<data.length;i++)
            { 
                 $('#select-articulo').append( '<option value="'+data[i].idarticulo+'"> '+data[i].nombrecompleto+'</option>' );
                 
            
            }
         }
        
          $("#select-articulo").select2();
     
            });

 }else{
      $('#mistock').val(""); 
      $('#sustock').val("");
 }


}
</script>
 
<script>
  $("#select-articulo").on( 'change', function() {
    var des=$("#select-sucursal").val();
     var valorcomp = $(this).val();
    //console.log("value"+valorcomp);
    if(valorcomp=="-" || valorcomp==" "){
        //limpiando ambos inputs
         $('#mistock').val("");
         $('#sustock').val("");
    }else{
        //LLamando a AJAX para obtener mi stock
        //traslados/stock/plus/{id1}/mistock/{id2}/suc ruta
        $.get('/traslados/stock/plus/'+valorcomp+'/mistock/'+des+'/suc',function(data1){
        
         if(data1.length==1 || data1.length==0){
             $('#mistock').val(""); 
             $('#sustock').val("");
             
             sweetAlert("Error", "Su sucursal no tiene dicho articulo para realizar un traslado", "error");
         }else{
             
             var g=data1[0];
             var h=data1[1];
             
             console.log("mi"+g);
              console.log("su"+h);
             if(g=='mensaje'){
                $('#mistock').val(""); 
                $('#sustock').val("");
                 
                sweetAlert("Error", "Su sucursal no tiene dicho articulo para realizar un traslado", "error");
                 
             }else{
                $('#mistock').val(g);
                $('#sustock').val(h);
             }
             
         }
     
            }); //fin AJAX2
    }
});
</script>

<script> //BTN AGREGAR
    $(document).ready(function(){
    $('#bt_add').click(function(){
      agregar();
        ////aq
    });
  });
   
    
    var cont=0;
 
    
     function agregar()
  {
   
    articulo=$("#select-articulo option:selected").text();
    cantidad=$("#can").val();
    mistock=$("#mistock").val();
   idarticulo=$("#select-articulo").val();
   
    

    if (articulo!="" && cantidad!="" && cantidad>0 &&  articulo!="--Selecione--")
    {
        if (parseInt(mistock)>=parseInt(cantidad))
        {
        

        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">x</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="number" name="cantidad[]" id="c_t" value="'+cantidad+'" size="15"></td></tr>';
        cont++;
        limpiar();
        
        $('#detalles').append(fila);   
        }
        else
        {

              sweetAlert("Alerta", "La cantidad a trasladar supera su stock", "warning");
        }
        
    }
    else
    {
        sweetAlert("Alerta", "Error al agregar, revise la cantidad o seleccione un articulo valido", "error");
    }
  }
    
      
    function limpiar(){
    $("#mistock").val("");
    $("#can").val("0");
    $("#sustock").val("");
  }
    
       function eliminar(index){

    $("#fila" + index).remove();

  }
</script> 

<!--POR STOCK BAJO-->
<script>
    $(function(){
    $('#select-sucursal0').on('change',ondata0);
    
});

function ondata0(){
  $('#select-articulo0').empty();
  $('#mistock0').val(""); 
  $('#sustock0').val("");
    
   var subcat_id0= $(this).val();
    //AJAX
        if(subcat_id0!=="-" && subcat_id0!==" "){
            $.get('/traslados/stock/plus/'+subcat_id0+'/articulos0',function(dato){

                 if(dato.length==0){
                    $('#select-articulo0').empty();
                 }else{
                       $('#select-articulo0').append( '<option value="-">--Selecione--</option>' );  
                       for (var i=0;i<dato.length;i++)
                    { 
                         $('#select-articulo0').append( '<option value="'+dato[i].idarticulo+'"> '+dato[i].name+'</option>' );


                    }
                 }

                  $("#select-articulo0").select2();

                    });
        }else{
            $('#mistock0').val("");
            $('#sustock0').val("");
        }
    
}
</script>

<script>
  $("#select-articulo0").on( 'change', function() {
    var des0=$("#select-sucursal0").val();
     var valorcomp0 = $(this).val();
    //console.log("value"+valorcomp);
    if(valorcomp0=="-" || valorcomp0==" "){
        //limpiando ambos inputs
         $('#mistock0').val("");
         $('#sustock0').val("");
    }else{
        //LLamando a AJAX para obtener mi stock
        //traslados/stock/plus/{id10}/mistock0/{id20}/suc0 ruta
        $.get('/traslados/stock/plus/'+valorcomp0+'/mistock0/'+des0+'/suc0',function(data10){
        
         if(data10.length==1 || data10.length==0){
             $('#mistock0').val(""); 
             $('#sustock0').val("");
             
             sweetAlert("Error", "Su sucursal no tiene dicho articulo para realizar un traslado", "error");
         }else{
             
             var g0=data10[0];
             var h0=data10[1];

             if(g0=='mensaje'){
                $('#mistock0').val(""); 
                $('#sustock0').val("");
                 
                sweetAlert("Error", "Su sucursal no tiene dicho articulo para realizar un traslado", "error");
                 
             }else{
                $('#mistock0').val(g0);
                $('#sustock0').val(h0);
             }
             
         }
     
            }); //fin AJAX2
    }
});
</script>

<script> //BTN AGREGAR POR STOCK BAJO
    $(document).ready(function(){
    $('#bt_add0').click(function(){
      agregar0();
        ////aqui en si se debe bloquear pq ya se eligio la sucursal
    });
  });
   
    
    var cont0=0;
 
    
     function agregar0()
  {
   
    articulo0=$("#select-articulo0 option:selected").text();
    cantidad0=$("#can0").val();
    mistock0=$("#mistock0").val();
   idarticulo0=$("#select-articulo0").val();
   
    

    if (articulo0!="" && cantidad0!="" && cantidad0>0 &&  articulo0!="--Selecione--")
    {
        if (parseInt(mistock0)>=parseInt(cantidad0))
        {
        

        var fila='<tr class="selected" id="fila0'+cont0+'"><td><button type="button" class="btn btn-warning" onclick="eliminar0('+cont0+');">x</button></td><td><input type="hidden" name="idarticulo0[]" value="'+idarticulo0+'">'+articulo0+'</td><td><input type="number" name="cantidad0[]" id="c_t" value="'+cantidad0+'" size="15"></td></tr>';
        cont0++;
        limpiar0();
        
        $('#detalles0').append(fila);   
        }
        else
        {

              sweetAlert("Alerta", "La cantidad a trasladar supera su stock", "warning");
        }
        
    }
    else
    {
        sweetAlert("Alerta", "Error al agregar, revise la cantidad o seleccione un articulo valido", "error");
    }
  }
    
      
    function limpiar0(){
    $("#mistock0").val("");
    $("#can0").val("0");
    $("#sustock0").val("");
  }
    
       function eliminar0(index){

    $("#fila0" + index).remove();

  }
</script> 
<!--POR ARTICULO NUEVO-->
<script>
  $("#select-articulok").on( 'change', function() {
    var desk=$("#select-sucursalk").val();
     var valorcompk = $(this).val();
    //console.log("value"+valorcomp);
    if(valorcompk=="-" || valorcompk==" "){
        //limpiando ambos inputs
         $('#mistockk').val("");
         $('#pv').val("");
         $('#cv').val("");
         $('#pu').val("");
    }else{
        //LLamando a AJAX para obtener mi stock
        //traslados/stock/plus/{idk1}/mistockk/{idk2}/suck ruta
        $.get('/traslados/stock/plus/'+valorcompk+'/mistockk/'+desk+'/suck',function(datak){
        
         if(datak.length==1 || datak.length==0){
              $('#mistockk').val(""); 
              $('#pv').val("");
              $('#cv').val("");
              $('#pu').val("");
             
             sweetAlert("Error", "La sucursal destino ya tiene dicho articulo", "error");
         }else{
             
             var gk=datak[0]; //mi stock de us1
             var hk=datak[1];//su stock de us2
             var ik=datak[2];
             var jk=datak[3];
             var lk=datak[4];

             if(hk=='mensaje'){ //esto es porque realmente no lo tiene, por ende si podemos realizar el traslado nuevo de un articulo qu eno haya tenido :D
                $('#mistockk').val(gk);
                $('#pv').val(ik);
                $('#cv').val(jk);
                $('#pu').val(lk);
              
             }else{
                
                $('#mistockk').val(""); 
                $('#pv').val("");
                $('#cv').val("");
                $('#pu').val("");
            
                sweetAlert("Error", "La sucursal destino ya tiene dicho articulo", "error");
             }
             
         }
     
            }); //fin AJAX2
    }
});
</script>

<script> //BTN AGREGAR ARTICULO NUEVO
    $(document).ready(function(){
    $('#bt_addk').click(function(){
      agregark();
        ////aqui en si se debe bloquear pq ya se eligio la sucursal
    });     
  });
   
    
    var contk=0;
 
    
     function agregark()
  {
   
   //  $('#select-sucursalk').attr('disabled', 'disabled');
    articulok=$("#select-articulok option:selected").text();
    cantidadk=$("#cank").val();
    mistockk=$("#mistockk").val();
    pv=$("#pv").val();
    cv=$("#cv").val();
    pu=$("#pu").val();
   idarticulok=$("#select-articulok").val();
   
    

    if (articulok!="" && cantidadk!="" && cantidadk>0 &&  articulok!="--Selecione--" && pv!="" && cv!="" && pu!=="" && pv>0 && cv>=0 && pu>=0)
    {
        if (parseInt(mistockk)>=parseInt(cantidadk))
        {
        

        var fila='<tr class="selected" id="filak'+contk+'"><td><button type="button" class="btn btn-warning" onclick="eliminark('+contk+');">x</button></td><td><input type="hidden" name="idarticulok[]" id="idarticulok[]" value="'+idarticulok+'">'+articulok+'</td><td><input type="number" name="cantidadk[]"  value="'+cantidadk+'"></td><td><input type="number" name="pventa[]"  value="'+pv+'"></td><td><input type="number" name="cvolumen[]"  value="'+cv+'"></td><td><input type="number" name="punitario[]"  value="'+pu+'"></td></tr>';
        contk++;
        limpiark();
        
        $('#detallesk').append(fila);   
            
             
               var img=$("#select-sucursalk").val();
                console.log('receptornum'+contk+'tot'+img);
        }
        else
        {

              sweetAlert("Alerta", "La cantidad a trasladar supera su stock", "warning");
        }
        
    }
    else
    {
        sweetAlert("Alerta", "Error al agregar, revise la cantidad y otros datos o seleccione un articulo valido", "error");
    }
  }
    
      
    function limpiark(){
    $("#mistockk").val("");
    $("#cank").val("0");
     $('#pv').val("0");
     $('#cv').val("0");
     $('#pu').val("0");
  
  }
    
       function eliminark(index){

    $("#filak" + index).remove();

  }
</script> 
@endpush
