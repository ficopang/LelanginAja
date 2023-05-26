@extends('template.generic')

@section('title', 'Watchlist')

@section('content')
    <!-- Shopping Cart -->
    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">
                <!-- Cart List Title -->
                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">

                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Latest Bid</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>
                <!-- End Cart List Title -->
                @foreach (auth()->user()->watchlist as $watchlistItem)
                    <!-- Cart Single List list -->
                    <div class="cart-single-list">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <a href="/product/{{ $watchlistItem->product->id }}"><img
                                        src="{{ asset('storage/' . $watchlistItem->product->image_url) }}"
                                        alt="#"></a>
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name"><a href="/product/{{ $watchlistItem->product->id }}">
                                        {{ $watchlistItem->product->name }}</a></h5>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>{{ $watchlistItem->product->getTotalBidAmount() }}</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>{{ $watchlistItem->product->bids()->latest('created_at')->first()? $watchlistItem->product->bids()->latest('created_at')->first()->user->first_name: '-' }}
                                </p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <form action="/product/{{ $watchlistItem->product->id }}/watchlist" method="POST">
                                    @csrf
                                    <button class="remove-item"><i class="lni lni-close"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Single List list -->
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Total Amount -->
                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="right">
                                    <div class="button">
                                        <a href="/checkout" class="btn">Checkout</a>
                                        <a href="/" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ End Total Amount -->
                </div>
            </div>
        </div>
    </div>
    <!--/ End Shopping Cart -->
@endsection
