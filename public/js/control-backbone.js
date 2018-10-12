$(document).ready(function(){

//////////////////////////// HTML DOM ///////////////////////////

	$(document).on('click', '#productAdd', function(){
        $('.deleteDialog').hide();
        $('.addInput').show();
        $('.modal-title').text('Add New Product');
        $('#btnSave-Product').show().val('addPrd').text("SUBMIT");
        $('#productForm').attr('action', '/addproduct');
        alert($('#productForm').attr('action'));
        $('#productModal').modal('show');
    });

    $(document).on('click', '.editProduct', function(){
    	$('#ident').val($(this).data('id'));
        $('.deleteDialog').hide();
        $('.addInput').show();
        $('#productName').val($(this).data('name'));
        $('#productType option:selected').text($(this).data('type')).val($(this).data('type-id'));
        $('#productPrice').val($(this).data('price'));
        $('#productColor').val($(this).data('color'));
        $('#productSize').val($(this).data('size'));
        $('#productDesc').val($(this).data('desc'));
        $('#otherDesc').val($(this).data('other'));
        $('.modal-title').text('EDIT DATA');
        $('#btnSave-Product').show().text('CONFIRM').val('editPrd');
        $('#productModal').modal('show');
    });

    $(document).on('click', '.deleteProduct', function(){
        $('#ident').val($(this).data('id'));
        $('.deleteDialog').show();
        $('.addInput').hide();
        $('.modal-title').text('DELETE DATA');
        $('#btnSave-Product').show().text('CONFIRM').val('deletePrd');
        $('#productModal').modal('show');
    })

	$(document).on('click', '#typeAdd', function(){
		$('.deleteDialog').hide();
		$('.addInput').show();
        $('.modal-title').text('Add New Product Type');
        $('#btnSave-ProductType').show().val('addType').text("SUBMIT");
        $('#productTypeModal').modal('show');
	});

	$(document).on('click', '.editPrdType', function(){
		$('#ident').val($(this).data('id'));
		$('.deleteDialog').hide();
		$('.addInput').show();
		$('.modal-title').text('EDIT DATA');
		$('#productTypeDesc').val($(this).data('desc'));
		$('#btnSave-ProductType').show().text('SAVE').val('editType');
		$('#productTypeModal').modal('show');
	});

	$(document).on('click', '.deletePrdType', function(){
		$('#ident').val($(this).data('id'));
		$('.deleteDialog').show();
		$('.addInput').hide();
		$('.modal-title').text('DELETE DATA');
		$('#btnSave-ProductType').show().text('CONFIRM').val('deleteType');
		$('#productTypeModal').modal('show');
	});

    $(document).on('click', '#imageAdd', function(){
        $('.deleteDialog').hide();
        $('.addInput').show();
        $('.modal-title').text('Add New Product Image');
        $('#btnSave-ProductImage').show().val('addImage').text("SUBMIT");
        $('#productImageModal').modal('show');
    });

////////////////////// DATATABLE DOM ////////////////////////////

// 	var TableTypeList = $('#TableTypeList').DataTable({
// 		"ajax":"/admin/getTypeList",
// 		"lengthMenu":[[25,50,100,-1], [25,50,100,"All"]],
// 		"columnDefs":[{
// 			"searchable":false,
// 			"orderable":false,
// 			"targets":1,
// 		}],
// 		"columns":[
// 			{bSortable:false,
//                 data:null,
//                 className: "center",
//                 render: function(d){
//                     return '<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i></button><ul class="dropdown-menu" role="menu"><li><a href="#" class="editPrdType" data-id="'+d.product_type_id+'" data-desc="'+d.product_type_desc+'">Edit Data</a></li><li><a href="#" class="deletePrdType" data-id="'+d.product_type_id+'">Delete Data</a></li></ul></div>';
//                 },},
// 			{"data":"product_type_id"},
// 			{"data":"product_type_desc"},
// 		],
// 		"order": [[0, 'desc']],
// 	});
// 	TableTypeList.on( 'order.dt search.dt', function() {
//         TableTypeList.column(1, {search:"applied", order:"applied"}).nodes().each(function(cell,i){
//             cell.innerHTML = i+1;
//         });
//     }).draw();


//     var TableProduct = $('#TableProduct').DataTable({
// 		"ajax":"/admin/getProduct",
// 		"lengthMenu":[[25,50,100,-1], [25,50,100,"All"]],
// 		"columnDefs":[{
// 			"searchable":false,
// 			"orderable":false,
// 			"targets":1,
// 		}],
// 		"columns":[
// 			{bSortable:false,
//                 data:null,
//                 className: "center",
//                 render: function(d){
//                     return '<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i></button><ul class="dropdown-menu" role="menu">' +
//                     '<li><a href="#" class="editProduct" data-id="'+d.product_id+'" data-name="'+d.product_name+'" data-type-id="'+d.product_type_id+'" data-type="'+d.product_type_desc+'" data-price="'+d.product_price+'" data-color="'+d.product_color+'" data-size="'+d.product_size+'" data-desc="'+d.product_desc+'" data-other="'+d.other_product_desc+'">Edit Data</a></li>' + 
//                     '<li><a href="#" class="deleteProduct" data-id="'+d.product_id+'">Delete Data</a></li></ul></div>';
//                 },},
// 			{"data":"product_id"},
// 			{"data":"product_name"},
// 			{"data":"product_type_desc"},
// 			{"data":"product_price"},
// 			{"data":"product_color"},
// 			{"data":"product_size"},
// 			{"data":"product_desc"},
// 		],
// 		"order": [[1, 'desc']],
// 	});
// 	TableProduct.on( 'order.dt search.dt', function() {
//         TableProduct.column(1, {search:"applied", order:"applied"}).nodes().each(function(cell,i){
//             cell.innerHTML = i+1;
//         });
//     }).draw();

// ////////////////////////// JQUERY SECTION /////////////////////////

// 	$('#btnSave-Product').click(function (e) {
// 		$.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//             }
//         })
// 		var state = $('#btnSave-Product').val();
// 		var formData = {
// 			prdName : $('#productName').val(),
// 			prdType : $('#productType').val(),
// 			prdPrice : $('#productPrice').val(),
// 			prdColor : $('#productColor').val(),
// 			prdSize : $('#productSize').val(),
// 			prdDesc : $('#productDesc').val(),
// 			othDesc : $('#otherDesc').val(),
// 		}
// 		var TableProduct = $('#TableProduct').DataTable();
// 		console.log();
// 		switch(state)
// 		{
// 			case "addPrd" :
// 			var type = "POST";
// 			var my_url = "/admin/addproduct";
// 			e.preventDefault();
// 			$.ajax({
// 				type: type,
// 				url: my_url,
// 				data: formData,
// 				dataType: 'json',
// 				success: function (data) {
// 					console.log(data);
// 					TableProduct.ajax.reload();
// 					$('#productForm').trigger('reset');
// 					$('#productModal').modal('hide');
// 					toastr.success('Successfully Added Data', 'Success Alert', {timeOut: 5000});
// 				},
// 				error: function (data) {
// 					console.log(data);
// 					toastr.error('Unknown Error From Server', 'Error Alert', {timeOut: 5000});
// 				}
// 			});
// 			break;
//             case "editPrd" :
//             var id = $('#ident').val();
//             var type = "PATCH";
//             var my_url = "/admin/editprd/"+id;
//             e.preventDefault();
//             $.ajax({
//                 type: type,
//                 url: my_url,
//                 data: formData,
//                 dataType: 'json',
//                 success: function (data){
//                     console.log(data);
//                     TableProduct.ajax.reload();
//                     $('#productForm').trigger('reset');
//                     $('#productModal').modal('hide');
//                     toastr.success('Successfully Edit This Data', 'Success Alert', {timeOut: 5000});
//                 },
//                 error: function (data) {
//                     console.log(data);
//                     toastr.error('Unknown Error From Server', 'Error Alert', {timeOut: 5000});
//                 }
//             });
//             break;
//             case "deletePrd" :
//             var id = $('#ident').val();
//             var type = "DELETE";
//             var my_url = "/admin/deleteprd/"+id;
//             e.preventDefault();
//             $.ajax({
//                 type: type,
//                 url: my_url,
//                 data: formData,
//                 dataType: 'json',
//                 success: function (data){
//                     console.log(data);
//                     TableProduct.ajax.reload();
//                     $('#productForm').trigger('reset');
//                     $('#productModal').modal('hide');
//                     toastr.success('Successfully Delete This Data', 'Success Alert', {timeOut: 5000});
//                 },
//                 error: function (data) {
//                     console.log(data);
//                     toastr.error('Unknown Error From Server', 'Error Alert', {timeOut: 5000});
//                 }
//             });
//             break;
// 		}
// 	});


// 	$('#btnSave-ProductType').click(function(e){
// 		$.ajaxSetup({
//             headers: {
//                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//             }
//         })
//         var state = $('#btnSave-ProductType').val();
//         var formData = { prdTypeDesc : $('#productTypeDesc').val(), }
//         var TableTypeList = $('#TableTypeList').DataTable();
//         console.log();
//         switch(state)
//         {
//         	case "addType" :
//         	var type = "POST";
//         	var my_url = "/admin/addprdtype";
//         	e.preventDefault();
//         	$.ajax({
//         		type: type,
//         		url: my_url,
//         		data: formData,
//         		dataType: 'json',
//         		success: function (data) {
//         			console.log(data);
//         			TableTypeList.ajax.reload();
//         			$('#productTypeForm').trigger('reset');
//         			$('#productTypeModal').modal('hide');
//                     $('#productType').html();
//         			toastr.success('Successfully Added Data', 'Success Alert', {timeOut: 5000});
//         		},
//         		error: function (data) {
//         			console.log(data);
//         			toastr.error('Unknown Error From Server', 'Error Alert', {timeOut: 5000});
//         		}
//         	});
//         	break;
//         	case "editType" :
//         	var id = $('#ident').val();
//         	var type = "PATCH";
//         	var my_url = "/admin/editprdtype/"+id;
//         	e.preventDefault();
//         	$.ajax({
//         		type: type,
//         		url: my_url,
//         		data: formData,
//         		dataType: 'json',
//         		success: function (data) {
//         			console.log(data);
//         			TableTypeList.ajax.reload();
//         			$('#productTypeForm').trigger('reset');
//         			$('#productTypeModal').modal('hide');
//         			toastr.success('Successfully Edit This Data', 'Success Alert', {timeOut: 5000});
//         		},
//         		Error: function (data) {
//         			console.log(data);
//         			toastr.error('Unknown Error From Server', 'Error Alert', {timeOut: 5000});
//         		}
//         	});
//         	break;
//         	case "deleteType" :
//         	var id = $('#ident').val();
//         	var type = "DELETE";
//         	var my_url = "/admin/deleteprdtype/"+id;
//         	$.ajax({
//         		type: type,
//         		url: my_url,
//                 data: formData,
//                 dataType: 'json',
//         		success: function (data) {
//                     console.log(data);
//         			TableTypeList.ajax.reload();
//         			$('#productTypeForm').trigger('reset');
//         			$('#productTypeModal').modal('hide');
//         			toastr.success('Successfully Delete This Data', 'Success Alert', {timeOut: 5000});
//         		},
//         		Error: function (data) {
//         			console.log(data);
//         			toastr.error('Unknown Error From Server', 'Error Alert', {timeOut: 5000});
//         		}
//         	});
//         	break;
//         }

// 	});

// 	//========================================================
});