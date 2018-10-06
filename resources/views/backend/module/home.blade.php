@extends('backend/main')
@section('backend')
  {{-- expr --}}

<section class="content">
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>83</h3>
          <p>Sản phẩm</p>
        </div>
        <div class="icon">
          <i class="ion-ios-calendar-outline"></i>
        </div>
        <a href="#" class="small-box-footer">Danh sách sản phẩm</a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>16</h3>

          <p>Bài viết</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href=#admin/content" class="small-box-footer">Danh sách bài viết</a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>4</h3>

          <p>Liên hệ</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href=#admin/customer" class="small-box-footer">Liên hệ khách hàng</a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h3>5</h3>

          <p>Đơn hàng</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href=#admin/orders" class="small-box-footer">Danh sách đơn hàng</a>
      </div>
    </div>
    <!-- ./col -->
  </div>
  <!-- /.row -->
</section>
@endsection