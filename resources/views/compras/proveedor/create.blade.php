
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-create">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#444; height:70px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
        </button>
          <h3 class="modal-title " style="color:#fff; "><i class="ti-bookmark"></i> Nuevo Proveedor</h3>
			</div>
			<div class="modal-body" style="background:#f8f8f8; ">
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

                    	{!!Form::open(array('url'=>'compras/proveedor','method'=>'POST','autocomplete'=>'off'))!!}
                        {{Form::token()}}

												<div class="row">
												    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
												    		<div class="form-group">
												            	<label for="nombre" style="color:#888;">Nombre</label>
												            	<input type="text"  style="color:#888;" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
												            </div>
												    	</div>
												        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
												            <div class="form-group">
												                <label for="direccion" style="color:#888;">Dirección</label>
												                <input  style="color:#888;" type="text" name="direccion" value="{{old('direccion')}}" class="form-control" placeholder="Dirección...">
												            </div>
												        </div>
												    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
												    		<div class="form-group">
												            	<label for="num_documento" style="color:#888;">RUC</label>
												            	<input  style="color:#888;" type="text" name="ruc" value="{{old('ruc')}}" class="form-control" placeholder="Número de RUC">
												            </div>
												    	</div>

												    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
												    		<div class="form-group">
												            	<label for="num_documento" style="color:#888;">DNI</label>
												            	<input  style="color:#888;" type="text" name="num_documento" value="{{old('num_documento')}}" class="form-control" placeholder="Número de Documento...">
												            </div>
												    	</div>
												    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
												    		<div class="form-group">
												            	<label for="telefono" style="color:#888;">Teléfono</label>
												            	<input  style="color:#888;" type="text" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Teléfono...">
												            </div>
												    	</div>
												    	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
												    		<div class="form-group">
												            	<label for="descripcion" style="color:#888;">Email</label>
												            	<input  style="color:#888;" type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email...">
												            </div>
												    	</div>
															<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
												    		<div class="form-group">
												            	<label for="descripcion" style="color:#888;">Cuenta</label>
												            	<input  style="color:#888;" type="text" name="cuenta" value="" class="form-control" placeholder="Cuenta...">
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

  <!---<button class="btn btn-success" type="button" onclick="generarBarcode()">Generar</button>--->

</div>

<style>

</style>
