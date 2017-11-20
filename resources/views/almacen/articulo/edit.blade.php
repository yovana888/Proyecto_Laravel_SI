@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h4 style="color:rgba(0,0,0,.5);">Editar Artículo: {{ $articulo->nombre}}</h4>
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
			{!!Form::model($articulo,['method'=>'PATCH','route'=>['almacen.articulo.update',$articulo->idarticulo],'files'=>'true'])!!}
            {{Form::token()}}
               
<style>
    .marron {
    background-color: maroon;
    color: #ffffff;
    }
    .rojo {
    background-color: red;
    color: #ffffff;
    }
    
     .naranja{
    background-color: orange;
    color: #000000;
    }
    
    .amarillo{
    background-color: #FFFF00;
    color: #000000;
    }
    
    .dorado{
    background-color: #dfaf1f;
    color: #000000;
    }
    
    .olivo {
    background-color: olivedrab;
    color: #ffffff;
    }
  
    .purpura {
    background-color: blueviolet;
    color: #000000;
    }
    
     .blanco{
    background-color: cornsilk;
    color: #000000;
    }
    
    .verde{
    background-color: green;
    color: #000000;
    }
    
    .azul{
    background-color: blue;
    color: #000000;
    }
    
     .azul-marino{
    background-color: #445d84;
    color: #000000;
    }
    
    .aqua{
    background-color: aquamarine;
    color: #000000;
    }
    
    .teal{
    background-color: teal;
    color: #000000;
    }
    
    
     .gris{
    background-color: #444;
    color: #fff;
    }
    
     .plata{
    background-color: #8a9597;
    color: #fff;
    }
    .gray{
    background-color: gray;
    color: #fff; 
    }
      .negro{
    background-color: #222;
    color: #fff;
    }
    
    .inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}
    
.thumb{
     margin: 10px 10px 10px 10px;
    height: 150px;
    width: 150px;
}
    #imgSalida{
         margin: 10px 10px 10px 10px;
    height: 150px;
    width: 150px;
    }
    
     #imgSalida1{
         margin: 10px 10px 10px 10px;
    height: 150px;
    width: 150px;
    }
    
    #imgSalida2{
    margin: 10px 10px 10px 10px;
    height: 150px;
    width: 150px;
    }
    
     
    #imgSalida3{
    margin: 10px 10px 10px 10px;
    height: 150px;
    width: 150px;
    }
    
    #imgSalida4{
    margin: 10px 10px 10px 10px;
    height: 150px;
    width: 150px;
    }
    
    div#div_file{
       position: relative;
       padding: 10px;
       width: 200px;
        font-family:sans-serif;
    }
    
    input#file-input{
        position: absolute;
        top:0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        width: 100%;
        height: 100%;
        opacity: 0;
    }
    
       input#file-input1{
        position: absolute;
        top:0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        width: 100%;
        height: 100%;
        opacity: 0;
    }
    
        input#file-input2{
        position: absolute;
        top:0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        width: 100%;
        height: 100%;
        opacity: 0;
    }
    
        input#file-input3{
        position: absolute;
        top:0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        width: 100%;
        height: 100%;
        opacity: 0;
    }
    
        input#file-input4{
        position: absolute;
        top:0px;
        left: 0px;
        right: 0px;
        bottom: 0px;
        width: 100%;
        height: 100%;
        opacity: 0;
    }
    
    p#texto{
        text-align: center;
        color: #333; 
        
    }
