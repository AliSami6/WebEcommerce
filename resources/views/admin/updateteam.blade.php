<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
    <base href="/public">
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
            <h1 class="m-0">Update All Teams</h1>
          </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Show  Teams</li>
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
              <!-- form start -->
             
                <form action="{{url('updateTeamData',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="person_name">Person Name</label>
                            <input type="text" name="person_name" class="form-control" id="" value="{{$data->person_name}}" required="">
                        </div>
                        <div class="form-group">
                            <label for="person_title">Person Title</label>
                            <input type="text" name="person_title" class="form-control" id="" value="{{$data->person_title}}" required="">
                        </div>
                        <div class="form-group">
                            <label for="details">Person Details</label>
                            <input type="text" name="details" class="form-control" id="" value="{{$data->details}}" required="">
                        </div>
                       
                        <div class="form-group">
                            <label for="file">Old Image</label>
                            <img height="100" width="100" src="/teamimage/{{$data->image}}">
                        </div>
                        <div class="form-group">
                            <label for="file"> Change The Image</label>
                            <input type="file" name="file" class="form-control" id="" placeholder="Upload Image">
                        </div>
                    
                    </div>
                     <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary bg-primary">Submit</button>
                    </div>
                </form>   
               
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
