@extends('layouts.app') <!-- Or the name of your layout -->

@section('content')
    <div class="container-fluid">
        <div class="bg-primary-subtle rounded mb-4 p-2">
            <div class="row align-items-center">
                 <div class="col-lg-3">
                    <div class="hstack align-items-center">
                        <div class="flex-shrink-0" style="cursor: pointer;">
                            <i class="bi-youtube fs-3 txtColor" data-bs-toggle="modal" data-bs-target="#youtubeModal"></i>
                        </div>
                        <button class=" fw-bold txtColor" style="background: none;border:none;">View Country</button>
                    </div>
                </div>
                <div class="col-lg-3 mx-auto">
                    <div class="col-lg-3 mx-auto">

                    </div>
                </div>
               <div class="col-lg-3 ms-auto text-lg-end">
                    <div class="btn-group dropdown-split-btn">
                        <a href="{{ route('countries.index') }}"
                            class="btn rounded-4 btnRapid"> List</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-container container-fluid mb-4 position-relative" style="height: calc(100vh - 330px);">
            <div class="row">
                <!-- Code -->
                <div class="col-md-3 mb-4 position-relative">
                    <div class="form-floating mb-3">
                        <p class="form-control-plaintext">{{ $country->code ?? 'N/A' }}</p>
                        <label for="currencyCode">Code</label>
                    </div>
                </div>

                <!-- Name -->
                <div class="col-md-3 mb-4 position-relative ">
                    <div class="form-floating mb-3 ">
                        <p class="form-control-plaintext">{{ $country->name ?? 'N/A' }}</p>
                        <label for="fullName">Name</label>
                    </div>
                </div>

                <!-- Default -->
                <div class="col-md-3 mb-3">
                    <div class="d-flex">
                        <h6 class="fw-bold">Default</h6>
                        <div class="ms-3">
                            <p>{{ $country->is_default ? 'Yes' : 'No' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Draft -->
                <div class="col-md-3 mb-3">
                    <div class="d-flex">
                        <h6 class="fw-bold">Draft</h6>
                        <div class="ms-3">
                            <p>{{ $country->draft ? 'Yes' : 'No' }}</p>
                        </div>
                    </div>
                    @if ($country->draft)
                        <!-- Only display if draft is true -->
                        <div class="d-flex mt-2">
                            <h6 class="fw-bold">Drafted at</h6>
                            <div class="ms-3">
                                <p>{{ $country->drafted_at ? \Carbon\Carbon::parse($country->drafted_at)->format('d-m-Y h:i A') : 'N/A' }}
                                </p>

                                <!-- Display drafted_at or N/A if not available -->
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Active -->
                <div class="col-md-3 mb-3">
                    <div class="d-flex">
                        <h6 class="fw-bold">Active</h6>
                        <div class="ms-3">
                            <p>{{ $country->is_active ? 'Yes' : 'No' }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="d-flex">
                        <h6 class="fw-bold">Delete</h6>
                        <div class="ms-3">
                            <p>{{ $country->delete_at ? 'Yes' : 'No' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Symbol -->
                <div class="col-md-3 mb-4">
                    <label for="symbol">Flag</label>
                    <p class="form-control-plaintext">
                        @if ($country->flag)
                            <div class="col-md-2">
                                <div class="flex-shrink-0 rounded bg-success-subtle" style="width: 100px; height: 50px;">
                                    <!-- Display the image if it exists, otherwise show a placeholder -->
                                    <img src="{{ asset('files/images/country/' . $country->flag ?? 'https://placehold.co/100x50') }}"
                                        alt="Currency Image" class="img-fluid rounded" style="width: 100px; height: 50px;">
                                </div>
                            </div>
                        @else
                            No Flag uploaded.
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
