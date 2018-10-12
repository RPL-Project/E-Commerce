<!-- Modal -->

<div id="productImageModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add New Image</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" id="productImageForm" enctype="multipart/form-data">
				{{csrf_field()}}
					<div style="text-align: center;">
								<br>
								<h5 type="text" class="deleteDialog">Delete Image?</h5>
						<div class="form-group addInput">
							<label for="productTypeDesc" class="col-md-3 control-label addInput">Image</label>
							<div class="col-md-4">
								<input type="file" style="width: 400px;" class="form-control addInput" id="productImage" name="image" multiple>
							</div>
						</div>
						<div class="form-group">
								<button class="btn btn-default" id="dismiss" data-dismiss="modal">CLOSE</button>
								<button type="submit" class="btn btn-primary" id="btnSave-ProductImage" value="">SUBMIT</button>
								<input type="hidden" name="ident" id="ident" value="">
						</div>
					
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
