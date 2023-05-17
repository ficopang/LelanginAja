@extends('template.generic')

@section('title', 'Edit Product')


@section('content')
    <!-- Start my product Area -->
    <div class="container section">

        <div class="mb-5">
            <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
        </div>

        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="product-name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product-name" name="product-name" value="{{ $product->name }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="category-select" class="form-label">Select a Category</label>
                <select class="form-select" id="category-select" name="category">
                    <option selected disabled>Select a category</option>
                    <option value="1" {{ $product->category_id == 1 ? 'selected' : '' }}>Electronics</option>
                    <option value="2" {{ $product->category_id == 2 ? 'selected' : '' }}>Clothing</option>
                    <option value="3" {{ $product->category_id == 3 ? 'selected' : '' }}>Home</option>
                    <option value="4" {{ $product->category_id == 4 ? 'selected' : '' }}>Beauty</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="product-description" class="form-label">Product Description</label>
                <textarea class="form-control" id="product-description" name="product-description" rows="3" required>{{ $product->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="starting-price" class="form-label">Starting Price</label>
                <input type="number" class="form-control" id="starting-price" name="starting-price" value="{{ $product->starting_price }}"
                    required step="1000">
            </div>
            <div class="mb-3">
                <label for="min-bid-increment" class="form-label">Minimum Bid Increment</label>
                <input type="number" class="form-control" id="min-bid-increment" name="min-bid-increment" value="{{ $product->min_bid_increment }}"
                    required step="1000">
            </div>
            <div class="mb-3">
                <label for="product-image" class="form-label">Product Image</label>
                <input type="file" class="form-control" id="product-image" name="product-image" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="start-time" class="form-label">Start Time</label>
                <input type="datetime-local" class="form-control" id="start-time" name="start-time" value="{{ $product->start_time }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="end-time" class="form-label">End Time</label>
                <input type="datetime-local" class="form-control" id="end-time" name="end-time" value="{{ $product->end_time }}"
                    required>
            </div>

            <div style="margin-top: 40px;">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>


    </div>
    <!-- End my product Area -->
@endsection
