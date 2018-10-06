@extends('main')
@section('content')
<section class="my-breadcrumb">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb my-breadcrumb-1">
				<li><a href="#">Trang Chủ</a></li>
				<li class="active">Giỏ hàng</li>
			</ul>
		</div>
	</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<h4>Giỏ hàng của bạn có <span style="color: red">{{ $count }}</span> sản phẩm</h4>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="text-center">Ảnh sản phẩm</th>
						<th class="text-center">Tên sản phẩm sản phẩm</th>
						<th class="text-center">Đơn giá</th>
						<th class="text-center">Số lượng</th>
						<th class="text-center">Thành tiền</th>
						<th class="text-center">Xóa</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($content as $contents)
							<tr>
						<td>
							<div class="muahang-anh">
								<img src="uploads/images/{{ $contents->options->img }}" alt="" class="img-responsive">
							</div>
						</td>
						<td class="text-center">
							<p class="muahang_tex"><a href="{{ route('sanpham',$contents->id) }}" style="color: #428bca">{{ $contents ->name }}</a></p>
							<p class="muahang_tex_1">{{ $contents ->options->kichthuoc }}/Cam</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex muahang_tex_2">{{ number_format($contents->price) }}₫</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex muahang_tex_1">{{ $contents->qty }}</p>
						</td>
						<td class="text-center">
							<p class="muahang_tex muahang_tex_2">{{ number_format($contents->price * $contents->qty) }}₫</p>
						</td>
						<td class="text-center">
							<a href="{{ route('cart.xoa',$contents->rowId) }}" onclick="return confirm('Bạn muốn xóa sản phẩm này không')"><i class="fa fa-close muahang_tex"></i></a>
							</td>
						</tr>
					@endforeach		
				</tbody>
				</table>
					<div class="row">
						<div class="col-md-5 col-md-offset-8" style="margin-bottom: 10px;">
							<span class="" style="font-size: 18px;">Tổng tiền thanh toán:</span>
							<span class="" style="color: red;font-size: 18px;">{{ $total }}₫</span>
					    </div>
					</div>
					<div class="row">
						<a href="{{ route('cart.dathang') }}">
							<button type="button" class="btn btn-default thuchienthanhtoan thanhtoan_muahang" data-dismiss="modal" >Thực hiện thanh toán</button>
						</a>
					<a href="{{ route('home.index') }}">
						<button type="button" class="btn btn-default tieptucmuahang thanhtoan_muahang" data-dismiss="modal" >Tiếp tục mua hàng</button>
					</a>
					</div>

			</div>
		</div>
	</section>
@endsection