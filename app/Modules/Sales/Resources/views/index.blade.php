@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-primary mb-4">
                    <i class="bi bi-bar-chart-line"></i> Sales Dashboard
                </h1>
                <p class="lead">Manage your sales pipeline, track performance, and analyze metrics effectively.</p>
            </div>
        </div>

        <div class="row">
            <!-- Sales Overview -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Sales</h5>
                        <h3 class="card-text text-success">$25,000</h3>
                        <p class="text-muted">This month</p>
                    </div>
                </div>
            </div>

            <!-- New Customers -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">New Customers</h5>
                        <h3 class="card-text text-info">15</h3>
                        <p class="text-muted">This month</p>
                    </div>
                </div>
            </div>

            <!-- Sales Conversion Rate -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Conversion Rate</h5>
                        <h3 class="card-text text-warning">5.6%</h3>
                        <p class="text-muted">This month</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Recent Sales Table -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Recent Sales</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2025-01-21</td>
                                    <td>John Doe</td>
                                    <td>$2,500</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                                <tr>
                                    <td>2025-01-20</td>
                                    <td>Jane Smith</td>
                                    <td>$1,800</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>2025-01-19</td>
                                    <td>Mike Lee</td>
                                    <td>$3,200</td>
                                    <td><span class="badge bg-danger">Failed</span></td>
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
