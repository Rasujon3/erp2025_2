@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-primary mb-4">
                    <i class="bi bi-folder"></i> Projects Dashboard
                </h1>
                <p class="lead">Manage your ongoing projects, track progress, and meet deadlines effectively.</p>
            </div>
        </div>

        <div class="row">
            <!-- Total Projects -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Projects</h5>
                        <h3 class="card-text text-primary">12</h3>
                        <p class="text-muted">Active projects</p>
                    </div>
                </div>
            </div>

            <!-- Completed Projects -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Completed Projects</h5>
                        <h3 class="card-text text-success">8</h3>
                        <p class="text-muted">This year</p>
                    </div>
                </div>
            </div>

            <!-- Overdue Projects -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Overdue Projects</h5>
                        <h3 class="card-text text-danger">2</h3>
                        <p class="text-muted">Need immediate attention</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Recent Projects Table -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Recent Projects</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                    <th>Team Members</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Website Redesign</td>
                                    <td>2025-01-01</td>
                                    <td>2025-03-01</td>
                                    <td><span class="badge bg-success">In Progress</span></td>
                                    <td>John, Jane, Mike</td>
                                </tr>
                                <tr>
                                    <td>Mobile App Development</td>
                                    <td>2024-12-15</td>
                                    <td>2025-02-15</td>
                                    <td><span class="badge bg-warning">Pending</span></td>
                                    <td>Emily, Sarah</td>
                                </tr>
                                <tr>
                                    <td>E-commerce Integration</td>
                                    <td>2024-11-01</td>
                                    <td>2025-01-15</td>
                                    <td><span class="badge bg-danger">Overdue</span></td>
                                    <td>Chris, Kate</td>
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
