@extends ('layouts.admin')
@section ('contenido')

			{!!Form::open(array('url'=>'ventas/venta','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
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
  background-color: #CC3300;
}

input[type="radio"] + label span,
input[type="radio"]:checked + label span {
  -webkit-transition: background-color 0.4s linear;
  -o-transition: background-color 0.4s linear;
  -moz-transition: background-color 0.4s linear;
  transition: background-color 0.4s linear;
}
</style> 

<div class="row" style="margin-top:-10px; background:#efeeee;" >

    <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12"  style="background:#efeeee; "  >
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-6 col-xs-12" style="background:#efeeee;">
                <h4  style="color:rgba(0,0,0,.5);">Ventas/Venta/Nueva Venta</h4>
                  @if (count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
		    </div>
        </div>
    
       
        <div class="row" style=" padding-left:3%;">
            <div class="row">
                <div class="col-md-2">
                   <label for="success" class="btn btn-success"   style="background:#efeeee; border:none; font-weight: bold;" ><label class="label label" style="background:#16a085;">Efectivo</label><input type="checkbox" id="success" class="badgebox" checked name="tipo1" value="1"><span class="badge">&check;</span></label>
                </div>
                 
                <div class="col-md-2">
                    <label for="primary" class="btn btn-success"   style="background:#efeeee;  border:none; font-weight: bold;"><label class="label label" style="background:#16a085;">Tarjeta de C.</label><input type="checkbox" id="primary" class="badgebox" name="tipo2" value="1"><span class="badge">&check;</span></label>
                </div>
                
                <div class="col-md-3" style="margin-left:0%;"><!--aqui-->
               
                     <div class="input-group">
                        
                        <span class="input-group-addon" id="btnGroupAddon"  style="background:#16a085; border:none;"><i class="fa fa-file-text-o" style="color:#fff; border-radius:6px;"></i></span>
                       
                     
                       <select name="tipo_comprobante" id="tipo_comprobante" class="form-control">
                           <option value="Boleta">Boleta</option>
                           <option value="Factura">Factura</option>
                           <option value="Ticket">Ticket</option>
                           <option value="Boleta/Guía de R.">Boleta/Guía de R.</option>
                           <option value="Factura/Guía de R.">Factura/Guía de R.</option>
    			     </select>
                        
                    </div>
                </div>
                
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="input-group">
                        <span class="input-group-btn">
                                 <a href="#" ><button class="btn btn-success"  style="background:#16a085; border:none;" disabled><i class="fa fa-plus"></i></button></a>
                        </span>
                       <!-- <input  type="text" class="form-control " placeholder="DNI/Nombre de cliente">-->
                        <select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
                           <!--Poner por defecto en si general-->
                            @foreach($personas as $persona)
                             <option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
                            @endforeach
                        </select>
                        <span class="input-group-btn">
                                <button class="btn btn-danger" style="background:#444; border:none;" type="button"><i class="fa fa-remove"></i></button>
                        </span>
                    </div>
                </div>
               
            </div>
            <br>
              
            <div class="row">
                
                
                 <div class="col-md-2 col-lg-2">
                      <input type="text" class="form-control " placeholder="N° Serie" style="border-radius:6px;" id="serie_comprobante" name="serie_comprobante"  value="{{old('serie_comprobante')}}" >
                </div>
                
                 <div class="col-md-3 col-lg-3">
                     <input type="text" class="form-control " placeholder="N° Comprobante" style="border-radius:6px;" id="num_comprobante" name="num_comprobante" >
                </div>
                
                <div class="col-md-2 col-lg-2 ">
                 
                    <label for="info" class="btn btn-success"   style="background:#efeeee;  border:none; font-weight: bold;"><span style="color:#555;">Autogenerado</span><input type="checkbox" id="info" class="badgebox" name="c_a" value="1"><span class="badge">&check;</span></label>

                </div>
                
                 <div class="col-md-3 col-lg-3"  id="divtarjeta" style="display:none;">
                     <input type="text" class="form-control " placeholder="xxxx xxxx xxxx xxxx" style="border-radius:6px; margin-left:4%;" id="tarjeta" name="tarjeta" >
                </div>
                
            </div>
            
            <br>
            
            <div class="row">
                   <div class="col-lg-9 col-sm-5 col-md-9 col-xs-12">
                    <div class="input-group ">
                     
                         <select  size="3" name="pidarticulo" id="pidarticulo" class="form-control selectpicker" data-live-search="true">
                          <option value="" >-Seleccione Articulo-</option>
                            @foreach($articulos as $art)
                             <option value="{{$art->idarticulo}}_{{$art->stock}}_{{$art->precio_venta}}_{{$art->precio_mayor}}_{{$art->cantidad_volumen}}">{{$art->articulo}}</option>
                             @endforeach
                             
                         </select>
                        
                        <span class="input-group-btn">
                                <button class="btn btn-danger" style="background:#444; border:none;" type="button"><i class="fa fa-remove"></i></button>
                        </span>
                    </div>
                </div>
                <div class="col-md-2 col-lg-2 ">
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" id="impuesto" name="impuesto">Impuesto</label>
                    </div>

                </div>
                
            </div>
            
            
             
        </div>
        <br>
       
           
           <div class="row" style="padding-left:7px; background:#3a454e;">
              <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad" style="color: rgb(224, 216, 216);">Cantidad</label>
                        <input type="number" name="pcantidad" id="pcantidad" class="form-control" 
                        placeholder="cantidad" style="border-radius:6px;">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="stock" style="color: rgb(224, 216, 216);">Stock</label>
                        <input type="number" disabled name="pstock" id="pstock" class="form-control" 
                        placeholder="Stock" style="border-radius:6px;">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="precio_venta" style="color: rgb(224, 216, 216);">Precio venta</label>
                        <input type="number" disabled name="pprecio_venta" id="pprecio_venta" class="form-control" 
                        placeholder="P. venta" style="border-radius:6px;">
                    </div>
                </div>
                  <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="descuento" style="color: rgb(224, 216, 216);">Descuento (%)</label>
                        <input type="number" name="pdescuento" id="pdescuento" class="form-control" 
                        placeholder="Descuento" value="0" style="border-radius:6px;">
                        
                    </div>
                </div> 
                
                  <div class="col-lg-1 col-sm-1 col-md-1 col-xs-12">
                    <div class="form-group">
                         <label for="descuento" style="color:#3a454e; ">D</label>
                         <button type="button" id="bt_add" class="btn btn-primary " style="background:#16a085; border:none;">Agregar <i class="fa fa-shopping-cart"></i></button>
                        
                    </div>
                </div> 
                
                <div class=" col-lg-2 col-sm-2 col-md-2 col-xs-12" style="margin-left:6%; margin-top:1%;">
            
                   <span id="msm"  style=" display:none; border:none; color:#fff; background:#ab7fc1; margin-left:-117px;"  class="label label"></span>
                </div>
               
         </div>
         <br>
         <!--TABLA-->
         <div class="row">
                 <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 table-responsive">
                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover ">
                        <thead style="background-color:#2c3e50; color:rgb(224, 216, 216);">
                            <th>Opciones</th>
                            <th>Artículo</th>
                            <th>Cant.</th>
                            <th>Precio Venta</th>
                            <th>Des.(%)</th>
                            <th>Subtotal</th>
                        </thead>
                        <tfoot style="background:#fff;">
                            <tr>
                                <th  colspan="5"><p align="right">TOTAL:</p></th>
                                <th><p align="right"><span id="total">S/. 0.00</span> <input type="hidden" name="total_venta" id="total_venta"></p></th>
                            </tr>
                            <tr>
                                <th colspan="5"><p align="right">TOTAL IMPUESTO (18%):</p></th>
                                <th><p align="right"><span id="total_impuesto">S/. 0.00</span></p></th>
                            </tr>
                            <tr>
                                <th  colspan="5"><p align="right">TOTAL PAGAR:</p></th>
                                <th><p align="right"><span align="right" id="total_pagar">S/. 0.00</span></p></th>
                            </tr>  
                        </tfoot>
                        <tbody>
                            
                        </tbody>
                    </table>
                 </div>
            </div>
            
        <!--DETALLES PARA FACTURA-->
         <div class="row" id="divfactura" style="display:none;">
             <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 well" style=" border-top: 3px solid #3a454e;">
                 <h5  style="color:rgba(0,0,0,.6);"><label class="label label-success" style="font-size:13px;">Datos adicionales para Factura:</label></h5>
                 <div class="row">
                       <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad" style="color:#555;">Tipo Cambio</label>
                        <input type="text" name="cambio"  class="form-control" 
                        style="border-radius:6px;">
                    </div>
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="stock" style="color: #555;">Orden Compra</label>
                        <input type="text" name="orden"  class="form-control" 
                       style="border-radius:6px;">
                    </div>
                </div>
                 <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for="stock" style="color: #555;">Vencimiento</label>
                         <input type="date" name="fecha_ven" class="form-control"  min="2000-01-02"  style="border-radius:6px;" id="fecha_ven">
                    </div>
                </div>
                 <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                    <div class="form-group">
                        <label for="stock" style="color: #555;">Referencia</label>
                         <input type="text" name="referencia"  class="form-control" 
                       style="border-radius:6px;" >
                    </div>
                </div>
                 </div>
                
             </div>
         </div>
        
        <!--DETALLES PARA BOLETA-->
         <div class="row" id="divboleta" >
             <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 well" style=" border-top: 3px solid #3a454e;">
                 <h5  style="color:rgba(0,0,0,.6);"><label class="label label-success" style="font-size:13px;">Datos adicionales para Boleta:</label></h5>
                 <div class="row">
                       <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                            <div class="form-group">
                                <label for="cantidad" style="color:#555;">Observación:</label>
                                <input type="text" name="observacion"  class="form-control" 
                                style="border-radius:6px;">
                            </div>
                       </div>
               
                  </div>
              </div>
                
             </div>
         
        
          <!--DETALLES PARA GUIA DE REMISION-->
     
         <div class="row" id="divguia" style="display:none;">
              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 well" style=" border-top: 3px solid #3a454e">
                 <h5  style="color:rgba(0,0,0,.6);"><label class="label label-success" style="font-size:13px;">Datos adicionales para Guía de Remisión:</label></h5>
              <div class="row">
                     <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad" style="color:#555;">N° serie</label> 
                         <input type="text" name="serie_guia"  class="form-control" 
                       style="border-radius:6px;" id="num_sguia">
                    </div>
                </div>
                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                           <label for="cantidad" style="color:#555;">N° de Guía</label> 
                         <input type="text" name="num_guia"  class="form-control" 
                       style="border-radius:6px;" id="num_guia">
                    </div>
                </div> 
                
                  <div class="col-md-3 col-lg-3 ">
                      <label for="cantidad" style="color:#f5f5f5;">ggggg</label> 
                     <label for="danger" class="btn btn-default" style="background:#f5f5f5;  border:none; font-weight: bold;">Autogenerado <input type="checkbox" id="danger" class="badgebox" name="g_a" value="1"><span class="badge" >&check;</span></label>

                </div>
              </div> 
              
             <!--Otra fila--> 
              <div class="row">
                   <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="cantidad" style="color:#555;" >Punto-Partida</label> 
                         <input type="text" name="p_partida"  class="form-control" 
                       style="border-radius:6px;" id="p_partida">
                    </div>
                </div>
                 <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                           <label for="cantidad" style="color:#555;">Punto-LLegada</label> 
                         <input type="text" name="p_llegada"  class="form-control" 
                       style="border-radius:6px;" id="p_llegada" >
                    </div>
                </div> 
                
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for="stock" style="color: #555;">Fecha Inicio de Traslado</label>
                       
                       <input type="date" name="fecha_guia" class="form-control"  min="2000-01-02"  style="border-radius:6px;" id="f_guia">
                    </div>
                </div>
			
              </div> 
              
                <div class="row">
                     <h5  style="color:rgba(0,0,0,.6);"><label class="label label" style="font-size:11px; margin-left:2%; background:#16a085;">Motivos (Solo seleccione uno)</label></h5>
                   <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                     <div class="input-group">
                       
                        <select name="motivo" id="motivo" class="form-control">
                               <option value="Venta">Venta</option>
                               <option value="Exportación">Exportación</option>
                               <option value="Importación">Importación</option>
                               <option value="Consignación">Consignación</option>
                               <option value="Venta sujeta a conformación de comprador">Venta sujeta a conformación de comprador</option>
                               <option value="Venta con entrega a terceros">Venta con entrega a terceros</option>
                                <option value="Otros">Otros</option>
                         </select>
                         
                       
                    </div>
                  
                  </div>
                  
                   <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">
                         <input id="observacion" name="otro" class="form-control" placeholder="Respecto a otros especifique..." type="text"  style="border-radius:6px;"/>
                  
                  </div>
                  
          
               
              </div> 
              
          
              
             <div class="row">
                     <h5  style="color:rgba(0,0,0,.6);"><label class="label label" style="font-size:11px; margin-left:2%; background:#16a085;">Trasportista</label></h5>
                
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="cantidad" style="color:#555;">R.U.C</label> 
                             <input type="text" name="ruc_t"  class="form-control" 
                           style="border-radius:6px;">
                        </div>
                    </div>
                    
                       <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        <div class="form-group">
                            <label for="cantidad" style="color:#555;">Nombres y Apellidos</label> 
                             <input type="text" name="non_t"  class="form-control" 
                           style="border-radius:6px;">
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="form-group">
                            <label for="cantidad" style="color:#555;">Marca y Placa</label> 
                             <input type="text" name="m_p"  class="form-control" 
                           style="border-radius:6px;" >
                        </div>
                    </div>
               
               
              </div> 
              
              
               <div class="row">
                   
                
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                            <label for="cantidad" style="color:#555;">Licencia de Conducir</label> 
                             <input type="text" name="licencia"  class="form-control" 
                           style="border-radius:6px;" >
                        </div>
                    </div>
                   
               
               
              </div> 
               
              </div>
         </div>
            
            
              
        </div> <!---FIN DE LA PRIMERA COLUMNA, aco--->
        
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12" style="background:#efeeee; height:100%;">
                <div class="row" >
                    <div class="col-lg-11 col-md-11" style="margin-top:16%;">
                        <div class="panel panel-default">
                          <div class="panel-body" style="font-size:35px; text-align:center; background:#dd4b39; color:#fff;"><span style="font-size:30px;">S/.</span><input id="totalfin" value="0" style="width: 80%; border:none; background:#dd4b39; text-align:center; " disabled/></div>
                          <div class="panel-footer">
                            
                             <!--Tiene q dar el vuelto asi q lo haremos con jquery--->
                             <label style="margin-left:20%; color:#666;">Calculo de vuelto</label>
                             
                            <div class="input-group" >
                                <span class="input-group-btn">
                                        <button class="btn btn-default" type="button" style="background:#444; border:none; color:#fff;" id="clean"><i class="fa fa-close "></i></button>
                                </span>
                                <input id="monto" style="width:100%; font-size:15px; " placeholder="Ingrese monto" align="center" class="form-control" name="ef"/>
                             </div>
                             
                    
                             <br>
                              <div class="input-group" id="cambio">
                                <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button" style="background:#dd4b39; border:none;" id="calculadora"><i class="fa fa-calculator "></i></button>
                                </span>
                                <input id="vueltoya" style="width:100%; font-size:15px;" placeholder="Cambio" align="center" class="form-control" name="vueltoya"/>
                             </div>
                          </div>
                        </div> 
                    </div>
                </div>
                
                <div>
                    <div class="well col-lg-11 col-md-11" style=" border-top: 3px solid #dd4b39;">
                      
                          <input type="radio" id="radio01" name="radio" checked value="contado"/>
                          <label for="radio01"><span></span> Contado</label>
                    
                         <input type="radio" id="radio02" name="radio" value="credito" />
                         <label for="radio02"><span></span> Crédito</label>
                         <br>
                           <div class="input-group" id="deuda" style="display:none;">
                                 <label style="color:#666;">Monto Cancelado</label>
                                  <input type="number" name="cancel" id="cancel" class="form-control"  value="0" style="border-radius:6px;">
                             </div>
                         <br>
                         
                          <div class="input-group" id="fecha_px" style="display:none;">
                                 <label style="color:#666;">Fecha Prox.</label>
                                  <input type="date" name="fecha_p" id="fecha_p" class="form-control"  value="0" style="border-radius:6px;">
                             </div>
                             
                        <br>
                     
                        <label style="color:#666;">Vendedor</label>
                         <div class="input-group">
                            <select name="id" id="idempleado" class="form-control selectpicker" data-live-search="true"  aria-required="true">
                                @foreach($empleados as $emp)
                                 <option value="{{$emp->id}}" >{{$emp->dni}}</option>
                                 @endforeach
                            </select>
                            <span class="input-group-btn">
                                    <button class="btn btn-danger" style="background:#444; border:none;" type="button"><i class="fa fa-remove"></i></button>
                            </span>
                        </div>
                        <br>
                          <br>
                        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" id="guardar">
                            <div class="form-group">
                                <input name"_token" value="{{ csrf_token() }}" type="hidden"></input>
                                <button class="btn btn-primary" type="submit" style="background:#444; border:none; color:#fff;">Guardar</button>
                                <button class="btn btn-danger" type="reset">Cancelar</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
         </div> <!--Aqui debe ser la otra col-->


			{!!Form::close()!!}		

@push ('scripts')
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script>
  $('select#tipo_comprobante').on('change',function(){
    var valorcomp = $(this).val();
    console.log("value"+valorcomp);
    if( valorcomp=="Factura"){
        
         $("#divfactura").css("display", "block");
         $("#divguia").css("display", "none");
         $("#divboleta").css("display", "none");
         $("#serie_comprobante").prop('disabled', false);
         $("#p_partida").attr("required", false);
         $("#p_llegada").attr("required", false);
         $("#f_guia").attr("required", false);
         $("#fecha_ven").attr("required", true);
    }else if(valorcomp=="Boleta"){
        
         $("#divfactura").css("display", "none");
         $("#divguia").css("display", "none");
         $("#serie_comprobante").prop('disabled', false);
         $("#p_partida").attr("required", false);
         $("#p_llegada").attr("required", false);
         $("#f_guia").attr("required", false);
         $("#divboleta").css("display", "block");
         $("#fecha_ven").attr("required", false);
        
    }else if(valorcomp=="Boleta/Guía de R."){
          $("#divguia").css("display", "block");
          $("#divfactura").css("display", "none");
          $("#serie_comprobante").prop('disabled', false);
          $("#p_partida").attr("required", true);
          $("#p_llegada").attr("required", true);
          $("#f_guia").attr("required", true);
          $("#divboleta").css("display", "block");
          $("#fecha_ven").attr("required", false);
        
    }else if(valorcomp=="Factura/Guía de R."){
          $("#divfactura").css("display", "block");
          $("#divguia").css("display", "block");
          $("#serie_comprobante").prop('disabled', false);
          $("#p_partida").attr("required", true);
          $("#p_llegada").attr("required", true);
          $("#f_guia").attr("required", true);
          $("#divboleta").css("display", "none");
          $("#fecha_ven").attr("required", true);
        
    }else if(valorcomp=="Ticket"){
         $("#divfactura").css("display", "none");
         $("#divguia").css("display", "none");
         $("#serie_comprobante").prop('disabled', false);
         $("#p_partida").attr("required", false);
         $("#p_llegada").attr("required", false);
         $("#f_guia").attr("required", false);
         $("#divboleta").css("display", "none");
         $("#fecha_ven").attr("required", false);
    }
      
      
});
  
//activando el input otros
    

  
   $("#info").on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
        $("#num_comprobante").prop('disabled', true);
        $("#serie_comprobante").prop('disabled', true);
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        $("#num_comprobante").prop('disabled', false);
        $("#serie_comprobante").prop('disabled', false);
    }
});
    
