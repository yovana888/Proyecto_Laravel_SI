
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-edit-{{$cr->idcredito}}">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#444; height:70px;">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
        </button>
                  <h3 class="modal-title " style="color:#fff; "><i class="ti-pencil"></i> Editar Crédito</h3>
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
                     	{!!Form::model($cr,['method'=>'PATCH','route'=>['compras.credito.update',$cr->idcredito]])!!}
                        {{Form::token()}}
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre" style="color:#888;">Numero de Letras</label>
                        <input type="numer" name="letras" class="form-control" value="{{$cr->cant_letras}}" min="1" style="color:#777;">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group">
                      <label for="nombre" style="color:#888;">Fecha Próxima</label>
                       <input type="date" class="form-control" value="{{$cr->fecha_px}}" aria-describedby="basic-addon1" name="fecha_px" >
                     </div>
                    </div>
                  </div>
                </div>



			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				@if($cr->resto=='0')
				<button type="submit" class="btn btn" style="background:#ff5252;color:#fff;" disabled>Guardar</button>
				@else
				<button type="submit" class="btn btn" style="background:#ff5252;color:#fff;">Guardar</button>
				@endif
			</div>
    {!!Form::close()!!}
		</div>
	</div>

  <!---<button class="btn btn-success" type="button" onclick="generarBarcode()">Generar</button>--->

</div>

<style>

</style>
