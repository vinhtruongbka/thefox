@extends('main')
@section('content')
<section class="my-breadcrumb">
			<div class="container">
				<div class="row">
					<ul class="breadcrumb my-breadcrumb-1">
						<li><a href="#">Trang Chủ</a></li>
						<li class="active">Thanh toán</li>
					</ul>
				</div>
			</div>
		</section>
		<section class="chitiet">
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="row">
							
								<form action="{{ route('postdathang') }}" method="POST" role="form">
								<div class="col-md-6">
								@if (Auth::guard('acount')->check())
								<legend>Thông tin giao hàng</legend>
								<div class="form-group">
									<label for="">Họ tên</label>
									<input type="text" class="form-control" id="" value="{{ Auth::guard('acount')->user()->name }}" name="name">
								</div>
								<div class="form-group">
									<label for="">Email</label>
									<input type="text" class="form-control" id="" value="{{ Auth::guard('acount')->user()->email }}" name="email">
								</div>
								<div class="form-group">
									<label for="">Điện thoại</label>
									<input type="text" class="form-control" id="" value="{{ Auth::guard('acount')->user()->phone }}" name="phone">
								</div>
								<div class="form-group">
									<label for="">Địa chỉ</label>
									<input type="text" class="form-control" id="" value="{{ Auth::guard('acount')->user()->address }}" name="address">
								</div>
								 <input type="hidden" name="_token" value="{{csrf_token()}}">
								<button type="submit" class="btn btn-primary">Đặt hàng</button>
								@else
									<legend style="font-weight: bold;">Đặt hàng không cần tài khoản</legend>
							
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
								<button type="submit" class="btn btn-primary">Đặt hàng</button>
								@endif
							</div>
							<div class="col-md-6">
								<legend>Đơn hàng của bạn</legend>
								<table class="table" >
									
									<tbody>
										@foreach ($content as $contents)
											<tr>
											<td style="width: 120px;height: 120px;border-top: none"><img src="uploads/images/{{ $contents->options->img }}" alt="" class="img-responsive" ></td>
											<td style="border-top: none;">
												<p style="font-weight: bold;">{{ $contents->name }}</p>
												<p>Đơn giá : 
													@if ($contents->options->sale_price > 0)
														<span style="color: red">{{ number_format($contents->options->sale_price) }}&nbspVND</span>
													@else
														<span style="color: red">{{ number_format( $contents->price) }}&nbspVND</span>
													@endif
													</p>
												<p>Số lượng : <span style="color: red">{{ $contents->qty}}</span></p>
												<p>Kích thước: <span >{{ $contents->options->kichthuoc}}/{{ $contents->options->color}}</span></p>
											</td>
										</tr>

										@endforeach
										<tr>
											<td  style="font-weight: bold;font-size: 18px">Tổng tiền</td>
											<td style="color: red">{{ $total }}&nbsp;VND</td>
										</tr>

									</tbody>
								</table>
							</div>
							</form>
							
							
						</div>
					</div>
					<div class="col-md-3">
						<div class="sibar-giaohang">
							<div>
								<img src="public/source/images/shiper.png" alt="">
							</div>
							<div class="sibar-giaohang-1">
								<p id="title-giao-hang">Giao hàng miễn phí</p>
							     <p id="conten-giao-hang">Với đơn hàng trên 800.000đ</p>
							</div>
						</div>
						<div class="sibar-giaohang">
							<div>
								<img src="public/source/images/change.png" alt="">
							</div>
							<div class="sibar-giaohang-1">
								<p id="title-giao-hang">Đổi trả nhanh chóng</p>
							     <p id="conten-giao-hang">Đổi trả trong vòng 14 ngày</p>
							</div>
						</div>
						<div class="sibar-giaohang">
							<div>
								<img src="public/source/images/pay.png" alt="">
							</div>
							<div class="sibar-giaohang-1">
								<p id="title-giao-hang">Hình thức thanh toán</p>
							     <p id="conten-giao-hang">Thanh toán khi nhận hàng</p>
							</div>
						</div>
						<div class="sibar-giaohang">
							<div>
								<img src="public/source/images/phone.png" alt="">
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