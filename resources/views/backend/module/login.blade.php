@extends('backend/mainlogin')
@section('login')
  {{-- expr --}}

<div class="login-box-body">
    <p class="login-box-msg">Đăng nhập để bắt đầu quản trị</p>

    <form action="{{ route('login') }}" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Tên đăng nhập hoặc Email" name="email" value="{{old('email')}}">
        <span class="glyphicon glyphicon-envelope form-control-feedback my-glyphicon"></span>
        @if ($errors->has('email'))
          <div class="help-block" style="color: red">
            {!!$errors->first('email')!!}
          </div>
        @endif
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Mật khẩu" name="password" value="{{old('password')}}">
        <span class="glyphicon glyphicon-lock form-control-feedback my-glyphicon"></span>
         @if ($errors->has('password'))
          <div class="help-block"  style="color: red">
            {!!$errors->first('password')!!}
          </div>
        @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember"> Lưu mật khẩu
            </label>
          </div>
        </div>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    @if (Session::has('flag'))
      <div class="help-block"  style="color: red;text-align: center;">
        {!! Session::get('message') !!}
    </div>
    @endif
     
    
    <div class="social-auth-links text-center">
      <p>- Hoặc -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Đăng nhập bằng Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Đăng nhập bằng
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">Tôi quên mật khẩu</a><br>

  </div>
  @endsection