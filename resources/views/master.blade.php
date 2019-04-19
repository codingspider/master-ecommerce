<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>@yield('title') | Coding Spider</title>

	    <!-- Bootstrap Core CSS -->
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
		
		<link rel="shortcut icon" href="https://apache.org/favicons/favicon-194x194.png" type="image/x-icon"/>
 <link rel="icon" href="https://apache.org/favicons/favicon-194x194.png" type="image/ico"/>

 {!! Html::style('css/style.css') !!}
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
	    <link rel="stylesheet" href="{{ asset('assets/css/blue.css') }}">
	    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/owl.transitions.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/rateit.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css') }}">

		
		<style> 
				input[type=button], input[type=submit], input[type=reset] {
				  background-color: #4CAF50;
				  border: none;
				  color: white;
				  padding: 12px 32px;
				  text-decoration: none;
				  margin: 2px 2px;
				  cursor: pointer;
				}
				</style>

		

		
		<!-- Icons/Glyphs -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


	</head>
    <body class="cnt-home">
		@php
			 $hotdeals = DB::table('hot_deals')
	   ->join('categories', 'categories.id', '=', 'hot_deals.category_id')
	   ->join('manufactures', 'manufactures.id', '=', 'hot_deals.manufacture_id')
	   ->select('hot_deals.*', 'manufactures.name as maname', 'categories.name as caname', )
	   ->where('hot_deals.status', '=',  1)
	   ->orderBy('created_at', 'desc')
	   ->paginate(5);
		
	   $products = DB::table('products')
->join('categories', 'categories.id', '=', 'products.category_id')
->join('manufactures', 'manufactures.id', '=', 'products.manufacture_id')
->select('products.*', 'manufactures.name as maname', 'categories.name as caname', )
->where('products.status', '=',  1)
->orderBy('id', 'desc')
->paginate(10);
		@endphp

		@php

				use App\Menus;


			$Menu =new Menus;

        

        try {

            $categories=$Menu->tree();

            

        } catch (Exception $e) {

            

            //no parent category found

		}
		
		


		@endphp

		
		@include('pages.header')

<br>
<br>
@php
	$cat_by_id = DB::table('categories')->where('status', 1)->get();
@endphp
<!-- ============================================== HEADER : END ============================================== -->
<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
	<div class="row">
	<!-- ============================================== SIDEBAR ============================================== -->	
		<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
			
			<!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">

			@foreach ($cat_by_id as $catitem)
				
			

            <li class="dropdown menu-item">
			<a href="{{ URL::to('/show/product/as/category/'. $catitem->id) }}"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i>{{ $catitem->name }}</a>
                     
		</li><!-- /.menu-item -->
@endforeach
         


        
          
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->

	<!-- ============================================== HOT DEALS ============================================== -->
<div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
	<h3 class="section-title">hot deals</h3>

	
		


	<div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
			@foreach ($hotdeals as $item)
														
			<div class="item">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
							<img src="{{ $item->images }}" style="width: 220px; hight: 100px;" alt="">
							</div>
							<div class="sale-offer-tag"><span>49%<br>off</span></div>
							<div class="timing-wrapper">
								<div class="box-wrapper">
									<div class="date box">
										<span class="key">120</span>
										<span class="value">DAYS</span>
									</div>
								</div>
				                
				                <div class="box-wrapper">
									<div class="hour box">
										<span class="key">20</span>
										<span class="value">HRS</span>
									</div>
								</div>

				                <div class="box-wrapper">
									<div class="minutes box">
										<span class="key">36</span>
										<span class="value">MINS</span>
									</div>
								</div>

				                <div class="box-wrapper hidden-md">
									<div class="seconds box">
										<span class="key">60</span>
										<span class="value">SEC</span>
									</div>
								</div>
							</div>
						</div><!-- /.hot-deal-wrapper -->

						<div class="product-info text-left m-t-20">
							<h3 class="name"><a href="detail.html">{{ $item->name }}</a></h3>
							<div class="rating rateit-small"></div>

							<div class="product-price">	
								<span class="price">
									$600.00
								</span>
									
							    <span class="price-before-discount">$800.00</span>					
							
							</div><!-- /.product-price -->
							
						</div><!-- /.product-info -->

						<div class="cart clearfix animate-effect">
							<div class="action">
								
								<div class="add-cart-button btn-group">
									<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
										<i class="fa fa-shopping-cart"></i>													
									</button>
									<button class="btn btn-primary cart-btn" type="button">Add to cart</button>
															
								</div>
								
							</div><!-- /.action -->
						</div><!-- /.cart -->
					</div>	
					</div>	
					@endforeach	        
													<div class="item">
					
					</div>		        
													<div class="item">
														
					</div>		        
						
				
    </div><!-- /.sidebar-widget -->
