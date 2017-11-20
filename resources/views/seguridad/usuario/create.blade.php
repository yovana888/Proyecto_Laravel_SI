
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-create">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 15px 15px 15px 15px;">
			<div class="modal-header" style="background:#333; border-radius: 10px 10px 0px 0px;">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-close" style="color:#fff"></i></span>
                </button>
                 <h5 class="modal-title" style="color:#fff;"><span class="label label" style="color:#fff; background:#019299; font-size:12px;">Nuevo Usuario:</span></h5>
			</div>
			<div class="modal-body" style="background:#f8f8f8; border-radius: 0px 0px 10px 10px; ">
                     <!--Eso es pq me retorna categoria-->
                     
                     @if (count($errors)>0)
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                </ul>
                            </div>
                         </div>
                     @endif
                     
                        {!!Form::open(array('url'=>'seguridad/usuario','method'=>'POST','autocomplete'=>'off'))!!}
                        {{Form::token()}}
  <span class="label label-success">Datos Personales</span>
  <br>
  <br>
<div class="row">
    	<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
    	      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name"  style="color:#019299;">Nombres y Apellidos</label>

                         
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nombres y apellidos" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                          
              </div>
    	</div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="direccion" style="color:#019299;">Dirección</label>
                <input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" placeholder="Dirección...">
            </div>
        </div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email"  style="color:#019299;">E-Mail</label>

                          
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email..." required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                          
                </div>
    	</div>
    	
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="num_documento" style="color:#019299;">DNI</label>
            	<input type="text" name="dni" value="{{old('dni')}}" class="form-control" placeholder="dni..">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="telefono" style="color:#019299;">Teléfono</label>
            	<input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Teléfono...">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" style="color:#019299;">Password</label>

                      
                                <input id="password" type="password" class="form-control" name="password" placeholder="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          
             </div>
    	</div>
    	
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" style="color:#019299;">Confirm Password</label>

                           
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
    	</div>
    	
    </div>   
      
    <span class="label label-success">Permisos</span>
     
   <div class="row">
       <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         
          @if(Auth::user()->s_actual=='Almacen-Central')
           <div class="checkbox">
              <label><input type="checkbox" value="1" name="ma">Menú Almacén</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="1" name="mc">Menú Compras</label>
            </div>
            <div class="checkbox ">
              <label><input type="checkbox" value="1" name="mt">Menú Traslados</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="1" name="mp">Menú Pedidos</label>
            </div>
          
             
            @elseif(Auth::user()->s_actual=='Sucursal')
            
            <div class="checkbox ">
              <label><input type="checkbox" value="1" name="mt">Menú Traslados</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="1" name="mp">Menú Pedidos</label>
            </div>
            <div class="checkbox ">
              <label><input type="checkbox" value="1" name="mm">Menú Movimientos</label>
            </div>
            
            @else
            <div class="checkbox ">
              <label><input type="checkbox" value="1" name="mt">Menú Traslados</label>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="1" name="mp">Menú Pedidos</label>
            </div>
            <div class="checkbox ">
              <label><input type="checkbox" value="1" name="mm">Menú Movimientos</label>
            </div>
          
            @endif

       </div>
       <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          @if(Auth::user()->s_actual=='Almacen-Central')
          
            <div class="checkbox ">
              <label><input type="checkbox" value="1" name="mm">Menú Movimientos</label>
            </div>
              <div class="checkbox">
              <label><input type="checkbox" value="1" name="mj">Menú Caja</label>
            </div>
            <div class="checkbox ">
              <label><input type="checkbox" value="1" name="mk">Menú Kardex</label>
            </div>
             
            @elseif(Auth::user()->s_actual=='Sucursal')
            
          
              <div class="checkbox">
              <label><input type="checkbox" value="1" name="mj">Menú Caja</label>
            </div>
            <div class="checkbox ">
              <label><input type="checkbox" value="1" name="mk">Menú Kardex</label>
            </div>
             <div class="checkbox ">
              <label><input type="checkbox" value="1" name="mv">Menú Ventas</label>
            </div>
            @else
           
              <div class="checkbox">
              <label><input type="checkbox" value="1" name="mj">Menú Caja</label>
            </div>
            <div class="checkbox ">
              <label><input type="checkbox" value="1" name="mk">Menú Kardex</label>
            </div>
            @endif

         
       </div>
   </div>
		        
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" style=" background:#019299;" >Guardar</button>
			</div>
    {!!Form::close()!!}	
		</div>
	</div>

                
</div>

<style>

</style>


