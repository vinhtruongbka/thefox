@extends('main')
@section('content')
<section class="my-breadcrumb">
	<div class="container">
		<div class="row">
			<ul class="breadcrumb my-breadcrumb-1">
				<li><a href="#">Trang Chủ</a></li>
				<li class="">Giày nam</li>
				<li class="active">Monrow Women Black Heels</li>
			</ul>
		</div>
	</div>
</section>
<section class="chitiet">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-6" >
						<a  href="#" class="thumbnail" >
							<img class="anhlon" id="zoom_01" data-src="#" alt="" src="uploads/images/{{$sanpham->image_link}}" data-zoom-image="uploads/images/{{$sanpham->image_link}}">
						</a>
						<div>
							<ul class="anhnho">
								@foreach ($img as $imgs)
									<li >
									  <img src="uploads/images/{{ $imgs->images_link }}" alt="" class="img-responsive ">
									</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div>
							<h3 class="title-detai">
								{{$sanpham->name}}
							</h3>
							<div>
								<span>Thương hiệu: 
									<span class="thuonghieu">{{ $sanpham->brand }}</span>
								</span>
								<span>&nbsp;|&nbsp;Tình trạng: 
									@if ($sanpham->merchandise == 1)
										<span class="thuonghieu">Còn hàng</span>
									@else
										<span class="thuonghieu">Hết hàng</span>
									@endif
								</span>
							</div>
							<div class="star">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</div>
							<div class="my-caption my-caption-detail">
								@if ($sanpham->sale_price >0)
									<p><span class="gia-detail">
									{{number_format($sanpham->sale_price)}}₫
								</span>
								<span class="product-price-old">
									{{number_format($sanpham->price)}}₫			
								</span>
							</p>
								@else
									<p>
										<span class="gia-detail">
											{{number_format($sanpham->price)}}₫			
										</span>
							      </p>
								@endif
						</div>
						<div class="mota-detai">
							<p>
								{!!  $sanpham->description !!}
							</p>
						</div>

						<div>
							<div class="kich-thuoc">
								<p>
									Kích thước:
									<span id="kichthuocchon">35</span>
								</p>
							</div>
							<div class="kich-thuoc-2">
								<div class="viendo">
									35
								</div>
								<div class="">
									37
								</div>
								<div class="">
									38
								</div>
							</div>
						</div>
						<div>
							<div class="kich-thuoc">
								<p>
									Màu sắc:
									<span>{{$sanpham->color}}</span>
								</p>
							</div>
							<div class="kich-thuoc-3">
								<div class="">
									<img src="uploads/images/{{$sanpham->image_link}}" alt="" class="img-responsive">
								</div>
							</div>
						</div>
						<div class="kich-thuoc-5">
							<div class="kich-thuoc-4">
								<div class="">
									<p id="giam">-</p>
								</div>
								<div class="">
									<p id="soluong_mua">1</p>
								</div>
								<div class="">
									<p id="tang">+</p>
								</div>
							</div>
							<div class="muahang">
								
									<a href="{{ route('cart.muahang',$sanpham->id) }}" class="giohang2">
										<button type="button" class="btn btn-default " data-toggle="modal" data-target="#myModal">
										<span class="glyphicon glyphicon-shopping-cart"></span>
												CHO VÀO GIỎ HÀNG
										 </button>

									</a>
							</div>
							<div class="kich-thuoc-mobile">
								<p>
									Hoặc đặt mua:
									<span>01659984007</span>
									<span>( Miễn phí cuộc gọi )</span>
								</p>
							</div>
						</div>
					</div>
				</div>	
			</div>
			<div class="row">
				<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-lg">
			    <div class="modal-content">
			      <div class="modal-header my-modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title my-modal-title">Bạn đã thêm [{{$sanpham->name}}] vào giỏ hàng thành công</h4>
			      </div>
			      <div class="modal-body" style="padding-top: 0px;padding-bottom: 0px">
			      	<div class="row" style="margin-top: 10px">
			      		<div class="col-md-6">
			      			<div class="htmlcount"></div>
			      		</div>
			      		<div class="col-md-6 tongtien">
			      			<div class="htmltotal"></div>
			      		</div>
			      	</div>
			      	<div class="row bang-gia">
			      		<div class="col-md-6">
			      			<p style="padding-left: 30px">Sản phẩm</p>
			      			
			      		</div>
			      		<div class="col-md-2">
			      			<p>Đơn giá</p>
			      		</div>
			      		<div class="col-md-2">
			      			<p style="text-align: center;">Số lượng</p>
			      		</div>
			      		<div class="col-md-2">
			      			<p>Thành tiền</p>
			      		</div>
			      	</div>
			      	<div id="cart-content">
			      		
			      	</div>
			      		
			      </div>
			      <div class="modal-footer" style="margin-top: 0px">

			        <button type="button" class="btn btn-default tieptucmuahang" data-dismiss="modal">Tiếp tục mua hàng</button>
			        <a href="{{ route('cart.dathang') }}">
			        	<button type="button" class="btn btn-default thuchienthanhtoan">Thực hiện thanh toán</button>
			        </a>
			      </div>
			    </div>
			
			  </div>
			</div>
			</div>
			<div class="row my-nav-tabs">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#home" data-toggle="tab">Trang Chủ</a></li>
					<li><a href="#info" data-toggle="tab">Hướng dẫn mua hàng</a></li>
				</ul>

				<div class="tab-content my-tab-content">
					<div class="tab-pane active" id="home" style="padding-top: 20px">
						{!! $sanpham->content  !!}
					</div>
					<div class="tab-pane" id="info">Chưa có thông tin</div>
				</div>
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
			<div class="sibar-detai-1">
				<h3>CÓ THỂ BẠN QUAN TÂM</h3>
				<div class="sibar-detai">
					@if ($ngaunhien->hot==1)
						<div class="sale-flash new text-center">Hot</div>
					@endif
					@if ($ngaunhien->sale_price > 0)
						<div class="sale-flash sale text-center">SALE</div>
					@endif
					<div class="img-sibar-detai">
						<a href="{{ route('sanpham',$ngaunhien->id) }}"><img src="uploads/images/{{ $ngaunhien->image_link }}" alt="" class="img-responsive"></a>

					</div>
					<div class="my-caption my-caption-detail-1">
						<h5>Monrow Women Black Heels</h5>
						<div class="star">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</div>
						@if ($ngaunhien->sale_price > 0)
							<p><span>
								{{ number_format($ngaunhien->sale_price) }}₫
							</span>
							<span class="product-price-old">
								{{ number_format($ngaunhien->price) }}₫	
							</span>
							</p>
						@else
							<p>
								<span>
								{{ number_format($ngaunhien->price) }}₫	
							   </span>
							</p>
						@endif
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</section>
<section>
	<div class="container">
		<div class="row">
			<div class="text-center danhmuc">
				<h3><a href="" title="">SẢN PHẨM LIÊN QUAN</a></h3>
			</div>
		</div>
		<div class="row">
			@foreach ($sp_lienquan as $sp_lienquans)
				<div class="col-md-3">
				<div class="thumbnail my-thumbnail">
					@if ($sp_lienquans->hot==1)
						<div class="sale-flash new text-center">Hot</div>
					@endif
					@if ($sp_lienquans->sale_price > 0)
						<div class="sale-flash sale text-center">SALE</div>
					@endif
					<a href="{{ route('sanpham',$sp_lienquans->id) }}" class="">
						<img   data-src="#" alt="" src="uploads/images/{{$sp_lienquans->image_link}}"   class="img-responsive">
					</a>
					<div class="caption my-caption">
						<h5>{{$sp_lienquans->name}}</h5>
						@if ($sp_lienquans->sale_price > 0)
							<p><span>
								{{ number_format($sp_lienquans->sale_price) }}₫
							</span>
							<span class="product-price-old">
								{{ number_format($sp_lienquans->price) }}₫	
							</span>
							</p>
						@else
							<p>
								<span>
								{{ number_format($sp_lienquans->price) }}₫	
							   </span>
							</p>
						@endif
					</p>
				</div>
			</div>
		</div>
			@endforeach

</div>
</div>
</section>
@endsection