</style>
<div class="row">
    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
        <div class="panel panel-default" style="border:1px solid rgba(0,0,0,.18);">
          <div class="panel-heading" style="background:#333; color:#fff;"><i class="fa fa-pencil"></i> Datos del articulo a editar  </div>
          <div class="panel-body">
              <h6 style="color:#5cb85c">Los campos con (*) son obligatorios</h6>
                <label for="nombre"  style="font-size: small">Nombre (*)</label>
            	<input type="text" name="nombre" class="form-control" value="{{$articulo->nombre}}" disabled>
                <br>
            	<label for="nombre"  style="font-size: small">Código</label>
            	<input type="text" name="codigo" class="form-control"  value="{{$articulo->codigo}}" disabled>
                <br>
                <div class="row">
                    <div class="col-md-6">
                         <label for="nombre"  style="font-size: small">Categoría (*)</label>
                           <select name="idcategoria" class="form-control">
                               @foreach ($categorias as $cat)
                                @if ($cat->idcategoria==$articulo->idcategoria)
                                   <option value="{{$cat->idcategoria}}" selected>{{$cat->nombre}}</option>
                                   @else
                                   <option value="{{$cat->idcategoria}}">{{$cat->nombre}}</option>
                                   @endif
                                @endforeach
                            </select>
                            
                            
                    </div>
                    
                     <div class="col-md-6">
                         <label for="nombre"  style="font-size: small">SubCategoría (*)</label>
                           <select name="idsubcategoria" class="form-control" id="select-subcategoria">
                                @foreach ($subcategorias as $subcat)
                                @if ($subcat->idsubcategoria==$articulo->idsubcategoria)
                                   <option value="{{$subcat->idsubcategoria}}" selected>{{$subcat->nombre}}</option>
                                   @else
                                   <option value="{{$subcat->idsubcategoria}}">{{$subcat->nombre}}</option>
                                   @endif
                                @endforeach
                            </select>
                    </div>
                </div>
                <br>
                 <div class="row">
                    <div class="col-md-6">
                         <label for="nombre"  style="font-size: small">Tipo(*)</label>
                          <input value="{{$articulo->tipo}}" style="display:none;" id="tip_oc" />
                           <select name="tipo" class="form-control" id="select-tipo">
                                <!---@foreach ($tipos as $tip)
                                    @if ($tip->nombre==$articulo->tipo)
                                   <option value="{{$tip->nombre}}" selected>{{$tip->nombre}}</option>
                                   @else
                                   <option value="{{$tip->nombre}}">{{$tip->nombre}}</option>
                                   @endif
                                  
                                @endforeach-->
                                
                            </select>
                    </div>
                    
                     <div class="col-md-6">
                         <label for="nombre"  style="font-size: small">Marca(*)</label>
                           <select name="marca" class="form-control" >
                             @foreach ($marcas as $mar)
                                    @if ($mar->nombre==$articulo->marca)
                                   <option value="{{$mar->nombre}}" selected>{{$mar->nombre}}</option>
                                   @else
                                    <option value="{{$mar->nombre}}">{{$mar->nombre}}</option>
                                   @endif
                                @endforeach
                            </select>
                    </div>
                </div>
                <br>
                 <div class="row">
                    <div class="col-md-6">
                         <label for="nombre"  style="font-size: small">Material</label>
                           <input value="{{$articulo->material}}" style="display:none;" id="mat_oc" />
                           <select name="material" class="form-control"  id="select-material">
                               
                              <!---@foreach ($materiales as $mat)
                                    @if ($mat->nombre==$articulo->material)
                                   <option value="{{$mat->nombre}}" selected>{{$mat->nombre}}</option>
                                   @else
                                    <option value="-" selected>-</option>
                                    <option value="{{$mat->nombre}}" >{{$mat->nombre}}</option>
                                   @endif
                                @endforeach-->
                            </select>
                    </div>
                    
                     <div class="col-md-6">
                         <label for="nombre" style="font-size: small">Talla</label>
                            <input value="{{$articulo->talla}}" style="display:none;" id="tal_oc" />
                           <select name="talla" class="form-control"  id="select-talla">
                               
                            <!--    @foreach ($tallas as $tall)
                                   @if ($tall->nombre==$articulo->talla)
                                   <option value="{{$tall->nombre}}" selected>{{$tall->nombre}}</option>
                                   @else
                                        <option value="-" selected>-</option>
                                    <option value="{{$tall->nombre}}">{{$tall->nombre}}</option>
                                   @endif
                                @endforeach -->
                            </select>
                    </div>
                    
                </div>
                <!------>
                
             <br>
                  <div class="row">
                      <div class="col-md-4 " >
                          <div class="row">
                             <div id="div_file">
                              <p id="texto"><i class="fa fa-file-image-o"></i> Imagen Principal</p>
                              <input type="file" id="file-input" name="imagen" />
                               @if (($articulo->imagen)!="")
                              <img id="imgSalida" src="{{asset('imagenes/articulos/'.$articulo->imagen)}}" class="img-thumbnail"/>
                               @else
                               <img id="imgSalida" src=""  class="img-thumbnail"/>
                               @endif
                             </div>
                             
                          </div>
                          <div class="row">
                               <img id="img" src="{{asset('img/shop.png')}}"/ style="margin-left:8%;" height="90%" width="80%">
                          </div>
                          
                      </div>
                      
                       <div class="col-md-8">
                           <div class="row">
                               <div class="col-md-6">
                                  <div id="div_file">
                                      <p id="texto"><i class="fa fa-file-image-o"></i> Primera  Imagen</p>
                                      <input type="file" id="file-input1" name="imagen1" />
                                      @if (($articulo->imagen1)!="")
                                      <img id="imgSalida1" src="{{asset('imagenes/articulos/'.$articulo->imagen1)}}" class="img-thumbnail"/>
                                       @else
                                       <img id="imgSalida1" src=""  class="img-thumbnail"/>
                                       @endif
                                  </div>
                               </div>
                               
                               <div class="col-md-6">
                                   <div id="div_file">
                                      <p id="texto"><i class="fa fa-file-image-o"></i> Segunda Imagen</p>
                                      <input type="file" id="file-input2" name="imagen2" />
                                       @if (($articulo->imagen2)!="")
                                      <img id="imgSalida2" src="{{asset('imagenes/articulos/'.$articulo->imagen2)}}" class="img-thumbnail"/>
                                       @else
                                       <img id="imgSalida2" src=""  class="img-thumbnail"/>
                                       @endif
                                       
                                  </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                                  <div id="div_file">
                                      <p id="texto"><i class="fa fa-file-image-o"></i> Tercera Imagen</p>
                                      <input type="file" id="file-input3" name="imagen3" />
                                      @if (($articulo->imagen3)!="")
                                      <img id="imgSalida3" src="{{asset('imagenes/articulos/'.$articulo->imagen3)}}" class="img-thumbnail"/>
                                       @else
                                       <img id="imgSalida3" src=""  class="img-thumbnail"/>
                                       @endif
                                  </div>
                               </div>
                               
                               <div class="col-md-6">
                                   <div id="div_file">
                                      <p id="texto"><i class="fa fa-file-image-o"></i> Cuarta Imagen</p>
                                      <input type="file" id="file-input4" name="imagen4" />
                                      @if (($articulo->imagen4)!="")
                                      <img id="imgSalida4" src="{{asset('imagenes/articulos/'.$articulo->imagen4)}}" class="img-thumbnail"/>
                                       @else
                                       <img id="imgSalida4" src=""  class="img-thumbnail"/>
                                       @endif
                                  </div>
                               </div>
                           </div>
                      </div>
                      
                      
                  </div>   
               
          </div>
        </div>
    </div>
    

     
      <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
        <div class="panel panel-default" style="border:1px solid rgba(0,0,0,.18);">
          <div class="panel-heading" style="background:#333;color:#fff;"><i class="fa fa-bookmark"></i> Precio-Stock </div>
          <div class="panel-body">
              <h6 style="color:#5cb85c">Los campos con (*) son obligatorios</h6>
              <div class="row">
                  <div class="col-md-12">
                        <label for="nombre" style="font-size: small">Precio de Venta (*)</label>
                         <div class="input-group">
                          <span class="input-group-addon">S/.</span>
                          <input  name="precio_venta" required  class="form-control" value="{{$articulo->precio_venta}}">
                      </div>
                  </div>
              </div>
            <br>
            <div class="row">
                  <div class="col-md-6">
                        <label for="nombre" style="font-size: small">Cantidad por volumen </label>
                         <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-archive"></i></span>
                          <input  name="cantidad_volumen" value="{{$articulo->cantidad_volumen}}" class="form-control" type="number">
                      </div>
                  </div>
                   <div class="col-md-6">
                        <label for="nombre" style="font-size: small">Precio por volumen </label>
                         <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-money"></i></span>
                          <input  name="precio_mayor" value="{{$articulo->precio_mayor}}" class="form-control" type="number">
                      </div>
                  </div>
              </div>      
            <br>
           
                 <div class="row">
                  <div class="col-md-6">
                        <label for="nombre" style="font-size: small">Stock mínimo (*)</label>
                         <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-cart-arrow-down"></i></span>
                          <input  name="stockmin" value="{{$articulo->stockmin}}" class="form-control" type="number" >
                      </div>
                  </div>
                   <div class="col-md-6">
                        <label for="nombre" style="font-size: small">Stock(*)</label>
                         <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-cart-plus"></i></span>
                          <input  name="stock" value="{{$articulo->stock}}" class="form-control" type="number">
                      </div>
                  </div>
                </div>  
               <br>
               
               
              </div>
          </div>
        </div>
        
          <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
        <div class="panel panel-default">
          <div class="panel-heading" style="background:#333;color:#fff;"><i class="fa fa-plus"></i> Más detalles </div>
          <div class="panel-body">
             
              <div class="row">
                  <div class="col-md-6">
                        <label for="nombre" style="font-size: small">Color</label>
                            <select name="color" class="form-control">
                                    @if ($articulo->color=='-')
                                   <option value="-" selected>-Ninguno-</option>
                                   <option value="marron" class="marron">Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja">Naranja</option>
                                   <option value="amarillo" class="amarillo">Amarillo</option>
                                   <option value="dorado" class="dorado">Dorado</option>
                                   <option value="olivo" class="olivo">Olivo</option>
                                   <option value="purpura" class="purpura">Purpura</option>
                                   <option value="blanco" class="blanco">Blanco</option>
                                   <option value="verde" class="verde">Verde</option>
                                   <option value="azul" class="azul">Azul</option>
                                   <option value="azul-marino" class="azul-marino">Azul-Marino</option>
                                   <option value="teal" class="teal">Teal</option>
                                   <option value="gris" class="gris">Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @elseif ($articulo->color=='marron')
                                    
                                   <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron"  selected>Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja">Naranja</option>
                                   <option value="amarillo" class="amarillo">Amarillo</option>
                                   <option value="dorado" class="dorado">Dorado</option>
                                   <option value="olivo" class="olivo">Olivo</option>
                                   <option value="purpura" class="purpura">Purpura</option>
                                   <option value="blanco" class="blanco">Blanco</option>
                                   <option value="verde" class="verde">Verde</option>
                                   <option value="azul" class="azul">Azul</option>
                                   <option value="azul-marino" class="azul-marino">Azul-Marino</option>
                                   <option value="teal" class="teal">Teal</option>
                                   <option value="gris" class="gris">Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                  
                                   @elseif ($articulo->color=='rojo')
                                   <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo" selected>Rojo</option>
                                   <option value="naranja" class="naranja">Naranja</option>
                                   <option value="amarillo" class="amarillo">Amarillo</option>
                                   <option value="dorado" class="dorado">Dorado</option>
                                   <option value="olivo" class="olivo">Olivo</option>
                                   <option value="purpura" class="purpura">Purpura</option>
                                   <option value="blanco" class="blanco">Blanco</option>
                                   <option value="verde" class="verde">Verde</option>
                                   <option value="azul" class="azul">Azul</option>
                                   <option value="azul-marino" class="azul-marino">Azul-Marino</option>
                                   <option value="teal" class="teal">Teal</option>
                                   <option value="gris" class="gris">Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @elseif ($articulo->color=='naranja')
                                    <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" selected>Naranja</option>
                                   <option value="amarillo" class="amarillo">Amarillo</option>
                                   <option value="dorado" class="dorado">Dorado</option>
                                   <option value="olivo" class="olivo">Olivo</option>
                                   <option value="purpura" class="purpura">Purpura</option>
                                   <option value="blanco" class="blanco">Blanco</option>
                                   <option value="verde" class="verde">Verde</option>
                                   <option value="azul" class="azul">Azul</option>
                                   <option value="azul-marino" class="azul-marino">Azul-Marino</option>
                                   <option value="teal" class="teal">Teal</option>
                                   <option value="gris" class="gris">Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @elseif ($articulo->color=='amarillo')
                                    <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" selected>Amarillo</option>
                                   <option value="dorado" class="dorado">Dorado</option>
                                   <option value="olivo" class="olivo">Olivo</option>
                                   <option value="purpura" class="purpura">Purpura</option>
                                   <option value="blanco" class="blanco">Blanco</option>
                                   <option value="verde" class="verde">Verde</option>
                                   <option value="azul" class="azul">Azul</option>
                                   <option value="azul-marino" class="azul-marino">Azul-Marino</option>
                                   <option value="teal" class="teal">Teal</option>
                                   <option value="gris" class="gris">Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @elseif ($articulo->color=='dorado')
                                    <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" >Amarillo</option>
                                   <option value="dorado" class="dorado" selected>Dorado</option>
                                   <option value="olivo" class="olivo">Olivo</option>
                                   <option value="purpura" class="purpura">Purpura</option>
                                   <option value="blanco" class="blanco">Blanco</option>
                                   <option value="verde" class="verde">Verde</option>
                                   <option value="azul" class="azul">Azul</option>
                                   <option value="azul-marino" class="azul-marino">Azul-Marino</option>
                                   <option value="teal" class="teal">Teal</option>
                                   <option value="gris" class="gris">Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @elseif ($articulo->color=='olivo')
                                    <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" >Amarillo</option>
                                   <option value="dorado" class="dorado" >Dorado</option>
                                   <option value="olivo" class="olivo" selected>Olivo</option>
                                   <option value="purpura" class="purpura">Purpura</option>
                                   <option value="blanco" class="blanco">Blanco</option>
                                   <option value="verde" class="verde">Verde</option>
                                   <option value="azul" class="azul">Azul</option>
                                   <option value="azul-marino" class="azul-marino">Azul-Marino</option>
                                   <option value="teal" class="teal">Teal</option>
                                   <option value="gris" class="gris">Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @elseif ($articulo->color=='purpura')
                                    <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" >Amarillo</option>
                                   <option value="dorado" class="dorado" >Dorado</option>
                                   <option value="olivo" class="olivo" >Olivo</option>
                                   <option value="purpura" class="purpura" selected>Purpura</option>
                                   <option value="blanco" class="blanco">Blanco</option>
                                   <option value="verde" class="verde">Verde</option>
                                   <option value="azul" class="azul">Azul</option>
                                   <option value="azul-marino" class="azul-marino">Azul-Marino</option>
                                   <option value="teal" class="teal">Teal</option>
                                   <option value="gris" class="gris">Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @elseif ($articulo->color=='blanco')
                                    <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" >Amarillo</option>
                                   <option value="dorado" class="dorado" >Dorado</option>
                                   <option value="olivo" class="olivo" >Olivo</option>
                                   <option value="purpura" class="purpura" >Purpura</option>
                                   <option value="blanco" class="blanco" selected>Blanco</option>
                                   <option value="verde" class="verde">Verde</option>
                                   <option value="azul" class="azul">Azul</option>
                                   <option value="azul-marino" class="azul-marino">Azul-Marino</option>
                                   <option value="teal" class="teal">Teal</option>
                                   <option value="gris" class="gris">Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @elseif ($articulo->color=='Verde')
                                    <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" >Amarillo</option>
                                   <option value="dorado" class="dorado" >Dorado</option>
                                   <option value="olivo" class="olivo" >Olivo</option>
                                   <option value="purpura" class="purpura" >Purpura</option>
                                   <option value="blanco" class="blanco" >Blanco</option>
                                   <option value="verde" class="verde" selected>Verde</option>
                                   <option value="azul" class="azul">Azul</option>
                                   <option value="azul-marino" class="azul-marino">Azul-Marino</option>
                                   <option value="teal" class="teal">Teal</option>
                                   <option value="gris" class="gris">Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @elseif ($articulo->color=='azul')
                                    <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" >Amarillo</option>
                                   <option value="dorado" class="dorado" >Dorado</option>
                                   <option value="olivo" class="olivo" >Olivo</option>
                                   <option value="purpura" class="purpura" >Purpura</option>
                                   <option value="blanco" class="blanco" >Blanco</option>
                                   <option value="verde" class="verde" >Verde</option>
                                   <option value="azul" class="azul" selected>Azul</option>
                                   <option value="azul-marino" class="azul-marino">Azul-Marino</option>
                                   <option value="teal" class="teal">Teal</option>
                                   <option value="gris" class="gris">Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                     @elseif ($articulo->color=='azul-marino')
                                   <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" >Amarillo</option>
                                   <option value="dorado" class="dorado" >Dorado</option>
                                   <option value="olivo" class="olivo" >Olivo</option>
                                   <option value="purpura" class="purpura" >Purpura</option>
                                   <option value="blanco" class="blanco" >Blanco</option>
                                   <option value="verde" class="verde" >Verde</option>
                                   <option value="azul" class="azul" >Azul</option>
                                   <option value="azul-marino" class="azul-marino" selected>Azul-Marino</option>
                                   <option value="teal" class="teal">Teal</option>
                                   <option value="gris" class="gris">Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                   
                                    @elseif ($articulo->color=='teal')
                                   <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" >Amarillo</option>
                                   <option value="dorado" class="dorado" >Dorado</option>
                                   <option value="olivo" class="olivo" >Olivo</option>
                                   <option value="purpura" class="purpura" >Purpura</option>
                                   <option value="blanco" class="blanco" >Blanco</option>
                                   <option value="verde" class="verde" >Verde</option>
                                   <option value="azul" class="azul" >Azul</option>
                                   <option value="azul-marino" class="azul-marino" >Azul-Marino</option>
                                   <option value="teal" class="teal" selected>Teal</option>
                                   <option value="gris" class="gris">Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @elseif ($articulo->color=='gris')
                                   <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" >Amarillo</option>
                                   <option value="dorado" class="dorado" >Dorado</option>
                                   <option value="olivo" class="olivo" >Olivo</option>
                                   <option value="purpura" class="purpura" >Purpura</option>
                                   <option value="blanco" class="blanco" >Blanco</option>
                                   <option value="verde" class="verde" >Verde</option>
                                   <option value="azul" class="azul" >Azul</option>
                                   <option value="azul-marino" class="azul-marino" >Azul-Marino</option>
                                   <option value="teal" class="teal" >Teal</option>
                                   <option value="gris" class="gris" selected>Gris</option>
                                   <option value="gris" class="plata">Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @elseif ($articulo->color=='plata')
                                   <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" >Amarillo</option>
                                   <option value="dorado" class="dorado" >Dorado</option>
                                   <option value="olivo" class="olivo" >Olivo</option>
                                   <option value="purpura" class="purpura" >Purpura</option>
                                   <option value="blanco" class="blanco" >Blanco</option>
                                   <option value="verde" class="verde" >Verde</option>
                                   <option value="azul" class="azul" >Azul</option>
                                   <option value="azul-marino" class="azul-marino" >Azul-Marino</option>
                                   <option value="teal" class="teal" >Teal</option>
                                   <option value="gris" class="gris" >Gris</option>
                                   <option value="gris" class="plata" selected>Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @elseif ($articulo->color=='gray')
                                   <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" >Amarillo</option>
                                   <option value="dorado" class="dorado" >Dorado</option>
                                   <option value="olivo" class="olivo" >Olivo</option>
                                   <option value="purpura" class="purpura" >Purpura</option>
                                   <option value="blanco" class="blanco" >Blanco</option>
                                   <option value="verde" class="verde" >Verde</option>
                                   <option value="azul" class="azul" >Azul</option>
                                   <option value="azul-marino" class="azul-marino" >Azul-Marino</option>
                                   <option value="teal" class="teal" >Teal</option>
                                   <option value="gris" class="gris" >Gris</option>
                                   <option value="gris" class="plata" >Plata</option>
                                   <option value="gray" class="gray" selected>Gray</option>
                                   <option value="negro" class="negro">Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @elseif ($articulo->color=='negro')
                                   <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" >Amarillo</option>
                                   <option value="dorado" class="dorado" >Dorado</option>
                                   <option value="olivo" class="olivo" >Olivo</option>
                                   <option value="purpura" class="purpura" >Purpura</option>
                                   <option value="blanco" class="blanco" >Blanco</option>
                                   <option value="verde" class="verde" >Verde</option>
                                   <option value="azul" class="azul" >Azul</option>
                                   <option value="azul-marino" class="azul-marino" >Azul-Marino</option>
                                   <option value="teal" class="teal" >Teal</option>
                                   <option value="gris" class="gris" >Gris</option>
                                   <option value="gris" class="plata" >Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro" selected>Negro</option>
                                   <option value="multicolor">-Multicolor-</option>
                                   
                                    @else
                                   <option value="-">-Ninguno-</option>
                                   <option value="marron" class="marron" >Marron</option>
                                   <option value="rojo" class="rojo">Rojo</option>
                                   <option value="naranja" class="naranja" >Naranja</option>
                                   <option value="amarillo" class="amarillo" >Amarillo</option>
                                   <option value="dorado" class="dorado" >Dorado</option>
                                   <option value="olivo" class="olivo" >Olivo</option>
                                   <option value="purpura" class="purpura" >Purpura</option>
                                   <option value="blanco" class="blanco" >Blanco</option>
                                   <option value="verde" class="verde" >Verde</option>
                                   <option value="azul" class="azul" >Azul</option>
                                   <option value="azul-marino" class="azul-marino" >Azul-Marino</option>
                                   <option value="teal" class="teal" >Teal</option>
                                   <option value="gris" class="gris" >Gris</option>
                                   <option value="gris" class="plata" >Plata</option>
                                   <option value="gray" class="gray">Gray</option>
                                   <option value="negro" class="negro" >Negro</option>
                                   <option value="multicolor" selected>-Multicolor-</option>
                                   @endif
                            </select>
                  </div>
                  
                   <div class="col-md-6">
                        <label for="nombre" style="font-size: small">Edad</label>
                            <select name="edad" class="form-control">
                                    @foreach ($edades as $ed)
                                    @if ($ed->nombre==$articulo->edad)
                                   <option value="{{$ed->nombre}}" selected>{{$ed->nombre}}</option>
                                   @else
                                    <option value="{{$ed->nombre}}">{{$ed->nombre}}</option>
                                   @endif
                                @endforeach
                            </select>
                  </div>
              </div>
            <br>
            <div class="row">
                  <div class="col-md-6">
                        <label for="nombre" style="font-size: small">Sexo </label>
                        <select name="sexo" class="form-control">
                                   @if ($articulo->sexo=='-')
                                   <option value="-" selected>-Ninguno-</option>
                                   <option value="Unisex">Unisex</option>
                                   <option value="Hombre">Hombre</option>
                                   <option value="Mujer">Mujer</option>
                                   <option value="Niño">Niño</option>
                                   <option value="Niña">Niña</option>
                                   
                                   @elseif ($articulo->sexo=='Unisex')
                                    <option value="-">-Ninguno-</option>
                                   <option value="Unisex" selected>Unisex</option>
                                   <option value="Hombre">Hombre</option>
                                   <option value="Mujer">Mujer</option>
                                   <option value="Niño">Niño</option>
                                   <option value="Niña">Niña</option>
                                   
                                     
                                   @elseif ($articulo->sexo=='Hombre')
                                    <option value="-">-Ninguno-</option>
                                   <option value="Unisex">Unisex</option>
                                   <option value="Hombre" selected>Hombre</option>
                                   <option value="Mujer">Mujer</option>
                                   <option value="Niño">Niño</option>
                                   <option value="Niña">Niña</option>
                                   
                                    @elseif ($articulo->sexo=='Mujer')
                                    <option value="-">-Ninguno-</option>
                                   <option value="Unisex">Unisex</option>
                                   <option value="Hombre">Hombre</option>
                                   <option value="Mujer" selected>Mujer</option>
                                   <option value="Niño">Niño</option>
                                   <option value="Niña">Niña</option>
                                   
                                     @elseif ($articulo->sexo=='Niño')
                                    <option value="-">-Ninguno-</option>
                                   <option value="Unisex">Unisex</option>
                                   <option value="Hombre">Hombre</option>
                                   <option value="Mujer">Mujer</option>
                                   <option value="Niño" selected>Niño</option>
                                   <option value="Niña">Niña</option>
                                   
                                    @else
                                    <option value="-">-Ninguno-</option>
                                   <option value="Unisex">Unisex</option>
                                   <option value="Hombre">Hombre</option>
                                   <option value="Mujer">Mujer</option>
                                   <option value="Niño">Niño</option>
                                   <option value="Niña" selected>Niña</option>
                                   
                                   @endif;
                        </select>
                  </div>
                   <div class="col-md-6">
                        <label for="nombre"  style="font-size: small">Club</label>
                           <select name="club" class="form-control">
                               
                                  @foreach ($clubs as $cl)
                                    @if ($cl->nombre==$articulo->club)
                                   <option value="{{$cl->nombre}}" selected>{{$cl->nombre}}</option>
                                   @else
                                   <option value="{{$cl->nombre}}">{{$cl->nombre}}</option>
                                   @endif
                                @endforeach
                            </select>
                  </div>
              </div>
              <br>
              <div class="row">
                  <div class="col-md-12">
                        <label for="nombre" style="font-size: small">Estado</label>
                        <select name="estado" class="form-control">
                            @if ($articulo->estado=='Activo')
                                <option value="Activo" selected>Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            @else
                               <option value="Inactivo" selected>Inactivo</option>
                                <option value="Activo">Activo</option>
                            @endif
                        </select>
                  </div>
              </div>
              <br>
            <div class="row">
                  <div class="col-md-12">
                        <label for="nombre" style="font-size: small">Nota</label>
                        <input class="form-control" rows="2" id="comment" name="descripcion" value="{{$articulo->descripcion}}"/>
                  </div>
              </div> 
              <br>
              <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                             <button type="submit" class="btn btn-default" style="background:#5cb85c;color:#fff;"> <span class="fa fa-floppy-o"> Guardar</span></button>
                             <button type="reset" class="btn btn-default" style="background:#777;color:#fff;"> <span class="fa fa-close"> Cancelar</span></button>
                        </div>
                           
                      </div>
              </div>     
    
              </div>
            </div>
        </div>
        
    </div>
