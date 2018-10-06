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
		@if (Auth::guard('acount')->check())
			<div class="container">
			<div class="row">
				<h4 style="margin-top: 10px;color: red"><span class="glyphicon glyphicon-ok"></span> Bạn đã đặt hàng thành công</h4>
			</div>
		</div>
		<section class="">
			<div class="container">
				<div class="row">
			<h4>Thông tin người mua hàng</h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">Tên người mua hàng</th>
						<th class="text-center">Địa chỉ nhận hàng</th>
						<th class="text-center">Số điện thoại</th>
						<th class="text-center">Email</th>
						<th class="text-center">Phương thức thanh toán</th>
						
					</tr>
				</thead>
				<tbody>
						<tr>
						<td class="text-center">
							<p class="muahang_tex" style="padding-top: 10px;text-transform: capitalize;">{{ Auth::guard('acount')->user()->name }}</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex" style="padding-top: 10px;text-transform: capitalize;">{{ Auth::guard('acount')->user()->address }}</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex" style="padding-top: 10px;text-transform: capitalize;">{{ Auth::guard('acount')->user()->phone }}</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex" style="padding-top: 10px;text-transform: capitalize;">{{ Auth::guard('acount')->user()->email }}</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex" style="padding-top: 10px;text-transform: capitalize;">Thanh toán khi nhận hàng</p>
						</td>
						</tr>		
				</tbody>
				</table>
			<h4>Thông tin chi tiết đơn hàng của bạn</h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">Ảnh sản phẩm</th>
						<th class="text-center">Tên sản phẩm sản phẩm</th>
						<th class="text-center">Số lượng</th>
						<th class="text-center">Thành tiền</th>
						<th class="text-center">Trạng thái</th>
					</tr>
				</thead>
				<tbody>
						@foreach ($Donhang as $Donhangs)
									<tr>
						<td>
							<div class="muahang-anh">
								<img src="uploads/images/{{ $Donhangs->images_link }}" alt="" class="img-responsive">
							</div>
						</td>
						<td class="text-center">
							<p class="muahang_tex"><a href="" style="color: #428bca">{{ $Donhangs->name }}</a></p>
							<p class="muahang_tex_1">{{ $Donhangs->size }}/{{ $Donhangs->color }}</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex muahang_tex_1">{{ $Donhangs->quantity }}</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex muahang_tex_2">{{ number_format($Donhangs->amount) }}  VND</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex">Đặt hàng thành công</p>
						</td>
						</tr>
					    @endforeach		
				</tbody>
				</table>

			</div>
			</div>
		</section
		@else
		   <div class="container">
				<div class="row">
					<h4>Bạn cần đăng nhập để xem thông tin</h4>
				</div>
		   </div>
		@endif
@endsection