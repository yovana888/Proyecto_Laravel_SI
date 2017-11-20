@extends ('layouts.admin')
@section ('contenido')
<style>
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
    
    
</style>
<div class="row" style="background:#f5f5f5; margin-top:-10px;">
@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
@endif

	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	    <div class="row" style="text-align:center;">
	         <div id="div_file">
                              <p id="texto" style="text-align:center; display:none;"><i class="fa fa-file-image-o" ></i> Foto de Perfil</p>
                             
                               <input type="file" id="file-input" name="imagen" />
                              @if(Auth::user()->foto=='')
                              <img id="imgSalida"  src="{{asset('imagenes/usuarios/F3.png')}}" alt="{{Auth::user()->foto}}" height="80px" width="80px" class="img-thumbnail" >
                             @else
                              <img id="imgSalida" src="{{asset('imagenes/usuarios/'.Auth::user()->foto)}}" alt="{{Auth::user()->foto}}" height="100px" width="100px" class="img-thumbnail">
                             @endif
             </div>
	    </div>
	    <div class="row">
              <div style="margin-left: 15%;">
               

                  <button class="btn btn-warning" style=" background:#3C4858; border:none;" class="fa fa-plus" data-toggle="tooltip" data-placement="bottom" title="Editar" id="ed"><i class="fa fa-edit"></i></button>        
                  
                   
                   
                    <button class="btn btn-success" style="background:#4CAF50;; border:none;" class="fa fa-plus" data-toggle="tooltip" data-placement="bottom" title="Guardar Cambios" type="submit"><i class="fa fa-floppy-o"></i></button> 

                   <button class="btn btn-danger" style=" border:none;" class="fa fa-plus" data-toggle="tooltip" data-placement="bottom" title="Cancelar" id="cl"><i class="fa fa-close"></i></button>         

                
              </div>
            
            <div id="pss">
                  <div class="">
                               <div class="col-md-8" style="margin-left:2%;">
                               <label for="password" style="color:#3C4858;">Password</label>
                                
                                    
                                     <input type="password" class="password form-control" name="password" disabled class="form-control" id="password2"/>
                                   
                                
                                </div>
                    </div>

                        <div class="form-group">
                            <div class="col-md-8" style="margin-left:2%;">
                            <label for="password-confirm" style="color:#3C4858;">Confirmar Password</label>
                                
                                <input type="password" class="confpass form-control" name="confpass"  disabled id="password_confirmation"/>
                            </div>
                        </div>
                        
                      
            </div>
                        
                   
	    </div>
	  
	    <br>
	     
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
    <br>
     <span class="label label-success" style="font-size:12px;">Datos Personales:</span>
	    <div class="row">
           <br>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                  <label for="nombre" style="color:#019299;">Nombre:</label>
        
                <input name="name" aria-describedby="basic-addon1" style="outline:none; border:none;border-bottom:1px solid rgba(0,0,0,.13); background:none;letter-spacing:1px; color:#3C4858; font-size:14px;" class="form-control" value="{{Auth::user()->name}}" disabled id="name" type="text">
             
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                 <label for="nombre" style="color:#019299;">E-mail:</label>
                 <input aria-describedby="basic-addon1"style="outline:none; border:none;border-bottom:1px solid rgba(0,0,0,.13); background:none;letter-spacing:1px; color:#3C4858; font-size:14px;" class="form-control" value="{{Auth::user()->email}}" disabled id="email" type="text">
            </div>
	       
	    </div>
	    
	      <div class="row">
           <br>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                  <label for="nombre" style="color:#019299;">DNI:</label>
                 <input aria-describedby="basic-addon1"style="outline:none; border:none;border-bottom:1px solid rgba(0,0,0,.13); background:none;letter-spacing:1px; color:#3C4858; font-size:14px;" class="form-control" value="{{Auth::user()->dni}}" disabled id="dni" type="text">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                 <label for="nombre" style="color:#019299;">Dirección:</label>
                 <input aria-describedby="basic-addon1"style="outline:none; border:none;border-bottom:1px solid rgba(0,0,0,.13); background:none;letter-spacing:1px; color:#3C4858; font-size:14px;" class="form-control" value="{{Auth::user()->direccion}}" disabled id="direccion" type="text">
            </div>
	       
	    </div>
	    
	     <div class="row">
           <br>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                  <label for="nombre" style="color:#019299;">Teléfono / Celular:</label>
                 <input aria-describedby="basic-addon1"style="outline:none; border:none;border-bottom:1px solid rgba(0,0,0,.13); background:none;letter-spacing:1px; color:#3C4858; font-size:14px;" class="form-control" value="{{Auth::user()->telefono}}" disabled id="telefono" type="text">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 form-group">
                 <label for="nombre" style="color:#019299;">Rol:</label>
                 <input aria-describedby="basic-addon1"style="outline:none; border:none;border-bottom:1px solid rgba(0,0,0,.13); background:none;letter-spacing:1px; color:#3C4858; font-size:14px;" class="form-control" value="{{Auth::user()->rol_actual}}" disabled id="" type="text">
            </div>
	       
	    </div>
	    <br>
	     <span class="label label-success" style="font-size:12px;">Permisos Otorgados:</span>
	     
	     <div class="row">
	           <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         
          @if(Auth::user()->s_actual=='Almacen-Central')
          
                  @if(Auth::user()->m_almacen=='1')
                   <div class="checkbox">
                      <label><input type="checkbox" value="1" name="ma" checked disabled>Menú Almacén</label>
                    </div>
                  @else
                   <div class="checkbox">
                      <label><input type="checkbox" value="1" name="ma" disabled>Menú Almacén</label>
                    </div>
                  @endif

                  @if(Auth::user()->m_compras=='1')
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mc" checked disabled>Menú Compras</label>
                    </div>
                  @else
                  <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mc" disabled>Menú Compras</label>
                    </div>
                  @endif

                  @if(Auth::user()->m_traslado=='1')
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mt" checked disabled>Menú Traslados</label>
                    </div>
                  @else
                     <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mt" disabled>Menú Traslados</label>
                    </div>
                  @endif

                  @if(Auth::user()->m_pedido=='1') 

                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mp" checked disabled>Menú Pedidos</label>
                    </div>
                  @else

                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mp" disabled>Menú Pedidos</label>
                    </div>
                  @endif

             
            @elseif(Auth::user()->s_actual=='Sucursal')
            
                 
                  @if(Auth::user()->m_traslado=='1') 
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mt" checked disabled>Menú Traslados</label>
                    </div>
                  @else
                  <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mt" disabled>Menú Traslados</label>
                    </div>
                  @endif

                  @if(Auth::user()->m_pedido=='1') 
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mp" checked disabled>Menú Pedidos</label>
                    </div>
                  @else
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mp" disabled>Menú Pedidos</label>
                    </div>
                  @endif
                  
                  @if(Auth::user()->m_movimiento=='1') 
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mm" checked disabled>Menú Movimientos</label>
                    </div>
                  @else
                  <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mm" disabled>Menú Movimientos</label>
                    </div>
                @endif
                
                
            @else
                     @if(Auth::user()->m_movimiento=='1') 
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mt" checked disabled>Menú Traslados</label>
                    </div>
                    @else
                      <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mt" disabled>Menú Traslados</label>
                    </div>
                    @endif
                    
                    @if(Auth::user()->m_pedido=='1')
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mp" checked disabled>Menú Pedidos</label>
                    </div>
                    @else
                     <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mp" disabled>Menú Pedidos</label>
                    </div>
                    @endif
                    
                    @if(Auth::user()->m_movimiento=='1')
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mm" checked disabled>Menú Movimientos</label>
                    </div>
                    @else
                     <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mm" disabled>Menú Movimientos</label>
                    </div>
                    @endif
          
            @endif

       </div>
       <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          @if(Auth::user()->s_actual=='Almacen-Central')
                  
                   @if(Auth::user()->m_movimiento=='1')
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mm" checked disabled>Menú Movimientos</label>
                    </div>
                    @else
                     <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mm" disabled>Menú Movimientos</label>
                    </div>
                    @endif
                
                     @if(Auth::user()->m_caja=='1')
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mj" checked disabled>Menú Caja</label>
                    </div>
                    @else
                     <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mj" disabled>Menú Caja</label>
                    </div>
                    @endif
                     
                    @if(Auth::user()->m_kardex=='1')
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mk" checked disabled>Menú Kardex</label>
                    </div>
                    @else
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mk" disabled>Menú Kardex</label>
                    </div>
                    @endif

            @elseif(Auth::user()->s_actual=='Sucursal')
            
             
                 @if(Auth::user()->m_caja=='1')
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mj" checked disabled>Menú Caja</label>
                    </div>
                    @else
                     <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mj" disabled>Menú Caja</label>
                    </div>
                    @endif
                     
                    @if(Auth::user()->m_kardex=='1')
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mk" checked disabled>Menú Kardex</label>
                    </div>
                    @else
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mk" disabled>Menú Kardex</label>
                    </div>
                    @endif
                    
                    
                   @if(Auth::user()->m_venta=='1')
                     <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mv" checked disabled>Menú Ventas</label>
                    </div>
                    @else
                      <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mv" disabled>Menú Ventas</label>
                    </div>
                    @endif
            @else
                      @if(Auth::user()->m_caja=='1')
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mj" checked disabled>Menú Caja</label>
                    </div>
                    @else
                     <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mj" disabled>Menú Caja</label>
                    </div>
                    @endif
                     
                    @if(Auth::user()->m_kardex=='1')
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mk" checked disabled>Menú Kardex</label>
                    </div>
                    @else
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mk" disabled>Menú Kardex</label>
                    </div>
                    @endif
            @endif

         	<br>
           <br> 
       </div>
       
	     </div>
	</div>
	<br>

	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
	    <span class="label label-danger" style="margin-left:3%;"><i class="fa fa-exclamation-triangle"></i> Aviso</span>
	    <div class="row">
           <div class="col-md-8" style="margin-left:2%;">
            <div class="well" align="justify" style="background:#eee;">
	          Modifique su contraseña una vez que se haya creado la cuenta, y el correo que Ud. proporciono debe estar activo, con el fin de que se pueda recuperar su contraseña en caso de olvido, como tambien su email debe ser único entre los demás usuarios. 
	           </div>
           </div>
	       
	    </div>
	    
	    <div class="row">
	         <img   src="{{asset('img/u.png')}}" style="height:60px; width:60px; margin-left:26%;">
	    </div>
	</div>


