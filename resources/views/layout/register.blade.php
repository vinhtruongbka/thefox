@extends('main')
@section('content')
<section class="my-breadcrumb">
			<div class="container">
				<div class="row">
					<ul class="breadcrumb my-breadcrumb-1">
						<li><a href="#">Trang Chủ</a></li>
						<li class="active">Đăng ký tài khoản</li>
					</ul>
				</div>
			</div>
		</section>
		<section>
			<div class="container">
				<div class="row">
					@if (Session::has('success'))
					      <div class="help-block"  style="color: red;">
					        {!! Session::get('success') !!}
					    </div>
					@endif
				</div>
			</div>
		</section>
		<section class="chitiet">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-6">

							<form action="{{ route('postregister') }}" method="POST" role="form">
								<legend style="font-weight: bold;">Đăng ký tài khoản</legend>
							
								<div class="form-group">
									<label for="">Họ tên <span style="color: red">(*)</span></label>
									<input type="text" class="form-control" id="" placeholder="Vui lòng nhập họ tên đầy đủ" name="name">
									@if ($errors->has('name'))
							          <div class="help-block" style="color: red">
							            {!!$errors->first('name')!!}
							          </div>
							        @endif
								</div>
								
								<div class="form-group">
									<label for="">Email <span style="color: red">(*)</span></label>
									<input type="text" class="form-control" id="" placeholder="Vui lòng nhập email của bạn" name="email">
									@if ($errors->has('email'))
							          <div class="help-block" style="color: red">
							            {!!$errors->first('email')!!}
							          </div>
							        @endif
								</div>
								<div class="form-group">
									<label for="">Điện thoại <span style="color: red">(*)</span></label>
									<input type="number" class="form-control" id="" placeholder="01659984007" name="phone">
									@if ($errors->has('phone'))
							          <div class="help-block" style="color: red">
							            {!!$errors->first('phone')!!}
							          </div>
							        @endif
								</div>
								<div class="form-group">
										<label for="">Mật khẩu<span style="color: red">(*)</span></label>
										<input type="password" class="form-control" id="" placeholder="Vui lòng nhập mật khẩu" name="password">
										@if ($errors->has('password'))
							          <div class="help-block" style="color: red">
							            {!!$errors->first('password')!!}
							          </div>
							        @endif
								</div>
								<div class="form-group">
										<label for="">Nhập lại mật khẩu<span style="color: red">(*)</span></label>
										<input type="password" class="form-control" id="" placeholder="Vui lòng nhập lại mật khẩu" name="re_password">
										@if ($errors->has('re_password'))
							          <div class="help-block" style="color: red">
							            {!!$errors->first('re_password')!!}
							          </div>
							        @endif
									</div>

								<div class="form-group">
									<label for="">Địa chỉ <span style="color: red">(*)</span></label>
									<input type="text" class="form-control" id="" placeholder="Vui lòng nhập địa chỉ của bạn" name="address">
									@if ($errors->has('address'))
							          <div class="help-block" style="color: red">
							            {!!$errors->first('address')!!}
							          </div>
							        @endif
								</div>
								   <input type="hidden" name="_token" value="{{csrf_token()}}">
								<button type="submit" class="btn btn-primary">Đăng ký</button>
							</form>
							</div>
							<div class="col-md-6">
								<form action="{{ route('postlogin') }}" method="POST" role="form">
									<legend style="font-weight: bold;">Đăng nhập</legend>
								
									<div class="form-group">
										<label for="">Email <span style="color: red">(*)</span></label>
										<input type="email" class="form-control" id="" placeholder="Vui lòng nhập email của bạn" name="email">
										@if ($errors->has('address'))
							          <div class="help-block" style="color: red">
							            {!!$errors->first('email')!!}
							          </div>
							        @endif
									</div>
									<div class="form-group">
										<label for="">Mật khẩu <span style="color: red">(*)</span></label>
										<input type="password" class="form-control" id="" placeholder="Vui lòng nhập mật khẩu của bạn" name="password">
										@if ($errors->has('password'))
							          <div class="help-block" style="color: red">
							            {!!$errors->first('password')!!}
							          </div>
							        @endif
									</div>
									<div class="form-group">
										<div class="checkbox">
											<label>
												<input type="checkbox" value="">
												Lưu thông tin đăng nhập
											</label>
										</div>
									</div>
									 <input type="hidden" name="_token" value="{{csrf_token()}}">
									@if (Session::has('flag'))
								      <div class="help-block"  style="color: red">
								        {!! Session::get('message') !!}
								    </div>
								    @endif
									<button type="submit" class="btn btn-primary" style="background: red">Đăng nhập</button>
								</form>
								
							</div>
							
						</div>
					</div>
					<div class="col-md-3">
						<div class="sibar-giaohang">
							<div>
								<img src="images/shiper.png" alt="">
							</div>
							<div class="sibar-giaohang-1">
								<p id="title-giao-hang">Giao hàng miễn phí</p>
							     <p id="conten-giao-hang">Với đơn hàng trên 800.000đ</p>
							</div>
						</div>
						<div class="sibar-giaohang">
							<div>
								<img src="images/change.png" alt="">
							</div>
							<div class="sibar-giaohang-1">
								<p id="title-giao-hang">Đổi trả nhanh chóng</p>
							     <p id="conten-giao-hang">Đổi trả trong vòng 14 ngày</p>
							</div>
						</div>
						<div class="sibar-giaohang">
							<div>
								<img src="images/pay.png" alt="">
							</div>
							<div class="sibar-giaohang-1">
								<p id="title-giao-hang">Hình thức thanh toán</p>
							     <p id="conten-giao-hang">Thanh toán khi nhận hàng</p>
							</div>
						</div>
						<div class="sibar-giaohang">
							<div>
								<img src="images/phone.png" alt="">
							</div>
							<div class="sibar-giaohang-1">
								<p id="title-giao-hang">Đặt mua hàng online</p>
							     <p id="conten-giao-hang" class="alo">Gọi ngay 016599844007</p>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section
	@endsection