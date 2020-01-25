<!doctype html>
<html lang="en">
  <head>
    <title>iFoundit &mdash;</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset("public/Clientside/css/custom-bs.css")}}">
    <link rel="stylesheet" href="{{asset("public/Clientside/css/jquery.fancybox.min.css")}}">
    <link rel="stylesheet" href="{{asset("public/Clientside/css/bootstrap-select.min.css")}}">
    <link rel="stylesheet" href="{{asset("public/Clientside/fonts/icomoon/style.css")}}">
    <link rel="stylesheet" href="{{asset("public/Clientside/fonts/line-icons/style.css")}}">
    <link rel="stylesheet" href="{{asset("public/Clientside/css/owl.carousel.min.css")}}">
    <link rel="stylesheet" href="{{asset("public/Clientside/css/animate.min.css")}}">
    <link rel="stylesheet" href="{{asset("public/Clientside/css/style.css")}}"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
<script src="{{asset("public/Clientside/sextra/jquery.min.js")}}"></script>
    
  <link rel="stylesheet" type="text/css" href="{{asset("public/Clientside/sextra/jquery-ui.min.css")}}">
  </head>
  <body id="top">


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.html">iFoundit</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
            <li><a href="{{ URL::to('/')}}" class="nav-link active">Home</a></li>
              <li><a href="{{ URL::to('/FoundItem')}}">Found</a></li>
              <li><a href="{{ URL::to('/Lostitemlistal')}}">Lost</a></li>
              @if(Session::has("UserName"))
              <li><a href="{{ URL::to('/UserProfile')}}">Profile</a></li>
              <li><a href="{{ URL::to('/Userlogout')}}">Logout( {{ Session::get('UserName') }} )</a></li>
              @else
              <li><a href="{{ URL::to('/login')}}">Login</a></li>
              @endif
            </ul>
          </nav>

          <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
              
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span
                class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->
    <section class="home-section section-hero inner-page overlay bg-image"
      style="background-image: url('public/Clientside/images/hero_1.jpg');" id="home-section">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12">
            <div class="mb-5 text-center">
              
            </div>
          </div>
        </div>
      </div>
    </section>


    @yield("main-content")

    <footer class="site-footer">


      <div class="container">
        <div class="row mb-5">
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Search Trending</h3>
            <ul class="list-unstyled">
            <li><a href="{{ URL::to('/')}}">Home</a></li>
              <li><a href="{{ URL::to('/FoundItem')}}">Found</a></li>
              <li><a href="{{ URL::to('/Lostitemlistal')}}">Lost</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Company</h3>
            <ul class="list-unstyled">
              <li><a href="#">Adypu</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Support</h3>
            <ul class="list-unstyled">
              <li><a href="#">Support</a></li>
              <li><a href="#">Privacy</a></li>
              <li><a href="#">Terms of Service</a></li>
            </ul>
          </div>
          <div class="col-6 col-md-3 mb-4 mb-md-0">
            <h3>Contact Us</h3>
            <div class="footer-social">
              <a href="#"><span class="icon-facebook"></span></a>
              <a href="#"><span class="icon-twitter"></span></a>
              <a href="#"><span class="icon-instagram"></span></a>
              <a href="#"><span class="icon-linkedin"></span></a>
            </div>
          </div>
        </div>

        <div class="row text-center">
          <div class="col-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> All rights reserved 
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
        </div>
      </div>
    </footer>

  </div>
  <script src="{{asset("public/Clientside/sextra/jquery-3.2.1.min.js")}}"></script>

<script src="{{asset("public/Clientside/sextra/jquery-ui.min.js")}}"></script>
     <script src="{{asset("public/Clientside/js/isotope.pkgd.min.js")}}"></script>
    <script src="{{asset("public/Clientside/js/stickyfill.min.js")}}"></script>
    <script src="{{asset("public/Clientside/js/jquery.fancybox.min.js")}}"></script>
     <script src="{{asset("public/Clientside/js/jquery.easing.1.3.js")}}"></script>
     
 
    <script src="{{asset("public/Clientside/js/jquery.waypoints.min.js")}}"></script>
    <script src="{{asset("public/Clientside/js/jquery.animateNumber.min.js")}}"></script>
    <script src="{{asset("public/Clientside/js/owl.carousel.min.js")}}"></script>
    
    <script src="{{asset("public/Clientside/js/custom.js")}}"></script>

     
  </body>
</html>