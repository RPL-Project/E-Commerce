$(document).ready(function(){

/////////////////predefined Process//////////////////////////
    refreshCart();

    refreshPrdName();

    refreshPrdImage();

    // getProductType();

    getProduct();

////////////////////////// AJAX FUNCTION ////////////////////////////

    function ajaxGet(Url){
        return $.ajax({
                    url : Url,
                    method : 'GET',
                    dataType : 'json',
                });
    }

    function ajaxPatch(Url,FormData){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        return $.ajax({
            url : Url,
            method : "PATCH",
            data : FormData,
            dataType : "json",
        });
    }

    // function getProductType(){
    //     ajaxGet('/product/type').done(function(result){
    //         $(result).each(function(){
    //             $('.product-type').append(
    //                     '<li class="p-t-4">'+
    //                         '<a href="#'+this.product_type_desc+'" class="s-text13 active1">'+
    //                             this.product_type_desc+
    //                         '</a>'+
    //                     '</li>'
    //                 );
    //         });
    //     }).fail(function(){

    //     });
    // }

    function refreshPrdImage(){
        var id = $('#productid').val();
        ajaxGet('/product/images/'+id).done(function(result){
            $(result).each(function(){
                if(this.file_type == "Main"){
                    $('#prdImages').append(
                            '<div class="wrap-pic-w">'+
                                '<img src="/images/product/'+this.file_name+'" alt="IMG-PRODUCT">'+
                            '</div>');
                }
                // else if(this.file_type == "Ext"){
                //     $('#prdImages').append(
                //             '<div class="item-slick3" data-thumb="/images/product/'+this.file_name+'">'+
                //             '<div class="wrap-pic-w">'+
                //                 '<img src="/images/product/'+this.file_name+'" alt="IMG-PRODUCT">'+
                //             '</div>'+
                //         '</div>');
                // }
            });
        }).fail();
    }

    function refreshPrdName(){
        $('#productNameForImage').find('option').remove().end();
        ajaxGet('/admin/product/name/show').done(function(result){
            console.log(result);
                $(result).each(function(){
                    var option = $("<option/>");
                    option.attr('value', this.product_id).text(this.product_name);
                    $('#productNameForImage').append(option);
                });
        }).fail(function(){
            // alert('ajaxGet Product Name Failed');
        });
    }

    function refreshCart(){
        var id = $('#customerid').val();
        ajaxGet("/user/cart/items/show/"+id).done(function(result){
            console.log(result);
            $('#table-shopping-cart-body').empty();

                var totalPrice = 0;
                $(result).each(function(){
                    $('#table-shopping-cart-body').append(
                        '<tr class="table-row">'+
                            '<td class="column-1">'+
                                '<input type="hidden" id="productid" value="'+this.product_id+'">'+
                                '<div class="cart-img-product b-rad-4 o-f-hidden">'+
                                    '<img src="/images/product/'+ this.file_name +'" alt="IMG-PRODUCT">'+
                                '</div>'+
                            '</td>'+
                            '<td class="column-2">'+this.product_name+'</td>'+
                            '<td class="column-3">Rp.'+this.product_price+'</td>'+
                            '<td class="column-4">'+
                                '<div class="flex-w bo5 of-hidden w-size17">'+
                                    '<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">'+
                                        '<i class="fs-12 fa fa-minus" aria-hidden="true"></i>'+
                                    '</button>'+
                                    '<input class="size8 m-text18 t-center num-product cart-detail" type="number" name="num-product1" value="'+this.order_qty+'">'+
                                    '<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">'+
                                        '<i class="fs-12 fa fa-plus" aria-hidden="true"></i>'+
                                    '</button>'+
                                '</div>'+
                            '</td>'+
                            '<td class="column-5">Rp.<span class="product-total-price">'+(this.product_price * this.order_qty)+'</span></td>'+
                            '</tr>');
                    totalPrice = Number(totalPrice) + Number(this.product_price * this.order_qty);
                });
                $('.overall-price').html(Number(totalPrice));
        }).fail(function(){
            // alert('ajaxGet Cart Items Failed');
        });
    }

    function refreshPrdType()
    {
        $('#productType').find('option').remove().end();
        ajaxGet("/admin/product/type/show").done(function(result){
            console.log(result);
                $(result).each(function(){
                    var option = $("<option/>");
                    option.attr('value', this.product_type_id).text(this.product_type_desc);
                    $('#productType').append(option);
                });
            }).fail(function(){
                alert('ajaxGet Product Type Failed');
            }); 
    }

    function getProductDetail(id)
    {
        ajaxGet("/admin/product/detail/show/"+id).done(function(result){
            console.log();
                $(data).each(function(){
                    $('#productName').val(this.product_name);
                    $('#productType option:selected').text(this.product_type_desc).val(this.product_type_id);
                    $('#productPrice').val(this.product_price);
                    $('#productQty').val(this.product_qty);
                    $('#productDesc').val(this.product_desc);
                    $('#otherDesc').val(this.other_product_desc);
                });
            }).fail(function(){
                alert('ajaxGet getproductdetail Failed');
            });
    }

    function removeItemFromCart(id, product)
    {
        var formData = {
            custId : id,
            prodId : product,
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        $.ajax({
            url : "/user/cart/item/delete",
            method : "DELETE",
            data : formData,
            dataType : "json",
            success : function () {
                console.log();
            },
            error : function () {
                console.log();
            }
        });
    }

    function getProduct(){
        ajaxGet('/product/get/all').done(function(result){
            $(result).each(function(){
                $('.product').append(
                '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">'+
                            '<div class="block2">'+
                            '<input type="hidden" id="productid" value="'+this.product_id+'">'+
                                '<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">'+
                                    '<img src="images/product/'+this.file_name+'" alt="IMG-PRODUCT">'+

                                    '<div class="block2-overlay trans-0-4">'+
                                        
                                        '<div class="block2-btn-addcart w-size1 trans-0-4">'+
                                            '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">'+
                                                'Add to Cart'+
                                            '</button>'+
                                        '</div>'+
                                    '</div>'+
                                '</div>'+

                                '<div class="block2-txt p-t-20">'+
                                    '<a href="/product/detail/'+this.product_id+'" class="block2-name dis-block s-text3 p-b-5">'+
                                        this.product_name+
                                    '</a>'+

                                    '<span class="block2-price m-text6 p-r-5">'+
                                        'Rp.'+ this.product_price +
                                    '</span>'+
                                '</div>'+
                            '</div>'+
                        '</div>'
                        );
            });
        }).fail(function(){

        });
    }


//////////////////////////// HTML DOM ///////////////////////////

    $(document).on('click', '.btn-num-product-down', function(e){
        e.preventDefault();
        var valInit = $(this).parent('div').find('.num-product').val();
        if(Number(valInit) > 1){
            $(this).parent('div').find('.cart-detail').val(Number(valInit) - 1);
        }else{}

        var custId = $('#customerid').val();
        var prodId = $(this).parent('div').parent('td').siblings('td.column-1').find('#productid').val();
        var formData = {
            customerid : custId,
            productid : prodId,
            orderqty : Number(valInit) - 1,
        }

        var here = $(this);
        ajaxPatch("/user/cart/item/edit", formData).done(function(result){
            $(result).each(function(){
                if(this.customer_id == custId && this.product_id == prodId){
                    var totalPrice = this.product_price * this.order_qty;
                    here.parent('div').parent('td').siblings('td.column-5').find('span.product-total-price').text(totalPrice);
                }
                refreshCart();
            });
        }).fail(function(){
            
        });

    });

    $(document).on('click', '.btn-num-product-up', function(e){
        e.preventDefault();
        var valInit = $(this).parent('div').find('.num-product').val();
        $(this).parent('div').find('.cart-detail').val(Number(valInit) + 1);

        var custId = $('#customerid').val();
        var prodId = $(this).parent('div').parent('td').siblings('td.column-1').find('#productid').val();
        var formData = {
            customerid : custId,
            productid : prodId,
            orderqty : Number(valInit) + 1,
        }

        var here = $(this);
        ajaxPatch("/user/cart/item/edit", formData).done(function(result){
            $(result).each(function(){
                if(this.customer_id == custId && this.product_id == prodId){
                    var totalPrice = this.product_price * this.order_qty;
                    here.parent('div').parent('td').siblings('td.column-5').find('span.product-total-price').text(totalPrice);
                }
                refreshCart();
            });
        }).fail(function(){
            
        });

    });

	$(document).on('click', '#productAdd', function(){
        $('.deleteDialog').hide();
        $('.addInput').show();
        $('.modal-title').text('Add New Product');
        $('#btnSave-Product').show().val('addPrd').text("SUBMIT");
        $('#productForm').trigger('reset');
        $('#productModal').modal('show');
    });

    $(document).on('click', '.editProduct', function(){
        var id = $(this).data('id');
    	$('#ident').val(id);
        $('.deleteDialog').hide();
        $('.addInput').show();
        getProductDetail(id);
        $('.modal-title').text('Edit This Product');
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

    $(document).on('click', '#imageAdd', function(e){
        e.preventDefault();
        $('.deleteDialog').hide();
        $('.editInput').hide();
        $('.addInput').show();
        $('#productid').val($('#productNameForImage option:selected').val());
        $('#productname').val($('#productNameForImage option:selected').text());
        $('.modal-title').text('Add New Product Image');
        $('#productImageForm').attr('action', '/admin/product/image/insert');
        $('#btnSave-ProductImage').show().val('addImage').text("SUBMIT");
        $('#productImageModal').modal('show');
    });

    $(document).on('click', '.purchase', function(){
        $('#purchaseModal').modal('show');
    });

    // $(document).on('click', '.editPrdImg', function(e){
    //     e.preventDefault();
    //     $('#ident').val($(this).data('id'));
    //     $('.deleteDialog').hide();
    //     $('.addInput').hide();
    //     $('.editInput').show();
    //     $('#productImageForm').attr('action', '/admin/product/image/insert');
    //     $('#btnSave-ProductImage').show().val('editImage').text("SAVE");
    //     $('#productImageModal').modal('show');
    // });

    $(document).on('click', '.deletePrdImg', function(e){
        e.preventDefault();
        var name = $(this).data('name');
        $('.deleteDialog').show();
        $('.addInput').hide();
        $('.editInput').hide();
        $('#productImageForm').attr('action', '/admin/product/image/delete/'+ name);
        $('#btnSave-ProductImage').show().val('deleteImage').text('CONFIRM');
        $('#productImageModal').modal('show');
    });

    $(document).on('change', '#productNameForImage', function(){
        $('#productid').val($('#productNameForImage option:selected').val());
        $('#productname').val($('#productNameForImage option:selected').text());
    });

    $(document).on('click', '.o-f-hidden', function(e){
        e.preventDefault();
        var customerid = $('#customerid').val();
        var productid = $('#productid').val();
        removeItemFromCart(customerid,productid);
        var itemName = $(this).parent('td').siblings('.column-2').html();
        swal(itemName, "is removed from cart!", "success");
        $(this).parent('td').parent('tr').remove();
        setTimeout(refreshCart, 1000);
    });

////////////////////// DATATABLE DOM ////////////////////////////

	var TableTypeList = $('#TableTypeList').DataTable({
		"ajax":"/admin/product/type/list",
		"lengthMenu":[[10,25,50,-1], [10,25,50,"All"]],
		"columnDefs":[{
			"searchable":false,
			"orderable":false,
			"targets":1,
		}],
		"columns":[
			{bSortable:false,
                data:null,
                className: "center",
                render: function(d){
                    return '<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i></button><ul class="dropdown-menu" role="menu"><li><a href="#" class="editPrdType" data-id="'+d.product_type_id+'" data-desc="'+d.product_type_desc+'">Edit Data</a></li><li><a href="#" class="deletePrdType" data-id="'+d.product_type_id+'">Delete Data</a></li></ul></div>';
                },},
			{"data":"product_type_id"},
			{"data":"product_type_desc"},
		],
		"order": [[0, 'desc']],
	});
	TableTypeList.on( 'order.dt search.dt', function() {
        TableTypeList.column(1, {search:"applied", order:"applied"}).nodes().each(function(cell,i){
            cell.innerHTML = i+1;
        });
    }).draw();


    var TableProduct = $('#TableProduct').DataTable({
		"ajax":"/admin/product/show",
		"lengthMenu":[[10,25,50,-1], [10,25,50,"All"]],
		"columnDefs":[{
			"searchable":false,
			"orderable":false,
			"targets":1,
		}],
		"columns":[
			{bSortable:false,
                data:null,
                className: "center",
                render: function(d){
                    return '<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i></button><ul class="dropdown-menu" role="menu">' +
                    '<li><a href="#" class="editProduct" data-id="'+d.product_id+'" data-name="'+d.product_name+'" data-type-id="'+d.product_type_id+'" data-type="'+d.product_type_desc+'" data-price="'+d.product_price+'" data-desc="'+d.product_desc+'" data-other="'+d.other_product_desc+'">Edit Data</a></li>' + 
                    '<li><a href="#" class="deleteProduct" data-id="'+d.product_id+'">Delete Data</a></li></ul></div>';
                },},
			{"data":"product_id"},
			{"data":"product_name"},
			{"data":"product_type_desc"},
			{"data":"product_price"},
            {"data":"product_qty"},
			{"data":"product_desc"},
		],
		"order": [[1, 'desc']],
	});
	TableProduct.on( 'order.dt search.dt', function() {
        TableProduct.column(1, {search:"applied", order:"applied"}).nodes().each(function(cell,i){
            cell.innerHTML = i+1;
        });
    }).draw();

    var TableProductImage = $('#TableProductImage').DataTable({
        "ajax":"/admin/product/image/show",
        "lengthMenu":[[10,25,50,-1], [10,25,50,"All"]],
        "columnDefs":[{
            "searchable":false,
            "orderable":false,
            "targets":1,
        }],
        "columns":[
            {bSortable:false,
                data:null,
                className: "center",
                render: function(d){
                    return '<div class="btn-group"><button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i></button><ul class="dropdown-menu" role="menu"><li><a href="#" class="deletePrdImg" data-id="'+d.product_id+'" data-name="'+d.file_name+'">Delete Data</a></li></ul></div>';
                },},
            {"data":"product_id"},
            {"data":"product_name"},
            {"data":"file_name"},
        ],
        "order": [[1, 'desc']],
    });
    TableProductImage.on( 'order.dt search.dt', function() {
        TableProductImage.column(1, {search:"applied", order:"applied"}).nodes().each(function(cell,i){
            cell.innerHTML = i+1;
        });
    }).draw();


////////////////////////// AJAX SECTION /////////////////////////


	$('#btnSave-Product').click(function (e) {
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
		var state = $('#btnSave-Product').val();
		var formData = {
			prdName : $('#productName').val(),
			prdType : $('#productType').val(),
			prdPrice : $('#productPrice').val(),
            prdQty : $('#productQty').val(),
			// prdColor : $('#productColor').val(),
			// prdSize : $('#productSize').val(),
			prdDesc : $('#productDesc').val(),
			othDesc : $('#otherDesc').val(),
		}
		var TableProduct = $('#TableProduct').DataTable();
		console.log();
		switch(state)
		{
			case "addPrd" :
			var type = "POST";
			var my_url = "/admin/product/insert";
			e.preventDefault();
			$.ajax({
				type: type,
				url: my_url,
				data: formData,
				dataType: 'json',
				success: function (data) {
					console.log(data);
					TableProduct.ajax.reload();
					$('#productForm').trigger('reset');
					$('#productModal').modal('hide');
                    refreshPrdName();
					toastr.success('Successfully Added Data', 'Success Alert', {timeOut: 5000});
				},
				error: function (data) {
					console.log(data);
					toastr.error('Unknown Error From Server', 'Error Alert', {timeOut: 5000});
				}
			});
			break;
            case "editPrd" :
            var id = $('#ident').val();
            var type = "PATCH";
            var my_url = "/admin/product/edit/"+id;
            e.preventDefault();
            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data){
                    console.log(data);
                    TableProduct.ajax.reload();
                    $('#productForm').trigger('reset');
                    $('#productModal').modal('hide');
                    refreshPrdName();
                    toastr.success('Successfully Edit This Data', 'Success Alert', {timeOut: 5000});
                },
                error: function (data) {
                    console.log(data);
                    toastr.error('Unknown Error From Server', 'Error Alert', {timeOut: 5000});
                }
            });
            break;
            case "deletePrd" :
            var id = $('#ident').val();
            var type = "DELETE";
            var my_url = "/admin/product/delete/"+id;
            e.preventDefault();
            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data){
                    console.log(data);
                    TableProduct.ajax.reload();
                    $('#productForm').trigger('reset');
                    $('#productModal').modal('hide');
                    refreshPrdName();
                    toastr.success('Successfully Delete This Data', 'Success Alert', {timeOut: 5000});
                },
                error: function (data) {
                    console.log(data);
                    toastr.error('Unknown Error From Server', 'Error Alert', {timeOut: 5000});
                }
            });
            break;
		}
	});


	$('#btnSave-ProductType').click(function(e){
		$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })
        var state = $('#btnSave-ProductType').val();
        var formData = { prdTypeDesc : $('#productTypeDesc').val(), }
        var TableTypeList = $('#TableTypeList').DataTable();
        console.log();
        switch(state)
        {
        	case "addType" :
        	var type = "POST";
        	var my_url = "/admin/product/type/insert";
        	e.preventDefault();
        	$.ajax({
        		type: type,
        		url: my_url,
        		data: formData,
        		dataType: 'json',
        		success: function (data) {
        			console.log(data);
        			TableTypeList.ajax.reload();
        			$('#productTypeForm').trigger('reset');
        			$('#productTypeModal').modal('hide');
                    refreshPrdType();
        			toastr.success('Successfully Added Data', 'Success Alert', {timeOut: 5000});
        		},
        		error: function (data) {
        			console.log(data);
        			toastr.error('Unknown Error From Server', 'Error Alert', {timeOut: 5000});
        		}
        	});
        	break;
        	case "editType" :
        	var id = $('#ident').val();
        	var type = "PATCH";
        	var my_url = "/admin/product/type/edit/"+id;
        	e.preventDefault();
        	$.ajax({
        		type: type,
        		url: my_url,
        		data: formData,
        		dataType: 'json',
        		success: function (data) {
        			console.log(data);
        			TableTypeList.ajax.reload();
        			$('#productTypeForm').trigger('reset');
        			$('#productTypeModal').modal('hide');
                    refreshPrdType();
        			toastr.success('Successfully Edit This Data', 'Success Alert', {timeOut: 5000});
        		},
        		Error: function (data) {
        			console.log(data);
        			toastr.error('Unknown Error From Server', 'Error Alert', {timeOut: 5000});
        		}
        	});
        	break;
        	case "deleteType" :
        	var id = $('#ident').val();
        	var type = "DELETE";
        	var my_url = "/admin/product/type/delete/"+id;
            e.preventDefault();
        	$.ajax({
        		type: type,
        		url: my_url,
                data: formData,
                dataType: 'json',
        		success: function (data) {
                    console.log(data);
        			TableTypeList.ajax.reload();
        			$('#productTypeForm').trigger('reset');
        			$('#productTypeModal').modal('hide');
                    refreshPrdType();
        			toastr.success('Successfully Delete This Data', 'Success Alert', {timeOut: 5000});
        		},
        		Error: function (data) {
        			console.log(data);
        			toastr.error('Unknown Error From Server', 'Error Alert', {timeOut: 5000});
        		}
        	});
        	break;
        }

	});

	//========================================================
});