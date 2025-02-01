@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-primary mb-4">
                    <i class="bi bi-people"></i> HRM Dashboard
                </h1>
                <p class="lead">Manage employee records, track attendance, and streamline HR processes.</p>
            </div>
        </div>

        <div class="row">
            <!-- Total Employees -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Employees</h5>
                        <h3 class="card-text text-primary">120</h3>
                        <p class="text-muted">Active employees in the system</p>
                    </div>
                </div>
            </div>

            <!-- Present Today -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Present Today</h5>
                        <h3 class="card-text text-success">95</h3>
                        <p class="text-muted">Employees marked as present today</p>
                    </div>
                </div>
            </div>

            <!-- Pending Leave Requests -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pending Leave Requests</h5>
                        <h3 class="card-text text-warning">8</h3>
                        <p class="text-muted">Leave requests awaiting approval</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Recent Activities Table -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Recent HR Activities</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Activity</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Handled By</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Employee Onboarding</td>
                                    <td>2025-01-15</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>John Doe</td>
                                </tr>
                                <tr>
                                    <td>Leave Approval for Jane Smith</td>
                                    <td>2025-01-18</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>Emily Johnson</td>
                                </tr>
                                <tr>
                                    <td>Monthly Payroll Processing</td>
                                    <td>2025-01-10</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>Jane Smith</td>
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
