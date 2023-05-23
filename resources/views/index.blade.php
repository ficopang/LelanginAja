@extends('template.generic')

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
                        <div class="single-slider" style="
                                    background-image: url(https://via.placeholder.com/800x500);
                                ">
                            <div class="content">
                                <h2>
                                    <span>Bid starting from {{ "Rp".$cr->min_bid_increment }}</span>
                                    {{ $cr->name }}
                                </h2>
                                <p>
                                    {{ $cr->description }}
                                </p>
                                <h3><span>Starting from</span>{{ "Rp".$cr->starting_price }}</h3>
                                <div class="button">
                                    <a href="/product/{{ $cr->id }}" class="btn">Bid Now!</a>
                                </div>
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
                        <div class="hero-small-banner" style="
                                background-image: url('https://via.placeholder.com/370x250');
                            ">
                            <div class="content">
                                <h2>
                                    <span>Bid starting from {{ "Rp".$smallBanner->min_bid_increment }}</span>
                                    {{ $smallBanner->name }}
                                </h2>
                                <h3>{{ "Rp".$smallBanner->getTotalBidAmount() }}</h3>
                            </div>
                        </div>
                        <!-- End Small Banner -->
                    </div>
                    <div class="col-lg-12 col-md-6 col-12">
                        <!-- Start Small Banner -->
                        <div class="hero-small-banner style2">
                            <div class="content">
                                <h2>Weekly Sale!</h2>
                                <p>
                                    Saving up to 50% off all online store items
                                    this week.
                                </p>
                                <div class="button">
                                    <a class="btn" href="product-grids.html">Shop Now</a>
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
                    <p>
                        There are many variations of passages of Lorem Ipsum
                        available, but the majority have suffered alteration in
                        some form.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($categories as $cat)
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category">
                    <h3 class="heading">{{ $cat->name }}</h3>
                    <ul>
                        <li>
                            <a href="product-grids.html">Smart Television</a>
                        </li>
                        <li><a href="product-grids.html">QLED TV</a></li>
                        <li><a href="product-grids.html">Audios</a></li>
                        <li><a href="product-grids.html">Headphones</a></li>
                        <li><a href="product-grids.html">View All</a></li>
                    </ul>
                    <div class="images">
                        <img src="https://via.placeholder.com/180x180" alt="#" />
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
                    <p>
                        There are many variations of passages of Lorem Ipsum
                        available, but the majority have suffered alteration in
                        some form.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($trendingProduct as $tp)
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <img src="https://via.placeholder.com/335x335" alt="#" />
                        <div class="button">
                            <a href="product-details.html" class="btn"><i class="lni lni-cart"></i>Bid now!</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">{{ $tp->category->name }}</span>
                        <h4 class="title">
                            <a href="product-grids.html">{{ $tp->name }}</a>
                        </h4>
                        <div class="price">
                            <span>{{ "Rp".$tp->getTotalBidAmount() }}</span>
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
                    <p>
                        There are many variations of passages of Lorem Ipsum
                        available, but the majority have suffered alteration in
                        some form.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 col-12">
                <div class="row">
                    @foreach ($specialOffer as $offers)
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-image">
                                <img src="https://via.placeholder.com/335x335" alt="#" />
                                <div class="button">
                                    <a href="product-details.html" class="btn"><i class="lni lni-cart"></i> Bid Now!</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <span class="category">{{ $offers->category->name }}</span>
                                <h4 class="title">
                                    <a href="product-grids.html">{{ $offers->name }}</a>
                                </h4>
                                <div class="price">
                                    <span>{{ "Rp".$offers->getTotalBidAmount() }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                    </div>
                    @endforeach
                </div>
                <!-- Start Banner -->
                <div class="single-banner right" style="
                        background-image: url('https://via.placeholder.com/730x310');
                        margin-top: 30px;
                    ">
                    <div class="content">
                        <h2>{{ $banner->name }}</h2>
                        <p>
                            {{ $banner->description }}
                        </p>
                        <div class="price">
                            <span>{{ "Rp".$banner->getTotalBidAmount() }}</span>
                        </div>
                        <div class="button">
                            <a href="product-grids.html" class="btn">Bid Now!</a>
                        </div>
                    </div>
                </div>
                <!-- End Banner -->
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <div class="offer-content">
                    <div class="image">
                        <img src="https://via.placeholder.com/510x600" alt="#" />
                        <span class="sale-tag">-50%</span>
                    </div>
                    <div class="text">
                        <h2>
                            <a href="product-grids.html">{{ $offer->name }}</a>
                        </h2>
                        <div class="price">
                            <span>{{ "Rp".$offer->starting_price }}</span>
                            <span class="discount-price">{{ "Rp".$offer->undiscountedPrice() }}</span>
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
            <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                <h4 class="list-title">Best Sellers</h4>
                @foreach ($bestSellers as $bs)
                <!-- Start Single List -->
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="https://via.placeholder.com/100x100" alt="#" /></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">{{ $bs->name }}</a>
                        </h3>
                        <span>{{ "Rp".$bs->getTotalBidAmount() }}</span>
                    </div>
                </div>
                <!-- End Single List -->
                @endforeach
            </div>
            <div class="col-lg-4 col-md-4 col-12 custom-responsive-margin">
                <h4 class="list-title">New Arrivals</h4>
                <!-- Start Single List -->
                @foreach ($newArrivals as $newarr)
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="https://via.placeholder.com/100x100" alt="#" /></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">{{ $newarr->name }}</a>
                        </h3>
                        <span>{{ "Rp".$newarr->getTotalBidAmount() }}</span>
                    </div>
                </div>
                @endforeach
                <!-- End Single List -->
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <h4 class="list-title">Top Rated</h4>
                <!-- Start Single List -->
                @foreach ($topRated as $tr)
                <div class="single-list">
                    <div class="list-image">
                        <a href="product-grids.html"><img src="https://via.placeholder.com/100x100" alt="#" /></a>
                    </div>
                    <div class="list-info">
                        <h3>
                            <a href="product-grids.html">{{ $tr->name }}</a>
                        </h3>
                        <span>{{ "Rp".$tr->getTotalBidAmount() }}</span>
                    </div>
                </div>
                <!-- End Single List -->
                @endforeach
            </div>
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
                    <span>On order over $99</span>
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
    const finaleDate = new Date("February 15, 2025 00:00:00").getTime();

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

            days <= 99 ? days = `0${days}` : days;
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
@endsection
