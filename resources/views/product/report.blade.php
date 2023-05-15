@extends('template.generic')

@section('title', 'Report')

@section('content')
    <!-- Report -->
    <div class="container section">
        <h1>Report a Problem</h1>
        <hr>
        <form action="submit_report.php" method="POST">
            <div class="mb-3">
                <label for="product-id" class="form-label">Product ID</label>
                <input type="text" class="form-control" id="product-id" name="product_id" placeholder="Enter the product ID">
            </div>
            <div class="mb-3">
                <label for="report-text" class="form-label">Report Text</label>
                <textarea class="form-control" id="report-text" name="report_text" rows="5"
                    placeholder="Enter a detailed description of the problem"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Report</button>
        </form>
    </div>
    <!--/ End Report -->
@endsection
