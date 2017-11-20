<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-barras-{{$art->idarticulo}}">
	<div class="modal-dialog">

		<div class="modal-content" style="border-radius: 15px 15px 15px 15px;">
			<div class="modal-header" style="background:#333; border-radius: 10px 10px 0px 0px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-close" style="color:#fff"></i></span>
                </button>
                 <h5 class="modal-title" style="color:#fff;"><span class="label label" style="color:#fff; background:#019299; font-size:12px;">Código de barras de:</span><span style="color:#d9d6d8;"> {{ $art->nombre}}</span></h5>
			</div>
			<div class="modal-body" style="background:#f8f8f8; border-radius: 0px 0px 10px 10px; ">
				<label for="email"  style="color:#019299; font-size:14px;">Numero de Código:</label>
				<input type="text" name="codigo" id="codigobar" value="{{$art->codigo}}" class="form-control" disabled>
				<br>
				 <div id="print">
                <!---   {!!DNS1D::getBarcodeSVG("$art->idarticulo", "C128",1,33,"black")!!}
                   <p>{{$art->codigo}}</p>--->
                    <svg class="barcode"
                      jsbarcode-format="CODE128"
                      jsbarcode-value="{{$art->codigo}}"
                      jsbarcode-textmargin="0"
                      jsbarcode-fontoptions="bold">
                    </svg>
                    <br>
                </div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" style=" background:#019299;" onclick="imprimir()">Imprimir</button>
			</div>
		</div>
	</div>

  <!---<button class="btn btn-success" type="button" onclick="generarBarcode()">Generar</button>--->

@push ('scripts')
<script src="{{asset('js/JsBarcode.all.min.js')}}"></script>
<script src="{{asset('js/jquery.PrintArea.js')}}"></script>

<script>
 JsBarcode(".barcode").init();

      function imprimir()
        {
            $("#print").printArea();

        }

</script>
@endpush

</div>
