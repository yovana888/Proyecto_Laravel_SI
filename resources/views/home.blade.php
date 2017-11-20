<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Infinite Admin | Lista</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="assets\plugins\jquery-ui\themes\base\minified\jquery-ui.min.css" rel="stylesheet">
	<link href="assets\plugins\bootstrap\css\bootstrap.min.css" rel="stylesheet">
	<link href="assets\plugins\icon\themify-icons\themify-icons.css" rel="stylesheet">
	<link href="assets\css\animate.min.css" rel="stylesheet">
	<link href="assets\css\style.min.css" rel="stylesheet">
	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets\plugins\loader\pace\pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->


</head>
<body class="inverse-mode">
	<!-- BEGIN #page-container -->
	<div id="page-container">
		<!-- BEGIN login -->
    <div class="login">
			<!-- BEGIN login-cover -->
			<div class="login-cover"></div>
      <div id="header" class="header navbar navbar-inverse navbar-fixed-top " style="position:absolute;">
<!-- BEGIN container-fluid -->
<div class="container-fluid">
  <!-- BEGIN mobile sidebar expand / collapse button -->
  <div class="navbar-header">
    <a  href="{{ url('/home') }}" class="navbar-brand">
        <i class="ti-infinite navbar-logo"></i>
        <b>Infinite</b> Admin
    </a>
    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <!-- END mobile sidebar expand / collapse button -->
  <!-- BEGIN header navigation right -->
  <div class="navbar-xs-justified">
    <ul class="nav navbar-nav navbar-right">


      <li class="dropdown">
        <a href="javascript:;" data-toggle="dropdown" class="navbar-icon">
          <i class="ti-settings"></i>
        </a>
        <ul class="dropdown-menu dropdown-md no-padding" data-dropdown-close="false">
          <li class="dropdown-header">Sidebar Settings</li>
          <li class="setting">
            <div class="setting-icon bg-inverse"><i class="ti-wand"></i></div>
            <div class="setting-info">
              <div class="switcher">
                <input type="checkbox" name="setting_sidebar_inverse" id="setting_sidebar_inverse" checked="">
                <label for="setting_sidebar_inverse"></label>
              </div>
              Sidebar Inverse
            </div>
          </li>
          <li class="setting">
            <div class="setting-icon bg-inverse"><i class="ti-layout-slider-alt"></i></div>
            <div class="setting-info">
              <div class="switcher">
                <input type="checkbox" name="setting_fixed_sidebar" id="setting_fixed_sidebar" checked="">
                <label for="setting_fixed_sidebar"></label>
              </div>
              Fixed Sidebar
            </div>
          </li>
          <li class="setting">
            <div class="setting-icon bg-inverse"><i class="ti-layout-accordion-list"></i></div>
            <div class="setting-info">
              <div class="switcher">
                <input type="checkbox" name="setting_sidebar_minified" id="setting_sidebar_minified">
                <label for="setting_sidebar_minified"></label>
              </div>
              Sidebar Minified
            </div>
          </li>
          <li class="dropdown-header">Header Settings</li>
          <li class="setting">
            <div class="setting-icon bg-inverse"><i class="ti-spray"></i></div>
            <div class="setting-info">
              <div class="switcher">
                <input type="checkbox" name="setting_header_inverse" id="setting_header_inverse" checked="">
                <label for="setting_header_inverse"></label>
              </div>
              Header Inverse
            </div>
          </li>
          <li class="setting">
            <div class="setting-icon bg-inverse"><i class="ti-layout-tab-window"></i></div>
            <div class="setting-info">
              <div class="switcher">
                <input type="checkbox" name="setting_fixed_header" id="setting_fixed_header" checked="">
                <label for="setting_fixed_header"></label>
              </div>
              Fixed Header
            </div>
          </li>
        </ul>
      </li>
      <li class="dropdown">
        <a href="javascript:;" data-toggle="dropdown">
          <span class="navbar-user-img online pull-right">
            @if(Auth::user()->foto=='')
             <img src="{{asset('assets/img/dashboard-album-2.jpg')}}" alt="{{Auth::user()->foto}}" >
            @else
             <img src="{{asset('imagenes/usuarios/'.Auth::user()->foto)}}" alt="{{Auth::user()->foto}}" >
            @endif

          </span>
          <span class="hidden-xs ">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="javascript:;">Mostrar Perfil</a></li>
          <li><a href="{{ url('/logout') }}">Salir</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <!-- END header navigation right -->
