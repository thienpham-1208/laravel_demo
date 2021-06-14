<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{asset('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" href="{{asset('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</head><!--/head-->
<body>
    @include('sweetalert::alert')
	@include('header')
	@include('slide')
	<section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
					<div class="left-sidebar"><br>
						<h2>Danh mục sản phẩm</h2>
						@foreach($cates as $cate)
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a  href="{{asset(route('home.category',$cate->name))}}">											
											{{$cate->name}}
										</a>
									</h4>
								</div>
							</div>							
						</div><!--/category-products-->
						@endforeach
						<br><br>
						<div class="brands_products"><!--brands_products-->
							<h2>Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($brands as $brand)
									<li><a href="{{asset(route('home.brand',$brand->name))}}"> <span class="pull-right"></span>{{$brand->name}}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						
					
						
						<div class="shipping text-center"><!--shipping-->
							<img src="{{asset('frontend/images/home/shipping.jpg')}}" alt="" />
						</div><!--/shipping-->
					
					</div>
                </div>
				@yield('content')
                @include('footer')
                
			</div>
		</div>
	</section>

	<script>
		$('.pagination a').unbind('click').on('click', function(e) {
			   e.preventDefault();
			   var page = $(this).attr('href').split('page=')[1];
			   getPosts(page);
		 });
		
		 function getPosts(page)
		 {
			  $.ajax({
				   type: "GET",
				   url: '?page='+ page
			  })
			  .success(function(data) {
				   $('body').html(data);
			  });
		 }
	  </script>
                <script src="{{asset('frontend/js/jquery.js')}}"></script>
                <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
                <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
                <script src="{{asset('frontend/js/price-range.js')}}"></script>
                <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
                <script src="{{asset('frontend/js/main.js')}}"></script>
	</body>
</html>