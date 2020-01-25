@extends("auth.LayoutDashboard.Layout")
@section("title","iFoundit")
@section("main-content")
	<script src="{{("public/CustomjsForView/CategoryCs.js")}}"></script>
<div class="content"> 
    <!-- 2 columns form -->
        <div class="card loaderanim">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Category</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
		 					<div class="row">
								{{csrf_field()}}
										<legend class="font-weight-semibold"><i class="icon-tree7 mr-2"></i>Add Category</legend>
                                        <div class="col-md-4">
										    <div class="form-group">
											   
											    <input type="text" autofocus reuired class="form-control Category" placeholder=" e.g. Phone">
										    </div>
                                            
                                        </div>
                                        <div class="col-md-2 text-right">
								                <button type="button" class="btn btn-primary savecategory">Save Category<i class="icon-paperplane ml-2"></i></button>
                                        </div>
                                </div>
                            </div>
						
					</div>
				
				<!-- /2 columns form -->

					<!-- Nested object data -->
					<div class="row">
					<div class="col-xl-6">
					<div class="card tabledata">

					<div class="card-header header-elements-inline">
						<h5 class="card-title">Category data</h5>
						<div class="header-elements">
							<div class="list-icons">
							<div class="dropdown show">
											<a href="#" class="list-icons-item" data-toggle="dropdown" aria-expanded="true">
												<i class="icon-menu9"></i>
											</a>

											<div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-158px, 19px, 0px);">
												<a href="{{ route('ExcelCategoryExport') }}" class="dropdown-item"><i class="icon-file-excel"></i> Export to .xlsx</a>
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
                                <th>Category_Name</th>
                                <th>Operation</th>
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
		


		<!-- Category form modal -->
		<div id="CategoryModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Category</h5>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<form action="#">
								<div class="modal-body">
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 offset-3">
												<label>Category:</label>
													<input type="text" autofocus placeholder="Category Name" id="ucat" class="form-control">
													<input type="hidden" id="ucatid">
											</div>
										</div>
									</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
									<button type="button" class="btn bg-primary btnupdatecategory">Update</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /Category form modal -->
</div>
</div>
<script>
 var config = {
        routes: {
            deltecategory: "{{ URL::to('deletecategory') }}",
            StoreCategory: "{{ URL::to('StoreCategory') }}",
            getcategory: "{{ URL::to('getcategory') }}",
            loadtable: "{{ route('Category.index') }}",
            getpcategory:"{{ URL::to('getpcategory')}}",
            updatecategory:"{{ URL::to('updatecategory')}}",
        }
    };


</script>            
@stop