</div>

			{!!Form::close()!!}		
            
@push ('scripts')
<script src="{{asset('js/JsBarcode.all.min.js')}}"></script>
<script src="{{asset('js/jquery.PrintArea.js')}}"></script>
<script src="{{asset('js/custom-file-input.js')}}"></script>
<script src="{{asset('js/jquery.custom-file-input.js')}}"></script>
<script src="{{asset('js/jquery-v1.min.js')}}"></script>
<script>
function generarBarcode()
{   
    codigo=$("#codigobar").val();
    JsBarcode("#barcode", codigo, {
    format: "EAN13",
    font: "OCRB",
    fontSize: 18,
    textMargin: 0
    });
}
$('#liAlmacen').addClass("treeview active");
$('#liArticulos').addClass("active");


//Código para imprimir el svg
function imprimir()
{
    $("#print").printArea();
}
generarBarcode();
</script>

<script type="text/javascript" language="javascript">
$(window).load(function(){

 $(function() {
  $('#file-input').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida').attr("src",result);
     }
    });
    
    
    $(function() {
  $('#file-input1').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida1').attr("src",result);
     }
    });
    
      $(function() {
  $('#file-input2').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida2').attr("src",result);
     }
    });
    
     $(function() {
  $('#file-input3').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida3').attr("src",result);
     }
    });
    
     $(function() {
  $('#file-input4').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida4').attr("src",result);
     }
    });
  });


 
