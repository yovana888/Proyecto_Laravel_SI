
<div style="background:rgba(255,255,255,.6);" class="modal fade modal-slide-in-right " aria-hidden="true"
role="dialog" tabindex="-1" id="modal-edit-{{$det->iddetalle_articulo}}">
	<div class="modal-dialog " style="width:70% !important;">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#ff5160; height:50px;">

                 <h4 class="modal-title " style="color:#fff; "><i class="ti-pencil"></i> Editar Detalle Articulo [{{$det->codigo}}]</h4>
			</div>
			<div class="modal-body" style="background:#f8f8f8; padding:15px 30px 30px 30px;">
        <div class="row">
          <div class="col-md-12">
            <div class="dropdown" style="margin-left:-10px;">
             <button  class="btn _select_color dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >{{$det->color}}
             <span _text_display="{{$det->color}}" class="color {{$det->color}}"></span></button>
             <ul class="dropdown-menu _select_color_drop" aria-labelledby="dropdownMenu1" >
               <!--rojos-->
               <li><span _text_display="INDIANRED" class="color INDIANRED"></span></li>
               <li><span _text_display="LIGHTCORAL" class="color LIGHTCORAL"></span></li>
               <li><span _text_display="SALMON" class="color SALMON"></span></li>
               <li><span _text_display="LIGHTSALMON" class="color LIGHTSALMON"></span></li>
               <li><span _text_display="CRIMSON" class="color CRIMSON"></span></li>
               <li><span _text_display="RED" class="color RED"></span></li>
                <!--rosas-->
                <li><span _text_display="PINK" class="color PINK"></span></li>
                <li><span _text_display="HOTPINK" class="color HOTPINK"></span></li>
                <li><span _text_display="DEEPPINK" class="color DEEPPINK"></span></li>
                <li><span _text_display="MEDIUMVIOLETRED" class="color MEDIUMVIOLETRED"></span></li>
                <li><span _text_display="PALEVIOLETRED" class="color PALEVIOLETRED"></span></li>
                <!--morados-->
                <li><span _text_display="LAVENDER" class="color LAVENDER"></span></li>
                <li><span _text_display="THISTLE" class="color THISTLE"></span></li>
                <li><span _text_display="VIOLET" class="color VIOLET"></span></li>
                <li><span _text_display="FUCHSIA" class="color FUCHSIA"></span></li>
                <li><span _text_display="REBECCAPURPLE" class="color REBECCAPURPLE"></span></li>
                <li><span _text_display="BLUEVIOLET" class="color BLUEVIOLET "></span></li>
                <li><span _text_display="DARKVIOLET" class="color DARKVIOLET"></span></li>
                <li><span _text_display="PURPLE" class="color PURPLE"></span></li>
                <li><span _text_display="INDIGO" class="color INDIGO"></span></li>
                <li><span _text_display="SLATEBLUE" class="color SLATEBLUE"></span></li>
                <!--azules celestes-->
                <li><span _text_display="DEEPSKYBLUE" class="color DEEPSKYBLUE"></span></li>
                <li><span _text_display="CYAN" class="color CYAN"></span></li>
                <li><span _text_display="TURQUOISE" class="color TURQUOISE"></span></li>
                <li><span _text_display="DODGERBLUE" class="color DODGERBLUE"></span></li>
                <li><span _text_display="BLUE" class="color BLUE"></span></li>
                <li><span _text_display="DARKBLUE" class="color DARKBLUE"></span></li>
                <!--verdes-->
                <li><span _text_display="TEAL" class="color TEAL"></span></li>
                <li><span _text_display="MEDIUMAQUAMARINE " class="color MEDIUMAQUAMARINE"></span></li>
                <li><span _text_display="DARKSEAGREEN" class="color DARKSEAGREEN"></span></li>
                <li><span _text_display="DARKOLIVEGREEN" class="color DARKOLIVEGREEN"></span></li>
                <li><span _text_display="OLIVE" class="color OLIVE"></span></li>
                <li><span _text_display="YELLOWGREEN" class="color YELLOWGREEN"></span></li>
                <li><span _text_display="GREEN" class="color GREEN"></span></li>
                <li><span _text_display="SEAGREEN" class="color SEAGREEN"></span></li>
                <li><span _text_display="MEDIUMSPRINGGREEN " class="color MEDIUMSPRINGGREEN "></span></li>
                <li><span _text_display="LAWNGREEN" class="color LAWNGREEN"></span></li>
                <!--cafes y amarillos-->
                <li><span _text_display="YELLOW" class="color YELLOW"></span></li>
                <li><span _text_display="GOLD" class="color GOLD"></span></li>
                <li><span _text_display="DORADO" class="color DORADO"></span></li>
                <li><span _text_display="ORANGE" class="color ORANGE"></span></li>
                <li><span _text_display="ORANGERED" class="color ORANGERED"></span></li>
                <li><span _text_display="DARKRED" class="color DARKRED"></span></li>
                <li><span _text_display="SIENNA" class="color SIENNA"></span></li>
                <li><span _text_display="CHOCOLATE " class="color CHOCOLATE"></span></li>
                <li><span _text_display="PERU" class="color PERU"></span></li>
                <li><span _text_display="DARKGOLDENROD" class="color DARKGOLDENROD"></span></li>
                <li><span _text_display="GOLDENROD" class="color GOLDENROD"></span></li>
                <li><span _text_display="SANDYBROWN" class="color SANDYBROWN"></span></li>
                <li><span _text_display="ROSYBROWN" class="color ROSYBROWN"></span></li>
                <li><span _text_display="TAN" class="color TAN"></span></li>
                <li><span _text_display="NAVAJOWHITE " class="color NAVAJOWHITE "></span></li>
                <li><span _text_display="BISQUE" class="color BISQUE"></span></li>
                <li><span _text_display="WHITE" class="color WHITE"></span></li>
                <!--grises-->
                <li><span _text_display="LIGHTGRAY" class="color LIGHTGRAY"></span></li>
                <li><span _text_display="PLATEADO" class="color PLATEADO"></span></li>
                <li><span _text_display="DARKGRAY" class="color DARKGRAY"></span></li>
                <li><span _text_display="DIMGRAY " class="color DIMGRAY "></span></li>
                <li><span _text_display="SLATEGRAY" class="color SLATEGRAY"></span></li>
                <li><span _text_display="BLACK" class="color BLACK"></span></li>
                <!--bicolor-->
                <li><span _text_display="BICOLOR1" class="color BICOLOR1"></span></li>
                <li><span _text_display="BICOLOR2" class="color BICOLOR2"></span></li>
                <li><span _text_display="BICOLOR3" class="color BICOLOR3"></span></li>
                <li><span _text_display="BICOLOR4" class="color BICOLOR4"></span></li>
                <li><span _text_display="BICOLOR5" class="color BICOLOR5"></span></li>
                <li><span _text_display="BICOLOR6" class="color BICOLOR6"></span></li>
                <li><span _text_display="BICOLOR7" class="color BICOLOR7"></span></li>
                <li><span _text_display="BICOLOR8" class="color BICOLOR8"></span></li>
                <li><span _text_display="BICOLOR9" class="color BICOLOR9"></span></li>
                <li><span _text_display="BICOLOR10" class="color BICOLOR10"></span></li>
                <li><span _text_display="BICOLOR11" class="color BICOLOR11"></span></li>
                <li><span _text_display="BICOLOR12" class="color BICOLOR12"></span></li>
                <li><span _text_display="BICOLOR13" class="color BICOLOR13"></span></li>
                <li><span _text_display="BICOLOR14" class="color BICOLOR14"></span></li>
                <li><span _text_display="BICOLOR15" class="color BICOLOR15"></span></li>
                <li><span _text_display="BICOLOR16" class="color BICOLOR16"></span></li>
                <li><span _text_display="BICOLOR17" class="color BICOLOR17"></span></li>
                <li><span _text_display="BICOLOR18" class="color BICOLOR18"></span></li>
                <li><span _text_display="BICOLOR19" class="color BICOLOR19"></span></li>
                <li><span _text_display="BICOLOR20" class="color BICOLOR20"></span></li>
                <li><span _text_display="BICOLOR21" class="color BICOLOR21"></span></li>
                <li><span _text_display="BICOLOR22" class="color BICOLOR22"></span></li>
                <li><span _text_display="BICOLOR23" class="color BICOLOR23"></span></li>
                <li><span _text_display="BICOLOR24" class="color BICOLOR24"></span></li>
                <li><span _text_display="BICOLOR25" class="color BICOLOR25"></span></li>
                <li><span _text_display="BICOLOR26" class="color BICOLOR26"></span></li>
                <li><span _text_display="BICOLOR27" class="color BICOLOR27"></span></li>
                <li><span _text_display="BICOLOR28" class="color BICOLOR28"></span></li>
                <li><span _text_display="BICOLOR29" class="color BICOLOR29"></span></li>
                <li><span _text_display="BICOLOR30" class="color BICOLOR30"></span></li>
                <li><span _text_display="BICOLOR31" class="color BICOLOR31"></span></li>
                <li><span _text_display="BICOLOR32" class="color BICOLOR32"></span></li>
                <li><span _text_display="BICOLOR33" class="color BICOLOR33"></span></li>
                <li><span _text_display="BICOLOR34" class="color BICOLOR34"></span></li>
                <li><span _text_display="BICOLOR35" class="color BICOLOR35"></span></li>
                <li><span _text_display="BICOLOR36" class="color BICOLOR36"></span></li>
                <li><span _text_display="BICOLOR37" class="color BICOLOR37"></span></li>
                <li><span _text_display="BICOLOR38" class="color BICOLOR38"></span></li>
                <li><span _text_display="BICOLOR39" class="color BICOLOR39"></span></li>
                <li><span _text_display="BICOLOR40" class="color BICOLOR40"></span></li>
                <li><span _text_display="BICOLOR41" class="color BICOLOR41"></span></li>
                <li><span _text_display="BICOLOR42" class="color BICOLOR42"></span></li>

                <li><span _text_display="BICOLOR44" class="color BICOLOR44"></span></li>
                <li><span _text_display="BICOLOR45" class="color BICOLOR45"></span></li>
                <li><span _text_display="BICOLOR46" class="color BICOLOR46"></span></li>
                <li><span _text_display="BICOLOR47" class="color BICOLOR47"></span></li>
                <li><span _text_display="BICOLOR48" class="color BICOLOR48"></span></li>
                <li><span _text_display="BICOLOR49" class="color BICOLOR49"></span></li>
                <li><span _text_display="BICOLOR50" class="color BICOLOR50"></span></li>
                <li><span _text_display="BICOLOR51" class="color BICOLOR51"></span></li>
                <li><span _text_display="BICOLOR52" class="color BICOLOR52"></span></li>
                <li><span _text_display="BICOLOR53" class="color BICOLOR53"></span></li>
                <li><span _text_display="BICOLOR54" class="color BICOLOR54"></span></li>
                <li><span _text_display="BICOLOR55" class="color BICOLOR55"></span></li>
                <li><span _text_display="BICOLOR56" class="color BICOLOR56"></span></li>
                <li><span _text_display="BICOLOR57" class="color BICOLOR57"></span></li>
                <li><span _text_display="BICOLOR58" class="color BICOLOR58"></span></li>
                <li><span _text_display="BICOLOR59" class="color BICOLOR59"></span></li>
                <li><span _text_display="BICOLOR60" class="color BICOLOR60"></span></li>
                <li><span _text_display="BICOLOR61" class="color BICOLOR61"></span></li>
                <li><span _text_display="BICOLOR62" class="color BICOLOR62"></span></li>

                <li><span _text_display="BICOLOR64" class="color BICOLOR64"></span></li>
                <li><span _text_display="BICOLOR65" class="color BICOLOR65"></span></li>
                <li><span _text_display="BICOLOR66" class="color BICOLOR66"></span></li>
                <li><span _text_display="BICOLOR67" class="color BICOLOR67"></span></li>
                <li><span _text_display="BICOLOR68" class="color BICOLOR68"></span></li>
                <li><span _text_display="BICOLOR69" class="color BICOLOR69"></span></li>
                <li><span _text_display="BICOLOR70" class="color BICOLOR70"></span></li>

                <li><span _text_display="BICOLOR71" class="color BICOLOR71"></span></li>
                <li><span _text_display="BICOLOR72" class="color BICOLOR72"></span></li>
                <li><span _text_display="BICOLOR73" class="color BICOLOR73"></span></li>
                <li><span _text_display="BICOLOR74" class="color BICOLOR74"></span></li>
                <li><span _text_display="MULTICOLOR" class="color MULTICOLOR"></span></li>

             <input type="hidden" name="_color" value="{{$det->color}}"></ul>
         </div>
          </div>

					<div class="row">
						<div class="col-md-3">
							<br>
							<div class="row">
									 <div class="col-md-12">
											 <label for="nombre" style="color:#888;">Estado</label>

									 </div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="row">
										<select name="estado" class="form-control" style="color:#888; margin-left:5px; width:75%;">
												 @if ($det->estado=='Activo')
														 <option value="Activo" selected>Activo</option>
														 <option value="Inactivo">Inactivo</option>
												 @else
														<option value="Inactivo" selected>Inactivo</option>
														 <option value="Activo">Activo</option>
												 @endif
										 </select>
									</div>

									<div class="row">
										<div class="form-group col-md-12"  style="">
											<p style="color:#fff; font-size:3px;">hg</p>
												<label for="nombre" style="color:#888;">Tamaño</label>
													<p style="color:#fff; font-size:0px;">hg</p>
												<div>
													<select name="tama_tx"class="form-control"  style=" border-radius:2px; color:#888;margin-left:2px; width:78%;" id="">
												  @if ($det->tam_tx=='Ancho/Largo')
													 <option value="Ancho/Largo" selected>Ancho/Largo</option>
													 <option value="Numero/Peso">Numero/Peso</option>
													 <option value="Ninguno">Ninguno</option>
												  @elseif ($det->tam_tx=='Numero/Peso')
													 <option value="Ancho/Largo" >Ancho/Largo</option>
													 <option value="Numero/Peso" selected>Numero/Peso</option>
													 <option value="Ninguno">Ninguno</option>
													@else
													 <option value="Ancho/Largo" >Ancho/Largo</option>
													 <option value="Numero/Peso">Numero/Peso</option>
													 <option value="Ninguno" selected>Ninguno</option>
													@endif
												 </select>
												</div>
											</div>
									</div>
									<br>
									 @if ($det->tam_tx=='Ancho/Largo')
									<div class="row" id="" style="margin-left:2px;">
											<div class="input-group" >
													<input type="text" class="form-control" name="tam_nro1" aria-label="" placeholder="Ancho" style="width:60%;color:#888;" value="{{$det->tam_nro1}}">
													<span class="input-group"> <select name="UN1" class="form-control" id="sel1" style="border-left:none; border-radius:2px; color:#888;">
														@if ($det->UN1=='mm')
														<option value="mm" selected>mm</option>
														<option value="cm">cm</option>
														@else
														<option value="mm">mm</option>
														<option value="cm" selected>cm</option>
														@endif
													</select></span>
												</div>
									</div>
									<br>
									<div class="row" id="" style="margin-left:2px;">
										<div class="input-group">
												<input type="text" name="tam_nro2" class="form-control" aria-label="" placeholder="Largo" style="width:60%;color:#888;" value="{{$det->tam_nro2}}">
												<span class="input-group"> <select name="UN2" class="form-control" id="sel1" style="border-left:none; border-radius:2px; color:#888;">
													@if ($det->UN2=='m')
													<option value="m" selected>m</option>
													<option value="mm">mm</option>
													<option value="cm">cm</option>
													@elseif ($det->UN2=='mm')
													<option value="m">m</option>
													<option value="mm" selected>mm</option>
													<option value="cm">cm</option>
													@else
													<option value="m">m</option>
													<option value="mm">mm</option>
													<option value="cm" selected>cm</option>
													@endif
												</select></span>
											</div>
									</div>
									@elseif ($det->tam_tx=='Numero/Peso')
									<br>
									<div class="row" id="" style=" margin-top:-15px;margin-left:2px;">
											<div class="input-group">
													<input type="text" name="tam_nro3" class="form-control" aria-label="" placeholder="Numero" style="width:60%;color:#888;" value="{{$det->tam_nro1}}">
													<span class="input-group"> <select name="UN3" class="form-control" id="sel1" style="border-left:none; border-radius:2px; color:#888;">
														<option value="N°">N°</option>
													</select></span>
												</div>
									</div>
									<br>
									<div class="row" id="" style="margin-left:2px;">
										<div class="input-group">
												<input type="text" name="tam_nro3" class="form-control" aria-label="" placeholder="Peso" style="width:60%;color:#888;" value="{{$det->tam_nro2}}">
												<span class="input-group"> <select name="UN4" class="form-control" id="sel1" style="border-left:none; border-radius:2px; color:#888;">
													@if ($det->UN2=='gr')
													<option value="gr" selected>gr</option>
													<option value="kg">Kg</option>
													@else
													<option value="gr">gr</option>
													<option value="kg"  selected>Kg</option>
													@endif
												</select></span>
											</div>
									</div>
									@else
									<!--NADA AMBOS SE OCULTAN-->
									@endif
								</div>
							</div>

						</div>
						<div class="col-md-3">
							<div class="row">
									 <div class="col-md-12">
										 <br>
											 <label for="nombre" style="color:#888;">Stock</label>
									 </div>
							</div>
							<div class="row">
								<div class="col-md-12">
												<div class="input-group">
													<input type="text" name="stock_gn" class="form-control" aria-label="" placeholder="Cantidad" style="width:39%;color:#888;" value="{{$det->num_stock_gn}}">
													<span class="input-group"><select name="stock_med" class="form-control" id="" style="border-left:none; border-radius:2px; color:#888; width:78%;">
														 @foreach($medidas as $med)
																 @if($det->medida_stock_gn=='{{$med->nombre}}')
																 <option value="{{$med->nombre}}" selected>{{$med->nombre}}</option>
																 @else
																 <option value="{{$med->nombre}}">{{$med->nombre}}</option>
																 @endif
														 @endforeach
													 </select> </span>

												</div>

								</div>
							</div>
							<div class="row">
									<p style="color:#fff; font-size:3px;">hg</p>
									<div class="col-md-12">
										<label for="nombre" style="color:#888;">Stock-Detallado</label>
											<p style="color:#fff; font-size:0px;">hg</p>
										<div class="input-group">
											@if ($det->medida_stock_det=='m')
											<input type="text" name="stock_det" class="form-control" aria-label="" placeholder="Cantidad" style="width:60%;color:#888;" value="{{$det->num_stock_det}}" >
											<span class="input-group"> <select name="stock_det_tx" class="form-control" style="border-left:none; border-radius:2px; color:#888;">
												<option value="m" selected>m</option>
												<option value="gr">gr</option>
												<option value="-">-</option>
											</select></span>
											@elseif($det->medida_stock_det=='gr')
											<input type="text" name="stock_det" class="form-control" aria-label="" placeholder="Cantidad" style="width:60%;color:#888;" value="{{$det->num_stock_det}}">
											<span class="input-group"> <select name="stock_det_tx" class="form-control" id="" style="border-left:none; border-radius:2px; color:#888;">
												<option value="m">m</option>
												<option value="gr" selected>gr</option>
												<option value="-">-</option>
											</select></span>
											@else
											<input type="text" name="stock_det" class="form-control" aria-label="" placeholder="Cantidad" style="width:60%;color:#888;" value="{{$det->num_stock_det}}" disabled>
											<span class="input-group"> <select name="stock_det_tx" class="form-control" id="" style="border-left:none; border-radius:2px; color:#888;">
												<option value="m">m</option>
												<option value="gr">gr</option>
												<option value="-" selected>-</option>
											</select></span>
											@endif
										</div>
									</div>
							</div>
							<br>

							<div class="row" style="">
								<div class="col-md-12">
									<div class="input-group">
										<span class="input-group-addon"  style="background:#fff;color:#888;font-size:11px;">Stockmin</span>
										<input type="text" value="{{$det->stockmin}}" class="form-control" name="stock_min" aria-label="" placeholder="" style="width:73%;color:#888;" required>
									</div>
								</div>
							</div>
							<br>
							<div class="row" style="">
								<div class="col-md-12">
									<div class="input-group">
										<span class="input-group-addon" style="background:#fff;color:#888;font-size:11px;">Etiqueta.  </span>
										<input type="text" value="{{$det->etiqueta}}" class="form-control" name="etiqueta" aria-label="" placeholder="" style="width:85%;color:#888;">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="row">
									 <div class="col-md-12">
										 <br>
											 <label for="nombre" style="color:#888;">Precio de Venta</label>
									 </div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="input-group">
										<span class="input-group-addon" style="background:#fff;color:#888;font-size:11px;">Precio Unitario </span>
										<input type="text" class="form-control" name="PVU" aria-label="" placeholder="S/." style="width:85%;color:#888;" value="{{$det->precio_normal_u}}" required>
									</div>
								</div>
							</div>
							<br>
								<div class="row">
									<div class="col-md-12">
										<div class="input-group">
											<span class="input-group-addon" style="background:#fff;color:#888;font-size:11px;">Precio-Detallado</span>
											@if($det->medida_stock_det=='-')
											<input type="text" class="form-control" name="PVD" aria-label="" placeholder="S/." style="width:85%;color:#888;" id="" value="{{$det->precio_det_u}}" disabled>
											@else
											<input type="text" class="form-control" name="PVD" aria-label="" placeholder="S/." style="width:85%;color:#888;" id="" value="{{$det->precio_det_u}}" >
											@endif
										</div>
									</div>
								</div>
								<div class="row">
										<p style="color:#fff; font-size:3px;">hg</p>
										<div class="col-md-12">
											<label for="nombre" style="color:#888;">Precio x Volumen (1)</label>
												<p style="color:#fff; font-size:0px;">hg</p>
											<div class="input-group">
												<span class="input-group-addon" style="background:#fff;color:#888;font-size:11px;">Cantidad  Volum.</span>
												<input type="text" class="form-control" name="CANT_V1" aria-label="" placeholder="" style="width:85%;color:#888;" value="{{$det->cantidad_vol1}}" required>
											</div>
										</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12">
										<div class="input-group">
											<span class="input-group-addon" style="background:#fff;color:#888;font-size:11px;">Precio al x Mayor</span>
											<input type="text" class="form-control" name="CANT_PV1"aria-label="" placeholder="S/." style="width:85%;color:#888;" value="{{$det->precio_vol1}}" required>
										</div>
									</div>
								</div>

						</div>
						<div class="col-md-3">
							<div class="row">
								<br>
									<div class="col-md-12">
										<label for="nombre" style="color:#888;">Precio x Volumen (2)</label>
											<p style="color:#fff; font-size:0px;">hg</p>
										<div class="input-group" style="margin-top:-10px;">
											<span class="input-group-addon" style="background:#fff;color:#888;font-size:11px;">Cantidad  Volum.</span>
											<input type="text" class="form-control" name="CANT_V2" aria-label="" placeholder="" style="width:85%;color:#888;" value="{{$det->cantidad_vol2}}">
										</div>
									</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12">
									<div class="input-group">
										<span class="input-group-addon" style="background:#fff;color:#888;font-size:11px;">Precio al x Mayor</span>
										<input type="text" class="form-control" name="CANT_PV2"aria-label="" placeholder="S/." style="width:85%;color:#888;" value="{{$det->precio_vol2}}">
									</div>
								</div>
							</div>
							<div class="row">
									<p style="color:#fff; font-size:3px;">hg</p>
									<div class="col-md-12">
										<label for="nombre" style="color:#888;">Precio x Volumen (3)</label>
											<p style="color:#fff; font-size:0px;">hg</p>
										<div class="input-group">
											<span class="input-group-addon" style="background:#fff;color:#888;font-size:11px;">Cantidad  Volum.</span>
											<input type="text" class="form-control" name="CANT_V3" aria-label="" placeholder="" style="width:85%;color:#888;" value="{{$det->cantidad_vol3}}">
										</div>
									</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12">
									<div class="input-group">
										<span class="input-group-addon" style="background:#fff;color:#888;font-size:11px;">Precio al x Mayor</span>
										<input type="text" class="form-control" name="CANT_PV3"aria-label="" placeholder="S/." style="width:85%;color:#888;" value="{{$det->precio_vol3}}">
									</div>
								</div>
							</div>
						</div>
					</div>
        </div>
			</div>
			<div class="modal-footer" style="background:#f8f8f8; height:50px;">
				<button type="submit" class="btn btn" style="background:#8A8A8F;color:#fff;">Guardar</button>
			</div>
    {!!Form::close()!!}
		</div>
	</div>


