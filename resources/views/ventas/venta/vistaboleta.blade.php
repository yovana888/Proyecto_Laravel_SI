<!DOCTYPE html>
<html lang="en">
<head>
  <title>BOLETA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <div class="content">
          <div class="div-1">
           
          <div style="position:relative; margin-top:-15px;">
              <div style="position:absolute; width:300px;">
                   <img src="http://www.rafaalatorre.com/wp-content/uploads/2016/12/kudos-dbs-logo-2-330x170.png" width="110px" height="60" style="margin-left:-6px;;">
                        <p  style="font-size:10px; margin-left:0px;font-family:sans-serif; line-height:4px;">Sucursal: {{$ventas->direccion}}</p>
                        <p style="font-size:10px; margin-left:0;font-family:sans-serif;line-height:4px;">TEL.: {{$ventas->telefono}} / CEL.:     {{$ventas->cel}}</p>
              </div>
               <div style="position:absolute;width:180px;border:1px solid blue; height:85px; margin-left:75%; margin-top:0%;">
                   <p style="color:blue;font-size:12px;" ALIGN=center >BOLETA DE VENTA ELECTRONICA</p>
                   <p style="color:blue; font-size:12px; line-height:4px; " ALIGN=center>R.U.C {{$ventas->ruc}}</p>
                 <p style="color:blue; font-size:12px; line-height:4px;" ALIGN=center>{{$ventas->serie_comprobante}}-{{$ventas->num_comprobante}}</p>
              </div>
              
                 <div  style="position:relative; margin-top:27%;">
                      <div style="position:absolute; width:100%; ">
                          <!--Para fecha se debe considerar q si es credito cambiar-->
                        <table class="normal">
                          <tr style="color:#222; height:14; " >
                            <th scope="col" width=220px style="text-align:left;border:1px solid #888; padding:4px;">Cliente: {{$ventas->nombre}}</th>
                            <th scope="col" width=120px  style="text-align:left;border:1px solid #888;padding:4px;">Fecha-Emisión: {{$ventas->fecha_hora}}</th>
                          </tr>
                          <tr style="color:#222; ">
                            <th scope="col"  width=220px  style="text-align:left;border:1px solid #888;padding:6px;">Dirección: {{$ventas->dip}}</th>
                            <th scope="col" width=120px  style="text-align:left;border-top:1px solid #888;border-bottom:1px solid #888;border-right:1px solid #888; border-left:1px solid #fff;padding:4px;">DNI: {{$ventas->num_documento}}</th>
                          </tr>
                         
                             <tr style="color:#222;">
                            <th scope="col" colspan="2"  style="text-align:left;border:1px solid #888; width:100%;padding:4px;">Observación: {{$ventas->observacion}}</th>
                             
                          </tr>

                      </table>
                 
                        <table class="normal2" id="js-tabla" style="margin-top:2%;">
                      <tr style="color:#222; height:14; background:#f2f2f2;" >
                        <th scope="col" width=50px style="border-bottom: 1px solid #666;">Cantidad</th>
                        <th scope="col" width=50px style="border-bottom: 1px solid #666;">Unidad</th>
                        <th scope="col" width=220px style="border-bottom: 1px solid #666; ">Descripción</th>
                        <th scope="col" width=50px style="border-bottom: 1px solid #666;">P. Unitario</th>
                         <th scope="col" width=30px style="border-bottom: 1px solid #666;">Dto.(%)</th>
                         <th scope="col" width=50px style="border-bottom: 1px solid #666;">Total con Dto.</th>
                      </tr>
                       @foreach ($detalles as $d)
                      <tr style="color:#666; ">
                        <th scope="col" width=50px>{{$d->cantidad}}</th>
                        <th scope="col" width=50px>unid.</th>
                        <th scope="col" width=220px style="text-align:left;"><span style="margin-left:2%;">{{$d->articulo}}</span></th>
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
                       
                        
                    </table>
                        
                      </div>
                 </div>
          </div>
          
    
             </div>
             
          
            </div>
             
    </div>
<footer style="margin-top:50px;">
  <p style="font-family:sans-serif; font-size:10px;margin-top:60px;">Comprobante electrónico al {{$ventas->tipo_venta}}</p>
  <p style="font-family:sans-serif; font-size:10px; color:#333;margin-top:10px;line-height:10px;">Fecha de impresión: {{$fe}}</p>
   <table class="normal3" style="margin-top:-50px; margin-left:370px;">
                          <tr style="color:#222; font-weight: bold;" >
                            <th scope="col" width=50px style="text-align:left;font-weight: bold;" ><span margin-left:3%;>Subtotal S/.</span></th>
                            <th scope="col" width=50px style="text-align:left;font-weight: bold;">{{$ventas->importe}}</th>
                         
                          </tr>
                          @if($ventas->impuesto=='0.00')
                          <tr style="font-weight: bold;">
                            <th scope="col"  width=50px style="text-align:left; color:#fff;font-weight: bold;">I.G.V.</th>
                            <th scope="col" width=50px style="text-align:left; color:#fff;">{{$imgn}}</th>
                          </tr>
                          @else
                           <tr style="color:#222; font-weight: bold; ">
                            <th scope="col"  width=50px style="text-align:left;font-weight: bold;">I.G.V.</th>
                            <th scope="col" width=50px style="text-align:left;font-weight: bold;">{{$imgn}}</th>
                          </tr>
                          @endif
                        <tr style="color:#222; font-weight: bold;">
                            <th scope="col"  width=50px style="text-align:left;font-weight: bold;">Total S/.</th>
                            <th scope="col" width=50px style="text-align:left;font-weight: bold;">{{$ventas->total_venta}}</th>
                          </tr>

    </table>
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
  border: 1px solid #fff;
  border-collapse: collapse;
}
.normal th, .normal td {
  border: 1px solid #fff;
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
