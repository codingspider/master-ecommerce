<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">
					<li><a href="#"><i class="icon fa fa-user"></i>My Account</a></li>

					@if( Cart::count() > 0)
					<li><a href="{{ URL::to('/login/checkout') }}"><i class="icon fa fa-heart"></i>  Wishlist</a></li>
					@else 
					<li><a href="{{ URL::to('/wishlist') }}"><i class="icon fa fa-heart"></i> Wishlist</a></li>
					@endif 

					<li><a href="{{ URL::to('/show/cart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>

					<?php
					$data = Session::get('customer_id');
					$data_shipping_id = Session::get('shiping_id');
					?>
					@if($data != NULL && $data_shipping_id == NULL)
					<li><a href="{{ URL::to('/checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>
					@elseif($data != NULL && $data_shipping_id != NULL)
					<li><a href="{{ URL::to('/payment/process') }}"><i class="icon fa fa-lock"></i>Checkout</a></li>
					@else
					<li><a href="{{ URL::to('/login/checkout') }}"><i class="icon fa fa-lock"></i>Checkout</a></li>
					@endif



					



					<?php
					$data = Session::get('customer_id');
					?>
					@if($data != NULL)
					<li><a href="{{ URL::to('/logout') }}"><i class="icon fa fa-lock"></i>logout</a></li>
					@else
					<li><a href="{{ URL::to('/login/checkout') }}"><i class="icon fa fa-lock"></i>login</a></li>
					@endif
				</ul>
			</div><!-- /.cnt-account -->


			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->

<?php 
 $products= DB::table('products')
    ->join('categories', 'categories.id', '=', 'products.category_id')
    ->join('manufactures', 'manufactures.id', '=', 'products.manufacture_id')
    ->select('products.*', 'manufactures.name as maname', 'categories.name as caname', )
    ->where('products.status', '=',  1)
    ->get();
?>


<?php 
					
$hotdeals = DB::table('hot_deals')
->join('categories', 'categories.id', '=', 'hot_deals.category_id')
->join('manufactures', 'manufactures.id', '=', 'hot_deals.manufacture_id')
->select('hot_deals.*', 'manufactures.name as maname', 'categories.name as caname', )
->where('hot_deals.status', '=',  1)
->orderBy('created_at', 'desc')
->paginate(5);

		
		?>
<!-- ============================================== TOP MENU : END ============================================== -->
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
<?php 
$weblogo = DB::table('web_logos')->where('status', 1)->orderBy('created_at', 'desc')->first();

?>
					<div class="logo">
	<a href="{{ URL::to('/home') }}">
		
	<img src="{{ $weblogo->images }}"  style="hight: 50px; width:50px" alt="">

	</a>
</div><!-- /.logo -->
<!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

				<div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
					<!-- /.contact-row -->

@php
	$cat_by_id = DB::table('categories')->where('status', 1)->get();
@endphp
<!-- ============================================================= SEARCH AREA ============================================================= -->
<div class="search-area">
    <form>
        <div class="control-group">

            

            <input class="search-field" placeholder="Search here..." />

            <a class="search-button" href="#" ></a>    

        </div>
    </form>
</div><!-- /.search-area -->
<!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

				<div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
					<!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

	<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
			<div class="items-cart-inner">
            <div class="basket">
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</div>
			<div class="basket-item-count"><span class="count">{{ Cart::count() }}</span></div>
				<div class="total-price-basket">
					<span class="lbl">৳{{ Cart::total() }}</span>
					<span class="total-price">
						<span class="sign"></span><span class="value"></span>
					</span>
				</div>
				
			
		    </div>
		</a>
		<ul class="dropdown-menu">
			<li>
				<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-4">
							<div class="image">
								<a href="detail.html"><img src="assets/images/cart.jpg" alt=""></a>
							</div>
						</div>
						<div class="col-xs-7">
							
							<h3 class="name"><a href="index.php?page-detail">Simple Product</a></h3>
							<div class="price">$600.00</div>
						</div>
						<div class="col-xs-1 action">
							<a href="#"><i class="fa fa-trash"></i></a>
						</div>
					</div>
				</div><!-- /.cart-item -->
				<div class="clearfix"></div>
			<hr>
		
			<div class="clearfix cart-total">
				<div class="pull-right">
					
						<span class="text">Sub Total :</span><span class='price'>$600.00</span>
						
				</div>
				<div class="clearfix"></div>
					
				<a href="{{ URL::to('/login/checkout') }}" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>	
			</div><!-- /.cart-total-->
					
				
		</li>
		</ul><!-- /.dropdown-menu-->
	</div><!-- /.dropdown-cart -->

<!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
			</div><!-- /.row -->

		</div><!-- /.container -->

	</div><!-- /.main-header -->

	<!-- ============================================== NAVBAR ============================================== -->
<div class="header-nav animate-dropdown">
    <div class="container">
        <div class="yamm navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="nav-bg-class">

					<div class="main_menu_area hidden-xs light-blue darken-4 ">

							<div class="container">
				
								<div class="row">
				
									<div class="col-md-12">
				
										<div class="mainnmenu">
				
											<nav>
				
												<ul class="main-nagivation">
														<li><a href="{{URL::to('/home')}}">Home</a></li>
				
												@each('partials.index', $categories, 'category')
				
												</ul>
				
											</nav>
				
										</div>
				
									</div>
				
								</div>
				
							</div>
				
						</div>

            </div><!-- /.nav-bg-class -->
        </div><!-- /.navbar-default -->
    </div><!-- /.container-class -->

</div><!-- /.header-nav -->
<!-- ============================================== NAVBAR : END ============================================== -->

</header>