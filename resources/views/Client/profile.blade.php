@extends("Client.Layout.Layout2")
@section("title","iFoundit")
@section("main-content") 

<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="{{("public/Clientside/Extrajs/sweetalert.min.js")}}"></script>
<section class="site-section">
      <div class="container">

         <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Profile</h2>
          </div>
        </div>
       
        @if(Session::has("Sucess"))
        <div class="alert alert-primary">
                  <p>Your Profile Was Updated!</p>
                </div>
                @endif
  
        @foreach ($User as $U)
        <div class="mb-5">
          <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
            <div class="col-md-2">
              <img src="{{ URL::asset('public/Imagesall/'.$U->Image) }}" style="border-radius: 50%;height: 110px;
    float: right;" alt="Image" id="profileimage" class="img-fluid">
            </div>
            <div class="col-md-4 text-left">
            <strong class="text-black">{{$U->URNNO}}</strong>
            </div>
            <div class="col-md-3 text-left">
            <strong class="text-black">{{$U->Username}}</strong><br>
            <span>{{$U->Email}}</span>
            </div>
            <div class="col-md-3 text-md-right">
              <strong class="text-black">{{$U->Date}}</strong>
              <br>
              <br>
            
          <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update Profile</button>
            </div>
          </div>
          
        </div> 
          @endforeach

     </div> 
</section>


<section class="site-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Posted Product</h2>
          </div>
        </div>

        @foreach ($Items as $pro)

        <div class="mb-5">
          <div class="row align-items-start job-item border-bottom">
            <div class="col-md-2">
              <img src="{{ URL::asset('public/ItemsImg/'.$pro->Image) }}" style="height: 110px;
    float:right;" alt="Image" id="itemimage" class="img-fluid">
            </div>
            <div class="col-md-4 text-left">
            @if($pro->Status==1)
              <span class="badge badge-primary">Pending</span>
            @endif
            @if($pro->Status==2)
              <span style="background-color:green" class="badge badge-success">Complete</span>
            @endif
            </div>
            <div class="col-md-3 text-left">
            <strong class="text-black">{{$pro->Name}}</strong>
              <span>{{$pro->Description}}</span>
            </div>
            <div class="col-md-3 text-md-right">
              <strong class="text-black">{{$pro->created_at}}</strong>
              <br>
              <br>
            
            </div>
          </div>
          
        </div> 
                @endforeach
          
          </div>
    </section>
    <section class="site-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-md-7 text-center">
            <h2 class="section-title mb-2">Claim Product</h2>
           
          </div>
        </div>
       
        @foreach ($Itemclaim as $pro)
        <div class="mb-5">
          <div class="row align-items-start job-item border-bottom pb-3 mb-3 pt-3">
            <div class="col-md-2">
              <img src="{{ URL::asset('public/ItemsImg/'.$pro->Image) }}" alt="Image" class="img-fluid img-responsive">
            </div>
            <div class="col-md-4">
            @if($pro->St==1)
              <span class="badge badge-primary">Pending</span>
            @endif
            @if($pro->St==3)
              <span class="badge badge-success">Compelte</span>
            @endif
            @if($pro->St==2)
              <span class="badge badge-warning">Cancel</span>
            @endif
            </div>
            <div class="col-md-3 text-left">
              <h3>{{$pro->Name}}</h3>
              <span class="meta">{{$pro->CliamDescription}}</span>
            </div>
            <div class="col-md-3 text-md-right">
            @if($pro->St==3)
              <button type="button" class="btn btn-primary getid" id="{{$pro->Getuserid}}">Get Mail</button>
            @endif
            </div>
          </div>
        </div> 
        @endforeach
          
          </div>
    </section>
    <!-- Modal -->
  <div class="modal fade full_modal-dialog"" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
          
        @foreach ($User as $U)
        <form class="login-form" action="{{ url('UpUserRegister') }}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
        <div class="mb-12">
        <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Email</label>
                  <input type="Email" required name="Email" id="email" value="{{$U->Email}}" placeholder="e.g. example@adypu.co.in" class="form-control">
                </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <input type="hidden" name="Pid" value="{{$U->Id}}">
                  <label class="text-black" for="email">UserName</label>
                  <input type="text" required name="UserName" id="email" value="{{$U->Username}}" placeholder="e.g. Hemal Buha" class="form-control">
                </div>
              </div>
    
              <div class="row form-group">
                 <div class="col-md-12">
                  <label class="text-black" for="URNNO">URNNO</label>
                  <input type="text" required name="URNNO" id="URNNO" value="{{$U->URNNO}}" class="form-control">
                </div>
              </div>
              <div class="row form-group">
                 <div class="col-md-12">
                  <label class="text-black" for="Image">Image</label>
                  <input type="file" name="UpprofileupImage" id="ppImage" value="{{$U->URNNO}}" class="form-control">
                  <img id="upprofileimage" class="img-thumbnail" src="{{ URL::asset('public/Imagesall/'.$U->Image) }}" alt="Image Preivew" />
    
                </div>
              </div>
              
        </div> 
       
          @endforeach

        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update Profile</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#upprofileimage').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}
$("#ppImage").change(function() {
  readURL(this);
});
$(document).on('click','.getid',function(){
                                     $.ajax({
                                      url: "{{ URL::to('getemailid')}}",
                                      data: {"Id":this.id,"_token": "{{ csrf_token() }}"},
                                       dataType:"json",
                                      type: 'POST',
                                      success:function(data){
                                        swal("Contact Mail!", data[0]['Email'], "success");

                                      }
    });
});
</script>

@stop