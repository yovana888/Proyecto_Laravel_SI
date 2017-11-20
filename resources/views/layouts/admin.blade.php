<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Infinite Admin</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">

	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="{{asset('assets\plugins\jquery-ui\themes\base\minified\jquery-ui.min.css')}}" rel="stylesheet">

	<link href="{{asset('assets\plugins\bootstrap\css\bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets\plugins\icon\themify-icons\themify-icons.css')}}" rel="stylesheet">
	<link href="{{asset('assets\css\animate.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets\css\style.min.css')}}" rel="stylesheet">
	<link href="{{asset('css\file-input.css')}}" rel="stylesheet">
<link href="{{asset('css\colores.css')}}" rel="stylesheet">

	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN PAGE CSS STYLE ================== -->
	<link href="{{asset('assets\plugins\table\DataTables\DataTables-1.10.15\css\dataTables.bootstrap.min.css')}}" rel="stylesheet">

	<link href="{{asset('assets\plugins\table\DataTables\Buttons-1.3.1\css\buttons.bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets\plugins\table\DataTables\ColReorder-1.3.3\css\colReorder.bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets\plugins\table\DataTables\FixedColumns-3.2.2\css\fixedColumns.bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets\plugins\table\DataTables\FixedHeader-3.1.2\css\fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets\plugins\table\DataTables\KeyTable-2.2.1\css\keyTable.bootstrap.min.css')}}" rel="stylesheet">

	<link href="{{asset('assets\plugins\table\DataTables\RowGroup-1.0.0\css\rowGroup.bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets\plugins\table\DataTables\RowReorder-1.2.0\css\rowReorder.bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets\plugins\table\DataTables\Scroller-1.4.2\css\scroller.bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets\plugins\table\DataTables\Select-1.2.2\css\select.bootstrap.min.css')}}" rel="stylesheet">
	<!-- ================== END PAGE CSS STYLE ================== -->
