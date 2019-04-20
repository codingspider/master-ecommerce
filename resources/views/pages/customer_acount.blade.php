@extends('pages.mastertwo')
@section('title', 'My Acount')

@section('content')
<div class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
            <div class="page-title">
    <h2>Dashboard</h2>
    </div>
            </div>
          </div>
        </div>
      </div>	

      @php
            $data = Session::get('customer_id');
            
             $users = DB::table('orders')
            ->join('order_details', 'order_details.order_id', '=', 'orders.order_id')
            ->join('customers', 'customers.customer_id', '=', 'orders.customer_id')
            ->join('shipings', 'shipings.shiping_id', '=', 'orders.shiping_id')
            ->select('orders.*','orders.created_at as orcreat', 'customers.*' , 'order_details.*', 'shipings.*', 'shipings.email as smail')
            ->where('orders.customer_id', $data) 
            ->orderBy('orders.order_id', 'desc')
            ->get();
      @endphp
      
      <!-- BEGIN Main Container col2-right -->
      <section class="main-container col2-right-layout">
        <div class="main container">
          <div class="row">
            <section class="col-main col-sm-10 col-xs-12 wow bounceInUp animated animated" style="visibility: visible;">
              <div class="my-account">
                
                <!--page-title--> 
                <!-- BEGIN DASHBOARD-->
                <div class="dashboard">
                  <div class="welcome-msg">
                  </div>
                  <div class="recent-orders">
                    <div class="table-responsive">
                            <table class="table table-borderless table-dark col-md-12">
                                    <thead>
                                      <tr>
                                        <th scope="col">ORDER #</th>
                                        <th scope="col">DATE</th>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">SHIP TO</th>
                                        <th scope="col">ORDER TOTAL</th>
                                        <th scope="col">STATUS</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (  $users as $item)
                                            
                                        
                                      <tr>
                                          
                                      <th scope="row">{{ $item->order_id}}</th>
                                      <th scope="row">{{ $item->orcreat}}</th>
                                      <th scope="row">{{ $item->product_name}}</th>
                                      <th scope="row">{{ $item->first_name}}-{{ $item->last_name}}</th>
                                      <th scope="row">{{ $item->order_total}}</th>
                                      <th scope="row">{{ $item->order_status}}</th>
                                        
                                      </tr>
                                      @endforeach
                                    </tbody>
                                  </table>
                    </div>
                    <!--table-responsive-->                 
                  </div>
                  <h5>Customer Information</h5>
                  <table class="col-main col-sm-6 col-xs-8 wow bounceInUp animated animated table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">{{ $item->name}} </th>
                            <td>{{ $item->address}}</td>
                            <td>{{ $item->email}}</td>
                            <td>{{ $item->phone }}</td>
                          </tr>
                          
                     
                        </tbody>
                        
                        
                      </table>

                    
                  <!--recent-orders-->
                  <div class="div col-md-12">
                        <h5>Shiping Information</h5>
                        <table class="col-main col-sm-6 col-xs-8 wow bounceInUp animated animated table-bordered">
                              <thead>
                                <tr>
                                  <th scope="col">Name</th>
                                  <th scope="col">Address</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Phone</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">{{ $item->first_name}}-{{ $item->last_name}} </th>
                                  <td>{{ $item->address}}</td>
                                  <td>{{ $item->smail}}</td>
                                  <td>{{ $item->phone }}</td>
                                </tr>
                                
                           
                              </tbody>
                              
                              
                            </table>
                  </div>
                  
                </div>
                
              
              </div>
            </section>
            <!--col-main col-sm-9 wow bounceInUp animated-->
            <aside class="col-right sidebar col-sm-2 col-xs-12 wow bounceInUp animated animated" style="visibility: visible;">
              <div class="block block-account">
                <div class="block-title"> Name </div>
                <div class="block-content">
                  <ul>
                    <li class="active selected"><a>Account Dashboard</a></li>
                   
                    <li><a href="#"><span> Address Book</span></a></li>
                    <li><a href="#"><span> My Orders</span></a></li>
                    
                   
                   
                    <li><a href="#"><span> My Wishlist</span></a></li>
                  <a href="#" class="btn btn-info">Change Password</a>

                    
                  </ul>
                </div>
                <!--block-content--> 
              </div>
              <!--block block-account-->
              
              
            </aside>
                
            <!--col-right sidebar col-sm-3 wow bounceInUp animated--> 
          </div>
          <!--row--> 
        </div>
        <!--main container--> 
      </section>
      <br>
      <br>
      <br>
      <br>
      <br>
@endsection