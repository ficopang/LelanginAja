@extends('template.generic')

@section('title', 'Manage Products')


@section('content')
    <!-- Start my product Area -->
    <div class="container section">
        <div class="row">
            <div class="col-md-3 d-none d-md-block">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#add-product" data-bs-toggle="pill">Add Product</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#view-products" data-bs-toggle="pill">View Product List</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header border-bottom mb-3 d-flex d-md-none">
                        <ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" id="v-pills-add-product-tab"
                                    href="#add-product" data-bs-toggle="pill" role="tab" aria-controls="add-product"
                                    aria-selected="true"><i class="lni lni-plus"></i></a></li>
                            <li class="nav-item"> <a class="nav-link" id="v-pills-view-product-tab" href="#view-products"
                                    data-bs-toggle="pill" role="tab" aria-controls="v-pills-view-product"
                                    aria-selected="true"><i class="lni lni-layers"></i></a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="add-product">
                                <h3>Add Product</h3>
                                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                        <label for="product-name" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" id="product-name" name="product-name"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="category-select" class="form-label">Select a Category</label>
                                        <select class="form-select" id="category-select" name="category">
                                            <option selected disabled>Select a category</option>
                                            <option value="1">Electronics</option>
                                            <option value="2">Clothing</option>
                                            <option value="3">Home</option>
                                            <option value="4">Beauty</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product-description" class="form-label">Product Description</label>
                                        <textarea class="form-control" id="product-description" name="product-description" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="starting-price" class="form-label">Starting Price</label>
                                        <input type="number" class="form-control" id="starting-price" name="starting-price"
                                            required step="1000">
                                    </div>
                                    <div class="mb-3">
                                        <label for="min-bid-increment" class="form-label">Minimum Bid Increment</label>
                                        <input type="number" class="form-control" id="min-bid-increment"
                                            name="min-bid-increment" required step="1000">
                                    </div>
                                    <div class="mb-3">
                                        <label for="product-image" class="form-label">Product Image</label>
                                        <input type="file" class="form-control" id="product-image" name="product-image"
                                            accept="image/*" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="start-time" class="form-label">Start Time</label>
                                        <input type="datetime-local" class="form-control" id="start-time" name="start-time"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="end-time" class="form-label">End Time</label>
                                        <input type="datetime-local" class="form-control" id="end-time" name="end-time"
                                            required>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Add Product</button>
                                </form>
                            </div>


                            <div class="tab-pane fade" id="view-products">
                                <h3>View Product List</h3>
                                <div class="my-items">

                                    <div class="item-list-title">
                                        <div class="row align-items-center">
                                            <div class="col-lg-5 col-md-5 col-12">
                                                <p>Product</p>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-12">
                                                <p>Start Time</p>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-12">
                                                <p>End Time</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-12 align-right">
                                                <p>Action</p>
                                            </div>
                                        </div>
                                    </div>


                                    @foreach($products as $product)
                                        <div class="single-item-list" data-bs-toggle="collapse"
                                            data-bs-target="#product-details-{{ $product->id }}" class="accordion-toggle">
                                            <div class="row align-items-center">
                                                <div class="col-lg-5 col-md-5 col-12">
                                                    <div class="item-image">
                                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}">
                                                        <div class="content">
                                                            <h3 class="title"><a href="javascript:void(0)">{{ $product->name }}</a></h3>
                                                            <span class="price">${{ $product->starting_price }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-12">
                                                    <p>{{ $product->start_time }}</p>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-12">
                                                    <p>{{ $product->end_time }}</p>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-12 align-right">
                                                    <ul class="action-btn">
                                                        <li><a href="javascript:void(0)"><i class="lni lni-pencil"></i></a></li>
                                                        <li><a href="javascript:void(0)"><i class="lni lni-trash-can"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="collapse" id="product-details-{{ $product->id }}">
                                            <div class="card card-body">
                                                <p>Product Details:</p>
                                                <ul>
                                                    <li>Name: {{ $product->name }}</li>
                                                    <li>Description: {{ $product->description }}</li>
                                                    <li>Starting Price: ${{ $product->starting_price }}</li>
                                                    <li>Min Bid Increment: ${{ $product->min_bid_increment }}</li>
                                                    <li>Image: <img src="{{ $product->image_url }}" alt="{{ $product->name }}" width="100"></li>
                                                    <li>Start Time: {{ $product->start_time }}</li>
                                                    <li>End Time: {{ $product->end_time }}</li>
                                                    <li>Status: {{ $product->status }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endforeach

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
                </div>
            </div>
        </div>
    </div>
    <!-- End my product Area -->
@endsection
