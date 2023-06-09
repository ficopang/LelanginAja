@extends('template.generic')

@section('custom-header')
    <style>
        .featured-categories .single-category img {
            width: 30%;
        }

        .hero-slider .single-slider img {
            position: absolute;
            right: 5%;
            top: 50%;
            width: 40%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            z-index: 10;
        }


        .hero-small-banner img {
            position: absolute;
            right: 0;
            top: 50%;
            width: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            z-index: 10;
        }

        .single-banner img {
            position: absolute;
            left: 5%;
            top: 50%;
            width: 40%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
            z-index: 10;
        }

        .ellipsis {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            /* number of lines to show */
            -webkit-box-orient: vertical;
        }
    </style>
@endsection

@section('content')
    <!-- Start Hero Area -->
    <section class="hero-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-12 custom-padding-right">
                    <div class="slider-head">
                        <!-- Start Hero Slider -->
                        <div class="hero-slider">
                            <!-- Start Single Slider -->
                            @foreach ($carousel as $cr)
                                <div class="single-slider"
                                    style="
                                    /* background: #fff; */
                                    background-image: url({{ asset('assets/images/banner/home.jpg') }});
                                ">
                                    <div class="content" style="z-index: 11;">
                                        <h2 class="fs-2">
                                            {{ $cr->name }}
                                        </h2>
                                        <p class="ellipsis">
                                            {{ $cr->description }}
                                        </p>
                                        <h3><span>Starting from</span>{{ 'Rp' . $cr->starting_price }}</h3>
                                        <div class="button">
                                            <a href="/product/{{ $cr->id }}" class="btn">Bid Now!</a>
                                        </div>
                                    </div>
                                    <div class="images">
                                        <img src="{{ asset('storage' . $cr->image_url) }}" alt="#">
                                    </div>
                                </div>
                            @endforeach
                            <!-- End Single Slider -->
                        </div>
                        <!-- End Hero Slider -->
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6 col-12 md-custom-padding">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner"
                                style="
                                /* background: #fff; */
                                background-image: url({{ asset('assets/images/banner/home.jpg') }});
                            ">
                                <div class="content" style="z-index: 11">
                                    <h2 class="col-5">
                                        {{ $smallBanner->name }}
                                    </h2>
                                    <h3>{{ 'Rp' . $smallBanner->getTotalBidAmount() }}</h3>
                                </div>
                                <div class="images">
                                    <img src="{{ asset('storage' . $smallBanner->image_url) }}" alt="#">
                                </div>
                            </div>
                            <!-- End Small Banner -->
                        </div>
                        <div class="col-lg-12 col-md-6 col-12">
                            <!-- Start Small Banner -->
                            <div class="hero-small-banner style2">
                                <div class="content">
                                    <h2>Tuesday Funday</h2>
                                    <p>
                                        Free shipping only on Tuesday! (min Rp200000)
                                    </p>
                                    <div class="button">
                                        <a class="btn" href="/product">Bid Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Start Small Banner -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero Area -->

    <!-- Start Featured Categories Area -->
    <section class="featured-categories section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Featured Categories</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($categories as $cat)
                    <div class="col-lg-6 col-md-6 col-12">
                        <!-- Start Single Category -->
                        <div class="single-category">
                            <h3 class="heading" style="text-transform: capitalize;">{{ str_replace('_', ' ', $cat->name) }}
                            </h3>
                            <ul>
                                <li><a href="/product?category_id={{ $cat->id }}">New Product</a></li>
                                <li><a href="/product?category_id={{ $cat->id }}">Trending</a></li>
                                <li><a href="/product?category_id={{ $cat->id }}">View All</a></li>
                            </ul>
                            <div class="images">
                                <img src="{{ asset('storage' . $cat->products()->first()->image_url) }}" alt="#" />
                            </div>
                        </div>
                        <!-- End Single Category -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Features Area -->

    <!-- Start Trending Product Area -->
    <section class="trending-product section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Trending Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($trendingProduct as $tp)
                    <div class="col-lg-3 col-md-6 col-12 d-flex align-items-stretch">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <h4 class="title mt-2 mx-2 fw-bold text-center">
                                <a class="d-inline-block text-truncate" style="max-width: 150px;"
                                    href="/product/{{ $tp->id }}">{{ $tp->name }}</a>
                            </h4>
                            <div class="product-image">
                                <img src="{{ asset('storage' . $tp->image_url) }}" alt="#" />
                            </div>
                            <div class="product-info d-flex flex-column">
                                <span class="category">{{ str_replace('_', ' ', $tp->category->name) }}</span>
                                <div class="countdown text-center text-danger fs-4" data-end-time="{{ $tp->end_time }}">
                                    <h5>{{ $tp->end_time }}</h5>
                                </div>
                                <div class="price">
                                    <span>{{ 'Rp' . $tp->getTotalBidAmount() }}</span>
                                </div>
                                <div class="last-bidder">
                                    <span
                                        class="text-dark text-muted">{{ $tp->bids()->latest('created_at')->first()? 'Bidder: ' .$tp->bids()->latest('created_at')->first()->user->first_name: '' }}</span>
                                </div>
                                <div class="button mt-auto">
                                    <a href="/product/{{ $tp->id }}" class="btn w-100">Bid</a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Trending Product Area -->

    <!-- Start Special Offer -->
    <section class="special-offer section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Special Offer</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="row">
                        @foreach ($specialOffer as $offers)
                            <div class="col-lg-4 col-md-4 col-12 d-flex align-items-stretch">
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <h4 class="title mt-2 mx-2 fw-bold text-center">
                                        <a class="d-inline-block text-truncate" style="max-width: 150px;"
                                            href="/product/{{ $offers->id }}">{{ $offers->name }}</a>
                                    </h4>
                                    <div class="product-image">
                                        <img src="{{ asset('storage' . $offers->image_url) }}" alt="#" />
                                    </div>
                                    <div class="product-info">
                                        <span class="category">{{ str_replace('_', ' ', $offers->category->name) }}</span>
                                        <div class="countdown text-center text-danger fs-5"
                                            data-end-time="{{ $offers->end_time }}">
                                            <h6>{{ $offers->end_time }}</h6>
                                        </div>
                                        <div class="price">
                                            <span>{{ 'Rp' . $offers->getTotalBidAmount() }}</span>
                                        </div>
                                        <div class="last-bidder">
                                            <span
                                                class="text-dark text-muted">{{ $offers->bids()->latest('created_at')->first()? 'Bidder: ' .$offers->bids()->latest('created_at')->first()->user->first_name: '' }}</span>
                                        </div>
                                        <div class="button mt-auto">
                                            <a href="/product/{{ $tp->id }}" class="btn w-100">Bid</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Product -->
                            </div>
                        @endforeach
                    </div>
                    <!-- Start Banner -->
                    <div class="single-banner right"
                        style="
                        position: relative;
                        /* background: #fff; */
                        background-image: url({{ asset('assets/images/banner/home.jpg') }});
                        margin-top: 30px;
                    ">
                        <div class="content" style="z-index: 11">
                            <h2>{{ $banner->name }}</h2>
                            <p>
                                {{ $banner->description }}
                            </p>
                            <div class="price">
                                <span>{{ 'Rp' . $banner->getTotalBidAmount() }}</span>
                            </div>
                            <div class="button">
                                <a href="/product/{{ $banner->id }}" class="btn">Bid Now!</a>
                            </div>
                        </div>
                        <div class="images">
                            <img src="{{ asset('storage' . $banner->image_url) }}" alt="#">
                        </div>
                    </div>
                    <!-- End Banner -->
                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="offer-content">
                        <div class="image">
                            <img src="{{ asset('storage' . $offer->image_url) }}" alt="#" />
                            <span class="sale-tag">-50%</span>
                        </div>
                        <div class="text">
                            <h2>
                                <a href="/product/{{ $offer->id }}">{{ $offer->name }}</a>
                            </h2>
                            <div class="price">
                                <span>{{ 'Rp' . $offer->starting_price }}</span>
                                <span class="discount-price">{{ 'Rp' . $offer->undiscountedPrice() }}</span>
                            </div>
                            <p>
                                {{ $offer->description }}
                            </p>
                        </div>
                        <div class="box-head">
                            <div class="box">
                                <h1 id="days">000</h1>
                                <h2 id="daystxt">Days</h2>
                            </div>
                            <div class="box">
                                <h1 id="hours">00</h1>
                                <h2 id="hourstxt">Hours</h2>
                            </div>
                            <div class="box">
                                <h1 id="minutes">00</h1>
                                <h2 id="minutestxt">Minutes</h2>
                            </div>
                            <div class="box">
                                <h1 id="seconds">00</h1>
                                <h2 id="secondstxt">Secondes</h2>
                            </div>
                        </div>
                        <div style="background: rgb(204, 24, 24)" class="alert">
                            <h1 style="padding: 50px 80px; color: white">
                                We are sorry, Event ended !
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Special Offer -->

    <!-- Start Home Product List -->
    <section class="home-product-list section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 custom-responsive-margin">
                    <h4 class="list-title">Closest Auction</h4>
                    @foreach ($bestSellers as $bs)
                        <!-- Start Single List -->
                        <div class="single-list">
                            <div class="list-image">
                                <a href="/product/{{ $bs->id }}"><img
                                        src="{{ asset('storage' . $bs->image_url) }}" alt="#" /></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="/product/{{ $bs->id }}">{{ $bs->name }}</a>
                                </h3>
                                <span>{{ 'Rp' . $bs->getTotalBidAmount() }}</span>
                            </div>
                        </div>
                        <!-- End Single List -->
                    @endforeach
                </div>
                <div class="col-lg-6 col-md-6 col-12 custom-responsive-margin">
                    <h4 class="list-title">New Arrivals</h4>
                    <!-- Start Single List -->
                    @foreach ($newArrivals as $newarr)
                        <div class="single-list">
                            <div class="list-image">
                                <a href="/product/{{ $newarr->id }}"><img
                                        src="{{ asset('storage' . $newarr->image_url) }}" alt="#" /></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="/product/{{ $newarr->id }}">{{ $newarr->name }}</a>
                                </h3>
                                <span>{{ 'Rp' . $newarr->getTotalBidAmount() }}</span>
                            </div>
                        </div>
                    @endforeach
                    <!-- End Single List -->
                </div>
                {{-- <div class="col-lg-4 col-md-4 col-12">
                    <h4 class="list-title">Top Rated</h4>
                    <!-- Start Single List -->
                    @foreach ($topRated as $tr)
                        <div class="single-list">
                            <div class="list-image">
                                <a href="/product/{{ $tr->id }}"><img
                                        src="{{ asset('storage' . $tr->image_url) }}" alt="#" /></a>
                            </div>
                            <div class="list-info">
                                <h3>
                                    <a href="/product/{{ $tr->id }}">{{ $tr->name }}</a>
                                </h3>
                                <span>{{ 'Rp' . $tr->getTotalBidAmount() }}</span>
                            </div>
                        </div>
                        <!-- End Single List -->
                    @endforeach
                </div> --}}
            </div>
        </div>
    </section>
    <!-- End Home Product List -->

    <!-- Start Shipping Info -->
    <section class="shipping-info">
        <div class="container">
            <ul>
                <!-- Free Shipping -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>Free Shipping</h5>
                        <span>On order over Rp500000</span>
                    </div>
                </li>
                <!-- Money Return -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-support"></i>
                    </div>
                    <div class="media-body">
                        <h5>24/7 Support.</h5>
                        <span>Live Chat Or Call.</span>
                    </div>
                </li>
                <!-- Support 24/7 -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-credit-cards"></i>
                    </div>
                    <div class="media-body">
                        <h5>Online Payment.</h5>
                        <span>Secure Payment Services.</span>
                    </div>
                </li>
                <!-- Safe Payment -->
                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>Easy Return.</h5>
                        <span>Hassle Free Shopping.</span>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- End Shipping Info -->
