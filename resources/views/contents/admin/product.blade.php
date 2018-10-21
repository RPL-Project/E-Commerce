@extends('layouts.layout-admin')

@section('content')
<!--================================Additional Stuff==============================-->
  
  <title>Product Management</title>
  @include('components.product-modal')
  @include('components.productType-modal')
  @include('components.productImage-modal')

<!--================================Additional Stuff==============================-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{route('show.admin.dashboard.page')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Product Management</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">
          <div class="box">
             <div class="box-header with-border">
                <h3 class="box-title">Product List</h3>
              
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-wrench"></i></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                {{-- <center> --}}
                <table class="table table-striped table-hover" id="TableProduct" style="width: 100%;">
                  {{csrf_field()}}
                  <thead>
                    <tr>
                      <th><a href="#" id="productAdd" class="btn btn-primary"><i class="fa fa-plus"></i></a></th>
                      <th>No</th>
                      <th>Name</th>
                      <th>Type</th>
                      <th>Price</th>
                      <th>Qty</th>
                      <th>Color</th>
                      <th>Size</th>
                      <th>Desc</th>
                      <th hidden>othDesc</th>
                    </tr>
                  </thead>
                </table>
                {{-- </center>  --}}
              </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="row">
        <div class="col-md-5">
          <div class="box">
             <div class="box-header with-border">
                <h3 class="box-title">Product Type List</h3>
              
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-wrench"></i></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                {{-- <center> --}}
                <table class="table table-striped table-hover" id="TableTypeList" style="width: 100%;">
                  {{csrf_field()}}
                  <thead>
                    <tr>
                      <th><a href="#" id="typeAdd" class="btn btn-primary"><i class="fa fa-plus"></i></a></th>
                      <th>No</th>
                      <th>Name</th>
                    </tr>
                  </thead>
                </table>
                {{-- </center>  --}}
              </div>
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-7">
          <div class="box">
             <div class="box-header with-border">
                <h3 class="box-title">Product Image List</h3>
              
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <div class="btn-group">
                    <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-wrench"></i></button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Another action</a></li>
                      <li><a href="#">Something else here</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                    </ul>
                  </div>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                {{-- <center> --}}
                <table class="table table-striped table-hover" id="TableProductImage" style="width: 100%;">
                  {{csrf_field()}}
                  <thead>
                    <tr>
                      <th><a href="#" id="imageAdd" class="btn btn-primary"><i class="fa fa-plus"></i></a></th>
                      <th>No</th>
                      <th>Product Name</th>
                      <th>Product Images</th>
                    </tr>
                  </thead>
                </table>
                {{-- </center>  --}}
              </div>
          </div>
          <!-- /.box -->
        </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection