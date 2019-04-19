@extends('master')
@section('title', 'Product by category')

@section('content')

<div class='col-md-12'> 
	<!-- ========================================== SECTION – HERO ========================================= -->
	

	
 
	<div class="clearfix filters-container m-t-10">
	  <div class="row">
		<div class="col col-sm-6 col-md-2">
		  <div class="filter-tabs">
			<ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
			  <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
			  <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
			</ul>
		  </div>
		  <!-- /.filter-tabs --> 
		</div>
		<!-- /.col -->
		<div class="col col-sm-12 col-md-6">
		  <div class="col col-sm-3 col-md-6 no-padding">
			<div class="lbl-cnt"> <span class="lbl">Sort by</span>
			  <div class="fld inline">
				<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
				  <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
				  <ul role="menu" class="dropdown-menu">
					<li role="presentation"><a href="#">position</a></li>
					<li role="presentation"><a href="#">Price:Lowest first</a></li>
					<li role="presentation"><a href="#">Price:HIghest first</a></li>
					<li role="presentation"><a href="#">Product Name:A to Z</a></li>
				  </ul>
				</div>
			  </div>
			  <!-- /.fld --> 
			</div>
			<!-- /.lbl-cnt --> 
		  </div>
		  <!-- /.col -->
		  <div class="col col-sm-3 col-md-6 no-padding">
			<div class="lbl-cnt"> <span class="lbl">Show</span>
			  <div class="fld inline">
				<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
				  <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
				  <ul role="menu" class="dropdown-menu">
					<li role="presentation"><a href="#">1</a></li>
					<li role="presentation"><a href="#">2</a></li>
					<li role="presentation"><a href="#">3</a></li>
					<li role="presentation"><a href="#">4</a></li>
					<li role="presentation"><a href="#">5</a></li>
					<li role="presentation"><a href="#">6</a></li>
					<li role="presentation"><a href="#">7</a></li>
					<li role="presentation"><a href="#">8</a></li>
					<li role="presentation"><a href="#">9</a></li>
					<li role="presentation"><a href="#">10</a></li>
				  </ul>
				</div>
			  </div>
			  <!-- /.fld --> 
			</div>
			<!-- /.lbl-cnt --> 
		  </div>
		  <!-- /.col --> 
		</div>
		<!-- /.col -->
		<div class="col col-sm-6 col-md-4 text-right">
		  <div class="pagination-container">
			<ul class="list-inline list-unstyled">
			  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
			  <li><a href="#">1</a></li>
			  <li class="active"><a href="#">2</a></li>
			  <li><a href="#">3</a></li>
			  <li><a href="#">4</a></li>
			  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
			</ul>
			<!-- /.list-inline --> 
		  </div>
		  <!-- /.pagination-container --> </div>
		<!-- /.col --> 
	  </div>
	  <!-- /.row --> 
	</div>
	<div class="search-result-container ">
	  <div id="myTabContent" class="tab-content category-list">
		<div class="tab-pane active " id="grid-container">
		<div class="category-product">
				<div class="row">		
					@php
					$id = DB::table('products')->where('id',$item->id )->count();
							
					@endphp
		@foreach ($products as $item)


				  <div class="col-sm-6 col-md-4 wow fadeInUp">
					<div class="products">
					  <div class="product">
						<div class="product-image">
						<div class="image"> <a href="{{ URL::to('/products/details/'. $item->id) }}"><img  src="{{ URL::asset($item->images) }}" style="width: 220px; hight:100px;"alt=""></a> </div>
						  <!-- /.image -->
						
						</div>
						<!-- /.product-image -->
						
						<div class="product-info text-left">
						<h3 class="name"><a href="{{ URL::to('/products/details/'. $item->id) }}">{{ $item->name }}</a></h3>
						  <div class="rating rateit-small"></div>
						  <div class="description"></div>
						  <div class="product-price"> <span class="price"> ৳ {{ $item->price }} </span> <span class="price-before-discount">$ 800</span> </div>
						  <!-- /.product-price --> 
						  
						</div>
						<!-- /.product-info -->
						<div class="cart clearfix animate-effect">
								<div class="action">
									<ul class="list-unstyled">
										<li class="lnk wishlist">
											<a class="add-to-cart" href="{{ URL::to('/products/details/'. $item->id) }}" title="Wishlist">
												<i class="fa fa-shopping-cart"></i>													
											</a>
										</li>
									   
										<li class="lnk wishlist">
											<a class="add-to-cart" href="{{URL::to('/products/add/wishlist')}}" title="Wishlist">
												 <i class="icon fa fa-heart"></i>
											</a>
										</li>
				
										<li class="lnk">
										<a class="add-to-cart" href="{{URL::to('/products/details')}}" title="Compare">
												<i class="fa fa-signal" aria-hidden="true"></i>
											</a>
										</li>
									</ul>
								</div><!-- /.action -->
							</div><!-- /.cart -->
						<!-- /.cart --> 
					  </div>
					  <!-- /.product --> 
					  
					</div>
					<!-- /.products --> 
				
				  </div>
					<!-- /.item -->
			
				
					@endforeach
				 
				  <!-- /.item -->
				  
			
				  <!-- /.item --> 
				</div>
				<!-- /.row --> 
				
			  </div>
				<!-- /.category-product --> 
				

			  
			</div>
			<!-- /.tab-pane -->
			
		
		
			
		  </div>
		  <!-- /.category-product --> 
		</div>
		<!-- /.tab-pane #list-container --> 
	  </div>
	  <!-- /.tab-content -->
	  <div class="clearfix filters-container">
		<div class="text-right">
		  <div class="pagination-container">
			<ul class="list-inline list-unstyled">
			  <li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
			  <li><a href="#">1</a></li>
			  <li class="active"><a href="#">2</a></li>
			  <li><a href="#">3</a></li>
			  <li><a href="#">4</a></li>
			  <li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
			</ul>
			<!-- /.list-inline --> 
		  </div>
		  <!-- /.pagination-container --> </div>
		<!-- /.text-right --> 
		
	  </div>
	  <!-- /.filters-container --> 
	  
	</div>
	<!-- /.search-result-container --> 
	
  </div>


	

@endsection