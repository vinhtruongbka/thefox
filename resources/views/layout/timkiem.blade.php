@extends('main')
@section('content')
	<section class="my-breadcrumb">
			<div class="container">
				<div class="row">
					<ul class="breadcrumb my-breadcrumb-1">
						<li><a href="#">Trang Chủ</a></li>
						<li class="active">Giày nam</li>
					</ul>
				</div>
			</div>
		</section>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<div>
							<div class="danhmuc_list">
							<h3 >Danh mục sản phẩm</h3>
						</div>
						<div class="danhmuc_list_1">
							<ul>
								<li>
									<a href="">Khuyến mãi hot</a>
									<span class="count_x">(11)</span>
								</li>
								<li>
									  <a href=""></a>
									 <span class="count_x">()</span>
								 </li>
								
								<li>
									<a href="">Tin tức</a>
								</li>
								<li>
									<a href="">Liên hệ</a>
								</li>
							</ul>
						</div>
						</div>
						<div>
							<div class="danhmuc_list">
							<h3 >Thương hiệu</h3>
						</div>
						<div class="danhmuc_list_1">
							<ul>
								<li>
									<a href="">Adidas</a>
								</li>
								
								<li>
									<a href="">New Balance</a>
								</li>
								<li>
									<a href="">Nike</a>
								</li>
								<li>
									<a href="">Puma</a>
								</li>
							</ul>
						</div>
						</div>
					</div>
					<div class="col-md-9">
						<div class="row title-head_1">
							<div class="title-head">
								<h3>Giày nam</h3>
							</div>
							<div class="title-head">
								<p>
									(Hiển thị 1 - 12/20 sản phẩm)
								</p>
						</div>
						</div>
						<div class="row sanpham_list">
							@foreach ($Product as $Products)
								<div class="col-md-4">
								<div class="thumbnail my-thumbnail">
									@if ($Products->hot==1)
										<div class="sale-flash new text-center">Hot</div>
									@endif
									@if ($Products->sale_price > 0)
										<div class="sale-flash sale text-center">SALE</div>
									@endif
									<a href="{{ route('sanpham',$Products->id) }}" class="">
									<img data-src="#" alt="" src="uploads/images/{{$Products->image_link}}" class="img-responsive">
								</a>
								<div class="caption my-caption">
									<h5>{{$Products->name}}</h5>
									@if ($Products->sale_price > 0)
										<p><span>
											{{ number_format($Products->sale_price) }}₫
										</span>
										<span class="product-price-old">
											{{ number_format($Products->price) }}₫	
										</span>
										</p>
									@else
										<p>
											<span>
											{{ number_format($Products->price) }}₫	
										   </span>
										</p>
									@endif
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row text-center">
							<ul class="pagination">
		                    <li><a href="#">&laquo;</a></li>
		                    <li class="active"><a href="#">1</a></li>
		                    <li class=""><a href="#">2</a></li>
		                    <li><a href="#">3</a></li>
		                    <li><a href="#">4</a></li>
		                    <li><a href="#">5</a></li>
		                    <li><a href="#">&raquo;</a></li>
		                </ul>
						</div>
					</div>
				</div>
				
			</div>
		</section>
@endsection