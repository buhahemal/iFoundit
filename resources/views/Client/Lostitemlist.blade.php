@extends("Client.Layout.Layout2")
@section("title","iFoundit")
@section("main-content") 
<style type="text/css">
  .claimbt{
    text-decoration: none;
    font-family: serif;
    border-style: groove;
    border-color: black;
    width: 143px;
    float: left;
    text-align: center;
  } 
</style>

<section class="site-section">
      <div class="container">
        <div class="row mb-5">
          @foreach ($Product as $pro)
          <div class="col-md-6 col-lg-4 mb-5">
            <a href="#"><img src="{{ URL::asset('public/ItemsImg/'.$pro->Image) }}" alt="Image Was Not Posted"
                class="img-fluid rounded mb-4"></a>
            <h3><a href="#" style="text-decoration: none;" class="text-black">{{$pro->Name}}</a></h3>
            <div>{{date('d F Y', strtotime($pro->created_at))}}<span class="mx-2">|</span> <br>
              <a style="text-decoration: none;" href="{{ URL::to("Lostitemlistal/$pro->Id")}}"><button type="button" class="btn btn-primary">Claim</button></a>
              <a style="text-decoration: none;" href="{{ URL::to("/")}}"><button type="button"  class="btn btn-light">Cancel</button></a>
               </div>
 </div>
         @endforeach

        </div>
       
    
      </div>
    </section>
@stop