@extends('template.generic')

@section('title', 'Product Details')

@section('content')
    <!-- Start Item Details -->
    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="{{ asset('storage' . $product->image_url) }}" id="current" alt="#">
                                    {{-- <img src="{{ asset('storage' . $product->image_url) }}" id="current" alt="#"> --}}
                                </div>
                                {{-- <div class="images">
                                    <img src="https://via.placeholder.com/1000x670" class="img" alt="#">
                                    <img src="https://via.placeholder.com/1000x670" class="img" alt="#">
                                    <img src="https://via.placeholder.com/1000x670" class="img" alt="#">
                                    <img src="https://via.placeholder.com/1000x670" class="img" alt="#">
                                    <img src="https://via.placeholder.com/1000x670" class="img" alt="#">
                                </div> --}}
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{ $product->name }}</h2>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <p class="category"><i class="lni lni-tag"></i> <a
                                            href="/product?category_id={{ $product->category->id }}"
                                            style="text-transform: capitalize;">{{ str_replace('_', ' ', $product->category->name) }}</a>
                                    </p>
                                </div>
                                <div class="col-md-6 col-12 text-danger fw-bold" id="countdown"></div>
                            </div>
                            <div>
                                <span class="d-inline price" id="price">Rp{{ $product->getTotalBidAmount() }}</span>
                                <span class="d-inline h3" id="last-bidder">
                                    {{ $product->bids()->latest('created_at')->first()? ' - ' .$product->bids()->latest('created_at')->first()->user->first_name: '' }}
                                </span>
                            </div>
                            <div class="row info-text my-0 pb-0">
                                <div class="col-sm-6 col-12 fw-bold">Starting Price</div>
                                <div class="col-sm-6 col-12">{{ $product->starting_price }}</div>
                            </div>
                            <div class="row info-text my-0 pb-0">
                                <div class="col-sm-6 col-12 fw-bold">Minimum Bid Increment</div>
                                <div class="col-sm-6 col-12">{{ $product->min_bid_increment }}</div>
                            </div>
                            <div class="row info-text my-0 pb-0">
                                <div class="col-sm-6 col-12 fw-bold">Start Time</div>
                                <div class="col-sm-6 col-12">{{ $product->start_time }}</div>
                            </div>
                            <div class="row info-text my-0">
                                <div class="col-sm-6 col-12 fw-bold">End Time</div>
                                <div class="col-sm-6 col-12">{{ $product->end_time }}</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <input type="number" class="form-control" id="bid-amount" name="bid-amount" required
                                        step="{{ $product->min_bid_increment }}" min="{{ $product->min_bid_increment }}"
                                        value="{{ $product->min_bid_increment }}">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <div class="button cart-button">
                                        @csrf
                                        <button class="btn" style="width: 100%;" id="bid-button"
                                            onclick="placeBid({{ $product->id }})">Bid</button>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-content">
                                <div class="row align-items-end">
                                    <div class="col-lg-3 col-md-3 col-12">
                                        <div class="wish-button">
                                            <a href="/product/{{ $product->id }}/report" class="btn"
                                                style="width: 100%;">Report</a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-12">
                                        <div class="wish-button">
                                            <a href="/account/chat/{{ $product->user_id }}" class="btn"
                                                style="width: 100%;">Chat</i></a>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <form action="/product/{{ $product->id }}/watchlist" method="POST">
                                            @csrf
                                            <div class="wish-button">
                                                <button class="btn"><i class="lni lni-eye"></i> To Watchlist</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Description</h4>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Item Details -->
@endsection

@section('custom-js')
    <script src="{{ asset('assets/js/vanilla-toast.min.js') }}"></script>
    <script type="text/javascript">
        const current = document.getElementById("current");
        const opacity = 0.6;
        const imgs = document.querySelectorAll(".img");
        imgs.forEach(img => {
            img.addEventListener("click", (e) => {
                imgs.forEach(img => {
                    img.style.opacity = 1;
                });
                current.src = e.target.src;
                e.target.style.opacity = opacity;
            });
        });
    </script>
    <script>
        // Get the countdown element
        const countdownElement = document.getElementById('countdown');

        // Function to update the countdown
        function updateCountdown(endTime) {
            const now = new Date().getTime();
            const distance = endTime - now;

            // Calculate remaining days, hours, minutes, and seconds
            let days = Math.floor(distance / (1000 * 60 * 60 * 24));
            let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // If the countdown reaches 0, refresh the page
            if (distance <= 0) {
                days = hours = minutes = seconds = 0;
            }

            countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;
            // Update the countdown element
        }

        lastBidder =
            '{{ $product->bids()->latest('created_at')->first()? $product->bids()->latest('created_at')->first()->user->first_name: '' }}'
        // Function to make XHR request and update the countdown and last bidder's first name
        function updateProductInfo() {
            const xhr = new XMLHttpRequest();
            const productId = '{{ $product->id }}';

            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);

                        // Update the countdown
                        const endTime = new Date(response.end_time).getTime();
                        updateCountdown(endTime);

                        // Update the last bidder's first name
                        const currentPrice = response.current_price;
                        const currentPriceElement = document.getElementById('price');
                        currentPriceElement.textContent = 'Rp' + currentPrice;
                        // Update the last bidder's first name
                        const lastBidderFirstName = response.last_bidder_first_name;
                        const lastBidderElement = document.getElementById('last-bidder');
                        if (response.last_bidder_first_name) {
                            lastBidderElement.textContent = ' - ' + lastBidderFirstName;

                            if (lastBidder != response.last_bidder_first_name) {
                                vt.info("Current price: Rp" + currentPrice, {
                                    title: lastBidderFirstName + 'just place a bid',
                                    position: "top-right",
                                    duration: 2000,
                                    closable: true
                                });

                                lastBidder = lastBidderFirstName;
                            }
                        }
                    }
                }
            };

            xhr.open('GET', `/product/${productId}/info`, true);
            xhr.send();
        }

        // Update the product information and countdown initially
        updateProductInfo();

        // Update the product information and countdown every second
        setInterval(updateProductInfo, 1000);
    </script>
    <script>
        function placeBid(productId) {
            @guest
            vt.error('Please login first to place a bid', {
                title: "Error",
                position: "top-right",
                duration: 2000,
                closable: true
            });
        @endguest

        var bidAmount = document.getElementById('bid-amount').value;

        // Create a new XHR object
        var xhr = new XMLHttpRequest();

        // Set the request URL
        var url = '/product/' + productId + '/bid';

        // Set the request method to POST
        xhr.open('POST', url, true);

        // Set the request headers
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

        // Set the callback function to handle the response
        xhr.onload = function() {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                // alert(response.message);

                if (!response.error) {
                    vt.success(response.message, {
                        title: "Success",
                        position: "top-right",
                        duration: 2000,
                        closable: true
                    });
                } else {
                    vt.error(response.error, {
                        title: "Error",
                        position: "top-right",
                        duration: 2000,
                        closable: true
                    });
                }
            } else {
                var error = JSON.parse(xhr.responseText);
                vt.error(error.error, {
                    title: "Error",
                    position: "top-right",
                    duration: 2000,
                    closable: true
                });
            }
        };

        // Create the request data object
        var requestData = {
            bid_amount: bidAmount
        };

        // Send the request with the data
        xhr.send(JSON.stringify(requestData));
        }
    </script>

@endsection