</div>
@push ('scripts')
<script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>

<script type="text/javascript">
_colors=$('._select_color_drop li');
    for (var i = _colors.length - 1; i >= 0; i--) {
        $(_colors[i]).click(function(){
            var color_text = $(this).find('span').attr('_text_display');
            var elemnt = $(this).closest('._select_color_drop').prev();
            elemnt.find('span.color').remove();
            $(this).find('span').clone().appendTo(elemnt);
            var contents = $(elemnt).contents();
            if (contents.length > 0) {
                if (contents.get(0).nodeType == Node.TEXT_NODE) {
                    $(elemnt).html(color_text).append(contents.slice(1));
                }
            }
            if($('[name=_color]').val() == undefined){
                elemnt.next().append("<input type='hidden' name='_color' value='"+color_text+"'>");
            }else{
                $('[name=_color]').val(color_text);
            }

        });
    };
</script>
<script type="text/javascript">
$(document).ready(function(e){
  $( document ).on( 'click', '.bs-dropdown-to-select-group .dropdown-menu li', function( event ) {
    var $target = $( event.currentTarget );
  $target.closest('.bs-dropdown-to-select-group')
    .find('[data-bind="bs-drp-sel-value"]').val($target.attr('data-value'))
    .end()
    .children('.dropdown-toggle').dropdown('toggle');
  $target.closest('.bs-dropdown-to-select-group')
      .find('[data-bind="bs-drp-sel-label"]').text($target.context.textContent);
  return false;
});
});
</script>

 @endpush
