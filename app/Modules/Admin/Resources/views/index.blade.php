@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-primary mb-4">
                    <i class="bi bi-speedometer2"></i> Admin Dashboard
                </h1>
                <p class="lead">Manage users, roles, settings, and monitor system performance from a centralized location.</p>
            </div>
        </div>

        <div class="row">
            <!-- Total Users -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <h3 class="card-text text-primary">1,500</h3>
                        <p class="text-muted">Number of registered users</p>
                    </div>
                </div>
            </div>

            <!-- Active Roles -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Active Roles</h5>
                        <h3 class="card-text text-success">12</h3>
                        <p class="text-muted">Number of active user roles</p>
                    </div>
                </div>
            </div>

            <!-- System Logs -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">System Logs</h5>
                        <h3 class="card-text text-warning">320</h3>
                        <p class="text-muted">Logs recorded in the past 24 hours</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- User Management -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">User Management</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Create, update, or remove users and assign roles as needed.</p>
                        <a href="#" class="btn btn-primary">
                            Manage Users <i class="bi bi-person-fill"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- System Settings -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">System Settings</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Configure global system settings to ensure smooth operation.</p>
                        <a href="#" class="btn btn-success">
                            Manage Settings <i class="bi bi-gear"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Recent Activity -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Recent Admin Activity</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Admin Name</th>
                                    <th>Action</th>
                                    <th>Date</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Added New User</td>
                                    <td>2025-01-20</td>
                                    <td>Created user "jane.doe@example.com"</td>
                                </tr>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>Updated Settings</td>
                                    <td>2025-01-18</td>
                                    <td>Changed password policy</td>
                                </tr>
                                <tr>
                                    <td>Emily Davis</td>
                                    <td>Deleted User</td>
                                    <td>2025-01-15</td>
                                    <td>Removed user "john.smith@example.com"</td>
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
