<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<title>Infinite Admin | Login</title>
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
			<!-- END login-cover -->
			<!-- BEGIN login-content -->
			<div class="login-content">
				<!-- BEGIN login-brand -->
				<!-- Extendemos el resto a login.blade.php ubicado dentro de la carpeta auth-->
          @yield('content')
			</div>
			<!-- END login-content -->
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
/*  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53034621-1', 'auto');
  ga('send', 'pageview');*/

</script>
</body>
</html>
