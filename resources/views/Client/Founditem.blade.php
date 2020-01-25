@extends("Client.Layout.Layout2")
@section("title","iFoundit")
@section("main-content") 

<section class="site-section" id="next-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
          <form class="login-form" action="{{ url('UserItemFound') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                @if(Session::has("FailedRegister"))
                  <div class="alert alert-danger">
                  <p>Please try again!</p>
                </div>
                @endif
                @if(Session::has("DoneFully"))
                <div class="alert alert-primary">
                  <p>Your Post Posted!</p>
                </div>
                @endif
                
                <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="email">Category</label>
                  <select name="categoryId" id="Category" class="form-control branchname">

                    @foreach ($category as $key)
                        <option value="{{ $key->Id }}">{{ $key->Category_Name }}</option>
                    @endforeach
                    </select>
                    </div>
              </div>
              <div class="row form-group">
                <div class="col-md-12">
                  <label class="text-black" for="Name">ItemName</label>
                  <input type="text" required name="itemName" id="email" placeholder="e.g. Iphonex" class="form-control">
                </div>
              </div>
    
              <div class="row form-group">
    
                <div class="col-md-12">
                  <label class="text-black" for="Description">Description</label>
                  <input type="text" required name="Description" id="Description" class="form-control">
                </div>
              </div>

              <div class="row form-group">
    
    <div class="col-md-12">
      <label class="text-black" for="Image">Description</label>
      <input type="file" required name="ItemImage" id="Image" class="form-control">
    </div>
  </div>
              <div>
              
              <button type="submit" class="btn btn-primary">Post Item</button>
               </div>

    
            </form>
          </div>
          <div class="col-lg-5 ml-auto">
            <div class="p-4 mb-3 bg-white">
            <img id="itemimage" style="height: 300px;
    width: 525px;" src="#" class="img-thumbnail img-rounded" alt="Item Image Preivew" />
    
            </div>
          </div>
         
        </div>
      </div>
    </section>
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#itemimage').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}
$("#Image").change(function() {
  readURL(this);
});
</script>
    @stop