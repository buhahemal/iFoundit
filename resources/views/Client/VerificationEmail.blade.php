@extends("Client.Layout.Layout2")
@section("title","iFoundit")
@section("main-content") 
<section class="site-section" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
          <form class="login-form" action="{{ url('verifycode') }}" method="post">
                {{csrf_field()}}
               <div class="row form-group">
                <div class="col-md-12"> 
                @if(Session::has("IncorrectCode"))
                <div class="alert alert-danger">
                  <p>Incorrect Code</p>
                </div>
                @endif
               
                  <label class="text-black" for="UserName">{{$UserD->receiver}}</label>
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="Code"></label>
                  <input type="text" required name="v_code" id="v_code" placeholder="Enter 6 Digit Code" class="form-control">
                </div>
              </div>
    
              <div>
              
              <button type="submit" class="btn btn-primary">Verify</button>
            </div>

    
            </form>
          </div>
          <div class="col-lg-5 ml-auto">
            <div class="p-4 mb-3 bg-white">
            <p class="mb-0 font-weight-bold">Address</p>
              <p class="mb-4">203 Adypu. Mountain View, Pune, Maharashtra, India</p>
    
              <p class="mb-0 font-weight-bold">Phone</p>
              <p class="mb-4"><a href="#">+1 232 3235 324</a></p>
    
              <p class="mb-0 font-weight-bold">Email Address</p>
              <p class="mb-0"><a href="#">adypu@gmail.com</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

@stop