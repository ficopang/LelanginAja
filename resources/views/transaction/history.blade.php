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


                    <div class="single-item-list" data-bs-toggle="collapse" data-bs-target="#product-details-1"
                        class="accordion-toggle">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-5 col-12">
                                <div class="item-image">
                                    <img src="assets/images/my-items/xmy-item1.png.pagespeed.ic.OZIVj-_3hY.webp"
                                        alt="#" data-pagespeed-url-hash="3023132953"
                                        onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                    <div class="content">
                                        <h3 class="title"><a href="javascript:void(0)">Brand New Iphone
                                                11 Pro Max</a></h3>
                                        <span class="price">$800</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>Rp5.000.000</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>02-02-2020</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>Sunib</p>
                            </div>
                            <div class="col-lg-1 col-md-3 col-12 align-right">
                                <ul class="action-btn">
                                    <li><a href="javascript:void(0)"><i class="lni lni-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="product-details-1">
                        <div class="card card-body">
                            <p>Product Details:</p>
                            <ul>
                                <li>Name: Product 1</li>
                                <li>Description: Description 1</li>
                                <li>Starting Price: 100</li>
                                <li>Min Bid Increment: 10</li>
                                <li>Image: <img src="product1.jpg" alt="Product 1" width="100">
                                </li>
                                <li>Start Time: Rp5.000.000</li>
                                <li>End Time: 2023-05-20T10:00</li>
                                <li>Status: Delivered</li>
                            </ul>
                        </div>
                    </div>


                    <div class="single-item-list" data-bs-toggle="collapse" data-bs-target="#product-details-2"
                        class="accordion-toggle">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-5 col-12">
                                <div class="item-image">
                                    <img src="assets/images/my-items/xmy-item2.png.pagespeed.ic.mG9-5goHLp.webp"
                                        alt="#" data-pagespeed-url-hash="3317632874"
                                        onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                    <div class="content">
                                        <h3 class="title"><a href="javascript:void(0)">New Ferrari F80
                                                Car</a></h3>
                                        <span class="price">$13000</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>Rp5.000.000</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>02-02-2020</p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p>Sunib</p>
                            </div>
                            <div class="col-lg-1 col-md-3 col-12 align-right">
                                <ul class="action-btn">
                                    <li><a href="javascript:void(0)"><i class="lni lni-eye"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="collapse" id="product-details-2">
                        <div class="card card-body">
                            <p>Product Details:</p>
                            <ul>
                                <li>Name: Product 2</li>
                                <li>Description: Description 2</li>
                                <li>Starting Price: 200</li>
                                <li>Min Bid Increment: 20</li>
                                <li>Image: <img src="product2.jpg" alt="Product 2" width="100">
                                </li>
                                <li>Start Time: 2023-05-16T10:00</li>
                                <li>End Time: 2023-05-21T10:00</li>
                                <li>Status: Canceled</li>
                            </ul>
                        </div>
                    </div>

                    <div class="pagination left">
                        <ul class="pagination-list">
                            <li><a href="javascript:void(0)">1</a></li>
                            <li class="active"><a href="javascript:void(0)">2</a></li>
                            <li><a href="javascript:void(0)">3</a></li>
                            <li><a href="javascript:void(0)">4</a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--/ End Report -->
@endsection