<link  href="{{asset('css\sweetalert.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
</head>
<body>
	<!-- BEGIN #page-container -->
	<div id="page-container" class="page-header-fixed page-sidebar-fixed">
		<!-- BEGIN #header -->
		<div id="header" class="header navbar navbar-inverse navbar-fixed-top">
			<!-- BEGIN container-fluid -->
			<div class="container-fluid">
				<!-- BEGIN mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="" class="navbar-brand">

					    <label > <img src="{{asset('img/ic1.png')}}" alt="" style="border-radius:5px;"> Infinite admin</label>
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
							<li>
								<a href="javascript:;" data-toggle="search-bar" class="navbar-icon">
									<i class="ti-search"></i>
								</a>
							</li>
							<li class="dropdown">
								<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle navbar-icon ">
									<i class="ti-alert"></i>
								</a>
								<ul class="dropdown-menu dropdown-lg no-padding">
									<li class="dropdown-header"><a href="#" class="dropdown-close">=</a>Créditos Clientes</li>
									<li class="notification">
										<a href="#">
											<div class="notification-icon bg-primary">
												<i class="ti-apple"></i>
											</div>
											<div class="notification-info">
												<h4 class="notification-title">App Store <span class="notification-time">Just now</span></h4>
												<p class="notification-desc">
													Your iOS application has been approved
												</p>
											</div>
										</a>
									</li>


									<li class="dropdown-header"><a href="#" class="dropdown-close">=</a>Créditos Proveedores</li>
									<li class="notification">

									</li>
								</ul>
							</li>
	            <li class="dropdown"> <!--with-label en el a-->
								<a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle navbar-icon">
									<i class="ti-bell"></i>
								</a>
								<ul class="dropdown-menu dropdown-lg no-padding">
									<li class="dropdown-header"><a href="#" class="dropdown-close">=</a>Traslados Entrantes</li>
									<li class="notification">
										<a href="#">
											<div class="notification-icon bg-primary">
												<i class="ti-apple"></i>
											</div>
											<div class="notification-info">
												<h4 class="notification-title">App Store <span class="notification-time">Just now</span></h4>
												<p class="notification-desc">
													Your iOS application has been approved
												</p>
											</div>
										</a>
									</li>


									<li class="dropdown-header"><a href="#" class="dropdown-close">=</a>Pedidos Entrantes</li>
									<li class="notification">
										<a href="#">
											<div class="notification-icon bg-purple">
												<i class="ti-email"></i>
											</div>
											<div class="notification-info">
												<h4 class="notification-title">Gmail  <span class="notification-time">12:50pm</span></h4>
												<p class="notification-desc">
													You have 2 unread email
												</p>
											</div>
										</a>
									</li>
									<li class="notification">
										<a href="#">
											<div class="notification-icon">
												<img src="" alt="">
											</div>
											<div class="notification-info">
												<h4 class="notification-title">Corey  <span class="notification-time">10:20am</span></h4>
												<p class="notification-desc">
													There's so much room for activities!
												</p>
											</div>
										</a>
									</li>

								</ul>
							</li>
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
									<li><a href="javascript:;">Editar Perfil</a></li>
									<li><a href="{{url('/home')}}">Cambiar Sucursal</a></li>
									<li class="divider"></li>
									<li><a href="{{ url('/logout') }}">Cerrar Sesión</a></li>
								</ul>
							</li>
						</ul>
				</div>
				<!-- END header navigation right -->
			</div>
			<!-- END container-fluid -->
			<!-- BEGIN header-search-bar -->
			<div class="header-search-bar">
                <form action="#" method="POST" name="search_bar_form">
                    <div class="form-group">
                        <div class="left-icon"><i class="ti-search"></i></div>
                        <input type="text" class="form-control" id="header-search" placeholder="Search infinite admin...">
                        <a href="javascript:;" data-dismiss="search-bar" class="right-icon"><i class="ti-close"></i></a>
                    </div>
                </form>
			</div>
			<!-- END header-search-bar -->
		</div>
		<!-- END #header -->

		<!-- BEGIN #sidebar -->
		<div id="sidebar" class="sidebar sidebar-inverse">
			<!-- BEGIN scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- BEGIN nav -->

		<ul class="nav">
			<li class="nav-header">Navegación</li>
			<li><a href="{{url('escritorio')}}"><i class="ti-home"></i><span>Home</span></a></li>
			@if(Auth::user()->m_almacen=='1')
			<li class="has-sub" id="alm">
				<a href="javascript:;">
						<b class="caret caret-right pull-right"></b>
						<i class="ti-package"></i>
						<span>Almacen</span>
				</a>
				<ul class="sub-menu" id="alma">
					<li id="al1"><a href="{{url('almacen/articulo')}}">Articulos</a></li>
					<li id="al2"><a href="{{url('almacen/categoria')}}">Categorías</a></li>
					<li id="al3"><a href="{{url('almacen/subcategoria')}}">Subcategorías</a></li>
					<li id="al4"><a href="{{url('almacen/material')}}">Materiales</a></li>
					<li id="al5"><a href="{{url('almacen/tipo')}}">Modelos</a></li>
					<li id="alm6"><a href="{{url('almacen/edad')}}">Unidades</a></li>
				</ul>
			</li>
			@endif
			<li class="nav-divider"></li>
			<li class="nav-header">Componentes</li>
			@if(Auth::user()->m_traslado=='1')
			<li class="has-sub">
				<a href="javascript:;">
						<b class="caret caret-right pull-right"></b>
						<i class="ti-truck"></i>
						<span>Traslados</span>
				</a>
				<ul class="sub-menu">
					@if(Auth::user()->id_s=='3')
					<li><a href="{{url('traslados/realizados')}}">Traslados Realizados</a></li>
					<li><a href="{{url('traslados/entrantes')}}">Traslados Entrantes</a></li>
					@else
					<li><a href="{{url('traslados/articulos')}}">Articulos Adquiridos</a></li>
					<li><a href="{{url('traslados/realizados')}}">Traslados Realizados</a></li>
					<li><a href="{{url('traslados/entrantes')}}">Traslados Entrantes</a></li>
					@endif
				</ul>
			</li>
			@endif
			@if(Auth::user()->m_pedido=='1')
			<li class="has-sub">
				<a href="javascript:;">
						<b class="caret caret-right pull-right"></b>
						<i class="ti-pencil-alt"></i>
						<span>Pedidos</span>
				</a>
				<ul class="sub-menu">
					<li><a href="{{url('pedidos/realizados')}}">Pedidos Realizados</a></li>
					<li><a href="{{url('pedidos/entrantes')}}">Pedidos Entrantes</a></li>
				</ul>
			</li>
			@endif
			@if(Auth::user()->m_venta=='1')
			<li class="has-sub">
				<a href="javascript:;">
						<b class="caret caret-right pull-right"></b>
						<i class="ti-shopping-cart-full"></i>
						<span>Ventas</span>
				</a>
				<ul class="sub-menu">
					<li><a href="{{url('ventas/venta')}}">Registro de Ventas</a></li>
					<li><a href="{{url('ventas/cliente')}}">Clientes</a></li>
					<li><a href="{{url('ventas/venta')}}">Ventas Pendientes</a></li>
					<li><a href="{{url('ventas/venta')}}">Devoluciones</a></li>
					<li><a href="{{url('ventas/credito')}}">Créditos</a></li>
					<li><a href="{{url('ventas/credito')}}">Consultas Compras</a></li>
				</ul>
			</li>
			@endif
			@if(Auth::user()->m_compras=='1')
			<li class="has-sub">
				<a href="javascript:;">
						<b class="caret caret-right pull-right"></b>
						<i class="ti-shopping-cart-full"></i>
						<span>Compras</span>
				</a>
				<ul class="sub-menu">
					<li><a href="{{url('compras/ingreso')}}">Registro de Compras</a></li>
					<li><a href="{{url('compras/proveedor')}}">Proveedores</a></li>
					<li><a href="{{url('compras/credito')}}">Créditos Proveedores</a></li>
					<li><a href="{{url('ventas/venta')}}">Consultas Compras</a></li>
				</ul>
			</li>
			@endif
			@if(Auth::user()->m_movimiento=='1')
			<li class="has-sub">
				<a href="javascript:;">
						<b class="caret caret-right pull-right"></b>
						<i class="ti-exchange-vertical"></i>
						<span>Movimientos</span>
				</a>
				<ul class="sub-menu">
					<li><a href="{{url('movimientos/ultimos')}}">Ultimos Movimientos</a></li>
					<li><a href="{{url('movimientos/tipos')}}">Tipos Movimientos</a></li>
				</ul>
			</li>
			@endif
			@if(Auth::user()->m_caja=='1')
			<li><a href="chart.htm"><i class="ti-receipt"></i><span>Caja</span></a></li>
			@endif
			@if(Auth::user()->m_kardex=='1')
			<li><a href="chart.htm"><i class="ti-agenda"></i><span>Kardex</span></a></li>
			@endif

			<li class="nav-divider"></li>
			<li class="nav-header">Mantenimiento</li>
			@if(Auth::user()->rol_actual=='Administrador')
			<li><a href="profile.htm"><i class="ti-user"></i><span>Usuarios</span></a></li>
			<li><a href="settings.htm"><i class="ti-settings"></i><span>Configuración General</span></a></li>
			@endif
			<li><a href="helper.htm"><i class="ti-help-alt"></i><span>Ayuda</span></a></li>
			<li><a href="helper.htm"><i class="ti-layout-tab-window"></i><span>Acerca de</span></a></li>

			<li class="nav-divider"></li>
			<li class="nav-header">Adicionales</li>
			<li class="nav-project">
				<a href="#">
					<div class="project-icon">
						<i class="ti-clipboard"></i>
					</div>
					<div class="project-info">
						<span class="pull-right project-percentage"></span>
						<h4 class="project-title">Manual de Usuario</h4>
						<div class="progress progress-xs">
							<div class="progress-bar bg-gradient-blue-purple" style="width: 100%;" role="progressbar"></div>
						</div>
					</div>
				</a>
			</li>
			@if(Auth::user()->rol_actual=='Administrador')
			<li class="nav-project">
				<a href="#">
					<div class="project-icon">
						<i class="ti-server"></i>
					</div>
					<div class="project-info">
						<span class="pull-right project-percentage"></span>
						<h4 class="project-title">Copia de Seguridad</h4>
						<div class="progress progress-xs">
							<div class="progress-bar  bg-gradient-blue-purple" style="width: 100%;" role="progressbar"></div>
						</div>
					</div>
				</a>
			</li>
			<li class="nav-project">
				<a href="#">
					<div class="project-icon">
						<i class="ti-world"></i>
					</div>
					<div class="project-info">
						<span class="pull-right project-percentage"></span>
						<h4 class="project-title">Consultas y Reportes Generales</h4>
						<div class="progress progress-xs">
							<div class="progress-bar  bg-gradient-blue-purple" style="width: 100%;" role="progressbar"></div>
						</div>
					</div>
				</a>
			</li>
			@endif
			<li class="nav-divider"></li>
			<li class="nav-copyright">&copy; 2017 - Pasamanería Gamy</li>
		</ul>
		<!-- END nav -->
	</div>
	<!-- END scrollbar -->
		</div>
		<!-- END #sidebar -->

		<!-- BEGIN #content -->
		<div id="content" class="content p-0" style="background:#f1f2f7;">

					@yield('contenido',Auth::user()->id)
		<!--		<div class="panel panel-default " style="margin-left: 3%; margin-right :3%;" id="rem1">

		</div>-->

		</div>

		<a href="#" data-click="scroll-top" class="btn-scroll-top fade"><i class="ti-arrow-up"></i></a>

	</div>
	<!-- END #page-container -->
	  @stack('scripts')
	<script src="{{asset('js/sweetalert.js')}}"></script>
	    @include('sweet::alert')
	<!-- ================== BEGIN BASE JS ================== -->

	<script src="{{asset('assets\plugins\jquery\jquery-migrate-1.1.0.min.js')}}"></script>
	<script src="{{asset('assets\plugins\jquery-ui\ui\minified\jquery-ui.min.js')}}"></script>
	<script src="{{asset('assets\plugins\cookie\js\js.cookie.js')}}"></script>
	<script src="{{asset('assets\plugins\bootstrap\js\bootstrap.min.js')}}"></script>
	<script src="{{asset('assets\plugins\scrollbar\slimscroll\jquery.slimscroll.min.js')}}"></script>

	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{asset('assets\plugins\table\DataTables\JSZip-3.1.3\jszip.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\pdfmake-0.1.27\build\pdfmake.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\pdfmake-0.1.27\build\vfs_fonts.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\DataTables-1.10.15\js\jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\DataTables-1.10.15\js\dataTables.bootstrap.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\AutoFill-2.2.0\js\dataTables.autoFill.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\AutoFill-2.2.0\js\autoFill.bootstrap.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\Buttons-1.3.1\js\dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\Buttons-1.3.1\js\buttons.bootstrap.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\Buttons-1.3.1\js\buttons.colVis.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\Buttons-1.3.1\js\buttons.flash.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\Buttons-1.3.1\js\buttons.html5.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\Buttons-1.3.1\js\buttons.print.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\ColReorder-1.3.3\js\dataTables.colReorder.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\FixedColumns-3.2.2\js\dataTables.fixedColumns.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\FixedHeader-3.1.2\js\dataTables.fixedHeader.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\KeyTable-2.2.1\js\dataTables.keyTable.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\RowGroup-1.0.0\js\dataTables.rowGroup.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\RowReorder-1.2.0\js\dataTables.rowReorder.min.js')}}"></script>
	<script src="{{asset('assets\plugins\table\DataTables\Scroller-1.4.2\js\dataTables.scroller.min.js')}}"></script>

	<script src="{{asset('assets\js\page\table-data.demo.min.js')}}"></script>

	<script src="{{asset('assets\js\apps.min.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {

			App.init();

			$('#datatables-default').DataTable( {
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
				"dom": 'Bfrtip',
        "buttons": ['copy', 'csv', 'excel', 'pdf', 'print']

			} );

		});
	</script>

<script>


</script>
</body>
</html>
