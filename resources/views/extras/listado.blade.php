
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-{{$det->iddetalle_articulo}}" style="position:fixed;background:rgba(0,0,0,.53)">
	<div class="modal-dialog" style=" margin-top:70px;">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;" >
			<div class="modal-header" style=" height:50px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="ti-close" style="color:#000"></i></span>
        </button>
                 <h5 class="modal-title " style="color:#ff7676;font-weight:bold"><i class="ti-menu"></i> Proveedores de {{$det->articulo_com}}</h5>
			</div>
			<div class="modal-body" style="background:#fff;">
            <!--Vamos a comprobar si hay proveedores para dicho articulo, si la hay q los muestre-->
          <div class="" >
						@foreach($proveedores as $pr)
						 @if($pr->idarticulo==$det->iddetalle_articulo)
							<p style="color:#888;"><i class="ti-check" style="color:#888"></i> {{$pr->nombre}}/ {{$pr->email}}-{{$pr->telefono}}</p>
							@endif
						@endforeach
          </div>
      </div>

		</div>
	</div>
</div>
