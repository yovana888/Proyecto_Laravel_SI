<style media="screen">
._select_color_drop > li > .DORADO ,.btn._select_color > span.DORADO{background-image:url('{{asset("img/dorado.jpg")}}');}
._select_color_drop > li > .PLATEADO ,.btn._select_color > span.PLATEADO{background-image:url('{{asset("img/plata.jpg")}}');}
.DORADO{background-image:url('{{asset("img/dorado.jpg")}}');}
.PLATEADO{background-image:url('{{asset("img/plata.jpg")}}');}
</style>
<div class="modal fade" id="modal-ag-{{$per->idpersona}}" role="dialog">
<div class="modal-dialog">
      <div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
        <div class="modal-header"  style="background:#444; height:70px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
          </button>
          <h3 class="modal-title " style="color:#fff; "><i class="ti-bookmark"></i>Articulos/ {{$per->nombre}}</h3>

        </div>
        <div class="modal-body" style="background:#f8f8f8; ">
		  <h5 class=""><span class="label label" style="color:#fff; font-size:12px; background:#5cb85c;">Articulos designados</span></h5>
          <table class="table " id="tblGrid">
            <thead id="tblHead">
              <tr>
                <th >id</th>
                <th>Nombre del articulo</th>
                <th>Color</th>
                <th>Opción</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($detalles as $det)
                       @if($det->idproveedor==$per->idpersona)
                        <tr>
                            <td>{{ $det->iddetalle_proveedor}}</td>
                            <td>{{ $det->nombre}} {{ $det->color}}</td>
                            <td><input class="{{$det->color}} form-control" style="border:none; width: 25px;height: 25px; border-radius: 4px; cursor:pointer;" data-toggle="tooltip" data-placement="right" title="{{$det->color}}"/></td>
                            <td>
                                <a href="{!!route('Eliminar_detalle',['id_act'=>$det->iddetalle_proveedor])!!}"><button class="btn btn-danger btn-xs"  data-toggle="tooltip" data-placement="bottom" title="Eliminar" ><i class="ti-trash"></i></button></a>
                            </td>
                        </tr>

                        @endif
                @endforeach

            </tbody>
          </table>
          <div class="form-group wr">
                       {!!Form::open(array('url'=>'compras/proveedor/plus/ok','method'=>'POST','autocomplete'=>'off'))!!}
                        {{Form::token()}}
             <h5 class=""><span class="label label" style="color:#fff; font-size:12px; background:#5cb85c;">Nueva designación</span></h5>
                     <input id="proveedor" type="text" value="{{$per->idpersona}}" style="display:none;" name="proveedor">


             <select name="idarticulo" id="idarticulo" class="form-control selectpicker selection" data-live-search="true" required>
                            @foreach($articulos as $art)
                             <option   value="{{$art->iddetalle_articulo}}">{{$art->articulo}} / {{$art->tam_nro1}} {{$art->UN1}} - {{$art->tam_nro2}} {{$art->UN2}}</option>
                             @endforeach

                </select>
          </div>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        <a href="" >	<button type="submit" class="btn btn" style="background:#ff5252;color:#fff;">Designar</button></a>

        </div>
		 {!!Form::close()!!}
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->


@push ('scripts')

<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script>

$( document ).ready(function() {
$('.selectpicker').selectpicker({
      size: 8
});
});

</script>

@endpush
