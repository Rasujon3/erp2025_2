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
                        <button class=" fw-bold txtColor" style="background: none;border:none;">View Lead Source</button>
                    </div>
                </div>
                <div class="col-lg-3 mx-auto">
                    <div class="col-lg-3 mx-auto">

                    </div>
                </div>
               <div class="col-lg-3 ms-auto text-lg-end">
                    <div class="btn-group dropdown-split-btn">
                        <a href="{{ route('lead.source.index') }}"
                            class="btn rounded-4 btnRapid"> List</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-container container-fluid mb-4 position-relative" style="height: calc(100vh - 330px);">
            <div class="row">
                <!-- Name -->
                <div class="col-md-3 mb-4 position-relative ">
                    <div class="form-floating mb-3 ">
                        <p class="form-control-plaintext">{{ $leadSource->name ?? 'N/A' }}</p>
                        <label for="fullName">Name</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
