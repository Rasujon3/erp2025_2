@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-primary mb-4">
                    <i class="bi bi-folder2-open"></i> Document Management Dashboard
                </h1>
                <p class="lead">Efficiently organize, manage, and access your documents in one place.</p>
            </div>
        </div>

        <div class="row">
            <!-- Total Documents -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Documents</h5>
                        <h3 class="card-text text-primary">1,250</h3>
                        <p class="text-muted">Number of stored documents</p>
                    </div>
                </div>
            </div>

            <!-- Documents Shared -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Documents Shared</h5>
                        <h3 class="card-text text-success">400</h3>
                        <p class="text-muted">Documents currently shared with others</p>
                    </div>
                </div>
            </div>

            <!-- Archived Documents -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Archived Documents</h5>
                        <h3 class="card-text text-warning">150</h3>
                        <p class="text-muted">Documents moved to archive</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Recent Document Activity -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Recent Document Activity</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Document Name</th>
                                    <th>Type</th>
                                    <th>Last Modified</th>
                                    <th>Status</th>
                                    <th>Owner</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Project Proposal</td>
                                    <td>PDF</td>
                                    <td>2025-01-15</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>John Doe</td>
                                </tr>
                                <tr>
                                    <td>Financial Report</td>
                                    <td>Excel</td>
                                    <td>2025-01-10</td>
                                    <td><span class="badge bg-warning">Archived</span></td>
                                    <td>Jane Smith</td>
                                </tr>
                                <tr>
                                    <td>Meeting Notes</td>
                                    <td>Word</td>
                                    <td>2025-01-05</td>
                                    <td><span class="badge bg-danger">Deleted</span></td>
                                    <td>Emily Davis</td>
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