//Para guia autogenerado    
$("#danger").on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
        $("#num_guia").prop('disabled', true);
        $("#num_sguia").prop('disabled', true);
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        $("#num_guia").prop('disabled', false);
        $("#num_sguia").prop('disabled', false);
    }
});
    

   $("#primary").on( 'change', function() {
    if( $(this).is(':checked') ) {
        // Hacer algo si el checkbox ha sido seleccionado
         $("#divtarjeta").css("display", "block");
         $("#tarjeta").attr("required", true);
    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
        $("#divtarjeta").css("display", "none");
         $("#tarjeta").attr("required", false);
    }
});
    
$('input:radio[name=radio]').on('change',function() {
var valr = $('input:radio[name=radio]:checked').val(); 
    if(valr=="contado"){
        $("#deuda").css("display", "none");
        $("#fecha_px").css("display", "none");
        $("#fecha_p").attr("required", false);
    }else{
        $("#deuda").css("display", "block")
        $("#fecha_px").css("display", "block")
        $("#fecha_p").attr("required", true);       

    }
});

</script>
<script>


    $('#calculadora').click(function(){
      vuelto();
    });
    
    $('#clean').click(function(){
      limpio();
    });
    
    function vuelto(){
      var montoi=$("#monto").val();
      var totalf=$("#totalfin").val();
      var cambiaso=montoi - totalf;
      $("#vueltoya").val(cambiaso);
    }
    
     function limpio(){
      var montoi=$("#vueltoya").val('');
      var totalf=$("#monto").val('');
    }
    