</script>
<!--SELECT DEPENDIENTES--->
<script>
    
$(document).ready( miFuncion);

    
    
function miFuncion () {
    var subcat_id= $('#select-subcategoria').val();
    var select1=$("#tip_oc").val();
    var select2=$("#mat_oc").val();
    var select3=$("#tal_oc").val();
    
     $.get('/almacen/articulo/edit/'+subcat_id+'/tipos',function(data){
        //para probar lo de abajo
        /*for(var i=0;i<data.length;i++){
            console.log(data[i]);
        }*/
         $('#select-tipo').empty();
        if(data.length==0){
        var  html_select='<option value="-" selected>-Ninguno-</option>';
        }else{
           
        for(var i=0;i<data.length;i++){

            //ahora vengo
            if(select1==data[i].nombre){
              html_select +='<option value="'+data[i].nombre+'" selected>'+data[i].nombre+'</option>';
            }else{
              html_select +='<option value="'+data[i].nombre+'">'+data[i].nombre+'</option>';
           /* console.log(html_select);*/ 
            }

            }
        }
        $('#select-tipo').html( html_select);
    }); 
    
    
      //MATERIAL
    
      $.get('/almacen/articulo/edit/'+subcat_id+'/materiales',function(data1){
     
         $('#select-material').empty();
        if(data1.length==0){
            var   html_select1='<option value="-">-Ninguno-</option>';
        }else{

            for(var i=0;i<data1.length;i++){
                if(select2==data1[i].nombre){
                html_select1 +='<option value="'+data1[i].nombre+'" selected>'+data1[i].nombre+'</option>';
                }else{
                html_select1 +='<option value="'+data1[i].nombre+'">'+data1[i].nombre+'</option>';
                    }
           
            }
        
        }
         $('#select-material').html( html_select1);
    });
    
    //TALLAS
    
       $.get('/almacen/articulo/edit/'+subcat_id+'/tallas',function(data2){
 
 
         $('#select-talla').empty();
           if(data2.length==0){
          var  html_select2='<option value="-">-Ninguno-</option>';
           }else{
                for(var i=0;i<data2.length;i++){
                    console.log('este es num tallas'+data2.length);
                    if(select3==data2[i].nombre){
                    html_select2 +='<option value="'+data2[i].nombre+'" selected>'+data2[i].nombre+'</option>';
                    }else{
                    html_select2 +='<option value="'+data2[i].nombre+'">'+data2[i].nombre+'</option>';
                        }
               
                }
           }
            $('#select-talla').html( html_select2);  
    });
       
}

