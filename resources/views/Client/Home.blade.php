@extends("Client.Layout.Layout")
@section("title","iFoundit")
@section("main-content") 
<script src="{{("public/Clientside/Extrajs/jquery.min.js")}}"></script>
<link rel="stylesheet" type="text/css" href="{{("public/Clientside/Extrajs/jquery-ui.min.css")}}">
  <script src="{{("public/CustomjsForView/Homeclient.js")}}"></script>
<script src="{{("public/Clientside/Extrajs/sweetalert.min.js")}}"></script>
 <!-- NAVBAR -->
 <header class="site-navbar mt-3">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="site-logo col-6"><a href="index.html">iFoundit</a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
              <li><a href="#" class="nav-link active">Home</a></li>
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
          
          <div class="right-cta-menu text-right d-flex aligin-items-center col-6" style="flex-flow: row-reverse;">
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>

    <!-- HOME -->
    <section class="home-section section-hero inner-page overlay bg-image" style="background-image: url('public/Clientside/images/hero_1.jpg');" id="home-section">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-12" style="margin-top: -20px;">
            <div class="mb-5 text-center">
              <h1 class="text-white font-weight-bold">1 Million Happy Lossers!</h1>
             </div>
            <form method="post" action="{{ url('Serachuser') }}" class="search-jobs-form">
            {{csrf_field()}}
              <div class="row mb-5">
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <input id="productname" type='text' name="productname" class="form-control" placeholder="Product Name..." name='productname'/>
                
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                  <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

      
    </section>
    

    
    <section class="site-section py-4 mb-5 border-top">
      <div class="container">
  
        <div class="row align-items-center">
          <div class="col-12 text-center mt-4 mb-5">
            <div class="row justify-content-center">
              <div class="col-md-7">
                <h2 class="section-title mb-2">Our Candidates Work In Company</h2>
                <p class="lead">PartnerShip With</p>
              </div>
            </div>
            
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="public/Clientside/images/logo.png" alt="Image" class="img-fluid logo-1">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="public/Clientside/images/logo.png" alt="Image" class="img-fluid logo-1">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="public/Clientside/images/logo.png" alt="Image" class="img-fluid logo-1">
          </div>
          <div class="col-6 col-lg-3 col-md-6 text-center">
            <img src="public/Clientside/images/logo.png" alt="Image" class="img-fluid logo-1">
          </div>
        </div>
      </div>
    </section>


    <section class="bg-light pt-5 testimony-full">
        
        <div class="owl-carousel single-carousel">

        
          <div class="container">
            <div class="row">
              <div class="col-lg-6 mx-auto">
                <img class="img-fluid mx-auto" src="public/Clientside/images/Home-image.jpg" alt="Image">
                <blockquote>
                  <p>&ldquo;aim For the moon if you miss you may land among star.&rdquo;</p>
                  <p><cite> &mdash; Hemal Buha</cite></p>
                </blockquote>
              </div>
            </div>
          </div>

          <div class="container">
            <div class="row">
              <div class="col-lg-6 mx-auto">
                <img class="img-fluid mx-auto" src="public/Clientside/images/Home-image.jpg" alt="Image">
                <blockquote>
                  <p>&ldquo;First 'LEARN' then simple Remove 'L'.&rdquo;</p>
                  <p><cite> &mdash; Hemal Buha</cite></p>
                </blockquote>
              </div>
            </div>
          </div> 

      </div>

    </section>

<script>
$(document).on('focus','#productname',function(){
  
  $(this).autocomplete({
      minLength: 1,
      source: function( request, response ) {
           $.ajax({
               type:'GET',
               url: "{{ URL::to('searchproduct') }}",
               dataType: "json",
               data: {
                   term : request.term,
               },
               success: function(data) {

                   var array = $.map(data, function (item) {
                      return {
                          label: item['Name'],
                          value: item['Name'],
                          data : item
                      }
                  });
                   response(array)
               }
           });
                  
      },
      select: function( event, ui ) {
          
      }
  });
  
  
});

</script>
<script>
 var config = {
        routes: {
          categorygetall:"{{ URL::to('categorygetall')}}",
          searchproduct:"{{ URL::to('searchproduct')}}",
            
        }
    };


</script>
<script>
var UserId={{ Session::get('UserId')}};

if(UserId>0)
{
  $.ajax({
                url: "{{ URL::to('checknotification')}}",
                data: {"Id":UserId,"_token": "{{ csrf_token() }}"},
                dataType:"json",
                type: 'POST',
                beforeSend:function() {
                },
                success: function (data) {
                 
                  if(data.length>0)
                  {
                    swal({
                              title: "Are you sure?",
                              text:  "Item Name :- "+data[1].Name+"\nItemDescription :-"+data[0].CliamDescription,
                              icon: "warning",
                              buttons: true,
                              dangerMode: true,
                            })
                            .then((willDelete) => {
                              if (willDelete) {
                                $.ajax({
                                      url: "{{ URL::to('notificationupdate')}}",
                                      data: {"Id":data[0].Id,"Status":3,"_token": "{{ csrf_token() }}"},
                                       dataType:"json",
                                      type: 'POST',
                                      success:function(data){
                                          
                                       swal("You Accept The Claim!", {
                                        icon: "success",
                                      });
                                          /*   $.ajax({
                                            url: "{{ URL::to('claimaccept')}}",
                                            data: {"Id":UserId,"_token": "{{ csrf_token() }}"},
                                            dataType:"json",
                                            type: 'POST',
                                            success:function(data){
                                                
                                              swal("You Cancel The Claim!");
                                            }
                                          }); */
                                      }
                                    });
                              } else {
                                $.ajax({
                                      url: "{{ URL::to('notificationupdate')}}",
                                      data: {"Id":data[0].Id,"Status":2,"_token": "{{ csrf_token() }}"},
                                      dataType:"json",
                                      type: 'POST',
                                      success:function(data){
                                          
                                        swal("You Cancel The Claim!");
                                      }
                                    });
                                
                              }
                            });
                  }
                  else
                  {

                  }
                },
                error:function() {},
                complete:function() {
                
                }
            });

}
else
{

}

                                 
</script>   
    @stop

