
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-show-{{$ing->idingreso}}">
	<div class="modal-dialog modal-lg">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#444; height:70px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
        </button>
           <h3 class="modal-title " style="color:#fff; "><i class="ti-menu"></i> Detalles de la {{ $ing->tipo_comprobante}}: {{$ing->serie_comprobante}} - {{$ing->num_comprobante}}</h3>
			</div>
			<div class="modal-body" style="background:#f8f8f8;">
        <table class="table">
        <thead>
          <tr>
						<th style="display:none;">id</th>
            <th>Articulo</th>
						<th>Medida</th>
						<th>IGV</th>
            <th>Cantidad</th>
            <th>P.Unitario</th>
						<th>Dscto</th>
            <th>Importe</th>
						<th class="text-pink">P. Real</th>
						<th class="text-pink">Cant. Detal.</th>
						<th class="text-pink">P. Real U.</th>

          </tr>
        </thead>
        <tbody>
          @foreach($detalles as $dt)
          @if($dt->idingreso==$ing->idingreso)
          <tr>
						<th style="display:none;"><input id="edi-{{$dt->iddetalle_ingreso}}" type="text" name="" value="{{$dt->iddetalle_ingreso}}" ></th>
            <td>{{$dt->nombre}} {{$dt->etiqueta}}</td>
						<td>{{$dt->medida}}</td>
						<td>{{$dt->tipo_igv}}</td>
            <td>{{$dt->cantidad}}</td>
            <td>{{$dt->precio_compra}}</td>
						<td>{{$dt->descuento}}</td>
            <td>{{$dt->importe}}</td>
						<td style="color:#3f51b5;">{{$dt->precio_real}}</td>
						<td style="color:#3f51b5;">{{$dt->cantidad_detalle}}</td>
						<td style="color:#3f51b5;">{{$dt->precio_real_uni}}</td>

          </tr>
          @endif
        @endforeach
        </tbody>
      </table>
			<span class="label label-pink">NOTA</span>
			<p style="color:#888;">{{$ing->nota}}</p>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default" data-dismiss="modal">Cerrar</button>

			</div>

		</div>
	</div>

  <!---<button class="btn btn-success" type="button" onclick="generarBarcode()">Generar</button>--->

</div>
@push ('scripts')

<script type="text/javascript">

</script>
@endpush
