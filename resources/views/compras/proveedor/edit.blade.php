
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-edit-{{$per->idpersona}}">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header"  style="background:#444; height:70px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
        </button>
                 <h3 class="modal-title " style="color:#fff; "><i class="ti-pencil"></i> Editar Proveedor</h3>
			</div>
			<div class="modal-body" style="background:#f8f8f8;  ">
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

                     	{!!Form::model($per,['method'=>'PATCH','route'=>['compras.proveedor.update',$per->idpersona]])!!}
                        {{Form::token()}}

                       <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="nombre" style="color:#888;">Nombre</label>
                <input type="text" style="color:#888;" name="nombre" required value="{{$per->nombre}}" class="form-control" placeholder="Nombre...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="direccion" style="color:#888;">Dirección</label>
                <input style="color:#888;" type="text" name="direccion" value="{{$per->direccion}}" class="form-control" placeholder="Dirección...">
            </div>
        </div>

         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="direccion" style="color:#888;">RUC</label>
                <input style="color:#888;" type="text" name="ruc" value="{{$per->ruc}}" class="form-control" placeholder="RUC...">
            </div>
        </div>



        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="num_documento" style="color:#888;">DNI</label>
                <input type="text" style="color:#888;" name="num_documento" value="{{$per->num_documento}}" class="form-control" placeholder="Número de Documento...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="telefono" style="color:#888;">Teléfono</label>
                <input type="text" name="telefono" style="color:#888;" value="{{$per->telefono}}" class="form-control" placeholder="Teléfono...">
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion" style="color:#888;">Email</label>
                <input type="email" style="color:#888;" name="email" value="{{$per->email}}" class="form-control" placeholder="Email...">
            </div>
        </div>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion" style="color:#888;">Cuenta</label>
                <input type="email" style="color:#888;" name="cuenta" value="{{$per->cuenta}}" class="form-control" placeholder="Email...">
            </div>
        </div>
          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="descripcion" style="color:#888;">Estado</label>
            	     <select name="estado" class="form-control" style="color:#888;">
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
				<button type="submit" class="btn btn" style="background:#ff5252;color:#fff;">Guardar</button>
			</div>
    {!!Form::close()!!}
		</div>
	</div>


</div>

<style>

</style>
