@php
    
		
$products = DB::table('products')
->join('categories', 'categories.id', '=', 'products.category_id')
->join('manufactures', 'manufactures.id', '=', 'products.manufacture_id')
->select('products.*', 'manufactures.name as maname', 'categories.name as caname', )
->where('products.status', '=',  1)
->orderBy('id', 'desc')
->paginate(10);


$hot_details = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('manufactures', 'manufactures.id', '=', 'products.manufacture_id')
        ->select('products.*', 'manufactures.name as maname', 'categories.name as caname', )
        ->where('products.status', '=',  1)
        ->orderBy('id', 'desc')
        ->paginate(5);
        


	$cat_by_id = DB::table('categories')->where('status', 1)->get();
@endphp



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
			@foreach ($hot_details as $item)
														
			<div class="item">
					<div class="products">
						<div class="hot-deal-wrapper">
							<div class="image">
							<img src="{{ URl::asset($item->images) }}" style="width: 220px; hight: 100px;" alt="">
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
									৳{{ $item->price }}
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
								<button class="btn btn-primary cart-btn" type="button"><a href="{{ URL::to('/products/details/'.$item->id )}}" > Add to Cart</a></button>
															
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
