@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-success mb-4">
                    <i class="bi bi-currency-exchange"></i> Financial Dashboard
                </h1>
                <p class="lead">Manage financial transactions, track revenue, and monitor expenses.</p>
            </div>
        </div>

        <div class="row">
            <!-- Total Revenue -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Revenue</h5>
                        <h3 class="card-text text-success">$250,000</h3>
                        <p class="text-muted">Revenue generated this fiscal year</p>
                    </div>
                </div>
            </div>

            <!-- Total Expenses -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Expenses</h5>
                        <h3 class="card-text text-danger">$150,000</h3>
                        <p class="text-muted">Expenses incurred this fiscal year</p>
                    </div>
                </div>
            </div>

            <!-- Net Profit -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Net Profit</h5>
                        <h3 class="card-text text-primary">$100,000</h3>
                        <p class="text-muted">Revenue minus expenses</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Recent Financial Transactions -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Recent Financial Transactions</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-01-15</td>
                                    <td>Invoice Payment</td>
                                    <td>$5,000</td>
                                    <td><span class="badge bg-success">Revenue</span></td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>2025-01-12</td>
                                    <td>Office Supplies</td>
                                    <td>$500</td>
                                    <td><span class="badge bg-danger">Expense</span></td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>2025-01-10</td>
                                    <td>Client Refund</td>
                                    <td>$1,000</td>
                                    <td><span class="badge bg-danger">Expense</span></td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        // Example: Initialize tooltips or other JS functionality
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
