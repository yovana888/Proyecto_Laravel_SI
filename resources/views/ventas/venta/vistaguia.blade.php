<!DOCTYPE html>
<html lang="en">
<head>
  <title>GUIA DE REMISION</title>
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
                   <p style="color:blue;font-size:12px;" ALIGN=center >GUIA DE REMISION ELECTRONICA</p>
                   <p style="color:blue; font-size:12px; line-height:4px; " ALIGN=center>R.U.C {{$ventas->ruc}}</p>
                 <p style="color:blue; font-size:12px; line-height:4px;" ALIGN=center>{{$ventas->serie_guia}}-{{$ventas->num_guia}}</p>
              </div>
              
                 <div  style="position:relative; margin-top:13%;">
                      <div style="position:absolute; width:100%; ">
                          <!--Para fecha se debe considerar q si es credito cambiar-->
                        <table class="normal">
                          <tr style="color:#222; height:14; " >
                            <th scope="col" width=220px style="text-align:left;border:1px solid #888; padding:4px;">Destinatario: {{$ventas->nombre}}</th>
                            <th scope="col" width=120px  style="text-align:left;border:1px solid #888;padding:4px;">Fecha-Emisión: {{$ventas->fecha_hora}}</th>
                          </tr>
                          <tr style="color:#222; ">
                            <th scope="col"  width=220px  style="text-align:left;border:1px solid #888;padding:6px;">Dirección: {{$ventas->dip}}</th>
                            <th scope="col" width=120px  style="text-align:left;border-top:1px solid #888;border-bottom:1px solid #888;border-right:1px solid #888; border-left:1px solid #fff;padding:4px;">Fecha-Traslado: {{$ventas->fecha_guia}}</th>
                          </tr>
                         
                             <tr style="color:#222;">
                           <th scope="col"  width=220px  style="text-align:left;border:1px solid #888;padding:6px;">R.U.C: {{$ventas->rucp}}</th>
                            <th scope="col" width=120px  style="text-align:left;border-top:1px solid #888;border-bottom:1px solid #888;border-right:1px solid #888; border-left:1px solid #fff;padding:4px;">Punto Partida: {{$ventas->p_partida}}</th>
                             
                          </tr>
                          
                           <tr style="color:#222; ">
                            <th scope="col"  width=220px  style="text-align:left;border:1px solid #888;padding:6px;">DNI: {{$ventas->num_documento}}</th>
                            <th scope="col" width=120px  style="text-align:left;border-top:1px solid #888;border-bottom:1px solid #888;border-right:1px solid #888; border-left:1px solid #fff;padding:4px;">Punto LLegada: {{$ventas->p_llegada}}</th>
                          </tr>

                      </table>
                 
                       
                       <p style=" font-family:sans-serif; font-size:11px;">Motivo de Traslado:</p>
                       @if($ventas->motivo=='Venta')
                       <table class="normal1" style="margin-top:-5px; border:1px solid #888;">
                          <tr style="color:#333;" >
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" checked></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=30px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta sujeta a confirmación de comprador</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Recojo de bienes</span><span style="color:#fff;">ddd</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado-zona primaria</span></th>
                             
                            
                                                    
                        </tr>
                        <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Compra</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Traslado entre la misma empresa</span><span style="color:#fff;">ddddddddddd</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Importación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Emisor Iterante</span><span style="color:#fff;">d</span></th>  
                              
                              
                        </tr>
                        
                         <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Consignación</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta con entrega a terceros</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Exportación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado para trasformación</span></th>  
                              
                               
                        </tr>
                        
                        <tr style="color:#333; " >
                          
                             <th scope="col" colspan="12"  style="text-align:left;font-family:sans-serif; font-size:10px; border-top:2px solid #dedede; height:15px;"><span style=" ">Otro:</span></th>  
                              
                               
                        </tr>
                       </table>
                        @elseif($ventas->motivo=='Exportación')
                          <table class="normal1" style="margin-top:-5px; border:1px solid #888;">
                          <tr style="color:#333;" >
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=30px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta sujeta a confirmación de comprador</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Recojo de bienes</span><span style="color:#fff;">ddd</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado-zona primaria</span></th>
                             
                            
                                                    
                        </tr>
                        <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Compra</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Traslado entre la misma empresa</span><span style="color:#fff;">ddddddddddd</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Importación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Emisor Iterante</span><span style="color:#fff;">d</span></th>  
                              
                              
                        </tr>
                        
                         <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Consignación</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta con entrega a terceros</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"  checked></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Exportación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado para trasformación</span></th>  
                              
                               
                        </tr>
                        
                        <tr style="color:#333; " >
                          
                             <th scope="col" colspan="12"  style="text-align:left;font-family:sans-serif; font-size:10px; border-top:2px solid #dedede; height:15px;"><span style=" ">Otro:</span></th>  
                              
                               
                        </tr>
                       </table>
                        @elseif($ventas->motivo=='Importación')
                              <table class="normal1" style="margin-top:-5px; border:1px solid #888;">
                          <tr style="color:#333;" >
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=30px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta sujeta a confirmación de comprador</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Recojo de bienes</span><span style="color:#fff;">ddd</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado-zona primaria</span></th>
                             
                            
                                                    
                        </tr>
                        <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Compra</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Traslado entre la misma empresa</span><span style="color:#fff;">ddddddddddd</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;" checked></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;"  >Importación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Emisor Iterante</span><span style="color:#fff;">d</span></th>  
                              
                              
                        </tr>
                        
                         <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Consignación</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta con entrega a terceros</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;" ></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Exportación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado para trasformación</span></th>  
                              
                               
                        </tr>
                        
                        <tr style="color:#333; " >
                          
                             <th scope="col" colspan="12"  style="text-align:left;font-family:sans-serif; font-size:10px; border-top:2px solid #dedede; height:15px;"><span style=" ">Otro:</span></th>  
                              
                               
                        </tr>
                       </table>
                       
                        @elseif($ventas->motivo=='Consignación')
                               <table class="normal1" style="margin-top:-5px; border:1px solid #888;">
                          <tr style="color:#333;" >
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=30px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta sujeta a confirmación de comprador</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Recojo de bienes</span><span style="color:#fff;">ddd</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado-zona primaria</span></th>
                             
                            
                                                    
                        </tr>
                        <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Compra</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Traslado entre la misma empresa</span><span style="color:#fff;">ddddddddddd</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;"  >Importación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Emisor Iterante</span><span style="color:#fff;">d</span></th>  
                              
                              
                        </tr>
                        
                         <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" checked></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Consignación</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta con entrega a terceros</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;" ></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Exportación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado para trasformación</span></th>  
                              
                               
                        </tr>
                        
                        <tr style="color:#333; " >
                          
                             <th scope="col" colspan="12"  style="text-align:left;font-family:sans-serif; font-size:10px; border-top:2px solid #dedede; height:15px;"><span style=" ">Otro:</span></th>  
                              
                               
                        </tr>
                       </table>
                        @elseif($ventas->motivo=='Venta sujeta a conformación de comprador')
                               <table class="normal1" style="margin-top:-5px; border:1px solid #888;">
                          <tr style="color:#333;" >
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" checked></th> 
                             <th  scope="col" width=30px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta sujeta a confirmación de comprador</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Recojo de bienes</span><span style="color:#fff;">ddd</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado-zona primaria</span></th>
                             
                            
                                                    
                        </tr>
                        <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Compra</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Traslado entre la misma empresa</span><span style="color:#fff;">ddddddddddd</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;"  >Importación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Emisor Iterante</span><span style="color:#fff;">d</span></th>  
                              
                              
                        </tr>
                        
                         <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Consignación</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta con entrega a terceros</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;" ></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Exportación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado para trasformación</span></th>  
                              
                               
                        </tr>
                        
                        <tr style="color:#333; " >
                          
                             <th scope="col" colspan="12"  style="text-align:left;font-family:sans-serif; font-size:10px; border-top:2px solid #dedede; height:15px;"><span style=" ">Otro:</span></th>  
                              
                               
                        </tr>
                       </table>
                        @elseif($ventas->motivo=='Venta con entrega a terceros')
                           <table class="normal1" style="margin-top:-5px; border:1px solid #888;">
                          <tr style="color:#333;" >
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=30px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta sujeta a confirmación de comprador</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Recojo de bienes</span><span style="color:#fff;">ddd</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado-zona primaria</span></th>
                             
                            
                                                    
                        </tr>
                        <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Compra</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Traslado entre la misma empresa</span><span style="color:#fff;">ddddddddddd</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;"  >Importación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Emisor Iterante</span><span style="color:#fff;">d</span></th>  
                              
                              
                        </tr>
                        
                         <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Consignación</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" checked></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta con entrega a terceros</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;" ></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Exportación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado para trasformación</span></th>  
                              
                               
                        </tr>
                        
                        <tr style="color:#333; " >
                          
                             <th scope="col" colspan="12"  style="text-align:left;font-family:sans-serif; font-size:10px; border-top:2px solid #dedede; height:15px;"><span style=" ">Otro:{{$ventas->otros}}</span></th>  
                              
                               
                        </tr>
                       </table>
                       @else
                         <table class="normal1" style="margin-top:-5px; border:1px solid #888;">
                          <tr style="color:#333;" >
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=30px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta sujeta a confirmación de comprador</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Recojo de bienes</span><span style="color:#fff;">ddd</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado-zona primaria</span></th>
                             
                            
                                                    
                        </tr>
                        <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Compra</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Traslado entre la misma empresa</span><span style="color:#fff;">ddddddddddd</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;"  >Importación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Emisor Iterante</span><span style="color:#fff;">d</span></th>  
                              
                              
                        </tr>
                        
                         <tr style="color:#333; " >
                           <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Consignación</span></th>  
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox"></th> 
                             <th  scope="col" width=40px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:2%;">Venta con entrega a terceros</span></th> 
                             
                            <th scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;" ></th> 
                             <th  colspan="5"  scope="col" width=18px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style="margin-left:0px;">Exportación</span></th> 
                             
                              <th  scope="col" width=3px style="text-align:left;"> <input type="checkbox" style="margin-left:0px;"></th>
                              <th  scope="col" width=13px style="text-align:left;font-family:sans-serif; font-size:10px; padding:10px;"><span style=" margin-left:0%; margin-left:0px;">Traslado para trasformación</span></th>  
                              
                               
                        </tr>
                        
                        <tr style="color:#333; " >
                          
                             <th scope="col" colspan="12"  style="text-align:left;font-family:sans-serif; font-size:10px; border-top:2px solid #dedede; height:15px;"><span style=" ">Otro:</span></th>  
                              
                               
                        </tr>
                       </table>
                        @endif
                       <br>
                        
                         <p style=" font-family:sans-serif; font-size:11px;">Datos del bien trasportado:</p>
                         
                    <table class="normal2" id="js-tabla" style="margin-top:-3px;">
                      <tr style="color:#222; height:14; background:#f2f2f2;" >
                        <th scope="col" width=50px style="border-bottom: 1px solid #666;">Cantidad</th>
                        <th scope="col" width=50px style="border-bottom: 1px solid #666;">Unidad</th>
                        <th scope="col" width=260px style="border-bottom: 1px solid #666; ">Descripción</th>
                         <th scope="col" width=30px style="border-bottom: 1px solid #666;">Peso</th>
                        
                      </tr>
                       @foreach ($detalles as $d)
                      <tr style="color:#666; ">
                        <th scope="col" width=50px>{{$d->cantidad}}</th>
                        <th scope="col" width=50px>unid.</th>
                        <th scope="col" width=220px style="text-align:left;"><span style="margin-left:2%;">{{$d->articulo}}</span></th>
                        <th scope="col" width=50px>{{$d->peso}}</th>
                
                      </tr>
                      @endforeach
                       <tr style="color:#fff; ">
                        <th scope="col" width=50px>WDAS</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=220px>d</th>
                        <th scope="col" width=50px>d</th>
                       
                      </tr>
                       
                            <tr style="color:#fff; ">
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=220px>d</th>
                        <th scope="col" width=50px>d</th>
                       
                      </tr>
                         <tr style="color:#fff; ">
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=220px>d</th>
                        <th scope="col" width=50px>d</th>
                       
                      </tr>
                         <tr style="color:#fff; ">
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=220px>d</th>
                        <th scope="col" width=50px>d</th>
                      
                      </tr>
                         <tr style="color:#fff; ">
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=50px>d</th>
                        <th scope="col" width=220px>d</th>
                        <th scope="col" width=50px>d</th>
                       
                      </tr>
                    </table>
                        
                        <br>
                        
                         <p style=" font-family:sans-serif; font-size:11px;">Datos del trasportista:</p>
                         
                             <table class="normal">
                          <tr style="color:#222; height:14; " >
                            <th scope="col" width=120px style="text-align:left;border:1px solid #888; padding:4px;">Nombres y Apellidos: {{$ventas->non_t}}</th>
                            <th scope="col" width=120px  style="text-align:left;border:1px solid #888;padding:4px;">Marca-Placa: {{$ventas->m_p}}</th>
                          </tr>
                          <tr style="color:#222; ">
                            <th scope="col"  width=120px  style="text-align:left;border:1px solid #888;padding:6px;">R.U.C: {{$ventas->ruc_t}}</th>
                            <th scope="col" width=120px  style="text-align:left;border-top:1px solid #888;border-bottom:1px solid #888;border-right:1px solid #888; border-left:1px solid #fff;padding:4px;">Licencia: {{$ventas->licencia}}</th>
                          </tr>
                         
                          
                      </table>
                         
                      </div>
                 </div>
          </div>
          
    
             </div>
             
          
            </div>
             
    </div>
<footer style="margin-top:50px;">
 <hr width="100%" style=" border:1px solid #dedede;margin-top:56px;">
  <p style="font-family:sans-serif; font-size:10px;margin-top:15px;">Comprobante electrónico al {{$ventas->tipo_venta}}</p>
  <p style="font-family:sans-serif; font-size:10px; color:#333;margin-top:10px;line-height:10px;">Fecha de impresión: {{$fe}}</p>
   
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
