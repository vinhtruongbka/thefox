<section class="topbar hidden-xs">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<ul class="topbar_left_1">
					<li>
						<i class="fa fa-mobile" aria-hidden="true" style="font-size: 15px;"></i>
						<a href="" title="" class="mobile">016599840007</a>
					</li>
				</ul>
				<ul class="topbar_left_2">
					<li>
						<i class="fa fa-facebook-square" aria-hidden="true"></i>
						<a href=" https://www.facebook.com" title="" class="mobile">https://www.facebook.com</a>
					</li>
				</ul>
			</div>
			<div class="col-md-6">
				<ul class="topbar_left_2 topbar_right">
					<li>
						<a href=" https://www.facebook.com" title="" class="topbar_right_1">Hệ thống cửa hàng</a>
					</li>
					@if (Auth::guard('acount')->check())
						<li>
						<a href=" https://www.facebook.com" title="" class="topbar_right_1">{{ Auth::guard('acount')->user()->name }}</a>
					</li>
					<li>
						<a href="{{ route('logout') }}" title="" class="topbar_right_1">Đăng xuất</a>
					</li>
					@else
						<li>
						<a href="{{ route('register') }}" title="" class="topbar_right_1">Đăng nhập</a>
					</li>
					<li>
						<a href=" {{ route('register') }}" title="" class="topbar_right_1">Đăng ký</a>
					</li>
					@endif
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="mid-header">
	<div class="container">
		<div class="row mid-header_1">
			<div class="col-md-3">
				<a href="{{ route('home.index') }}" title="">
					<img src="public/source/images/logo.png" alt="">
				</a>
			</div>
			<div class="col-md-6">
				<div>
					<form action="{{ route('timkiem') }}" method="" class="input-group search-bar" role="search">
						<input type="text" name="query" value="" autocomplete="off" placeholder="Bạn đang tìm sản phẩm nào" class="input-group-flie">
						<span class="">
							<button type="submit" class="btn icon-fallback-text my-seach">
								<span class="fa fa-search my-fa-search"></span>      
							</button>   
						</span>
					</form>
					<div class="header-tag">
						<b>Từ khóa gợi ý:</b>
						<a href="" title="">adidas,</a>
						<a href="" title="">adidas,</a>
						<a href="" title="">adidas,</a>
						<a href="" title="">adidas,</a>
						<a href="" title="">adidas,</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 hidden-xs">
				<div class="top-righ_1">
					<ul class="top-righ">
						<li >
							<a href="" title=""><img src="public/source/images/icon_wishlist.png" alt="" class="img-yeu-thich"></a>
						</li>
						<li><span>Yêu thích</span></li>
					</ul>
					<ul class="top-righ giohang">
						<li >
							<a href="{{ route('cart.giohang') }}" title=""><img src="public/source/images/icon_hovercart.png" alt="" class="img-yeu-thich"></a>
							<span class="count_item ">{{ $count }}</span>
						</li>
						<li><span>Giỏ hàng</span></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>
<nav class="navbar navbar-default my_navbar" role="navigation">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse my-navbar-collapse">
			<ul class="nav navbar-nav my_nav">
				<li class=""><a href="#">Khuyến mãi hot</a></li>
				@foreach ($category as $cate)
					<li ><a href="{{ route('danhmuc',$cate->id) }}">{{$cate->name}}</a></li>
				@endforeach
				<li ><a href="#">Tin tức</a></li>
				<li ><a href="#">Liên hệ</a></li>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>