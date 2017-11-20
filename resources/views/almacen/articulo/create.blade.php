<style media="screen">
.thumb{
	 margin: 10px 10px 10px 10px;
	height: 150px;
	width: 150px;
}
	#imgSalida{
			 margin: 10px 10px 10px 10px;
	height: 150px;
	width: 150px;
	}

	    div#div_file{
	       position: relative;
	       padding: 10px;
	       width: 200px;
	        font-family:sans-serif;
	    }

	    input#file-input{
	        position: absolute;
	        top:0px;
	        left: 0px;
	        right: 0px;
	        bottom: 0px;
	        width: 100%;
	        height: 100%;
	        opacity: 0;
	    }
			p#texto{
	        text-align: center;
	        color: #888;

	    }

</style>
<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-create">
	<div class="modal-dialog">
		<div class="modal-content" style="border-radius: 0px 0px 0px 0px;">
			<div class="modal-header" style="background:#444; height:70px;">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <span aria-hidden="true"><i class="ti-close" style="color:#fff"></i></span>
                </button>
          <h3 class="modal-title " style="color:#fff; "><i class="ti-bookmark"></i> Nuevo Articulo</h3>

			</div>
			<div class="modal-body" style="background:#f8f8f8;  ">
                     <!--Eso es pq me retorna categoria-->

                     @if (count($errors)>0)
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                                </ul>
                            </div>
                         </div>
                     @endif

                     	{!!Form::open(array('url'=>'almacen/articulo','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
										                        {{Form::token()}}
              <div class="row">
								<code>&lt;El nombre es autogenerado&gt;</code>
								<div class="form-group">
											 <label for="nombre" style="color:#888;">Etiqueta</label>
											 <input type="text" name="etiqueta" class="form-control"  placeholder="Etiqueta..." style="color:#777;">
								</div>
              </div>
							<div class="row">
									<div class="col-md-6">
											<div class="row">
														<div class="form-group">
																<label style="color:#888;">Categoría <code>(*)</code></label>
																<select name="idcategoria" class="form-control" id="select-categoria">
																	<option value="-" selected>-Seleccione-</option>
																		@foreach ($categorias as $ca)
																			 <option value="{{$ca->idcategoria}}">{{$ca->nombre}}</option>
																		@endforeach
																</select>
														</div>
											</div>

											<div class="row">
												<div class="form-group">
														<label style="color:#888;">Subcategoría <code>(*)</code></label>

                           <select name="subcategoria" class="form-control" id="select-subcategoria">
                               <!-- La idea es q se almacene el varchar y no el id chaaa, en le show hay q tener cuidado para ello bueno hay q ver ingreso :d :v-->

                            </select>

												</div>
											</div>

											<div class="row">
												<div class="form-group">
														<label style="color:#888;">Material <code>(*)</code> </label>

													 <select name="material" class="form-control" id="select-material">
															 <!-- La idea es q se almacene el varchar y no el id chaaa, en le show hay q tener cuidado para ello bueno hay q ver ingreso :d :v-->

														</select>

												</div>
											</div>

											<div class="row">
												<div class="form-group">
														<label style="color:#888;">Modelo <code>(*)</code> </label>

													 <select name="modelo" class="form-control" id="select-modelo">
															 <!-- La idea es q se almacene el varchar y no el id chaaa, en le show hay q tener cuidado para ello bueno hay q ver ingreso :d :v-->

														</select>

												</div>
											</div>
									</div>
									<div class="col-md-6">

										<div class="row">
											<div class="col-md-12">
												<div class="thumbnail">
													<div id="div_file">
														<p id="texto" style="margin-left:46px;"><i class="fa fa-file-image-o"></i> Imagen Principal</p>
														<input type="file" id="file-input" name="imagen" />
														<img id="imgSalida" src="{{asset('img/png/add-image.png')}}" class="" style="margin-left:46px;"/>
													 </div>
													 <div class="form-group" style="margin-left:4%;">
	 														<label class="control-label" style="color:#888;">Usar conectivo de</label>
	 														<div>
	 															<div class="radio-inline">
	 																<input type="radio" name="inline_radio" id="inline_radio_1" value="1" checked="">
	 																<label for="inline_radio_1">
	 																	Sí
	 																</label>
	 															</div>
	 															<div class="radio-inline">
	 																<input type="radio" name="inline_radio" id="inline_radio_2" value="2">
	 																<label for="inline_radio_2">
	 																	No
	 																</label>
	 															</div>
	 														</div>
	 													</div>
												</div>
											</div>
										</div>


									</div>
              </div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
												 <label for="nombre" style="color:#888;">Descripción</label>
												 <input type="text" name="descripcion" class="form-control"  placeholder="Escriba aquí..." style="color:#777;">
									</div>
								</div>
							</div>


			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn" style="background:#ff5252;color:#fff;">Guardar</button>
			</div>
    {!!Form::close()!!}
		</div>
	</div>



</div>

@push ('scripts')
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script >
$(function(){
    $('#select-categoria').on('change',ondata);
});

function ondata(){
     var cat_id= $(this).val();
		 if(!cat_id)
			$('#select-subcategoria').html('<option value="-">-Seleccione Subcategoría-</option>');

			$.get('/almacen/articulo/create/'+cat_id+'/subcategorias',function(data){
					//para probar lo de abajo
					/*for(var i=0;i<data.length;i++){
							console.log(data[i]);
					}*/
					var html_select='<option value="-">-Seleccione Subcategoría-</option>';
					 $('#select-subcategoria').empty();
					if(data.length==0){
							html_select +='<option value="-">-Ninguno-</option>';
					}else{
					for(var i=0;i<data.length;i++){
							html_select +='<option value="'+data[i].idsubcategoria+'">'+data[i].nombre+'</option>';
						 /* console.log(html_select);*/

							}
					}
					$('#select-subcategoria').html( html_select);
			});
}

 </script>

 <script type="text/javascript">
 $(function(){
     $('#select-subcategoria').on('change',ondata1);
 });

 function ondata1(){
    var subcat_id= $(this).val();
     //AJAX
     if(!subcat_id)

      $('#select-modelo').html('<option value="-">-Seleccione modelo-</option>');
       $('#select-material').html('<option value="-">-Seleccione material-</option>');

     $.get('/almacen/articulo/create/'+subcat_id+'/tipos',function(data0){

         var html_select0='<option value="-">-Seleccione Modelo-</option>';
          $('#select-modelo').empty();
         if(data0.length==0){
             html_select0 +='<option value="-">-Ninguno-</option>';
         }else{
         for(var i=0;i<data0.length;i++){
             html_select0 +='<option value="'+data0[i].nombre+'">'+data0[i].nombre+'</option>';
            /* console.log(html_select);*/

             }
         }
         $('#select-modelo').html( html_select0);
     });

     //MATERIAL

        $.get('/almacen/articulo/create/'+subcat_id+'/materiales',function(data1){

         var html_select1='<option value="-">-Seleccione material-</option>';
          $('#select-material').empty();
         if(data1.length==0){
                html_select1 +='<option value="-">-Ninguno-</option>';
         }else{

             for(var i=0;i<data1.length;i++){
                 html_select1 +='<option value="'+data1[i].nombre+'">'+data1[i].nombre+'</option>';
                /* console.log(html_select);*/

             }

         }
          $('#select-material').html( html_select1);
     });


 }

 </script>
 <script src="{{asset('js/custom-file-input.js')}}"></script>
 <script src="{{asset('js/jquery.custom-file-input.js')}}"></script>
 <script type="text/javascript" language="javascript">
 $(window).load(function(){

  $(function() {
   $('#file-input').change(function(e) {
       addImage(e);
      });

      function addImage(e){
       var file = e.target.files[0],
       imageType = /image.*/;

       if (!file.type.match(imageType))
        return;

       var reader = new FileReader();
       reader.onload = fileOnload;
       reader.readAsDataURL(file);
      }

      function fileOnload(e) {
       var result=e.target.result;
       $('#imgSalida').attr("src",result);
      }
     });
   });



 </script>

 @endpush
