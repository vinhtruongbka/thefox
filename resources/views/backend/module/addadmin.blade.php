@extends('backend/mainlogin')
@section('login')
  {{-- expr --}}
<div class="login-box-body">
    <p class="login-box-msg">Thêm người quản trị</p>

    <form action="{{ route('add_admin') }}" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Nhập Email của bạn" name="email" value="">
        <span class="glyphicon glyphicon-envelope form-control-feedback my-glyphicon"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Nhập password" name="password" value="">
        <span class="glyphicon glyphicon-envelope form-control-feedback my-glyphicon"></span>
      </div>
       <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Nhập họ tên của bạn" name="name" value="">
        <span class="glyphicon glyphicon-envelope form-control-feedback my-glyphicon"></span>
      </div>
       <div class="form-group has-feedback">
          <input type="number" class="form-control" placeholder="Nhập số điện thoại của bạn" name="phone" value="">
          <span class="glyphicon glyphicon-envelope form-control-feedback my-glyphicon"></span>
      </div>

      <div class="row">
        
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <!-- /.col -->
        
          <button type="submit" class="btn btn-primary btn-block btn-flat">Tạo admin mới</button>
       
        <!-- /.col -->
      </div>
    </form>

   <!--  <div class="social-auth-links text-center">
     <p>- Hoặc -</p>
     <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Đăng nhập bằng Facebook</a>
     <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng nhập bằng
       Google+</a>
   </div>
   /.social-auth-links
   
   <a href="#">Tôi quên mật khẩu</a><br> -->

  </div>
  @endsection