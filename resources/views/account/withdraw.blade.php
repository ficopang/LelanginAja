@extends('template.generic')

@section('title', 'Withdraw')

@section('content')
    <!-- Start edit account Area -->
    <div class="container section">
        <div class="card">
            <div class="card-body">
                <h1>Withdraw Money</h1>
                <form>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Withdrawal Amount</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" id="amount" name="amount" min="1"
                                step="1" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h2>Account Balance</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Transaction Date</th>
                            <th scope="col">Description</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>May 1, 2023</td>
                            <td>Deposit</td>
                            <td>$1000.00</td>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"><strong>Total</strong></td>
                            <td>$1000.00</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <!-- End edit account Area -->
@endsection
