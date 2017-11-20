@extends ('layouts.admin')
@section ('contenido')
<style media="screen">
@media (max-width: 1023px)
{
	.col-in li.col-middle {
	    width: 100%;
	}
}

.col-in li.col-middle {
    width: 40%;
}
.white-box {
	background: #ffffff;
	padding: 25px;
	margin-bottom: 30px;
}
.box-title {
    margin: 0px 0px 12px;
    font-weight: 500;
    text-transform: uppercase;
    font-size: 16px;
}
.col-in li.col-last {
    float: right;
}
.col-in {
    list-style: none;
    padding: 0px;
    margin: 0px;
}
@media (max-width: 1023px){
	.col-in {
	    padding: 15px 0;
	}
}
@media (max-width: 767px){
	.row-in-br {
	    border-right: 0px;
	    border-bottom: 1px solid rgba(120, 130, 140, 0.13);
	}
}
.col-in li {
    display: inline-block;
    vertical-align: middle;
    padding: 0 10px;
}
.row-in-br {
    border-right: 1px solid rgba(120, 130, 140, 0.13);
}
.col-in li .circle {
    display: inline-block;
}
.circle-md {
    width: 60px;
    padding-top: 10px;
    height: 60px;
    font-size: 24px!important;
}
.circle {
    border-radius: 100%;
    text-align: center;
    color: #ffffff;
}
.col-in h3 {
    font-size: 26px;
    font-weight: 100;
		color: #888;
}

.m-t-15 {
    margin-top: 20px !important;
}

.text-right {
    text-align: right;
}
.bg-danger {
    background-color: #ff7676 !important;
}
.bg-green{
	background-color: #53e69d !important;
}
.bg-morado{
	background-color: #7460ee !important;
}
.bg-azul{
	background-color: #11a0f8 !important;
}
</style>
<br>
<br>
<ul class="breadcrumb " style="margin-left: 3%; ">
	<li><a href="#" id="m1" style="color:#e91e63;">HOME</a></li>
	<li class="active" id="m2">GENERAL</li>
</ul>

<div class="row" style="padding-left:30px; padding-right:20px;">
	<div class="col-sm-12">
		<div class="white-box">
			<div class="row row-in">
				<div class="col-lg-3 col-sm-6 row-in-br">
					<ul class="col-in">
						<li>
							<span class="circle circle-md bg-danger" >
								<i class="ti-shopping-cart" ></i>
							</span>
						</li>
						<li class="col-last">

					 				<h3  class="counter text-right m-t-15">S/. 0</h3>

							 <hr style=" border: 2px solid #ff7676;width:100px;">
						</li>
						<li class="col-middle">
              <h4 style="color:#888;">Total Hoy</h4>

						</li>
					</ul>
				</div>
				<div class="col-lg-3 col-sm-6 row-in-br">
					<ul class="col-in">
						<li>
							<span class="circle circle-md bg-green" >
								<i class="ti-money" ></i>
							</span>
						</li>
						<li class="col-last">

               <h3 class="counter text-right m-t-15">S/. 0.00</h3>
							 <hr style=" border: 2px solid #53e69d;width:100px;">
						</li>
						<li class="col-middle">
              <h4 style="color:#888;">Total Caja</h4>

						</li>
					</ul>
				</div>
				<div class="col-lg-3 col-sm-6 row-in-br">
					<ul class="col-in">
						<li>
							<span class="circle circle-md bg-morado" >
								<i class="ti-user" ></i>
							</span>
						</li>
						<li class="col-last">

							 <h3 class="counter   text-right m-t-15"><span style="color:#fff;">569g</span>0</h3>
							 <hr style=" border: 2px solid #7460ee; width:100px;">
						</li>
						<li class="col-middle">
							<h4 style="color:#888;">Clientes</h4>

						</li>
					</ul>
				</div>
				<div class="col-lg-3 col-sm-6 row-in-br">
					<ul class="col-in">
						<li>
							<span class="circle circle-md bg-azul" >
								<i class="ti-truck" ></i>
							</span>
						</li>
						<li class="col-last">

							 <h3 class="counter  text-right m-t-15" ><span style="color:#fff;">569g</span>6</h3>
							 <hr style=" border: 2px solid #11a0f8; width:100px;">
						</li>
						<li class="col-middle">
							<h4 style="color:#888;">Traslados</h4>

						</li>
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>
<style media="screen">
.border-head h3 {
	border-bottom: 1px solid #c9cdd7;
	margin-top: 0;
	margin-bottom: 20px;
	padding-bottom: 5px;
	font-weight: normal;
	font-size: 18px;
	display: inline-block;
	width: 100%;
	font-weight: 300;
}
</style>
<div class="row"  style="padding-left:30px; padding-right:20px;">
	<div class="col-md-7">
		<div class="border-head">
	      <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;color:#888;">Gráfico de Ventas-Días</font></font></h3>
	  </div>
		<canvas id="barraschart"  height="150"></canvas>
	</div>
	<div class="col-md-5" style="padding:10px;">
      <div class="row">
      	<div class="col-md-6 col-xs-6" >

      	</div>
				<div class="col-md-6 col-xs-6">

      	</div>
      </div>
			<div class="row">

			</div>
	</div>
</div>


@push ('scripts')

<script src="{{asset('assets\plugins\jquery\jquery-1.9.1.min.js')}}"></script>
<script src="{{asset('assets\plugins\chart\chart-js\Chart.min.js')}}"></script>



 @endpush
@endsection
