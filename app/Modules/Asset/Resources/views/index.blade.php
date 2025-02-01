@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-primary mb-4">
                    <i class="bi bi-box-seam"></i> Asset Management Dashboard
                </h1>
                <p class="lead">Track and manage all organizational assets effectively.</p>
            </div>
        </div>

        <div class="row">
            <!-- Total Assets -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Assets</h5>
                        <h3 class="card-text text-primary">150</h3>
                        <p class="text-muted">Number of active assets</p>
                    </div>
                </div>
            </div>

            <!-- Assets in Maintenance -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Assets in Maintenance</h5>
                        <h3 class="card-text text-warning">10</h3>
                        <p class="text-muted">Assets currently under maintenance</p>
                    </div>
                </div>
            </div>

            <!-- Depreciated Assets -->
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Depreciated Assets</h5>
                        <h3 class="card-text text-danger">25</h3>
                        <p class="text-muted">Assets that have depreciated</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <!-- Recent Asset Transactions -->
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Recent Asset Transactions</h5>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Asset Name</th>
                                    <th>Category</th>
                                    <th>Purchase Date</th>
                                    <th>Status</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Desktop Computer</td>
                                    <td>Electronics</td>
                                    <td>2023-12-15</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>$1,200</td>
                                </tr>
                                <tr>
                                    <td>Office Chair</td>
                                    <td>Furniture</td>
                                    <td>2022-10-10</td>
                                    <td><span class="badge bg-warning">Maintenance</span></td>
                                    <td>$250</td>
                                </tr>
                                <tr>
                                    <td>Projector</td>
                                    <td>Electronics</td>
                                    <td>2021-06-05</td>
                                    <td><span class="badge bg-danger">Depreciated</span></td>
                                    <td>$300</td>
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
