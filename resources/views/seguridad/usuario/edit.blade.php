
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-edit-{{$usu->iduser_sucursal}}">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 15px 15px 15px 15px;">
			<div class="modal-header" style="background:#333; border-radius: 10px 10px 0px 0px;">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-close" style="color:#fff"></i></span>
                </button>
                 <h5 class="modal-title" style="color:#fff;"><span class="label label" style="color:#fff; background:#019299; font-size:12px;">Editar Usuario:</span><span style="color:#d9d6d8;"> {{$usu->name}}</span></h5>
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
                     
                     	{!!Form::model($usu,['method'=>'PATCH','route'=>['seguridad.usuario.update',$usu->iduser_sucursal]])!!}
                        {{Form::token()}}
                 
     <span class="label label-success">Datos Personales</span>
      <br>
      <br>
    <div class="row">
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    	      <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name"  style="color:#019299;">Nombres y Apellidos</label>

                         
                                <input id="name" type="text" class="form-control" name="name" value="{{$usu->name}}" placeholder="Nombres y apellidos" required>

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
                <input type="text" name="direccion" value="{{$usu->direccion}}" class="form-control" placeholder="Dirección...">
            </div>
        </div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		   <div class="form-group">
                            <label for="email"  style="color:#019299;">E-Mail</label>

                          
                                <input id="email" type="email" class="form-control" name="email" value="{{$usu->email}}" placeholder="email...">
                          
                </div>
    	</div>
    	
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="num_documento" style="color:#019299;">DNI</label>
            	<input type="text" name="dni" value="{{$usu->dni}}" class="form-control" placeholder="dni..">
            </div>
    	</div>
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
            	<label for="telefono" style="color:#019299;">Teléfono</label>
            	<input type="text" name="telefono" value="{{$usu->telefono}}" class="form-control" placeholder="Teléfono...">
            </div>
    	</div>
    	
    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    		<div class="form-group">
                <label for="descripcion" style="color:#019299;">Estado</label>
            	     <select name="estado" class="form-control">
                        @if ($usu->estado=='Activo')
                            <option value="Activo" selected>Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        @else
                           <option value="Inactivo" selected>Inactivo</option>
                            <option value="Activo">Activo</option>
                        @endif
                    </select>
            </div>
    	</div>
    	
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" style="display:none;">
    		<div class="form-group">
                <label for="descripcion" style="color:#019299;">User</label>
            	   <input type="text" name="user" value="{{$usu->iduser}}" class="form-control" placeholder=""> 
            </div>
    	</div>
    	
    	 <div class="form-group" style="display:none;">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
             </div>

    	
    </div>   
      
    <span class="label label-success">Permisos</span>
     
   <div class="row">
       <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         
          @if(Auth::user()->s_actual=='Almacen-Central')
          
                  @if($usu->m_almacen=='1')
                   <div class="checkbox">
                      <label><input type="checkbox" value="1" name="ma" checked>Menú Almacén</label>
                    </div>
                  @else
                   <div class="checkbox">
                      <label><input type="checkbox" value="1" name="ma" >Menú Almacén</label>
                    </div>
                  @endif

                  @if($usu->m_compras=='1')
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mc" checked>Menú Compras</label>
                    </div>
                  @else
                  <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mc">Menú Compras</label>
                    </div>
                  @endif

                  @if($usu->m_traslado=='1')
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mt" checked>Menú Traslados</label>
                    </div>
                  @else
                     <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mt" >Menú Traslados</label>
                    </div>
                  @endif

                  @if($usu->m_pedido=='1') 

                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mp" checked>Menú Pedidos</label>
                    </div>
                  @else

                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mp">Menú Pedidos</label>
                    </div>
                  @endif

             
            @elseif(Auth::user()->s_actual=='Sucursal')
            
                 
                  @if($usu->m_traslado=='1') 
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mt" checked>Menú Traslados</label>
                    </div>
                  @else
                  <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mt">Menú Traslados</label>
                    </div>
                  @endif

                  @if($usu->m_pedido=='1') 
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mp" checked>Menú Pedidos</label>
                    </div>
                  @else
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mp">Menú Pedidos</label>
                    </div>
                  @endif
                  
                  @if($usu->m_movimiento=='1') 
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mm" checked>Menú Movimientos</label>
                    </div>
                  @else
                  <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mm">Menú Movimientos</label>
                    </div>
                @endif
                
                
            @else
                     @if($usu->m_movimiento=='1') 
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mt" checked>Menú Traslados</label>
                    </div>
                    @else
                      <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mt">Menú Traslados</label>
                    </div>
                    @endif
                    
                    @if($usu->m_pedido=='1')
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mp" checked>Menú Pedidos</label>
                    </div>
                    @else
                     <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mp">Menú Pedidos</label>
                    </div>
                    @endif
                    
                    @if($usu->m_movimiento=='1')
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mm" checked>Menú Movimientos</label>
                    </div>
                    @else
                     <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mm">Menú Movimientos</label>
                    </div>
                    @endif
          
            @endif

       </div>
       <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
          @if(Auth::user()->s_actual=='Almacen-Central')
                  
                   @if($usu->m_movimiento=='1')
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mm" checked>Menú Movimientos</label>
                    </div>
                    @else
                     <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mm">Menú Movimientos</label>
                    </div>
                    @endif
                
                     @if($usu->m_caja=='1')
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mj" checked>Menú Caja</label>
                    </div>
                    @else
                     <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mj">Menú Caja</label>
                    </div>
                    @endif
                     
                    @if($usu->m_kardex=='1')
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mk" checked>Menú Kardex</label>
                    </div>
                    @else
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mk">Menú Kardex</label>
                    </div>
                    @endif

            @elseif(Auth::user()->s_actual=='Sucursal')
            
             
                 @if($usu->m_caja=='1')
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mj" checked>Menú Caja</label>
                    </div>
                    @else
                     <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mj">Menú Caja</label>
                    </div>
                    @endif
                     
                    @if($usu->m_kardex=='1')
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mk" checked>Menú Kardex</label>
                    </div>
                    @else
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mk">Menú Kardex</label>
                    </div>
                    @endif
                    
                    
                   @if($usu->m_venta=='1')
                     <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mv" checked>Menú Ventas</label>
                    </div>
                    @else
                      <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mv">Menú Ventas</label>
                    </div>
                    @endif
            @else
                      @if($usu->m_caja=='1')
                    <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mj" checked>Menú Caja</label>
                    </div>
                    @else
                     <div class="checkbox">
                      <label><input type="checkbox" value="1" name="mj">Menú Caja</label>
                    </div>
                    @endif
                     
                    @if($usu->m_kardex=='1')
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mk" checked>Menú Kardex</label>
                    </div>
                    @else
                    <div class="checkbox ">
                      <label><input type="checkbox" value="1" name="mk">Menú Kardex</label>
                    </div>
                    @endif
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


