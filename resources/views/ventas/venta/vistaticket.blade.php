<!DOCTYPE html>
<html lang="en">
<head>
  <title>Reporte Ticket</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Anonymous+Pro|Cormorant+Garamond|Quattrocento" rel="stylesheet">
</head>
<body>

    <div class="content">
       <div>
           <img src="http://www.peinnovacion.com.mx/media-descargas/logos/conacyt/conacyt_negro.png" width="100px" height="60" style="margin-left:30%;">
           <br>
       </div>
         <div>
            <p style="font-family: 'Anonymous Pro', monospace; text-align:center; font-size:11px;">{{$ventas->direccion}}</p>
           <p style="font-family: 'Anonymous Pro', monospace; text-align:center; font-size:11px;">R.U.C. {{$ventas->ruc}}</p>
            <p style="font-family: 'Anonymous Pro', monospace; text-align:center; font-size:11px;text-align:right;">{{$fe}}</p>
              <p style="font-family: 'Anonymous Pro', monospace; text-align:center; font-size:11px;text-align:left;">TEL.: {{$ventas->telefono}} - CEL.: {{$ventas->cel}}</p>
            <p style="font-family: 'Anonymous Pro', monospace; text-align:center; font-size:11px;text-align:left;">CAJERO: {{$ventas->name}}</p>
            
             <p style="font-family: 'Anonymous Pro', monospace; text-align:center; font-size:11px;text-align:left;">CONDICIÓN: {{$ventas->tipo_venta}}</p>
               <p style="font-family: 'Anonymous Pro', monospace; margin-left:-22px; line-height:4px;">=================================</p>
              <p style="font-family: 'Anonymous Pro', monospace; text-align:center; font-size:11px;text-align:left;line-height:4px;">N° TICKET: {{$ventas->serie_comprobante}}-{{$ventas->num_comprobante}}</p>
              <p style="font-family: 'Anonymous Pro', monospace; margin-left:-22px;line-height:4px;">=================================</p>
              <p style="font-family: 'Anonymous Pro', monospace; text-align:center; font-size:11px;text-align:left;line-height:4px;">CLIENTE:{{$ventas->nombre}}</p>
               <p style="font-family: 'Anonymous Pro', monospace; margin-left:-22px;line-height:4px;">=================================</p>
               
                 <table class="normal3" style=" margin-left:-18px;">
                          <tr style="color:#222; font-size:11px;" >
                            <th scope="col" width=40px style="text-align:left; font-family: 'Anonymous Pro', monospace;" >CANT.</th>
                            <th scope="col" width=200px style="text-align:center; font-family: 'Anonymous Pro', monospace;">DESCRIPCION</th>
                            <th scope="col" width=50px style="text-align:left; font-family: 'Anonymous Pro', monospace;">IMPORTE</th>
                         
                          </tr>
                          @foreach($detalles as $d)
                          <tr style="color:#222; font-size:11px;" >
                            <th scope="col" width=40px style="text-align:left; font-family: 'Anonymous Pro', monospace;" >{{$d->cantidad}}</th>
                            <th scope="col" width=200px style="text-align:left; font-family: 'Anonymous Pro', monospace;">{{$d->articulo}}</th>
                            <th scope="col" width=50px style="text-align:left; font-family: 'Anonymous Pro', monospace;">{{$d->precio_venta}}</th>
                          </tr>
                          @endforeach
                          <!--de aqui 6 filas 1b-->
                          
                             <tr style="color:#222; font-size:11px;" >
                            <th scope="col" width=40px style="text-align:left; font-family: 'Anonymous Pro', monospace; color:#fff;" >{{$d->cantidad}}</th>
                            <th scope="col" width=200px style="text-align:left; font-family: 'Anonymous Pro', monospace; color:#fff;">TOTAL</th>
                            <th scope="col" width=50px style="text-align:left; font-family: 'Anonymous Pro', monospace;  color:#fff;">{{$ventas->total_venta}}</th>
                          </tr>
                          
                         <tr style="color:#222; font-size:11px;" >
                            <th scope="col" width=40px style="text-align:left; font-family: 'Anonymous Pro', monospace; color:#fff;" >{{$d->cantidad}}</th>
                            <th scope="col" width=200px style="text-align:left; font-family: 'Anonymous Pro', monospace;">SUBTOTAL</th>
                            <th scope="col" width=50px style="text-align:left; font-family: 'Anonymous Pro', monospace;">{{$ventas->importe}}</th>
                          </tr>
                          
                           <tr style="color:#222; font-size:11px;" >
                            <th scope="col" width=40px style="text-align:left; font-family: 'Anonymous Pro', monospace; color:#fff;" >{{$d->cantidad}}</th>
                            <th scope="col" width=200px style="text-align:left; font-family: 'Anonymous Pro', monospace;">IGV</th>
                            <th scope="col" width=50px style="text-align:left; font-family: 'Anonymous Pro', monospace;">{{$imgn}}</th>
                          </tr>
                           
                            <tr style="color:#222; font-size:11px;" >
                            <th scope="col" width=40px style="text-align:left; font-family: 'Anonymous Pro', monospace; color:#fff;" >{{$d->cantidad}}</th>
                            <th scope="col" width=200px style="text-align:left; font-family: 'Anonymous Pro', monospace;">TOTAL</th>
                            <th scope="col" width=50px style="text-align:left; font-family: 'Anonymous Pro', monospace;">{{$ventas->total_venta}}</th>
                          </tr>
                            
                            
                         
                        <tr style="color:#222; font-size:11px;" >
                            <th scope="col" width=40px style="text-align:left; font-family: 'Anonymous Pro', monospace; color:#fff;" >{{$d->cantidad}}</th>
                            <th scope="col" width=200px style="text-align:left; font-family: 'Anonymous Pro', monospace; ">PAGO CON:</th>
                            <th scope="col" width=50px style="text-align:left; font-family: 'Anonymous Pro', monospace;  ">{{$ventas->efectivo}}</th>
                            
                          </tr>
                          
                              <tr style="color:#222; font-size:11px;" >
                            <th scope="col" width=40px style="text-align:left; font-family: 'Anonymous Pro', monospace; color:#fff;" >{{$d->cantidad}}</th>
                            <th scope="col" width=200px style="text-align:left; font-family: 'Anonymous Pro', monospace; ">SU CAMBIO:</th>
                            <th scope="col" width=50px style="text-align:left; font-family: 'Anonymous Pro', monospace;  ">{{$ventas->vuelto}}</th>
                          </tr>
                          
                          
                        
                </table>
                  <p style="font-family: 'Anonymous Pro', monospace; margin-left:-22px;line-height:20px;">=================================</p>
                    
          
       </div>
      
           <div>
           
       </div>
           
    </div>
<footer>
  <p style="font-family: 'Anonymous Pro', monospace; text-align:center; font-size:11px;text-align:center;line-height:4px;">GRACIAS POR TU COMPRA</p>
<p style="font-family: 'Anonymous Pro', monospace; text-align:center; font-size:11px;text-align:center;line-height:4px;">NO SE ACEPTA CAMBIOS NI DEVOLUCION</p>
  
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
