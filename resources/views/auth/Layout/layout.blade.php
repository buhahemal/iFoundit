<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{asset("public/Theme/global_assets/js/plugins/forms/styling/uniform.min.js")}}"></script>

	<script src="{{asset("public/Theme/assets/js/app.js")}}"></script>
	<script src="{{asset("public/Theme/global_assets/js/demo_pages/login.js")}}"></script>
	<!-- /theme JS files -->

</head>

<body>

	<!-- Main navbar -->
	<div class="navbar navbar-expand-md navbar-dark">
		<div class="navbar-brand">
        <a href="{{ URL::to('/')}}" class="navbar-nav-link">
						<i>Asthvinayak Softsolution Pvt. Lmt.</i>
						<span class="d-md-none ml-2">Contact admin</span>
	   </a>		
		</div>

		<div class="d-md-none">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
				<i class="icon-tree5"></i>
			</button>
		</div>

		<div class="collapse navbar-collapse" id="navbar-mobile">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link">
						<i class="icon-display4"></i>
						<span class="d-md-none ml-2">Go to website</span>
					</a>					
				</li>

				<li class="nav-item dropdown">
					<a href="#" class="navbar-nav-link">
						<i class="icon-cog3"></i>
						<span class="d-md-none ml-2">Options</span>
					</a>					
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">


           @yield("main-content")


			<!-- Footer -->
			<div class="navbar navbar-expand-lg navbar-light">
				<div class="text-center d-lg-none w-100">
					<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
						<i class="icon-unfold mr-2"></i>
						Footer
					</button>
				</div>

				<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2018 - 2019. <a href="#">Mandap Web App </a> by <a href="#" target="_blank">Asthvinayak Softsolution PVT. LMT.</a>
					</span>

					<ul class="navbar-nav ml-lg-auto">
						<!-- <li class="nav-item"><a href="https://kopyov.ticksy.com/" class="navbar-nav-link" target="_blank"><i class="icon-lifebuoy mr-2"></i> Support</a></li>
						<li class="nav-item"><a href="http://demo.interface.club/limitless/docs/" class="navbar-nav-link" target="_blank"><i class="icon-file-text2 mr-2"></i> Docs</a></li>
						<li class="nav-item"><a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov" class="navbar-nav-link font-weight-semibold"><span class="text-pink-400"><i class="icon-cart2 mr-2"></i> Purchase</span></a></li>
					 -->
                     </ul>
				</div>
			</div>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