</div>

@push ('scripts')
<script src="{{asset('js/custom-file-input.js')}}"></script>
<script src="{{asset('js/jquery.custom-file-input.js')}}"></script>
<script src="{{asset('js/jquery-v1.min.js')}}"></script>
<script>
   $(document).ready(function() {
    $('#submit').click(function(event){
    
        data = $('.password').val();
        var len = data.length;
        
        if(len < 1) {
            alert("La contraseña no puede estar en blanco");
            // Prevent form submission
            event.preventDefault();
        }
         
        if($('.password').val() != $('.confpass').val()) {
            alert("La Contraseña y la confirmación de contraseña no coinciden");
            // Prevent form submission
            event.preventDefault();
        }
         
    });
});
</script>
<script>
  
    $("#ed").click(function() {
     fun(); 
    });
    
  function fun(){
    $("#name").prop('disabled', false);
    $("#direccion").prop('disabled', false);
    $("#telefono").prop('disabled', false);
    $("#email").prop('disabled', false);
    $("#password2").prop('disabled', false);
    $("#password_confirmation").prop('disabled', false);
    $("#dni").prop('disabled', false);
    
  }
   $("#cl").click(function() {
     fun2(); 
    });
    
 function fun2(){
    $("#name").prop('disabled', true);
    $("#direccion").prop('disabled',  true);
    $("#telefono").prop('disabled',  true);
    $("#email").prop('disabled',  true);
    $("#password2").prop('disabled',  true);
    $("#password_confirmation").prop('disabled',  true);
    $("#dni").prop('disabled',  true);
    
  }

</script>
<script>
$('#liAcceso').addClass("treeview active");
$('#liCuenta').addClass("active");
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
    
 });
</script>
    
@endpush
@endsection