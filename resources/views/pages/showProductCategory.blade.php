@extends('master')
@section('title','Danh mục '.$cate->name)
@section('content')
	<div class="col-sm-9 padding-right">
		<div class="features_items">
			<!--features_items-->
			<br>
			<h2 class="title text-center">{{$cate->name}}</h2>
			@foreach($products as $product)
			<div class="col-sm-4">
				<div class="product-image-wrapper">
					<div class="single-products">
						<div class="productinfo text-center">
							<img width="255px" height="237px" src="{{asset('images/product/'.$product->image)}}" alt="" />
							<p>{{$product->name}}</p>
							<h2>{{number_format($product->price)}}$</h2>
							<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>							
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