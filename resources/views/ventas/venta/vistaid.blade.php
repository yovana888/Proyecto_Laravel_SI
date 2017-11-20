<!DOCTYPE html>
<html lang="en">
<head>
  <title>FACTURA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <div class="content">
         <div class="div-1">
             <div class="div-1b" style="margin-top:-15px;">
               <div style="font-family:sans-serif;">
                    <img src="http://www.rafaalatorre.com/wp-content/uploads/2016/12/kudos-dbs-logo-2-330x170.png" width="190px" height="80" style="margin-left:2%;">
                    <p ALIGN=center style="font-size:10px; margin-left:-180px;">Sucursal: {{$ventas->direccion}}</p>
                    <p ALIGN=center style="font-size:10px; margin-left:-180px;">TEL.: {{$ventas->telefono}} / CEL.:     {{$ventas->cel}}</p>
               </div>
               <br>
                <br>
               <div  style="margin-left:-5px; border: 1px solid #888; border-radius:6px; padding:10px; font-family:sans-serif;">
                   <p style="font-size:10px; ">CLIENTE:  <span style="color:#555; font-size:11px;">{{$ventas->nombre}}</span></p>
                    <p style="font-size:10px; ">R.U.C:  <span style="color:#555; font-size:11px;">{{$ventas->rucp}}</span></p>
                    <p style="font-size:10px; ">DIRECCIÓN:  <span style="color:#555; font-size:11px;">{{$ventas->dip}}</span></p>
                    <p style="font-size:10px;" font: caption;>TELÉFONO:  <span style="color:#555; font-size:11px;">{{$ventas->tel}}</span></p>
               </div>
               
             </div>
             <div class="div-1a" style="font-family:sans-serif;">
                <div style="border: 1px solid red;">
                    <h4 style="color:red;" ALIGN=center><span style="font-weight: bold;">R.U.C.</span> {{$ventas->ruc}}</h4>
                     <h4 style="color:red; " ALIGN=center>{{$ventas->tipo_comprobante}} Electrónica</h4>
                    <h5 style="color:red; " ALIGN=center>{{$ventas->serie_comprobante}}-{{$ventas->num_comprobante}}</h5>
                </div>
                <br>
                
                <div class="well" style="margin-top:-6px; margin-left:-45px;  border: 1px solid #888; border-radius:6px; padding:10px;">
                     <p style="font-size:10px;">VENDEDOR:  <span style="color:#555;font-size:11px;">{{$ventas->name}}</span></p>
                    <p style="font-size:10px;">CONDICIÓN DE VENTA:  <span style="color:#555;font-size:11px;" >{{$ventas->tipo_venta}}</span></p>
                    <p style="font-size:10px;">FECHA EMISIÓN:  <span style="color:#555; font-size:11px;">{{$ventas->fecha_hora}}</span></p>
                    <p style="font-size:10px;">FECHA TERMINO:  <span style="color:#555; font-size:11px;">{{$ventas->fecha_ven}}</span></p>
                </div>
               
             </div>
             
            <div class="div-1c" style="margin-top:293px; margin-left:-4px;" >
                
                  <table class="normal">
                      <tr style="color:#222; height:14; background:#f2f2f2;" >
                        <th scope="col" width=90px>Orden Compra</th>
                        <th scope="col" width=120px>Guía de Remisión</th>
                        <th scope="col" width=120px>Tipo de Cambio</th>
                        <th scope="col" width=220px>Referencia</th>
                      </tr>
                      <tr style="color:#666; ">
                        <th scope="col"  width=90px>{{$ventas->orden}}</th>
                        <th scope="col" width=120px>{{$ventas->num_guia}}-{{$ventas->serie_guia}}</th>
                        <th scope="col" width=120px>{{$ventas->cambio}}</th>
                        <th scope="col" width=220px>{{$ventas->referencia}}</th>
                      </tr>
                
                    </table>
             </div>
                
              <div class="div-1c" style="margin-top:8px; margin-left:-4px;" >
                
                  <table class="normal2" id="js-tabla">
                      <tr style="color:#222; height:14; background:#f2f2f2;" >
                        <th scope="col" width=50px style="border-bottom: 1px solid #666;">Cantidad</th>
                        <th scope="col" width=50px style="border-bottom: 1px solid #666;">Unidad</th>
                        <th scope="col" width=220px style="border-bottom: 1px solid #666;">Descripción</th>
                        <th scope="col" width=50px style="border-bottom: 1px solid #666;">P. Unitario</th>
                         <th scope="col" width=30px style="border-bottom: 1px solid #666;">Dto.(%)</th>
                         <th scope="col" width=50px style="border-bottom: 1px solid #666;">Total con Dto.</th>
                      </tr>
                       @foreach ($detalles as $d)
                      <tr style="color:#666; ">
                        <th scope="col" width=50px>{{$d->cantidad}}</th>
                        <th scope="col" width=50px>unid.</th>
                        <th scope="col" width=220px>{{$d->articulo}}</th>
                        <th scope="col" width=50px>{{$d->precio_venta}}</th>
                        <th scope="col" width=30px>{{$d->descuento}}</th>
                        <th scope="col" width=50px>{{$d->subtotal}}</th>
                      </tr>
                      @endforeach
                       <tr style="color:#fff; ">
                        <th scope="col" width=50px>WDAS</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=220px>d</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=30px>d</th>
                        <th scope="col" width=50px>d</th>
                      </tr>
                         <tr style="color:#fff; ">
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=220px>d</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=30px>d</th>
                        <th scope="col" width=50px>d</th>
                      </tr>
                         <tr style="color:#fff; ">
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=220px>d</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=30px>d</th>
                        <th scope="col" width=50px>d</th>
                      </tr>
                         <tr style="color:#fff; ">
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=220px>d</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=30px>d</th>
                        <th scope="col" width=50px>d</th>
                      </tr>
                         <tr style="color:#fff; ">
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=220px>d</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=30px>d</th>
                        <th scope="col" width=50px>d</th>
                      </tr>
                    </table>
             </div>
             
                
              <div class="div-1c" style="margin-top:40%; margin-left:-4px;" >
                
                   <div style="position:absolute; font-family:sans-serif;">
                      <img src="http://legal.legis.com.co/document.legis?fn=resource&docid=legcol&viewid=STD-PC&rtype=image&rname=1721fe602ab5494891f571626aca43dd.PNG&global=false" style="heigth:80px; width:300px;">
                      <p style="font-size:11px; ">Autorizado a ser emisor electrónico mediante R.I SUNAT N°</p>
                   </div>
                   
                    <div style="position: absolute; margin-left:70%;  font-weight: bold;">
                        <table class="normal3">
                          <tr style="color:#222;" >
                            <th scope="col" width=80px style="text-align:left;" >Subtotal S/.</th>
                            <th scope="col" width=50px style="text-align:left;">{{$ventas->importe}}</th>
                         
                          </tr>
                          <tr style="color:#222;  ">
                            <th scope="col"  width=80px style="text-align:left;">I.G.V.</th>
                            <th scope="col" width=50px style="text-align:left;">{{$imgn}}</th>
                          </tr>
                        <tr style="color:#222;">
                            <th scope="col"  width=80px style="text-align:left;">Total S/.</th>
                            <th scope="col" width=50px style="text-align:left;">{{$ventas->total_venta}}</th>
                          </tr>

                        </table>
                    </div> 
             </div>
             
          
            </div>
             
         </div>
