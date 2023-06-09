<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>LelanginAja @hasSection('title')
            -
        @endif @yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.svg') }}" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    @yield('custom-header')
    {{-- @vite([]) --}}
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="/">
                            <img src="{{ asset('assets/images/logo/logo.svg') }}" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <form class="navbar-search search-style-5" action="/product" method="GET">
                                <div class="search-select">
                                    <div class="select-position">
                                        <select id="category_id" name="category_id">
                                            <option value="none" selected>All</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" style="text-transform: capitalize;">
                                                    {{ str_replace('_', ' ', $category->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="search-input">
                                    <input type="text" id="query" name="query" placeholder="Search">
                                </div>
                                <div class="search-btn">
                                    <button type="submit"><i class="lni lni-search-alt"></i></button>
                                </div>
                            </form>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            @auth
                                <div class="nav-hotline">
                                    <div class="row">
                                        <div class="col">
                                            <div class="button">
                                                <a href="/logout" class="btn">Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="navbar-cart">
                                    <div class="cart-items">
                                        <a href="javascript:void(0)" class="main-btn">
                                            <i class="lni lni-eye"></i>
                                            <span class="total-items">{{ auth()->user()->watchlist->count() }}</span>
                                        </a>
                                        <!-- Shopping Item -->
                                        <div class="shopping-item" style="z-index: 1000">
                                            <ul class="shopping-list">
                                                @foreach (auth()->user()->watchlist as $watchlistItem)
                                                    <li>
                                                        <div class="cart-img-head">
                                                            <a class="cart-img"
                                                                href="/product/{{ $watchlistItem->product->id }}"><img
                                                                    src="{{ asset('storage' . $watchlistItem->product->image_url) }}"
                                                                    alt="#"></a>
                                                        </div>

                                                        <div class="content">
                                                            <h4><a href="/product/{{ $watchlistItem->product->id }}">
                                                                    {{ $watchlistItem->product->name }}</a></h4>
                                                            <p class="quantity">Budi - <span
                                                                    class="amount">Rp{{ $watchlistItem->product->getTotalBidAmount() }}</span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <!--/ End Shopping Item -->
                                    </div>
                                    <div class="cart-items">
                                        <a href="javascript:void(0)" class="main-btn">
                                            <i class="lni lni-cart"></i>
                                            <span class="total-items">{{ $wonProducts->count() }}</span>
                                        </a>
                                        <!-- Shopping Item -->
                                        <div class="shopping-item" style="z-index: 1000;">
                                            <div class="dropdown-cart-header">
                                                <span>{{ $wonProducts->count() }} Items</span>
                                                <a href="/cart">View Cart</a>
                                            </div>
                                            <ul class="shopping-list">
                                                @foreach ($wonProducts as $product)
                                                    <li>
                                                        <div class="cart-img-head">
                                                            <a class="cart-img" href="/product/{{ $product->id }}"><img
                                                                    src="{{ asset('storage' . $product->image_url) }}"
                                                                    alt="#"></a>
                                                        </div>

                                                        <div class="content">
                                                            <h4><a href="/product/{{ $product->id }}">
                                                                    {{ $product->name }}</a></h4>
                                                            <p class="quantity"><span
                                                                    class="amount">Rp{{ $product->getTotalBidAmount() }}</span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="bottom">
                                                <div class="total">
                                                    <span>Total</span>
                                                    <span class="total-amount">Rp{{ $totalBidAmount }}</span>
                                                </div>
                                                <div class="button">
                                                    <a href="/checkout" class="btn animate">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/ End Shopping Item -->
                                    </div>
                                </div>
                            @else
                                <div class="navbar-cart ms-auto">
                                    <div class="button me-2 d-sm-none d-lg-block">
                                        <a href="/register" class="btn">Register</a>
                                    </div>
                                    <div class="button">
                                        <a href="/login" class="btn">Login</a>
                                    </div>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Header Bottom -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        <!-- Start Mega Category Menu -->
                        <div class="mega-category-menu">
                            <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                            <ul class="sub-category">
                                @foreach ($categories as $category)
                                    <li><a
                                            href="/product?category_id={{ $category->id }}">{{ str_replace('_', ' ', $category->name) }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Mega Category Menu -->
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="/" aria-label="Toggle navigation">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/products" aria-label="Toggle navigation">My Products</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dd-menu collapsed" href="javascript:void(0)"
                                            data-bs-toggle="collapse" data-bs-target="#submenu-1-4"
                                            aria-controls="navbarSupportedContent" aria-expanded="false"
                                            aria-label="Toggle navigation">Account</a>
                                        <ul class="sub-menu collapse" id="submenu-1-4">
                                            <li class="nav-item"><a href="/account/edit">Account Settings</a></li>
                                            <li class="nav-item"><a href="/account/chat">Chats</a></li>
                                            <li class="nav-item"><a href="/account/withdraw">Withdraw</a></li>
                                            <li class="nav-item"><a href="/watchlist">Watchlist</a></li>
                                            <li class="nav-item"><a href="/account/transaction">Transaction</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="/contact" aria-label="Toggle navigation">Contact Us</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Nav Social -->
                    <div class="nav-social">
                        <h5 class="title">Follow Us:</h5>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Social -->
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </header>
    <!-- End Header Area -->

    @hasSection('title')
        <!-- Start Breadcrumbs -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">@yield('title')</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                            <li>@yield('title')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumbs -->
    @endif

    @yield('content')

    <!-- Start Footer Area -->
    <footer class="footer">
        <!-- Start Footer Top -->
        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="{{ asset('assets/images/logo/white-logo.svg') }}" alt="#">
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-8 col-12">
                            <div class="footer-newsletter">
                                <h4 class="title">
                                    Subscribe to our Newsletter
                                    <span>Get all the latest information, Sales and Offers.</span>
                                </h4>
                                <div class="newsletter-form-head">
                                    <form action="#" method="get" target="_blank" class="newsletter-form">
                                        <input name="EMAIL" placeholder="Email address here..." type="email">
                                        <div class="button">
                                            <button class="btn">Subscribe<span class="dir-part"></span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Top -->
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>Get In Touch With Us</h3>
                                <p class="phone">Phone: +1 (900) 33 169 7720</p>
                                <ul>
                                    <li><span>Monday-Friday: </span> 9.00 am - 8.00 pm</li>
                                    <li><span>Saturday: </span> 10.00 am - 6.00 pm</li>
                                </ul>
                                <p class="mail">
                                    <a href="mailto:support@lelanginaja.com">support@lelanginaja.com</a>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer our-app">
                                <h3>Our Mobile App</h3>
                                <ul class="app-btn">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-apple"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">App Store</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-play-store"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">Google Play</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Information</h3>
                                <ul>
                                    <li><a href="/about">About Us</a></li>
                                    <li><a href="/contact">Contact Us</a></li>
                                    <li><a href="/faq">FAQs Page</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Categories</h3>
                                <ul>
                                    @for ($i = 0; isset($categories[$i]) && $i <= 4; $i++)
                                        <li><a
                                                href="{{ $categories[$i]->id }}">{{ str_replace('_', ' ', $categories[$i]->name) }}</a>
                                        </li>
                                    @endfor
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="payment-gateway">
                                <span>We Accept:</span>
                                <img src="{{ asset('assets/images/footer/credit-cards-footer.png') }}"
                                    alt="#">
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="copyright">
                                <p>Designed and Developed by<a href="https://graygrids.com/" rel="nofollow"
                                        target="_blank">GrayGrids</a></p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>Follow Us On:</span>
                                </li>
                                <li><a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-instagram"></i></a></li>
                                <li><a href="javascript:void(0)"><i class="lni lni-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('assets/js/glightbox.min.j') }}s"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @yield('custom-js')
</body>

</html>
