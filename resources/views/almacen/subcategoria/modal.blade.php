<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-delete-{{$subcat->idsubcategoria}}">
	{{Form::Open(array('action'=>array('SubcategoriaController@destroy',$subcat->idsubcategoria),'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#444; height:70px;">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
										 <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
				</button>
              <h3 class="modal-title " style="color:#fff; "><i class="ti-alert"></i> Desactivar Subcategoría</h3>
			</div>
			<div class="modal-body">
					<h4 class="text-muted">Confirme si desea Desactivar la Subcategoría</h4>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn" style="background:#ff5252; color:#fff;">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>
