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
								@foreach ($tong_sp as $tong_sps)
									<li>
									  <a href="">{{$tong_sps->name}}</a>
									 <span class="count_x">({{$tong_sps->tong}})</span>
								   </li>
								@endforeach
								
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
							@foreach ($sp_theoloai as $sp_theoloai_1)
								<div class="col-md-4">
								<div class="thumbnail my-thumbnail">
									@if ($sp_theoloai_1->hot==1)
										<div class="sale-flash new text-center">Hot</div>
									@endif
									@if ($sp_theoloai_1->sale_price > 0)
										<div class="sale-flash sale text-center">SALE</div>
									@endif
									<a href="{{ route('sanpham',$sp_theoloai_1->id) }}" class="">
									<img data-src="#" alt="" src="uploads/images/{{$sp_theoloai_1->image_link}}" class="img-responsive">
								</a>
								<div class="caption my-caption">
									<h5>{{$sp_theoloai_1->name}}</h5>
									@if ($sp_theoloai_1->sale_price > 0)
										<p><span>
											{{ number_format($sp_theoloai_1->sale_price) }}₫
										</span>
										<span class="product-price-old">
											{{ number_format($sp_theoloai_1->price) }}₫	
										</span>
										</p>
									@else
										<p>
											<span>
											{{ number_format($sp_theoloai_1->price) }}₫	
										   </span>
										</p>
									@endif
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="row text-center">
							{{ $sp_theoloai->links() }}
		                </ul>
						</div>
					</div>
				</div>
				
			</div>
		</section>
@endsection