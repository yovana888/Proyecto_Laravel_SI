
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-plus-{{$cr->idcredito}}">
{!!Form::open(array('url'=>'compras/credito','method'=>'POST','autocomplete'=>'off'))!!}
	<div class="modal-dialog ">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#444; height:70px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
        </button>
           <h3 class="modal-title " style="color:#fff; "><i class="ti-menu"></i> Detalles del Crédito de la {{ $cr->tipo_comprobante}}: {{$cr->serie_comprobante}} - {{$cr->num_comprobante}}</h3>
			</div>
			<div class="modal-body" style="background:#f8f8f8;">
        <div class="table-responsive">
        <table class="table">
        <thead>
          <tr>
						<th>id</th>
            <th>Fecha de Pago</th>
            <th>Monto Pagado</th>
          </tr>
        </thead>
        <tbody>
          @foreach($detalles as $dt)
          @if($dt->idcredito==$cr->idcredito)
          <tr>
            <tr>
                <td>{{ $dt->idcredito}}</td>
                <td>{{ $dt->fecha_pago}}</td>
                <td>S/. {{ $dt->monto}}</td>

            </tr>

          </tr>
          @endif
        @endforeach
        </tbody>
      </table>
      </div>
      <div class="row">


        <h5 class=""><span class="label label" style="color:#fff; font-size:12px; background:#5cb85c; margin-left:2%;">Nuevo de Pago</span></h5>

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                   <div class="input-group" style="margin-left:5px;">
                      <span class="input-group-addon" id="basic-addon1">Monto S/.</span>
                      <input type="number" step="any" class="form-control" placeholder="Monto..." aria-describedby="basic-addon1" name="monto" required>
                    </div>

               </div>

               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                     <div class="input-group">
                      <span class="input-group-addon" id="basic-addon1">Fecha Prox.</span>
                      <input type="date" class="form-control" aria-describedby="basic-addon1" name="fecha_px" >
                    </div>
               </div>

							 <input type="text" name="total" value="{{$cr->total}}" hidden="hidden"/>
							 <input type="text" name="resto" value="{{$cr->resto}}"  hidden="hidden">
							 <input type="text" name="idcre" value="{{$cr->idcredito}}"  hidden="hidden">
							 <input type="text" name="idi" value="{{$cr->idingreso}}"  hidden="hidden"/>
      </div>
			</div>
			 {!!Form::close()!!}
			<div class="modal-footer">

				<button type="reset" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        @if($cr->resto=='0')
        <button type="submit" class="btn btn-pink" disabled>Guardar</button>
        @else
          <button type="submit" class="btn btn-pink" >Guardar</button>
        @endif

			</div>

		</div>
	</div>



</div>
@push ('scripts')

<script type="text/javascript">

</script>
@endpush
