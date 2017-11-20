
<div class="modal fade" id="modal-ag-{{$tra->idnotificacion_traslado}}" role="dialog">
<div class="modal-dialog" style="width:55% !important; ">
      <div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
        <div class="modal-header" style="background:#444; height:70px;">

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
          </button>

           <h3 class="modal-title " style="color:#fff; "><i class="ti-list-ol"></i> Detalle Traslado</h3>

        </div>
        <div class="modal-body" style="background:#fff;">
         <div class="table-responsive">
              <table class="table table" id="tblGrid" >
            <thead id="tblHead"> <!--mandando variable-->
              <tr style="color:#888;">
               @if($tra->nuevo=='1') <!--si es nuevo :v-->
                <th style="display:none;">idk</th>
                <th>id</th>
                <th>Articulo</th>
                <th>Cant.</th>
                <th>P.V</th>
                <th>C.1</th>
                <th>P.V.1</th>
                <th>C.2</th>
                <th>P.V.2</th>
                <th>C.3</th>
                <th>P.V.3</th>
                @else
                <th style="display:none;">idk</th>
                <th>id</th>
                <th>Articulo</th>
                <th>Cantidad</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($detalles as $det)
                       @if($det->idnotificacion_tras==$tra->idnotificacion_traslado)
                        <tr style="color:#888;">
                            @if($tra->nuevo=='1')
                            <td style="display:none;">{{$det->iddetalle_traslado}}</td>
                            <td>{{ $det->idarticulo}}</td>
                            <td>{{ $det->articulo}} / {{$det->tam_nro1}} {{$det->UN1}} - {{$det->tam_nro2}} {{$det->UN2}}</td>
                            <td>{{ $det->cantidad}}</td>
                            <td>{{ $det->precio_venta}}</td>
                            <td>{{ $det->cantidad_volumen1}}</td>
                            <td>{{ $det->precio_mayor1}}</td>
                            <td>{{ $det->cantidad_volumen2}}</td>
                            <td>{{ $det->precio_mayor2}}</td>
                            <td>{{ $det->cantidad_volumen3}}</td>
                            <td>{{ $det->precio_mayor3}}</td>
                            @else
                            <td style="display:none;">{{$det->iddetalle_traslado}}</td>
                            <td>{{ $det->idarticulo}}</td>
                            <td>{{ $det->articulo}} / {{$det->tam_nro1}} {{$det->UN1}} - {{$det->tam_nro2}} {{$det->UN2}}</td>
                            <td>{{ $det->cantidad}}</td>
                            @endif



                        </tr>

                        @endif
                @endforeach

            </tbody>
          </table>
         </div>
{!!Form::model($tra,['method'=>'PATCH','route'=>['traslados.entrantes.update',$tra->idnotificacion_traslado]])!!}
         <div class="row">
                <div class="col-md-12">
                    <div class="checkbox row">
                         <div class="col-md-12">
                             <label><input type="checkbox" value="1"  name="rechazar" id="rechazar-{{$tra->idnotificacion_traslado}}"><span class="label label-danger">Rechazar</span></label>
                         </div>
                    </div>

                    <div class="row" id="edi-{{$tra->idnotificacion_traslado}}"  style="display:none;" >
                            <div class="col-md-12">
                                   <input type="text" style="width:100%;" class="form-control" placeholder="Escriba el motivo del rechazo" name="note" id="re-{{$tra->idnotificacion_traslado}}">

                                   <input type="text" class="form-control" value="{{$tra->idemisor}}" name="emisor" style="display:none;">

                                    <input type="text" class="form-control" value="{{$tra->nuevo}}" name="new" style="display:none;">

                            </div>
                    </div>

                    </div>
                </div>

		</div>
        <div class="modal-footer">
         @if($tra->estado=='En espera' || $tra->estado=='Rechazado')
         <a href="" ><button type="submit" class="btn btn-pink" style=" border:none;" id="ac-{{$tra->idnotificacion_traslado}}">Aceptar</button></a>
         @else
         <a href="" ><button type="submit" class="btn btn-pink" style=" border:none;" disabled  id="ac-{{$tra->idnotificacion_traslado}}">Aceptar</button></a>
         @endif

          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>
     {!!Form::close()!!}	
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


@push ('scripts')
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script>

 $( '#rechazar-{{$tra->idnotificacion_traslado}}' ).on( 'click', function() {
    if( $(this).is(':checked') ){
        // Hacer algo si el checkbox ha sido seleccionado
         $("#edi-{{$tra->idnotificacion_traslado}}").css("display", "block");
        $("#ac-{{$tra->idnotificacion_traslado}}").text('Rechazar');
        $("#re-{{$tra->idnotificacion_traslado}}").attr("required", "true");

    } else {
        // Hacer algo si el checkbox ha sido deseleccionado
         $("#edi-{{$tra->idnotificacion_traslado}}").css("display", "none");
        $("#ac-{{$tra->idnotificacion_traslado}}").text('Aceptar');
         $("#re-{{$tra->idnotificacion_traslado}}").attr("required", "false");

    }
});
</script>

@endpush
