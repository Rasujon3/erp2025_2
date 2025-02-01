@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-primary mb-4">
                    <i class="bi bi-list-task"></i> Tasks Dashboard
                </h1>
                <p class="lead">Track your tasks, monitor deadlines, and manage workloads effectively.</p>
            </div>
        </div>

        <div class="row">
            <!-- Total Tasks -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Tasks</h5>
                        <h3 class="card-text text-primary">25</h3>
                        <p class="text-muted">Tasks assigned to you</p>
                    </div>
                </div>
            </div>

            <!-- Completed Tasks -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Completed Tasks</h5>
                        <h3 class="card-text text-success">18</h3>
                        <p class="text-muted">Tasks completed this month</p>
                    </div>
                </div>
            </div>

            <!-- Overdue Tasks -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Overdue Tasks</h5>
                        <h3 class="card-text text-danger">3</h3>
                        <p class="text-muted">Requires immediate action</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Recent Tasks Table -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Recent Tasks</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Task Name</th>
                                    <th>Assigned Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Assigned To</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Update Project Documentation</td>
                                    <td>2025-01-15</td>
                                    <td>2025-01-20</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>John Doe</td>
                                </tr>
                                <tr>
                                    <td>Bug Fix in Mobile App</td>
                                    <td>2025-01-18</td>
                                    <td>2025-01-25</td>
                                    <td><span class="badge bg-warning">In Progress</span></td>
                                    <td>Jane Smith</td>
                                </tr>
                                <tr>
                                    <td>Prepare Presentation Slides</td>
                                    <td>2025-01-10</td>
                                    <td>2025-01-15</td>
                                    <td><span class="badge bg-danger">Overdue</span></td>
                                    <td>Emily Johnson</td>
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
