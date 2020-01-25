@extends("auth.LayoutDashboard.Layout")
@section("title","iFoundit")
@section("main-content")
	<script src="{{("public/CustomjsForView/products.js")}}"></script>
<div class="content"> 
    <!-- 2 columns form -->
        <div class="card loaderanim">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Products</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                 		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>
					<form action="{{ url('AdminPostLoseitem') }}" method="post" enctype="multipart/form-data">
           
					<div class="card-body">
		 					<div class="row">
							     {{csrf_field()}}
                @if(Session::has("FailedRegister"))
                        <div class="col-md-12">
                            <p style="color: red"><b>Please Try Again ! </b></p>
                        </div>
                @endif
                @if(Session::has("DoneFully"))
                        <div class="col-md-12">
                            <p style="color: green"><b>Your Post Posted ! </b></p>
                        </div>
                @endif
										<legend class="font-weight-semibold"><i class="icon-tree7 mr-2"></i>Find-Item Add</legend>
                                        <div class="col-md-2">
                                            <label>Category</label>
											<select id="product_category" name="categoryId" autofocus data-placeholder="Choose Category" class="form-control select-clear" data-foucs>
									        </select>
								        </div>
										<div class="col-md-2">
                                            <label>Product-Name</label>
										    <div class="form-group">
											    <input type="text" required name="itemName" id="product_name" class="form-control" placeholder=" e.g. Phone">
										    </div>
                                        </div>
										<div class="col-md-2">
                                            <label>Product-Description</label> 
										    <div class="form-group">
											    <input type="text" required name="Description" id="product_description" class="form-control" placeholder=" e.g. Black Cover Iphone">
										    </div>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Image</label>
										    <div class="form-group">
											    <input type="file" required name="ItemImage"  id="product_image" class="form-control">
										    </div>
                                        </div>
										<div class="col-md-4">
                                            <label>Image-Preview</label>
										    <div class="form-group">
											<img id="itemimage"  src="#" class="img-thumbnail img-rounded" />
											</div>
                                        </div>
										<div class="col-md-2">
								                <button type="submit" class="btn btn-primary product_save" style="margin-top: 15px;">Save Product<i class="icon-paperplane ml-2"></i></button>
										</div>
										
								
                                </div>
                            </div>
					</div>
				</form>
				<!-- /2 columns form -->

					<!-- Nested object data -->
					<div class="row">
					<div class="col-xl-12">
					<div class="card tabledata">

					<div class="card-header header-elements-inline">
						<h5 class="card-title">Product data</h5>
						<div class="header-elements">
							<div class="list-icons">
							<div class="dropdown show">
											<a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="true">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-158px, 19px, 0px);">
												<a href="{{ route('ProductExport') }}" class="dropdown-item"><i class="icon-file-excel"></i> Export to .xlsx</a>
											</div>
										</div>
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
								
		                	</div>
	                	</div>
					</div>
                    
					<table class="table datatable-html dataTable no-footer">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
								<th>Image</th>
                                <th>PostUserName</th>
								<th>ClaimUsername</th>
                                <th>Category</th>
								<th>Post-Date</th>
								<th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                   
				</div>
				</div>
				<!-- /nested object data -->
			</div>
		</div>
		


	
</div>
</div>
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
$("#product_image").change(function() {
  readURL(this);
});
</script>
<script>
 var config = {
        routes: {
           
            loadtable: "{{ route('Products.index') }}",
            pcatlist: "{{ route('pcatlist') }}",
        }
    };


</script>            
@stop