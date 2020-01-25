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

    <!-- SCRIPTS -->
    
<script src="{{("public/Clientside/sextra/jquery.min.js")}}"></script>
  <link rel="stylesheet" type="text/css" href="{{("public/Clientside/sextra/jquery-ui.min.css")}}">
<script src="{{("public/Clientside/sextra/jquery-3.2.1.min.js")}}"></script>

<script src="{{("public/Clientside/sextra/jquery-ui.min.js")}}"></script>
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