@extends('layouts.app')
<head>
<link rel="icon" href="https://res.cloudinary.com/depwl0l0w/image/upload/v1715459669/Esthyan_3_ca7woy.png" type="">
</head>
@section('content')
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="weight:700:">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="flex-wrap:wrap; width:100%;">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6 w-50" >
            <!-- small box -->
            <div class="small-box bg-info ">
              <div class="inner">
                <h3>{{$productCount}}</h3>

                <p>Quantity of Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 w-50">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$customerCount}}</h3>
                <p>Number of customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 w-50">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$saleDay}}/{{$totalDaySales}}</h3>

                <p>Daily orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 w-50">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$saleMonth}}/{{$totalsaleMonth}}</h3>
                <p>Month Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection
