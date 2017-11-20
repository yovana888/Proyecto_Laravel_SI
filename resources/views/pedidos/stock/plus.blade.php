<style>

{
    opacity: 0;
}

.badgebox + .badge
{

    text-indent: -999999px;

	width: 27px;
}

.badgebox:focus + .badge
{

    box-shadow: inset 0px 0px 5px;

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
<div class="modal-dialog" style="width:60% !important;">
      <div class="modal-content" style="border-radius: 15px 15px 15px 15px;">
        <div class="modal-header" style="background:#333; border-radius: 10px 10px 0px 0px;">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close" style="color:#fff"></i></button>

           <h5 class="modal-title" style="color:#fff;"><span class="label label" style="color:#fff; background:#019299; font-size:12px;">Nuevo Pedido/Selecione </span>

        </div>

        {!!Form::open(array('url'=>'pedidos/stock','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
        <div class="modal-body" style="background:#f8f8f8; border-radius: 0px 0px 10px 10px; ">
           <div class="row" style="">
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <input type="radio" id="radio01" name="radio" checked value="ex" />
                    <label for="radio01"><span></span> En base al stock </label>
              </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                     <input type="radio" id="radio02" name="radio" value="nw" style="margin-left:10px;"/>
                     <label for="radio02"><span></span>Libre </label>
                </div>
           </div>


            <div class="row" id="existente" style="padding:5px;">

                  <div class="row" id="cs"  style="padding:12px;"> <!--Con stock, es decir veo el stock bajo de la otra sucursal-->
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
                                <option value="-">--Seleccione--</option>
                                  @foreach($bajo as $ba)
                                   <option value="{{$ba->idarticulo}}">{{$ba->name}}</option>
                                 @endforeach
                               </select>
                            </div>
                        </div>
                      <br>
                      <!------>

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
            </div>
            <br>
            <div class="row" id="nuevo" style="padding:5px; display:none;">
             <!-- >:v END/ Youjo Senki opening--->
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                             <div class="input-group">
                                <span class="input-group-addon" id="btnGroupAddon"  style=" ">Sucursal Destino </span>
                               <select name="receptork" id="select-sucursalk" class="form-control">
                                   <option value="-">--Seleccione--</option>
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
                        <option value="-">--Seleccione--</option>
                         @foreach($misucursal as $mio)
                                   <option value="{{$mio->idarticulo}}">{{$mio->nombrecompleto}}</option>
                        @endforeach
                       </select>

                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">Mi Stock</span>

                           <input name="mistockk" id="mistockk" class="form-control " type="text" disabled>

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">Su Stock</span>

                           <input name="mistockk" id="sustockk" class="form-control " type="text" disabled>

                        </div>
                    </div>

                    <div
                         class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="input-group">
                            <span class="input-group-addon" id="btnGroupAddon">Cantidad</span>

                           <input name="cank" id="cank" class="form-control " type="number" >

                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                         <div class="input-group" style="">
                             <button type="button" id="bt_addk" class="btn btn-success  btn-block" style="background:#16a085; border:none;"> Agregar <i class="fa fa-plus"></i></button>

                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                    <table id="detallesk" class="table table-striped table-bordered table-condensed table-hover " style="border:1px solid #2c3e50;">
                        <thead style="background-color:#2c3e50; color:rgb(224, 216, 216);">
                          <!--Solo consideramos estos campos por tratarse de un pedido-->
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
                                <input type="text" name="notak"  class="form-control"
                                style="border-radius:6px;">
                            </div>
                 </div>


            </div>


		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        <a href="" ><button type="submit" class="btn btn-danger" style=" background:#019299; border:none;" id="vere">Pedir</button></a>

        </div>
        {!!Form::close()!!}
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


@push ('scripts')


 <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script src="{{asset('js/sweetalert.js')}}"></script>
  <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
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
    if( $(this).is(':checked')) {
        // Hacer algo si el checkbox ha sido seleccionado
       $("#cs").css("display", "none");
       $("#ss").css("display", "block");
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        $("#cs").css("display", "block");
        $("#ss").css("display", "none");
    }
});


</script>

<script>
  $("#select-articulo0").on( 'change', function() {
    var des0=$("#select-sucursal0").val(); //con ello se obtiene el valor de la sucursal seleccionada
    var valorcomp0 = $(this).val();

    if(valorcomp0=="-" || valorcomp0==" " || des0==" " || des0=="-"){
        //limpiando ambos inputs
         $('#mistock0').val("");
         $('#sustock0').val("");
    }else{
        //LLamando a AJAX para obtener mi stock y el suyo

      $.get('/pedidos/stock/plus/'+valorcomp0+'/mistock/'+des0+'/relativo',function(data10){
        var g0=data10[0]; //mi stock
        var h0=data10[1]; //su stock
        //con ello se vera si lo devuelto existe o no :v

         if(h0=='mensaje' || g0=='no'){
             $('#mistock0').val("");
             $('#sustock0').val("");

             sweetAlert("Error", "La sucursal a la que hace referencia no tiene dicho articulo", "error");
         }else{

            //porque si devuelve

                $('#mistock0').val(g0);
                $('#sustock0').val(h0);

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
    mistock0=$("#sustock0").val();
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

              sweetAlert("Alerta", "La cantidad a pedir supera su stock", "warning");
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
<script type="text/javascript">
    $("#select-sucursal0").on( 'change', function() {
    $('#select-articulo0').val('-');
    });
</script>
<!--libre-->

<!---ya no se toma importancia al stock libre, más solo importa verificar que el articulo exista enla sucursal pedida-->
<script>
  $("#select-articulok").on( 'change', function() {
    var desk=$("#select-sucursalk").val(); //con ello se obtiene el valor de la sucursal seleccionada
    var valorcompk = $(this).val();

    if(valorcompk=="-" || valorcompk==" " || desk==" " || desk=="-"){
        //limpiando ambos inputs
         $('#mistockk').val("");
         $('#sustockk').val("");
    }else{
        //LLamando a AJAX para obtener mi stock y el suyo en modo referencial, llamaremos al mismo controlador
        //ya que lo que importa son los parametros :v

      $.get('/pedidos/stock/plus/'+valorcompk+'/mistock/'+desk+'/relativok',function(data20){
        var g2=data20[0]; //mi stock
        var h2=data20[1]; //su stock
        //con ello se vera si lo devuelto existe o no :v

         if(h2=='mensaje' || g2=='no'){
             $('#mistockk').val("");
             $('#sustockk').val("");

             sweetAlert("Error", "La sucursal a la que hace referencia no tiene dicho articulo", "error");
         }else{

            //porque si devuelve

                $('#mistockk').val(g2);
                $('#sustockk').val(h2);

         }

            }); //fin AJAX2
    }
});
</script>
<script> //BTN AGREGAR POR STOCK LIBRE
    $(document).ready(function(){
    $('#bt_addk').click(function(){
      agregark();
        ////aqui en si se debe bloquear pq ya se eligio la sucursal
    });
  });


    var contk=0;


     function agregark()
  {

    articulok=$("#select-articulok option:selected").text();
    cantidadk=$("#cank").val();
    mistockk=$("#sustockk").val();
   idarticulok=$("#select-articulok").val();



    if (articulok!="" && cantidadk!="" && cantidadk>0 &&  articulok!="--Selecione--")
    {
        if (parseInt(mistockk)>=parseInt(cantidadk))
        {


        var fila='<tr class="selected" id="filak'+contk+'"><td><button type="button" class="btn btn-warning" onclick="eliminark('+contk+');">x</button></td><td><input type="hidden" name="idarticulok[]" value="'+idarticulok+'">'+articulok+'</td><td><input type="number" name="cantidadk[]"  class="form-control" value="'+cantidadk+'" class="form-control"></td></tr>';
        contk++;
        limpiark();

        $('#detallesk').append(fila);
        }
        else
        {

              sweetAlert("Alerta", "La cantidad a pedir supera su stock", "warning");
        }

    }
    else
    {
        sweetAlert("Alerta", "Error al agregar, revise la cantidad o seleccione un artículo valido", "error");
    }
  }


    function limpiark(){
    $("#mistockk").val("");
    $("#cank").val("0");
    $("#sustockk").val("");
  }

       function eliminark(index){

    $("#filak" + index).remove();

  }
</script>
<script type="text/javascript">
    $("#select-sucursalk").on( 'change', function() {
    $('#select-articulok').val('-');
    });
</script>
<script>

$( document ).ready(function() {
$('.selectpicker').selectpicker({
      size: 8
});
});
//http://mexico.unir.net/estudia-con-nosotros/preguntas-frecuentes/
</script>
@endpush
