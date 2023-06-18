@extends('template.generic')

@section('title', 'Product List')

@section('content')
    <!-- Start Product Grids -->
    <section class="product-grids section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <!-- Start Product Sidebar -->
                    <div class="product-sidebar">
                        <!-- Start Single Widget -->
                        <div class="single-widget search">
                            <h3>Search Product</h3>
                            <form action="/product" method="GET">
                                <input type="text" id="query" name="query" placeholder="Search Here...">
                                <button type="submit"><i class="lni lni-search-alt"></i></button>
                            </form>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="single-widget">
                            <h3>All Categories</h3>
                            <ul class="list">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="/product?category_id={{ $category->id }}"
                                            style="text-transform: capitalize;">{{ str_replace('_', ' ', $category->name) }}
                                        </a><span>({{ $category->products()->count() }})</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                    <!-- End Product Sidebar -->
                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-md-8 col-12">
                                    <h6 class="total-show-product">Total: <span> {{ $products->count() }} items</span></h6>
                                    {{-- <div class="product-sorting">
                                        <label for="sorting">Sort by:</label>
                                        <select class="form-control" id="sorting">
                                            <option>Popularity</option>
                                            <option>Low - High Price</option>
                                            <option>High - Low Price</option>
                                            <option>Average Rating</option>
                                            <option>A - Z Order</option>
                                            <option>Z - A Order</option>
                                        </select>
                                        <h3 class="total-show-product">Showing: <span>1 - 12 items</span></h3>
                                    </div> --}}
                                </div>
                                <div class="col-lg-5 col-md-4 col-12">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-grid-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-grid" type="button" role="tab"
                                                aria-controls="nav-grid" aria-selected="true"><i
                                                    class="lni lni-grid-alt"></i></button>
                                            <button class="nav-link" id="nav-list-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-list" type="button" role="tab"
                                                aria-controls="nav-list" aria-selected="false"><i
                                                    class="lni lni-list"></i></button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                aria-labelledby="nav-grid-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-lg-4 col-md-6 col-12">
                                            <!-- Start Single Product -->
                                            <div class="single-product">
                                                <div class="product-image">
                                                    <img src="{{ asset('storage' . $product->image_url) }}" alt="#">
                                                    <div class="button">
                                                        <a href="/product/{{ $product->id }}" class="btn">
                                                            Bid</a>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <span
                                                        class="category"style="text-transform: capitalize;">{{ str_replace('_', ' ', $product->category->name) }}</span>
                                                    <h4 class="title">
                                                        <a href="/product/{{ $product->id }}">{{ $product->name }}</a>
                                                    </h4>
                                                    <div class="price">
                                                        <span>Rp{{ $product->getTotalBidAmount() }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Product -->
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Pagination -->
                                        <div class="pagination left">
                                            <ul class="pagination-list">
                                                @if ($products->onFirstPage())
                                                    <!-- No previous page available -->
                                                    <li class="disabled">
                                                        <span><i class="lni lni-chevron-left"></i></span>
                                                    </li>
                                                @else
                                                    <!-- Previous page available -->
                                                    <li>
                                                        <a
                                                            href="{{ $products->previousPageUrl() . '&' . http_build_query(request()->except('page')) }}">
                                                            <i class="lni lni-chevron-left"></i>
                                                        </a>
                                                    </li>
                                                @endif

                                                @foreach ($products->links()->elements[0] as $page => $url)
                                                    <li class="{{ $products->currentPage() == $page ? 'active' : '' }}">
                                                        <a
                                                            href="{{ $url . '&' . http_build_query(request()->except('page')) }}">{{ $page }}</a>
                                                    </li>
                                                @endforeach

                                                @if ($products->hasMorePages())
                                                    <!-- Next page available -->
                                                    <li>
                                                        <a
                                                            href="{{ $products->nextPageUrl() . '&' . http_build_query(request()->except('page')) }}">
                                                            <i class="lni lni-chevron-right"></i>
                                                        </a>
                                                    </li>
                                                @else
                                                    <!-- No next page available -->
                                                    <li class="disabled">
                                                        <span><i class="lni lni-chevron-right"></i></span>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>

                                        <!--/ End Pagination -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <!-- Start Single Product -->
                                            <div class="single-product">
                                                <div class="row align-items-center">
                                                    <div class="col-lg-4 col-md-4 col-12">
                                                        <div class="product-image">
                                                            <img src="{{ asset('storage' . $product->image_url) }}"
                                                                alt="#">
                                                            <div class="button">
                                                                <a href=""/product/{{ $product->id }}"
                                                                    class="btn"><i class="lni lni-cart"></i> Bid Now!</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-12">
                                                        <div class="product-info">
                                                            <span
                                                                class="category"style="text-transform: capitalize;">{{ str_replace('_', ' ', $product->category->name) }}</span>
                                                            <h4 class="title">
                                                                <a
                                                                    href="/product/{{ $product->id }}">{{ $product->name }}</a>
                                                            </h4>
                                                            <div class="price">
                                                                <span>Rp{{ $product->getTotalBidAmount() }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Single Product -->
                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Pagination -->
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
                                        <!--/ End Pagination -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Grids -->
@endsection
