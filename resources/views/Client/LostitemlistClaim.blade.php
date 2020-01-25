@extends("Client.Layout.Layout2")
@section("title","iFoundit")
@section("main-content") 

<section class="site-section">
      <div class="container">
        <div class="row">
         
          @foreach ($Product as $pro)
         
          <form  action="{{ url('claimuser') }}" method="post">
                {{csrf_field()}}
          <div class="col-md-12 col-lg-12">
          @if(Session::has("ClaimDone"))
          <div class="alert alert-primary">
                  <p>Your Claim Accept it!</p>
        </div>
          @endif
         
          @if(Session::has("ClaimNotDone"))
          <div class="alert alert-danger">
                  <p>Please try again!</p>
            </div>
          @endif
           <input type="hidden" name="postUserId" value="{{$pro->UserId}}">
          <input type="hidden" Name="itemid" value="{{$pro->Id}}">
          <div class="col-md-6 col-lg-6">
            <a href="#"><img src="{{ URL::asset('public/ItemsImg/'.$pro->Image) }}" alt="Image Was Not Posted"
                class="img-fluid rounded mb-4"></a>
              </div>
              <div class="col-md-6 col-lg-6">
          
            <h3>{{$pro->Name}}</h3>
            <span class="meta"> {{$pro->Description}}</span>
           
            <div>{{date('d F Y', strtotime($pro->created_at))}}<span class="mx-2"></span> 
            <input type="text" class="form-control" Name="ClaimDesription" placeholder="Claim Description">
              <br>
            <button type="submit" class="btn btn-primary">Claim</button>
            <a style="text-decoration: none;" href="{{ URL::to("/")}}"><button type="button"  class="btn btn-light">Cancel</button></a>
</div>
</div>
          </div>
          </form>
         @endforeach

        </div>
       
    
      </div>
    </section>
    <script>
    $(document).ready(function() { 
                var imageUrl =  
"../public/Clientside/images/hero_1.jpg"; 
                $(".home-section").css("background-image", "url(" + imageUrl + ")"); 
            });  
    </script>
@stop