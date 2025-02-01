@extends('layouts.app') <!-- Or the name of your layout -->

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Welcome Card -->
            <div class="col-md-12 mb-4">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <h5 class="card-title">Welcome to the Dashboard</h5>
                        <p class="card-text">Here you can manage your activities and view insights at a glance.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Summary Cards -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Total Users</h6>
                        <h3>1,234</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Sales</h6>
                        <h3>$12,345</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Orders</h6>
                        <h3>567</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Revenue</h6>
                        <h3>$78,910</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Chart Placeholder -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6>Sales Overview</h6>
                    </div>
                    <div class="card-body">
                        <div id="chart-container" style="height: 300px;">
                            <!-- Placeholder for chart -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity Table -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6>Recent Activity</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Activity</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>User John registered</td>
                                    <td>2025-01-22</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Order #1234 placed</td>
                                    <td>2025-01-21</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Revenue report updated</td>
                                    <td>2025-01-20</td>
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
        $(document).ready(function() {
            // Initialize chart example
            $('#chart-container').html('<p class="text-center">Chart will load here</p>');

            // Example of adding interactivity or data later
            console.log('Dashboard scripts loaded.');
        });
    </script>
@endpush
