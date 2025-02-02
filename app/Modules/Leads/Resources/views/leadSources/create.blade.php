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
                        <button class=" fw-bold txtColor " style="background: none;border:none;">Adding Lead Source</button>
                    </div>
                </div>
                <div class="col-lg-3 mx-auto">

                </div>
                <div class="col-lg-3 ms-auto text-lg-end">
                    <div class="btn-group dropdown-split-btn">
                        <a href="{{ route('lead.source.index') }}" class="btn rounded-4 btnRapid"> List</a>

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
        <form name="currencyForm" id="currencyForm" method="POST" action="{{ route('lead.source.store') }}"
            enctype="multipart/form-data">
            @csrf <!-- CSRF token for Laravel -->

            <div class="card-container container-fluid mb-4 position-relative" style="height: calc(100vh - 330px);">
                <div class="row">
                    <!-- Name -->
                    <div class="col-md-6 mb-4 position-relative">
                        <div class="input-group mb-3">
                            <div class="form-floating flex-grow-1">
                                <input type="text" class="form-control rounded-start" id="fullName" name="name"
                                    placeholder="Enter Name" required>
                                <label for="fullName">Name</label>
                            </div>
                        </div>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
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
