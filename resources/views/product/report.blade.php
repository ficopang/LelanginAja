@extends('template.generic')

@section('title', 'Report')

@section('content')
    <!-- Report -->
    <div class="container section">
        <h1>Report a Problem</h1>
        <hr>
        <br />

        {{-- menampilkan error validasi --}}
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <br />
        <form action="/product/{{ $product->id }}/report" method="POST">
            @csrf
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
