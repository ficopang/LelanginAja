@extends('template.generic')

@section('title', 'History')

@section('content')
    <!-- Report -->
    <div class="container section">
        <div class="card">
            <div class="card-header">
                Transaction History
            </div>
            <div class="card-body">
                <div class="my-items">
                    <div class="item-list-title">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-5 col-12">
                                <p>Product</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>Price</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>Date</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>Seller</p>
                            </div>
                            <div class="col-lg-1 col-md-3 col-12 align-right">
                                <p>Action</p>
                            </div>
                        </div>
                    </div>
                    @foreach ($userTransactions as $tr)
                        <div class="single-item-list" data-bs-toggle="collapse" data-bs-target="#product-details-1"
                            class="accordion-toggle">
                            <div class="row align-items-center">
                                <div class="col-lg-5 col-md-5 col-12">
                                    <div class="item-image">
                                        <img src="{{ asset('storage' . $tr->product->image_url) }}" alt="#"
                                            data-pagespeed-url-hash="3023132953"
                                            onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                        <div class="content">
                                            <h3 class="title"><a
                                                    href="/product/{{ $tr->product->id }}">{{ $tr->product->name }}</a>
                                            </h3>
                                            <span class="price">{{ 'Rp' . $tr->final_price }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12">
                                    <p>{{ 'Rp' . $tr->final_price }}</p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12">
                                    <p>{{ $tr->created_at }}</p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-12">
                                    <p>{{ $tr->seller->first_name . ' ' . $tr->seller->last_name }}</p>
                                </div>
                                <div class="col-lg-1 col-md-3 col-12 align-right">
                                    <ul class="action-btn">
                                        <li><a href="javascript:void(0)"><i class="lni lni-eye"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="collapse" id="product-details-1">
                            <div class="card card-body">
                                <p>Product Details:</p>
                                <ul>
                                    <li>Name: {{ $tr->product->name }}</li>
                                    <li>Description: {{ $tr->product->description }}</li>
                                    <li>Starting Price: {{ 'Rp' . $tr->product->starting_price }}</li>
                                    <li>Min Bid Increment: {{ 'Rp' . $tr->product->min_bid_increment }}</li>
                                    <li>Image: <img src="{{ asset('storage' . $tr->product->image_url) }}" alt="Product 1"
                                            width="100"></li>
                                    <li>Start Time: {{ $tr->product->start_time }}</li>
                                    <li>End Time: {{ $tr->product->end_time }}</li>
                                    <li>Status: {{ $tr->status }}</li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="pagination left">
                        <ul class="pagination-list">
                            <li><a href="javascript:void(0)">1</a></li>
                            <li class="active"><a href="javascript:void(0)">2</a></li>
                            <li><a href="javascript:void(0)">3</a></li>
                            <li><a href="javascript:void(0)">4</a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!--/ End Report -->
@endsection
