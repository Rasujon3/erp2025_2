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
                        <button class=" fw-bold txtColor" style="background: none;border:none;">Update Country</button>
                    </div>
                </div>
                <div class="col-lg-3 mx-auto">
                    {{-- <div class="col-lg-3 mx-auto">
                        <div class="company-select">
                            <select class="form-select company-select2">
                                <option selected="">Rapid Software LLC</option>
                                <option>Rapid Computer</option>
                                <option>Rapid</option>
                                <option>Abdul</option>
                                <option>Jahngir</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-3 ms-auto text-lg-end">
                    <div class="btn-group dropdown-split-btn">
                        <a href="{{ route('countries.index') }}"
                            class="btn rounded-4 btnRapid"> List</a>
                    </div>
                </div>
            </div>
        </div>
        <form method="POST" action="{{ route('countries.update', ['country' => $country->id]) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $country->id }}">
            <div class="card-container container-fluid mb-4 position-relative" style="height: calc(100vh - 330px);">
                <div class="row">
                    <!-- Code -->
                    <div class="col-md-3 mb-4 position-relative">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="currencyCode" name="code"
                                placeholder="Enter Code" required autofocus value="{{ $country->code ?? '' }}">
                            <label for="currencyCode">Code</label>
                        </div>
                        @error('code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Name -->
                    <div class="col-md-6 mb-4 position-relative">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="fullName" name="name"
                                placeholder="Enter Name" required value="{{ $country->name ?? '' }}">
                            <label for="fullName">Name</label>
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="col-md-3 mb-4">
                        <div class="form-floating mb-3">
                            <input type="number" step="any" class="form-control" id="exchange_rate"
                                name="exchange_rate" placeholder="Enter Exchange Rate" autofocus
                                value="{{ $country->exchange_rate ?? '' }}">
                            <label for="currencyCode">Exchange Rate</label>
                        </div>
                        @error('exchange_rate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <!-- Default -->
                    <div class="col-md-2 mb-3">
                        <div class="d-flex">
                            <h6 class="fw-bold">Default</h6>
                            <div class="form-check form-switch ms-3">
                                <input class="form-check-input" type="checkbox" id="isDefault" name="is_default"
                                    {{ !empty($country->is_default) && $country->is_default ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>



                    <!-- Active -->
                    <div class="col-md-2 mb-3">
                        <div class="d-flex">
                            <h6 class="fw-bold">Active</h6>
                            <div class="form-check form-switch ms-3">
                                <input class="form-check-input" type="checkbox" id="isActive" name="is_active"
                                    {{ !empty($country->is_active) && $country->is_active ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-2 mb-3">
                        <div class="d-flex">
                            <h6 class="fw-bold">Delete</h6>
                            <div class="form-check form-switch ms-3">
                                <input class="form-check-input" type="checkbox" id="isDelete" name="is_delete">
                            </div>
                        </div>
                    </div>

                    <!-- Draft -->
                    <div class="col-md-2 mb-3">
                        <div class="d-flex">
                            <h6 class="fw-bold">Draft</h6>
                            <div class="form-check form-switch ms-3">
                                <input class="form-check-input" type="checkbox" id="draft" name="draft"
                                    {{ !empty($country->draft) && $country->draft ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <!-- Symbol -->
                    <div class="col-md-2 mb-4">
                        <label for="flag">Flag</label>
                        <label class="d-block text-black-50">
                            <i class="bi-cloud-upload text-theme fs-4"></i>
                            <input id="flag" class="d-none" type="file" name="flag" accept="image/*">
                        </label>

                        @error('flag')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <div class="flex-shrink-0 rounded bg-success-subtle" style="width: 100px; height: 50px;">
                            <!-- Display the image if it exists, otherwise show a placeholder -->
                            @if ($country->flag)
                                <div class="col-md-2">
                                    <div class="flex-shrink-0 rounded bg-success-subtle"
                                        style="width: 100px; height: 50px;">
                                        <!-- Display the image if it exists, otherwise show a placeholder -->
                                        <img src="{{ asset('files/images/country/' . $country->flag ?? 'https://placehold.co/100x50') }}"
                                            alt="Currency Image" class="img-fluid rounded"
                                            style="width: 100px; height: 50px;">
                                    </div>
                                </div>
                            @else
                                No Flag uploaded.
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 text-end">
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btnRapid rounded-pill" id="btnSubmit">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