</div>

<div class="sidebar-widget outer-bottom-small wow fadeInUp">
	<h3 class="section-title">Special Offer</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
	        	        <div class="item">
	        	<div class="products special-product">
		        							
		        		
		        							
		        		        	</div>
			</div>
			@foreach($products as $value)
	    		        <div class="item">
	        	<div class="products special-product">
		        							
		        							
		        							
		        		        	</div>
	        </div>
	    		        <div class="item">
	        	<div class="products special-product">
		        							
		        							
					<div class="product">
							<div class="product-micro">
								<div class="row product-micro-row">
									<div class="col col-xs-5">
										<div class="product-image">
											<div class="image">
												<a href="#">
												<img src="{{$value->images}}" alt="" width="130">
												</a>					
											</div><!-- /.image -->
											
											
										</div><!-- /.product-image -->
								</div><!-- /.col -->
								<div class="col col-xs-7">
									<div class="product-info">
									<h3 class="name"><a href="#">{{$value->name}}</a></h3>
										<div class="rating rateit-small"></div>
										<div class="product-price">	
										<span class="price">
											$450.99				</span>
										
									</div><!-- /.product-price -->
										
									</div>
								</div><!-- /.col -->


							</div><!-- /.product-micro-row -->
						</div><!-- /.product-micro -->
							  
						</div>
					</div>
			</div>

			@endforeach

		 <div class="item">
	        	<div class="products special-product">
		        							
		        							
					<div class="product">
							<div class="product-micro">
								<div class="row product-micro-row">
									<div class="col col-xs-5">
										<div class="product-image">
											<div class="image">
												<a href="#">
													<img src="assets/images/products/p22.jpg" alt="">
												</a>					
											</div><!-- /.image -->
											
											
										</div><!-- /.product-image -->
								</div><!-- /.col -->
								<div class="col col-xs-7">
									<div class="product-info">
										<h3 class="name"><a href="#">Floral Print Shirt</a></h3>
										<div class="rating rateit-small"></div>
										<div class="product-price">	
										<span class="price">
											$450.99				</span>
										
									</div><!-- /.product-price -->
										
									</div>
								</div><!-- /.col -->


							</div><!-- /.product-micro-row -->
						</div><!-- /.product-micro -->
							  
						</div>
				</div>
			</div>
			
	    	</div>
	</div><!-- /.sidebar-widget-body -->


</div><!-- /.sidebar-widget -->

<div class="sidebar-widget product-tag wow fadeInUp">
	<h3 class="section-title">Product tags</h3>
	<div class="sidebar-widget-body outer-top-xs">
		<div class="tag-list">					
			<a class="item" title="Phone" href="category.html">Phone</a>
			<a class="item active" title="Vest" href="category.html">Vest</a>
			<a class="item" title="Smartphone" href="category.html">Smartphone</a>
			<a class="item" title="Furniture" href="category.html">Furniture</a>
			<a class="item" title="T-shirt" href="category.html">T-shirt</a>
			<a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
			<a class="item" title="Sneaker" href="category.html">Sneaker</a>
			<a class="item" title="Toys" href="category.html">Toys</a>
			<a class="item" title="Rose" href="category.html">Rose</a>
		</div><!-- /.tag-list -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
