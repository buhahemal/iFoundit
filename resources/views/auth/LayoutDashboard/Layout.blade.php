<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Cache-control" content="public">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>@yield('title')</title>
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{asset("public/Theme/global_assets/css/icons/icomoon/styles.css")}}" rel="stylesheet" type="text/css">
	<link href="{{asset("public/Theme/assets/css/bootstrap.min.css")}}" rel="stylesheet" type="text/css">
	<link href="{{asset("public/Theme/assets/css/bootstrap_limitless.min.css")}}" rel="stylesheet" type="text/css">
	<link href="{{asset("public/Theme/assets/css/layout.min.css")}}" rel="stylesheet" type="text/css">
	<link href="{{asset("public/Theme/assets/css/components.min.css")}}" rel="stylesheet" type="text/css">
	<link href="{{asset("public/Theme/assets/css/colors.min.css")}}" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{asset("public/Theme/global_assets/js/main/jquery.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/main/bootstrap.bundle.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/loaders/blockui.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/ui/ripple.min.js")}}"></script>
	<!-- /core JS files -->
	

	
	<!-- Theme JS files -->
	<script src="{{asset("public/Theme/global_assets/js/plugins/visualization/d3/d3.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/visualization/d3/d3_tooltip.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/forms/styling/switchery.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/forms/selects/bootstrap_multiselect.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/ui/moment/moment.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/pickers/daterangepicker.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/forms/styling/uniform.min.js")}}"></script>
	
	<script src="{{asset("public/Theme/assets/js/app.js")}}"></script>
	<script src="{{asset("public/Theme/assets/js/custom.js")}}"></script>

	<script src="{{asset("public/Theme/global_assets/js/demo_pages/dashboard.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/notifications/jgrowl.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/notifications/noty.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/demo_pages/extra_jgrowl_noty.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/tables/datatables/datatables.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/forms/selects/select2.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/loaders/progressbar.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/notifications/sweet_alert.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/visualization/echarts/echarts.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/demo_pages/charts/echarts/pies_donuts.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/extensions/jquery_ui/interactions.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/buttons/spin.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/plugins/buttons/ladda.min.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/demo_pages/components_buttons.js")}}"></script>
    <script src="{{asset("public/Theme/global_assets/js/plugins/visualization/echarts/echarts.min.js")}}"></script>

	<!-- Theme JS files -->
	<script src="{{asset("public/Theme/global_assets/js/plugins/loaders/progressbar.min.js")}}"></script>
	<!-- /theme JS files -->
	
	<script>
	 $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            responsive: true,
            columnDefs: [{ 
                orderable: false,
                width: 100,
                targets: [ 5 ]
            }],
            dom: '<"datatable-header"fl><"datatable-scroll-wrap"t><"datatable-footer"ip>',
            language: {
                search: '<span>Filter:</span> _INPUT_',
                searchPlaceholder: 'Type to filter...',
                lengthMenu: '<span>Show:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });
	</script>

</head>

<body class="navbar-top sidebar-xs">

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark bg-indigo fixed-top">
		<div class="navbar-brand">
			<a href="{{ URL::to('/')}}" class="d-inline-block">
				<img src="{{asset("public/Theme/global_assets/images/Capture.png")}}" alt="">
			</a>
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
			<button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
				<i class="icon-paragraph-justify3"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>

			<span class="navbar-text ml-md-3" id="CurrentTime">
				<span class="badge badge-mark border-orange-300 mr-2"></span>
				
			</span>

			<ul class="navbar-nav ml-md-auto">
			
				<li class="nav-item">
					<a href="{{ URL::to('/logout')}}" class="navbar-nav-link">
						<i class="icon-switch2"></i>
						<span class="d-md-none ml-2">Logout</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				<span class="font-weight-semibold">Navigation</span>
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div class="card-body text-center" style="background-color: #2c3d9a;">
							<a href="#">
								<img src="{{asset("public/Theme/global_assets/images/placeholders/user.png")}}" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark">{{Session::get('AdminName')}}</h6>
							<span class="font-size-sm text-white text-shadow-dark">Amreli, Gujarat</span>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<li class="nav-item">
								<a href="{{ URL::to('/User')}}" class="nav-link">
									<i class="icon-user-plus"></i>
									<span>My profile</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /user menu -->
 

				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
					
						<!-- Main -->
						<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
						<li class="nav-item">
						<a href="{{ URL::to('/Dashboard')}}" class="nav-link"><i class="icon-home2"></i>
								<span>
									Dashboard
								</span></a></li>
						<li class="nav-item">
						<a href="{{ URL::to('/Category')}}" class="nav-link"><i class="icon-quill2"></i>
								<span>
									Category
								</span></a></li>
								<li class="nav-item">
						<a href="{{ URL::to('/adproductslist')}}" class="nav-link"><i class="icon-cart5"></i>
								<span>
									Products
								</span></a></li>
								
								
							
						</li>
						
						<!-- /main -->

					
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

		    @yield("main-content")
			

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
