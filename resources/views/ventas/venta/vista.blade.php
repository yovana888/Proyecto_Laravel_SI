<!DOCTYPE html>
 
<html lang="es">
 
<head>
<meta charset="utf-8" />
</head>
 
<body>
    <header>
       <h5  style="color:#3a454e;">Sistema de Ventas
       <img src="http://www.infosoluciones.cl/wp-content/uploads/2015/06/logo1-300x139.png" style="height:40px; width:80px; margin-left:80%; margin-top:-38px;"></h5>
       <HR width=100% align="center" style="color:#3a454e; hight:1px;">
       
    </header>
    <section>
      <h4  style="color:#3a454e; margin-left:2%;">Listado de Ventas</h4>
       <br>
       <article id="aaa">
           <table>
                <tr>
					<th>Fecha</th>
					<th>Cliente</th>
					<th>Tipo Venta</th>
					<th>Comprobante</th>
					<th>Total</th>
					<th>Impuesto</th>
					<th>Estado</th>
				</tr>
               
                @foreach ($ventas as $ven)
				<tr>
					<td>{{ $ven->fecha_hora}}</td>
					<td>{{ $ven->nombre}}</td>
				    <td>{{ $ven->tipo_venta}}</td>
				    @if($ven->num_guia=='')
				    <td>{{ $ven->tipo_comprobante.' : '.$ven->serie_comprobante.'-'.$ven->num_comprobante}}</td>
				    @else
				    <td>{{ $ven->tipo_comprobante.' : '.$ven->serie_comprobante.'-'.$ven->num_comprobante. ' / ' .$ven->serie_guia. '-' . $ven->num_guia}}</td>
				    @endif

					<td>{{ $ven->total_venta}}</td>
                    <td>{{ $ven->impuesto}}</td>
                
				    @if ($ven->estado=='Aceptado')
					<td><span style="background:#008d4c; color:#fff;">{{ $ven->estado}}</span></td>
					@elseif($ven->estado=='Por Cobrar')
					<td><span style="background:#f39c12; color:#fff;">{{ $ven->estado}}</span></td>
					@elseif($ven->estado=='Anulado')
					<td><span style="background:#d73925; color:#fff;">{{ $ven->estado}}</span></td>
					@else
				    <td><span style="background:#2e6da4; color:#fff;">{{ $ven->estado}}</span></td>
					@endif
				
				</tr>
				
				@endforeach
            </table>
       </article>
    </section>
    <aside>
     
    </aside>
    <footer id="footer">
       <p style="margin-top:6%;">Reporte pdf - 2017 , Athenas. ¡Pasión por el deporte!</p>
    </footer>
</body>
</html>

<style>
body {font-family: Arial, Helvetica, sans-serif; }

table {     font-family: "Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
    font-size: 12px;    margin-left: 10px;     width: 680px; text-align: left;    border-collapse: collapse; }

th {     font-size: 13px;     font-weight: normal;     padding: 8px;     background: #b9c9fe;
    border-top: 4px solid #aabcfe;    border-bottom: 1px solid #fff; color: #039; }

td {    padding: 8px;     background: #e8edff;     border-bottom: 1px solid #fff;
    color: #669;    border-top: 1px solid transparent; }

tr:hover td { background: #d0dafd; color: #339; }
    
    
#footer {
    width:100%;
    height:100px;
    position:absolute;
    bottom:0;
    left:0;
    font-size: 14px;
    color: darkslategray;
    text-align: center;
    margin-top: 80px;
}
    
    #aaa{
        min-height:100%;
    position:relative;
    }
</style>