</script>
<script> 
    
    
    
$(function(){
    $('#select-subcategoria').on('change',ondata);
    
});

function ondata(){
   var subcat_id= $(this).val();
    //AJAX
    
    $.get('/almacen/articulo/edit/'+subcat_id+'/tipos',function(data){
       
        var html_select='<option value="-">-Seleccione Tipo-</option>';
         $('#select-tipo').empty();
        if(data.length==0){
            html_select +='<option value="-">-Ninguno-</option>';
        }else{
        for(var i=0;i<data.length;i++){
            html_select +='<option value="'+data[i].nombre+'">'+data[i].nombre+'</option>';
           /* console.log(html_select);*/
            
            }
        }
        $('#select-tipo').html( html_select);
    });
    
    //MATERIAL
    
      $.get('/almacen/articulo/edit/'+subcat_id+'/materiales',function(data1){
     
        var html_select1='<option value="-">-Seleccione material-</option>';
         $('#select-material').empty();
        if(data1.length==0){
               html_select1 +='<option value="-">-Ninguno-</option>';
        }else{

            for(var i=0;i<data1.length;i++){
                console.log("Esto es material cuando cambio"+data1.length);
                html_select1 +='<option value="'+data1[i].nombre+'">'+data1[i].nombre+'</option>';
               //console.log(html_select);
           
            }
        
        }
         $('#select-material').html( html_select1);
    });
    
    //TALLAS
    
       $.get('/almacen/articulo/edit/'+subcat_id+'/tallas',function(data2){
 
        var html_select2='<option value="-">-Seleccione Talla-</option>';
         $('#select-talla').empty();
           if(data2.length==0){
            html_select2 +='<option value="-">-Ninguno-</option>';
           }else{
                for(var i=0;i<data2.length;i++){
                    html_select2 +='<option value="'+data2[i].nombre+'">'+data2[i].nombre+'</option>';
                   //console.log(html_select);
               
                }
           }
            $('#select-talla').html(html_select2);  
    });

}

</script>
@endpush
@endsection