</div><!-- /.sidemenu-holder -->

		<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
            
            
			

			@yield('content')

	


		</div><!-- /.homebanner-holder -->
	</div><!-- /.row -->

	<?php
	
	$logos =DB::table('logos')
	->orderBy('created_at', 'desc')
	->limit(7)
	->get();
	?>




	<div id="brands-carousel" class="logo-slider wow fadeInUp">
	
		<div class="logo-slider-inner">	
			<div id="brand-slider" class="owl-carousel brand-slider custom-carousel owl-theme">
				<div class="item m-t-15">
					<a href="#" class="image">
						<img data-echo="" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->

				<div class="item m-t-10">
					<a href="#" class="image">
						<img data-echo="" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
				@foreach ($logos as $item)
				<div class="item">
					<a href="#" class="image">
					<img data-echo="{{ $item->images }}" style="hight: 100px; width: 100px;" src="assets/images/blank.gif" alt="">
					</a>	
				</div><!--/.item-->
				@endforeach
				
		    </div><!-- /.owl-carousel #logo-slider -->
		</div><!-- /.logo-slider-inner -->
		
	
</div><!-- /.logo-slider -->

	</div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->

<footer id="footer" class="footer color-bg">


    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Contact Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
        <ul class="toggle-footer" style="">
            <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                            <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                </div>
            </li>

              <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <p>+(888) 123-4567<br>+(888) 456-7890</p>
                </div>
            </li>

              <li class="media">
                <div class="pull-left">
                     <span class="icon fa-stack fa-lg">
                      <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                </div>
                <div class="media-body">
                    <span><a href="#">flipmart@themesground.com</a></span>
                </div>
            </li>
              
            </ul>
    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Customer Service</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="Contact us">My Account</a></li>
                <li><a href="#" title="About us">Order History</a></li>
                <li><a href="#" title="faq">FAQ</a></li>
                <li><a href="#" title="Popular Searches">Specials</a></li>
                <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Corporation</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                          <li class="first"><a title="Your Account" href="#">About us</a></li>
                <li><a title="Information" href="#">Customer Service</a></li>
                <li><a title="Addresses" href="#">Company</a></li>
                <li><a title="Addresses" href="#">Investor Relations</a></li>
                <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div><!-- /.col -->

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="module-heading">
                        <h4 class="module-title">Why Choose Us</h4>
                    </div><!-- /.module-heading -->

                    <div class="module-body">
                        <ul class='list-unstyled'>
                            <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                <li><a href="#" title="Blog">Blog</a></li>
                <li><a href="#" title="Company">Company</a></li>
                <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a></li>
                        </ul>
                    </div><!-- /.module-body -->
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-bar">
        <div class="container">
            <div class="col-xs-12 col-sm-6 no-padding social">
                <ul class="link">
                  <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a></li>
                  <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a></li>
                  <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#" title="GooglePlus"></a></li>
                  <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a></li>
                  <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#" title="PInterest"></a></li>
                  <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#" title="Linkedin"></a></li>
                  <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#" title="Youtube"></a></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-6 no-padding">
                <div class="clearfix payment-methods">
                    <ul>
                        <li><img src="assets/images/payments/1.png" alt=""></li>
                        <li><img src="assets/images/payments/2.png" alt=""></li>
                        <li><img src="assets/images/payments/3.png" alt=""></li>
                        <li><img src="assets/images/payments/4.png" alt=""></li>
                        <li><img src="assets/images/payments/5.png" alt=""></li>
                    </ul>
                </div><!-- /.payment-methods -->
            </div>
        </div>
    </div>
</footer>

	<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
	
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	
	<script src="{{ asset('assets/js/bootstrap-hover-dropdown.min.js') }}"></script>
	<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
	
	<script src="{{ asset('assets/js/echo.min.js') }}"></script>
	<script src="{{ asset('assets/js/jquery.easing-1.3.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.rateit.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/lightbox.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
	<script src="{{ asset('assets/js/scripts.js') }}"></script>



	

</body>
</html>