@endsection

@section('custom-js')
    <script type="text/javascript">
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>
    <script>
        const finaleDate = new Date("{{ $offer->end_time }}").getTime();

        const timer = () => {
            const now = new Date().getTime();
            let diff = finaleDate - now;
            if (diff < 0) {
                document.querySelector('.alert').style.display = 'block';
                document.querySelector('.container').style.display = 'none';
            }

            let days = Math.floor(diff / (1000 * 60 * 60 * 24));
            let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
            let seconds = Math.floor(diff % (1000 * 60) / 1000);

            days <= 99 ? days = `${days}` : days;
            days <= 9 ? days = `00${days}` : days;
            hours <= 9 ? hours = `0${hours}` : hours;
            minutes <= 9 ? minutes = `0${minutes}` : minutes;
            seconds <= 9 ? seconds = `0${seconds}` : seconds;

            document.querySelector('#days').textContent = days;
            document.querySelector('#hours').textContent = hours;
            document.querySelector('#minutes').textContent = minutes;
            document.querySelector('#seconds').textContent = seconds;

        }
        timer();
        setInterval(timer, 1000);
    </script>
    <script>
        // Countdown Timers
        var countdowns = document.querySelectorAll('.countdown');

        countdowns.forEach(function(countdown) {
            var endTime = new Date(countdown.dataset.endTime).getTime();
            var now = new Date().getTime();
            var timeRemaining = endTime - now;

            function updateCountdown() {
                var days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                var hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                // Format the countdown timer
                var formattedCountdown = days.toString().padStart(2, '0') + ':' +
                    hours.toString().padStart(2, '0') + ':' +
                    minutes.toString().padStart(2, '0') + ':' +
                    seconds.toString().padStart(2, '0');

                countdown.innerHTML = formattedCountdown;

                if (timeRemaining <= 0) {
                    countdown.innerHTML = "Auction Ended";
                } else {
                    timeRemaining -= 1000;
                    setTimeout(updateCountdown, 1000);
                }
            }
            updateCountdown();
        });
    </script>
@endsection
