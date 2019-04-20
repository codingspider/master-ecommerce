@extends('pages.mastertwo')

@section ('title', 'Wishlist')
@section('content')

    
    <div class="body-content">
        <div class="container">
            <div class="my-wishlist-page">
                <div class="row">
                    <div class="col-md-12 my-wishlist">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th colspan="4" class="heading-title">My Wishlist</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ( Cart::instance('saveForLater')->content() as $item)
                       
                   
                    <tr>
                    <td class="col-md-2"><img src="{{ URL::asset($item->options->images)}}" alt="phoro"></td>
                        <td class="col-md-7">
                        <div class="product-name"><a href="#">{{ $item->name }}</a></div>
                            <div class="rating">
                                <i class="fa fa-star rate"></i>
                                <i class="fa fa-star rate"></i>
                                <i class="fa fa-star rate"></i>
                                <i class="fa fa-star rate"></i>
                                <i class="fa fa-star non-rate"></i>
                                <span class="review">( 06 Reviews )</span>
                            </div>
                            <div class="price">
                                    {{ $item->price }}
                                <span>$900.00</span>
                            </div>
                        </td>
                        <td class="col-md-2">
                            <a href="#" class="btn-upper btn btn-info">Add to cart</a>
                        </td>
                        <td class="col-md-1 close-btn">
                            <a href="{{ URL::to('/delete/wishlist/prodotucs/'. $item->rowId) }}" class=""><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>			</div><!-- /.row -->
            </div><!-- /.sigin-in-->   
        </div>
    </div>
<br>
<br>
<br>
@endsection