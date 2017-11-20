
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-edit-{{$ed->idedad}}">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#444; height:70px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
        </button>
                 <h3 class="modal-title " style="color:#fff; "><i class="ti-pencil"></i> Editar Unidad</h3>
			</div>
			<div class="modal-body" style="background:#f8f8f8;">
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

                     	{!!Form::model($ed,['method'=>'PATCH','route'=>['almacen.edad.update',$ed->idedad]])!!}
                        {{Form::token()}}
                    <div class="form-group">
                        <label for="nombre" style="color:#888;">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{$ed->nombre}}" placeholder="Nombre..." style="color:#777;">
                    </div>




                     <div class="form-group">
                      <label for="descripcion" style="color:#888;">Estado</label>
            	     <select name="estado" class="form-control">
                        @if ($ed->estado=='Activo')
                            <option value="Activo" selected>Activo</option>
                            <option value="Inactivo">Inactivo</option>
                        @else
                           <option value="Inactivo" selected>Inactivo</option>
                            <option value="Activo">Activo</option>
                        @endif
                    </select>
                    </div>

			</div>
			<div class="modal-footer" >
				<button type="reset" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn" style="background:#ff5252;color:#fff;">Guardar</button>
			</div>
    {!!Form::close()!!}
		</div>
	</div>

  <!---<button class="btn btn-success" type="button" onclick="generarBarcode()">Generar</button>--->

</div>

<style>

</style>
