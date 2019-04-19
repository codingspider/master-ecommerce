@extends('pages.mastertwo')
@section('title', 'Thank You ')
@section('content')

@include('pages.sidebar')
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			
      <div class="col-md-9">
        <div class="jumbotron text-xs-center">
          <h1 class="display-3">Thank You!  </h1>
          <p class="lead"><strong>For Your Order</strong> one of our customer manager will contact you shortly.</p>
          <hr>
          <p>
            Having trouble? <a href="">Contact us</a>
          </p>
          <p class="lead">
          <a class="btn btn-primary btn-sm" href="{{URL::to('/home')}}" role="button">Continue to homepage</a>
          </p>
        </div>
    </div>
  </div>
</div>
    
    <br>
    <br>
@endsection