</script>
 
<script>
  $(document).ready(function(){
    $('#bt_add').click(function(){
      agregar();
        ////aq
    });
  });

  var cont=0;
  total=0;
  subtotal=[];
  $("#guardar").hide();
  $("#pidarticulo").change(mostrarValores);
 

  function mostrarValores()
  {
    datosArticulo=document.getElementById('pidarticulo').value.split('_');
    $("#pprecio_venta").val(datosArticulo[2]);
    p_ini= $("#pprecio_venta").val(datosArticulo[2]);
    $("#pstock").val(datosArticulo[1]);    
  }
  

  function agregar()
  {
    datosArticulo=document.getElementById('pidarticulo').value.split('_');

    idarticulo=datosArticulo[0];
    
    articulo=$("#pidarticulo option:selected").text();
    cantidad=$("#pcantidad").val();

    descuento=$("#pdescuento").val();
    descuento_por=descuento/100;
    
    cantidad_vol=datosArticulo[4];
    var tra=parseInt(cantidad_vol);
    pa=datosArticulo[2];
      //ranma
      console.log(cantidad+"/aaa ppido"+cantidad_vol);
    if(cantidad > tra || cantidad == tra){
       $("#pprecio_venta").val(datosArticulo[3]); 
        $("#msm").css("display", "block");
        $('#msm').text("Cambio Prs. -Cant*vol:"+cantidad_vol+"-P.Ant:"+pa); 
       
    }
    else{
         $("#pprecio_venta").val(datosArticulo[2]); 
        $("#msm").css("display", "none");
    }
    precio_venta=$("#pprecio_venta").val();
    stock=$("#pstock").val();

    if (idarticulo!="" && cantidad!="" && cantidad>0 && descuento!="" && precio_venta!="")
    {
        if (parseInt(stock)>=parseInt(cantidad))
        {
        subtotal[cont]=(cantidad*precio_venta-cantidad*precio_venta*descuento_por);
        total=total+subtotal[cont];

        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">x</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'" >'+articulo+'</td><td><input type="number" name="cantidad[]" id="c_t" value="'+cantidad+'" class="form-control"></td><td><input type="number" name="precio_venta[]" id="p_v"  value="'+parseFloat(precio_venta).toFixed(2)+'" class="form-control"></td><td><input type="number" name="descuento[]" id="ds"  value="'+parseFloat(descuento).toFixed(2)+'" class="form-control"></td><td align="right">S/. '+parseFloat(subtotal[cont]).toFixed(2)+'</td></tr>';
        cont++;
        limpiar();
        totales();
        evaluar();
        $('#detalles').append(fila);   
        }
        else
        {
            alert ('La cantidad a vender supera el stock');
        }
        
    }
    else
    {
        alert("Error al ingresar el detalle de la venta, revise los datos del artículo");
    }
  }
  function limpiar(){
    $("#pcantidad").val("");
    $("#pdescuento").val("0");
    $("#pprecio_venta").val("");
  }
  function totales()
  {
        $("#total").html("S/. " + total.toFixed(2));
        
        $("#total_venta").val(total.toFixed(2));
    
        //Calcumos el impuesto
        if ($("#impuesto").is(":checked"))
        {
            por_impuesto=18/100;
        }
        else
        {
            por_impuesto=0;   
        }
      
        total_impuesto=total*por_impuesto/1.18;
        total_pagar=total+total_impuesto;
        $("#total_impuesto").html("S/. " + total_impuesto.toFixed(2));
        $("#total_pagar").html("S/. " + total_pagar.toFixed(2));
       // $("#yop").val(total);
     
        
        bien();
  }
 function bien(){
     ok=$("#total_venta").val()
     $("#totalfin").val(ok);
     $("#monto").val(ok);
 }
  function evaluar()
  {
    if (total>0)
    {
      $("#guardar").show();
    }
    else
    {
      $("#guardar").hide(); 
    }
   }

   function eliminar(index){
    total=total-subtotal[index]; 
    totales();  
    $("#fila" + index).remove();
    evaluar();

  }
    
    
   function editar(index){
    var edita0=$("#p_v").val();
    var edita1=$("#c_t").val();
   var edita2=$("#d_s").val();
    var edita3=edita2/100;
    var edita4=edita0*edita1-edita1*edita3*edita0;
    console.log("quierepz"+edita4);
    subtotal[index]=edita4;
    totales();  //llamo para q calcule
    evaluar();

  }
    

$('#liVentas').addClass("treeview active");
$('#liVentass').addClass("active");
  
</script>
@endpush
@endsection