<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
@include('admin.css')
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
   @include('layouts.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    @include('admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Orders</h1>
          </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Show All Orders</li>
              </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card">
              
              <!-- /.card-header -->
              <!-- form start -->
                    @if(session()->has('message'))
                      <div class="card bg-success">
                          <div class="card-header">
                            <h3 class="card-title">Success</h3>
                            <div class="card-tools">
                              {{session()->get('message')}}
                              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                              </button>
                            </div>
                          </div>
                      </div>
                    @endif
                    <table id="example1" class="table table-bordered table-striped">
			            <thead>
				          <tr>
				            <th>S/N</th>
				            <th>Customer Name</th>
				            <th>Phone</th>
				            <th>Address</th>
				            <th>Product Title</th>
                            <th>Price</th>
				            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
				          </tr>
			            </thead>

				        <tbody>
                            @foreach($order as $orders)
                                <tr>
                                    
                                    <td>{{$orders->id}}</td>
                                    <td>{{$orders->name}}</td>
                                    <td>{{$orders->phone}}</td>
                                    <td>{{$orders->address}}</td>
                                    <td>{{$orders->product_name}}</td> 
                                    <td>{{$orders->quantity}}</td> 
                                    <td>
                                        {{$orders->price}}
                                    </td> 
                                    <td>
                                        {{$orders->status}}
                                    </td> 
                                    <td>
                                        <a class="btn btn-success" href="{{url('updatestatus',$orders->id)}}" role="button">Delevered</a>
                                        
                                    </td>
                                </tr>
                            @endforeach
				        </tbody>
		            </table>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('admin.backfooter')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
@include('admin.script')
@include('admin.customdata')
</body>
</html>