<footer>
  <p style="font-family:sans-serif; font-size:10px;">Comprobante electrónico generado por Softing</p>
  <p style="font-family:sans-serif; font-size:10px;"> Tel.: 0261 - 484234 / Correo: Softing_System@gmail.com </p>
  <p style="font-family:sans-serif; font-size:10px; color:#333;">Fecha de impresión: {{$fe}}</p>
  
</footer>
    
@push ('scripts')
<script src="{{asset('js/JsBarcode.all.min.js')}}"></script>
<script src="{{asset('js/jquery.PrintArea.js')}}"></script>

<script>
     JsBarcode(".barcode").init();
$(document).ready(function(){
    $('#js-tabla tr:last').after('<tr><td>Cuatro</td></tr>');
});
</script>
@endpush

</body>
</html>

  <style>
    
.div-1 {
 position:relative;
}
    
.div-1a {
 position:absolute;
 top:0;
 right:0;
 width:240px;
}
.div-1b {
 position:absolute;
 top:0;
 left:0;
 width:400px;
}
    
.div-1c {
  clear:both;
    position: relative;
}

.div-1b1 {
 position:relative;
 top:0;
 left:0;
 width:100%;
height: 100px;
}

.normal {
  width: 100%;
  border: 1px solid #666;
  border-collapse: collapse;
}
.normal th, .normal td {
  border: 1px solid #666;
  font-family: sans-serif;
 font-size: 11px;
font-weight: normal;
}
 
.normal2 {
  width: 100%;
  border: 1px solid #666;
  border-collapse: collapse;
}
      
 .normal2 td {

  font-family: sans-serif;
 font-size: 11px;
font-weight: normal;
}
      
.normal2 th{
font-family: sans-serif;
 font-size: 11px;
font-weight: normal;
 border-left: 1px solid #666;
}
      
.normal3 {
  width: 100%;
  border-collapse: collapse;
}
      
 .normal3 td {

  font-family: sans-serif;
 font-size: 11px;
font-weight: normal;
}
      
.normal3 th{
font-family: sans-serif;
 font-size: 11px;
font-weight: normal;
}
      
      
html {
  min-height: 100%;
  position: relative;
}
body {
  margin: 0;
  margin-bottom: 40px;
}
footer {
 
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 40px;
  color: #000;
}
 
</style>