</div>
<!-- END container-fluid -->
<!-- BEGIN header-search-bar -->

<!-- END header-search-bar -->
</div>
<!---=================================-->

   <div class="row" style="position:absolute;  width:100%; height:100%; ">
   <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12" style="margin-top:10%;">

   </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" style="margin-top:10%;">

            <div class="well" style="border-top:4px solid rgba(0,0,0,.3); background:rgba(0,0,0,.13) !important;border-left:2px solid rgba(0,0,0,.3); border-bottom:2px solid rgba(0,0,0,.3);border-right:2px solid rgba(0,0,0,.3); padding:14px;">
                <div class="row" style=" margin-top:-15px; padding:10px 10px;">
                    <h4 style="color:rgba(255,255,255,.60);">Datos del Usuario</h4>
                </div>
                <div class="row" style="padding:17px;">
                    <div class="row" style="background:rgba(0,0,0,.52);padding:10px;margin-top:-17px;">
                        <div class="col-md-5">
                             @if(Auth::user()->foto=='')
                              <img src="{{asset('assets/img/dashboard-album-2.jpg')}}" alt="{{Auth::user()->foto}}" height="80px" width="80px"  >
                             @else
                              <img src="{{asset('imagenes/usuarios/'.Auth::user()->foto)}}" alt="{{Auth::user()->foto}}" height="100px" width="100px" class="img-thumbnail">
                             @endif
                        </div>
                        <div class="col-md-7" style="">
                            <p style="font-size:16px;font-weight:bold;">{{Auth::user()->name}}</p>
                             <p style="margin-left:15%;"><span class="label label" style="font-size:12px; background:#e91e63;">Activo-Online</span></p>
                        </div>

                    </div>
                    <div class="row" style="padding:17px; border-bottom:1px solid rgba(255,255,255,.2)"><!--Ya no tiene background-->
                        <div class="col-md-3">
                           <p style="color:#fff;font-weight:bold;">Documento:</p>
                       </div>
                        <div class="col-md-6">
                           <p style="color:rgba(255,255,255,.7);font-weight:bold;">{{Auth::user()->dni}}</p>
                       </div>
                       <div class="col-md-2">
                        <i class="ti-credit-card text-muted f-s-18 pull-left m-r-10"></i>

                       </div>
                    </div>

                     <div class="row" style="padding:17px; border-bottom:1px solid rgba(255,255,255,.2)"><!--Ya no tiene background-->
                        <div class="col-md-3">
                           <p style="color:#fff;font-weight:bold;">Dirección:</p>
                       </div>
                        <div class="col-md-6">
                           <p style="color:rgba(255,255,255,.7);font-weight:bold;">{{Auth::user()->direccion}}</p>
                       </div>
                       <div class="col-md-2">
                                 <i class="ti-direction text-purple f-s-18 pull-left m-r-10"></i>

                       </div>
                    </div>

                      <div class="row" style="padding:17px; border-bottom:1px solid rgba(255,255,255,.2)"><!--Ya no tiene background-->
                        <div class="col-md-3">
                           <p style="color:#fff;font-weight:bold;">Teléfono:</p>
                       </div>
                        <div class="col-md-6">
                           <p style="color:rgba(255,255,255,.7);font-weight:bold;">{{Auth::user()->telefono}}</p>
                       </div>
                       <div class="col-md-2">
                           <i class="ti-mobile text-primary f-s-18 pull-left m-r-10"></i>

                       </div>
                    </div>

                       <div class="row" style="padding:17px; border-bottom:1px solid rgba(255,255,255,.2)"><!--Ya no tiene background-->
                        <div class="col-md-3">
                           <p style="color:#fff;font-weight:bold;">Email:</p>
                       </div>
                        <div class="col-md-6">
                           <p style="color:rgba(255,255,255,.7);font-weight:bold;">{{Auth::user()->email}}</p>
                       </div>
                       <div class="col-md-2">
                              <i class="ti-email text-success f-s-18 pull-left m-r-10"></i>

                       </div>
                    </div>


                </div>
            </div>

    </div>
     <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:10%;">
           <div class="well"   style="border-top:4px solid rgba(0,0,0,.3);background:rgba(0,0,0,.13) !important;border-left:2px solid rgba(0,0,0,.3); border-bottom:2px solid rgba(0,0,0,.3);border-right:2px solid rgba(0,0,0,.3); padding:14px;">

                <div class="row" style=" margin-top:-15px; padding:10px 10px;">
                    <h4 style="color:rgba(255,255,255,.60);">Acceso a la Sucursales</h4>
               </div>

               <div class="row" style="padding:17px;">
            <table class="table  table-bordered table-condensed table-responsive" style=" color:#fff;background:rgba(0,0,0,.4);">
				<thead style="background:rgba(0,0,0,.7);">
					<th style=" border: 1px solid rgba(255,255,255,.2) ; display:none;">Id</th>
					<th style=" border: 1px solid rgba(255,255,255,.2) ;">Nombre</th>
					<th style=" border: 1px solid rgba(255,255,255,.2);">Logo</th>
					<th style=" border: 1px solid rgba(255,255,255,.2) ;">Rol</th>
					<th style=" border: 1px solid rgba(255,255,255,.2);">Opción</th>
				    <th style=" border: 1px solid rgba(255,255,255,.2);  display:none;">Tipo</th>

				</thead>
               @foreach ($sucu as $s)
               @if($s->estado=='Activo')
                   <tr>
					<td style=" border: 1px solid rgba(255,255,255,.2) ; display:none;">{{ $s->idsucursal}}</td>
					<td style=" border: 1px solid rgba(255,255,255,.2) ;">{{ $s->razon}}</td>

				     @if($s->logo=='')

                        <td style=" border: 1px solid rgba(255,255,255,.2) ;">
						    <img src="{{asset('imagenes/sucursales/no.png')}}" alt="{{ $s->logo}}" height="60px" width="60px" class="img-thumbnail">
					    </td>
                     @else
                        <td style=" border: 1px solid rgba(255,255,255,.2) ;">
						    <img src="{{asset('imagenes/sucursales/'.$s->logo)}}" alt="{{ $s->logo}}" height="60px" width="60px" class="img-thumbnail">
					   </td>
                    @endif
                       <td style=" border: 1px solid rgba(255,255,255,.2) ;">{{ $s->tipo_user}}</td>
                        <td style=" border: 1px solid rgba(255,255,255,.2) ;display:none;">{{ $s->tipo}}</td>
					<td style=" border: 1px solid rgba(255,255,255,.2) ;">
				         <a href="{!!route('sucursal_actual',['id_act'=>$s->tipo,'role'=>$s->tipo_user,'id_a'=>$s->idsucursal])!!}"><button class="btn btn" style="background:#bd6eca;"><i class="ti-shift-right" style="color:#fff;"></i></button></a>

					</td>
				</tr>
               @else
               <!--que no muestre registro pz-->
               @endif

              @endforeach
			</table>
			
		</div>
               </div>
           </div>
    </div>
</div>
<!-- END login -->

		<!-- BEGIN btn-scroll-top -->
		<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="ti-arrow-up"></i></a>
		<!-- END btn-scroll-top -->

	</div>
	<!-- END #page-container -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="assets\plugins\jquery\jquery-1.9.1.min.js"></script>
	<script src="assets\plugins\jquery\jquery-migrate-1.1.0.min.js"></script>
	<script src="assets\plugins\jquery-ui\ui\minified\jquery-ui.min.js"></script>
	<script src="assets\plugins\cookie\js\js.cookie.js"></script>
	<script src="assets\plugins\bootstrap\js\bootstrap.min.js"></script>
	<script src="assets\plugins\scrollbar\slimscroll\jquery.slimscroll.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="assets\js\apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53034621-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>
