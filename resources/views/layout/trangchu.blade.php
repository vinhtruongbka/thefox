@extends('main')
@section('content')
	{{-- expr --}}
<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
	</ol>

	<!-- Wrapper for slides -->
	<div class="carousel-inner">
		@foreach ($slide as $key => $sl)
			@if ($key==0)
				<div class="item active">
			@else
				<div class="item">
			@endif
				<img src="public/source/images/{{$sl->image_link}}" alt="Los Angeles">
			</div>
		@endforeach
		<!-- <div class="item active">
			<img src="public/source/images/slider_1.jpg" alt="Los Angeles">
		</div>
		
		<div class="item">
			<img src="public/source/images/slider_2.jpg" alt="Chicago">
		</div> -->
	</div>

	<!-- Left and right controls -->
	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="right carousel-control" href="#myCarousel" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
		<span class="sr-only">Next</span>
	</a>
</div>
<section class="service-1">
	<div class="container">
		<div class="row">
			<div class="col-md-4 service-2">
				<div class="text-center-1">
					<div class="service">
						<img src="public/source/images/srv_1.png" alt="">
					</div>
					<div class="service">
						<ul class="service_item_ed">
							<li class="service-title">Miễn phí giao hàng toàn quốc</li>
							<li>Với đơn hàng từ 800.000đ trở lên</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4 service-2">
				<div class="text-center-1">
					<div class="service">
						<img src="public/source/images/srv_2.png" alt="">
					</div>
					<div class="service">
						<ul class="service_item_ed">
							<li class="service-title">Đặt hàng online cực nhanh</li>
							<li>Gọi ngay: 016599840007 để được tư vấn</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-4 service-2">
				<div class="text-center-1">
					<div class="service">
						<img src="public/source/images/srv_3.png" alt="">
					</div>
					<div class="service">
						<ul class="service_item_ed">
							<li class="service-title">Bảo hành chính hãng 365 ngày</li>
							<li>Cam kết chính hãng bảo hành 1 năm</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="sanpham">
	<div class="container">
		<div class="row">
			<div class="text-center danhmuc">
				<h3><a href="" title="">TOP SẢN PHẨM HOT NHẤT</a></h3>
			</div>
		</div>
		<div class="row">
			@foreach ($sanpham_hot as $hot)
				<div class="col-md-3">
				<div class="thumbnail my-thumbnail">
					@if ($hot->hot==1)
						<div class="sale-flash new text-center">Hot</div>
					@endif
					@if ($hot->sale_price > 0)
						<div class="sale-flash sale text-center">SALE</div>
					@endif

					<a href="{{ route('sanpham',$hot->id) }}" class="">
						<img data-src="#" alt="" src="uploads/images/{{$hot->image_link}}" class="img-responsive">
					</a>
					<div class="caption my-caption">
						<h5>{{$hot->name}}</h5>
						@if ($hot->sale_price > 0)
							<p><span>
								{{ number_format($hot->sale_price) }}₫
							</span>
							<span class="product-price-old">
								{{ number_format($hot->price) }}₫	
							</span>
							</p>
						@else
							<p>
								<span>
								{{ number_format($hot->price) }}₫	
							   </span>
							</p>
						@endif
					
				</div>
			</div>
		</div>
	@endforeach
</div>
</div>
</section>
<section>
	<div class="container">
		<div class="row">
			@foreach ($banner_small as $banner_small_1)
				<div class="col-md-6">
					<img src="public/source/images/{{$banner_small_1->image_link}}" alt="" class="img-responsive">
			   </div>
			@endforeach
		</div>
	</div>
</section>
<section class="sanpham">
	<div class="container">
		<div class="row">
			<div class="text-center danhmuc">
				<h3><a href="" title="">GIÀY CAO GÓT NỮ THỜI TRANG</a></h3>
			</div>
		</div>
		<div class="row">
			@foreach ($produc_high_heel as $produc_high)
				<div class="col-md-15">
				<div class="thumbnail my-thumbnail">
					@if ($produc_high->hot==1)
						<div class="sale-flash new text-center">Hot</div>
					@endif
					@if ($produc_high->sale_price > 0)
						<div class="sale-flash sale text-center">SALE</div>
					@endif
					<a href="{{ route('sanpham',$produc_high->id) }}" class="">
						<img data-src="#" alt="" src="uploads/images/{{$produc_high->image_link}}" class="img-responsive">
					</a>
					<div class="caption my-caption">
						<h5>{{$produc_high->name}}</h5>
						@if ($produc_high->sale_price > 0)
							<p><span>
								{{ number_format($produc_high->sale_price) }}₫
							</span>
							<span class="product-price-old">
								{{ number_format($produc_high->price) }}₫	
							</span>
							</p>
						@else
							<p>
								<span>
								{{ number_format($produc_high->price) }}₫	
							   </span>
							</p>
						@endif
				</div>
			</div>
		</div>
			@endforeach
       </div>
    </div>
</section>
<section>
	<div class="container">
		<div class="row">
			@foreach ($banner_large as $banner_large_1)
				<img src="public/source/images/{{$banner_large_1->image_link}}" alt="" class="img-responsive">
			@endforeach
		</div>
	</div>
</section>
<section class="sanpham">
	<div class="container">
		<div class="row">
			<div class="text-center danhmuc">
				<h3><a href="" title="">GIÀY THỜI TRANG NAM</a></h3>
			</div>
		</div>
		<div class="row">
			@foreach ($produc_men as $produc_men_1)
				<div class="col-md-3">
				<div class="thumbnail my-thumbnail">
					@if ($produc_men_1->hot==1)
						<div class="sale-flash new text-center">Hot</div>
					@endif
					@if ($produc_men_1->sale_price > 0)
						<div class="sale-flash sale text-center">SALE</div>
					@endif
					<a href="{{ route('sanpham',$produc_men_1->id) }}" class="">
						<img data-src="#" alt="" src="uploads/images/{{$produc_men_1->image_link}}" class="img-responsive">
					</a>
					<div class="caption my-caption">
						<h5>{{$produc_men_1->name}}</h5>
						@if ($hot->sale_price > 0)
							<p><span>
								{{ number_format($produc_men_1->sale_price) }}₫
							</span>
							<span class="product-price-old">
								{{ number_format($produc_men_1->price) }}₫	
							</span>
							</p>
						@else
							<p>
								<span>
								{{ number_format($produc_men_1->price) }}₫	
							   </span>
							</p>
						@endif
				</div>
			</div>
		</div>
			@endforeach
</div>
</section>

@endsection