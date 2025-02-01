@extends('layouts.app') <!-- Or the name of your layout -->
@include('admin::countries.partials.template')
@section('content')
    <div class="container-fluid">
        <div class="bg-primary-subtle rounded mb-4 p-2">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="hstack align-items-center">
                        <div class="flex-shrink-0" style="cursor: pointer;">
                            <i class="bi-youtube fs-3 txtColor" data-bs-toggle="modal" data-bs-target="#youtubeModal"></i>
                        </div>
                        <button class=" fw-bold txtColor " style="background: none;border:none;">Adding Country</button>
                    </div>
                </div>
                <div class="col-lg-3 mx-auto">

                </div>
                <div class="col-lg-3 ms-auto text-lg-end">
                    <div class="btn-group dropdown-split-btn">
                        <a href="{{ route('countries.index') }}" class="btn rounded-4 btnRapid"> List</a>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form name="currencyForm" id="currencyForm" method="POST" action="{{ route('countries.store') }}"
            enctype="multipart/form-data">
            @csrf <!-- CSRF token for Laravel -->

            <div class="card-container container-fluid mb-4 position-relative" style="height: calc(100vh - 330px);">
                <div class="row">
                    <!-- Code -->
                    <div class="col-md-3 mb-4 position-relative">
                        <div class="input-group mb-3">
                            <div class="form-floating flex-grow-1"> <input type="text" class="form-control rounded-start"
                                    id="currencyCode" name="code" placeholder="Enter Code" required autofocus>
                                <label for="currencyCode">Code</label>
                            </div>
                            <button class="btn btn-outline-secondary rounded-end" type="button" id="getCodeTemplate">
                                <i class="bi bi-arrow-down"></i> </button>
                        </div>
                        @error('code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror

                    </div>

                    <!-- Name -->
                    <div class="col-md-6 mb-4 position-relative">
                        <div class="input-group mb-3">
                            <div class="form-floating flex-grow-1">
                                <input type="text" class="form-control rounded-start" id="fullName" name="name"
                                    placeholder="Enter Name" required>
                                <label for="fullName">Name</label>
                            </div>
                            <button class="btn btn-outline-secondary rounded-end" type="button" id="getNameTemplate">
                                <i class="bi bi-arrow-down"></i>
                            </button>
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <!-- Default -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex">
                            <h6 class="fw-bold">Default</h6>
                            <div class="form-check form-switch ms-3">
                                <input class="form-check-input" type="checkbox" id="isDefault" name="is_default">
                            </div>
                        </div>
                    </div>

                    <!-- Draft -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex">
                            <h6 class="fw-bold">Draft</h6>
                            <div class="form-check form-switch ms-3">
                                <input class="form-check-input" type="checkbox" id="draft" name="draft">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="d-flex">
                            <h6 class="fw-bold">Active</h6>
                            <div class="form-check form-switch ms-3">
                                <input class="form-check-input" type="checkbox" id="isActive" name="is_active">
                            </div>
                        </div>
                    </div>

                    <!-- Symbol -->
                    <div class="col-md-3 mb-4">
                        <label for="symbol">Flag</label>
                        <label class="d-block text-black-50">
                            <i class="bi-cloud-upload text-theme fs-4"></i>
                            <input id="flag" class="d-none" type="file" name="flag">
                        </label>
                    </div>

                </div>
            </div>

            <div class="col-12 text-end">
                <div class="d-flex justify-content-between">
                    <button type="reset" class="btn btnRapid rounded-pill bg-secondary ms-auto me-2"
                        style="width: 100px;">Reset</button>
                    <button type="submit" class="btn btnRapid rounded-pill">Submit</button>
                </div>
            </div>
        </form>

    </div>


@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $("#getCodeTemplate").click(function() {
                $("#countryTemplateModal").modal('show');
            });

        });
    </script>
@endpush
