@extends('layouts.app') <!-- Or the name of your layout -->

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <!-- Welcome Card -->
            <div class="col-md-12 mb-4">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <h5 class="card-title">Welcome to the CRM Dashboard</h5>
                        <p class="card-text">Manage your customers, leads, and sales pipeline effectively.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Summary Cards -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Total Customers</h6>
                        <h3>1,024</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Active Leads</h6>
                        <h3>245</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Deals Closed</h6>
                        <h3>87</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body text-center">
                        <h6 class="text-muted">Revenue</h6>
                        <h3>$150,230</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Sales Pipeline Chart -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6>Sales Pipeline Overview</h6>
                    </div>
                    <div class="card-body">
                        <div id="pipeline-chart" style="height: 300px;">
                            <!-- Placeholder for pipeline chart -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6>Recent Activities</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Activity</th>
                                    <th>Assigned To</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Follow-up with Lead John Doe</td>
                                    <td>Mary Smith</td>
                                    <td>2025-01-22</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Closed Deal with ABC Corp.</td>
                                    <td>Jane Doe</td>
                                    <td>2025-01-21</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>New Lead added: XYZ Ltd.</td>
                                    <td>John Smith</td>
                                    <td>2025-01-20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Top Performing Sales Agents -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6>Top Performing Sales Agents</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Mary Smith
                                <span class="badge bg-success rounded-pill">50 Deals</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Jane Doe
                                <span class="badge bg-success rounded-pill">45 Deals</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                John Smith
                                <span class="badge bg-success rounded-pill">40 Deals</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Upcoming Tasks -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h6>Upcoming Tasks</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                Call with Client X at 3:00 PM
                            </li>
                            <li class="list-group-item">
                                Prepare proposal for Lead Y
                            </li>
                            <li class="list-group-item">
                                Follow-up on pending invoice for ABC Corp.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            // Placeholder for Sales Pipeline Chart
            $('#pipeline-chart').html('<p class="text-center">Sales Pipeline Chart will appear here</p>');

            // Example interaction
            console.log('CRM Dashboard loaded successfully.');
        });
    </script>
@endpush
