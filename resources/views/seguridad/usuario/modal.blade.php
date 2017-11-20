
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$usu->iduser_sucursal}}">
	{{Form::Open(array('action'=>array('UsuarioController@destroy',$usu->iduser_sucursal),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 15px 15px 15px 15px;">
			<div class="modal-header" style="background:#333; border-radius: 10px 10px 0px 0px;">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
                 <h5 class="modal-title" style="color:#fff;"><span class="label label" style="color:#fff; background:#019299; font-size:12px;">Usuario:</span><span style="color:#d9d6d8;"> {{ $usu->name}}</span></h5>
			</div>
			<div class="modal-body" style="background:#f8f8f8; border-radius: 0px 0px 10px 10px; ">
				<p style=" color:#666; font-size:20px;">Confirme si desea Cambiar el estado del Usuario</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary" style="background:#019299;">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>