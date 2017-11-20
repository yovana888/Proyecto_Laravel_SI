
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-edit-{{$per->idpersona}}">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 15px 15px 15px 15px;">
			<div class="modal-header" style="background:#333; border-radius: 10px 10px 0px 0px;">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-close" style="color:#fff"></i></span>
                </button>
                 <h5 class="modal-title" style="color:#fff;"><span class="label label" style="color:#fff; background:#019299; font-size:12px;">Editar Cliente:</span><span style="color:#d9d6d8;"> {{ $per->nombre}}</span></h5>
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
                     
                     	{!!Form::model($per,['method'=>'PATCH','route'=>['ventas.cliente.update',$per->idpersona]])!!}
                        {{Form::token()}}
                 
                       <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre" style="color:#019299;">Nombre</label>
                <input type="text" name="nombre" required value="{{$per->nombre}}" class="form-control" placeholder="Nombre...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="direccion" style="color:#019299;">Dirección</label>
                <input type="text" name="direccion" value="{{$per->direccion}}" class="form-control" placeholder="Dirección...">
            </div>
        </div>
        
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="direccion" style="color:#019299;">RUC</label>
                <input type="text" name="ruc" value="{{$per->ruc}}" class="form-control" placeholder="RUC...">
            </div>
        </div>
       
       
       
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="num_documento" style="color:#019299;">DNI</label>
                <input type="text" name="num_documento" value="{{$per->num_documento}}" class="form-control" placeholder="Número de Documento...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="telefono" style="color:#019299;">Teléfono</label>
                <input type="text" name="telefono" value="{{$per->telefono}}" class="form-control" placeholder="Teléfono...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion" style="color:#019299;">Email</label>
                <input type="email" name="email" value="{{$per->email}}" class="form-control" placeholder="Email...">
            </div>
        </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion" style="color:#019299;">Estado</label>
            	     <select name="estado" class="form-control">
                        @if ($per->estado=='Activo')
                            <option value="Activo" selected>Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        @else
                           <option value="Inactivo" selected>Inactivo</option>
                            <option value="Activo">Activo</option>
                        @endif
                    </select>
            </div>
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


