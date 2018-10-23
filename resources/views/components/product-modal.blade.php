<!-- Modal -->

<div id="productModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Product</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="productForm">
				{{csrf_field()}}
					<div style="text-align: center;">
								<br>
								<h5 type="text" class="deleteDialog">Delete Data?</h5>
						<div class="form-group addInput">
							<label for="productName" class="col-md-3 control-label addInput">Product Name</label>
							<div class="col-md-4">
								<input type="text" style="width: 400px;" class="form-control addInput" id="productName" name="productName" placeholder="Type Product Name...">
							</div>
						</div>
						<div class="form-group addInput">
							<label for="productType" class="col-md-3 control-label addInput">Product Type</label>
							<div class="col-md-4">
								<select class="form-control addInput" name="productType" id="productType">
									@foreach($prdType as $key)
									<option value="{{$key->product_type_id}}">{{$key->product_type_desc}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="form-group addInput">
							<label for="productPrice" class="col-md-3 control-label addInput">Product Price</label>
							<div class="col-md-4">
								<input type="text" style="width: 400px;" class="form-control addInput" name="productPrice" id="productPrice" placeholder="Type Product Price...">
							</div>
						</div>
						<div class="form-group addInput">
							<label for="productQty" class="col-md-3 control-label addInput">Product Quantity</label>
							<div class="col-md-4">
								<input type="text" style="width: 400px;" class="form-control addInput" name="productQty" id="productQty" placeholder="Type Product Quantity...">
							</div>
						</div>
						{{-- <div class="form-group addInput">
							<label for="productColor" class="col-md-3 control-label addInput">Product Color</label>
							<div class="col-md-4">
								<input type="text" style="width: 400px;" class="form-control addInput" name="productColor" id="productColor" placeholder="Assign All Color for This Product (separate with [,])">
							</div>
						</div>
						<div class="form-group addInput">
							<label for="productSize" class="col-md-3 control-label addInput">Product Size</label>
							<div class="col-md-4">
								<input type="text" style="width: 400px;" class="form-control addInput" name="productSize" id="productSize" placeholder="Assign All Size for This Product (separate with [,])">
							</div>
						</div> --}}
						<div class="form-group addInput">
							<label for="productDesc" class="col-md-3 control-label addInput">Description</label>
							<div class="col-md-4">
								<input type="text" style="width: 400px;" class="form-control addInput" name="productDesc" id="productDesc" placeholder="Type Product Description...">
							</div>
						</div>
						<div class="form-group addInput">
							<label for="otherDesc" class="col-md-3 control-label addInput">Other Desc</label>
							<div class="col-md-4">
								<input type="text" style="width: 400px;" class="form-control addInput" name="otherDesc" id="otherDesc" placeholder="Type Detailed Description (Optional)">
							</div>
						</div>
						<div class="form-group">
								<button class="btn btn-default" id="dismiss" data-dismiss="modal">CLOSE</button>
								<button type="submit" class="btn btn-primary" id="btnSave-Product" value="add">SUBMIT</button>
								<input type="hidden" name="ident" id="ident" value="">
						</div>
					
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
