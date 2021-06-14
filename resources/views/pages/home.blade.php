@extends('master')
@section('title','Home-Eshop')
@section('content')
	<div class="col-sm-9 padding-right">
		<div class="features_items">
			<!--features_items-->
			<br>
			<h2 class="title text-center">Sản phẩm nổi bật</h2>
			@foreach($products as $product)
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<a href="{{asset(route('home.product.detail',$product->name))}}">
								<img width="255px" height="237px" src="{{asset('images/product/'.$product->image)}}" alt="" />
							</a>
							<p>{{$product->name}}</p>
							<h2>{{number_format($product->price)}}$</h2>
							<a href="{{asset(route('cart.add',$product->id))}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>							
						</div>
						
					</div>
					<div class="choose">
						<ul class="nav nav-pills nav-justified">
							<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
							<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
						</ul>
					</div>
				</div>
			</div>
			@endforeach

		</div>
		<!--features_items-->

		

	</div>
	
	
@endsection