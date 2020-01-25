@extends("Client.Layout.Layout2")
@section("title","iFoundit")
@section("main-content") 

<section class="site-section" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
          <form class="login-form" action="{{ url('UserLogin') }}" method="post">
                {{csrf_field()}}
                @if(Session::has("Login"))
                <div class="alert alert-danger">
                  <p>Please Check Your Credintails!</p>
                </div>
                @endif
                @if(Session::has("Notlogin"))
                <div class="alert alert-danger">
                  <p>Please Login First!</p>
                </div>
                @endif
                
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">UserName</label>
                  <input type="text" name="UserName" id="email" placeholder="e.g. Hemal Buha" class="form-control">
                </div>
              </div>
    
              <div class="row form-group">
    
                <div class="col-md-12">
                  <label class="text-black" for="password">Password</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>
              </div>
              <div>
              
              <button type="submit" class="btn btn-primary">Login</button>

              <a style="text-decoration: none;" href="{{ URL::to('/UserRegister')}}"><button type="button" class="btn btn-light">Register</button></a>
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