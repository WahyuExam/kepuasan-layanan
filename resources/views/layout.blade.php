<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Aplikasi Kuisioer IMK</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href={{ asset('vendor/atlantis/img/icon.ico') }} type="image/x-icon"/>

	<!-- Fonts and icons -->
    <script src={{ asset("vendor/atlantis/js/plugin/webfont/webfont.min.js")}}></script>
	

	<!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('vendor/atlantis/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('vendor/atlantis/css/atlantis.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/sweet/sweetalert.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome/css/all.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.css')}}">

</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				<div id="jam" style="color: white;"></div>	
				
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Admin
									<span class="user-level">Administrator</span>
								</span>
							</a>
							<div class="clearfix"></div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Menu</h4>
						</li>

						<li class="nav-item">
							<a href="/admin/list-pertanyaan">
								<i class="fas fa-layer-group"></i>
								<p>List Pertanyaan</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="/admin/list-hasil-responden/{{ date('Y-m') }}">
								<i class="fas fa-layer-group"></i>
								<p>Hasil Kuisioner Responden</p>
							</a>
						</li>

						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-layer-group"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="/admin/laporan/form">
											<span class="sub-item">Laporan Index Kepuasan</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
						<li class="nav-item">
							<a href="/logout">
								<i class="fas fa-layer-group"></i>
								<p>Logout</p>
							</a>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
                @yield('content')
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<div class="copyright ml-auto">
						2019, made with <i class="fa fa-heart heart text-danger"></i> by ThemeKita
					</div>				
				</div>
			</footer>
		</div>
		
		
	</div>
	<!--   Core JS Files   -->
	<script src="{{ asset('vendor/atlantis/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('vendor/atlantis/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('vendor/atlantis/js/core/bootstrap.min.js') }}"></script>

	<!-- jQuery UI -->
	<script src="{{ asset('vendor/atlantis/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('vendor/atlantis/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{ asset('vendor/atlantis/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>


	<!-- Chart JS -->
    <script src="{{ asset('vendor/atlantis/js/plugin/chart.js/chart.min.js') }}"></script>
    
	<!-- Chart Circle -->
	<script src="{{ asset('vendor/atlantis/js/plugin/chart-circle/circles.min.js') }}"></script>

	<!-- Datatables -->
	<script src="{{ asset('vendor/atlantis/js/plugin/datatables/datatables.min.js') }}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{ asset('vendor/atlantis/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

	<!-- Sweet Alert -->
	<script src="{{ asset('vendor/atlantis/js/plugin/sweetalert/sweetalert.min.js') }}"></script>

	<!-- Atlantis JS -->
	<script src="{{ asset('vendor/atlantis/js/atlantis.min.js') }}"></script>
	<script src="{{ asset('vendor/sweet/sweetalert.js') }}"></script>
	@include('sweet::alert')

	<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>

	<script type="text/javascript">
		$(function(){
			setInterval(function() {
            	$('#jam').load('/jam2?acak='+ Math.random());
        	}, 1000);
		})
	</script>
    
    @yield('plugins')

	
</body>
</html>