<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$ing->idingreso}}">
	{{Form::Open(array('action'=>array('IngresoController@destroy',$ing->idingreso),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#444; height:70px;">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
        </button>
                 <h3 class="modal-title " style="color:#fff; "><i class="ti-alert"></i> Anular Compra</h3>
			</div>
			<div class="modal-body" style="background:#f8f8f8; ">
					<h4 class="text-muted">Confirme si desea Anular la compra, estas accion es irreversible</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-pink">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>
