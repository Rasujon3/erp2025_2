@extends('layouts.app') <!-- Or the name of your layout -->

@section('page_css')
    <!-- Pickr Nano Theme CSS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" />
    <style>
        .color-wrapper {
            width: 30px;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 50%;
            cursor: pointer;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="bg-primary-subtle rounded mb-4 p-2">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="hstack align-items-center">
                        <div class="flex-shrink-0" style="cursor: pointer;">
                            <i class="bi-youtube fs-3 txtColor" data-bs-toggle="modal" data-bs-target="#youtubeModal"></i>
                        </div>
                        <button class=" fw-bold txtColor " style="background: none;border:none;">Adding Lead Status</button>
                    </div>
                </div>
                <div class="col-lg-3 mx-auto">

                </div>
                <div class="col-lg-3 ms-auto text-lg-end">
                    <div class="btn-group dropdown-split-btn">
                        <a href="{{ route('lead.status.index') }}" class="btn rounded-4 btnRapid"> List</a>

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
        <form name="currencyForm" id="currencyForm" method="POST" action="{{ route('lead.status.store') }}"
            enctype="multipart/form-data">
            @csrf <!-- CSRF token for Laravel -->

            <div class="card-container container-fluid mb-4 position-relative" style="height: calc(100vh - 330px);">
                <div class="row">
                    @include('leads::leadStatus.createFields')
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
    <!-- Pickr CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/nano.min.css" rel="stylesheet">
    <!-- Pickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Pickr
            const pickr = Pickr.create({
                el: '.color-wrapper',
                theme: 'nano', // or 'monolith', or 'nano'
                closeWithKey: 'Enter',
                autoReposition: true,
                defaultRepresentation: 'HEX',
                position: 'bottom-end',
                swatches: [
                    'rgba(244, 67, 54, 1)',
                    'rgba(233, 30, 99, 1)',
                    'rgba(156, 39, 176, 1)',
                    'rgba(103, 58, 183, 1)',
                    'rgba(63, 81, 181, 1)',
                    'rgba(33, 150, 243, 1)',
                    'rgba(3, 169, 244, 1)',
                    'rgba(0, 188, 212, 1)',
                    'rgba(0, 150, 136, 1)',
                    'rgba(76, 175, 80, 1)',
                    'rgba(139, 195, 74, 1)',
                    'rgba(205, 220, 57, 1)',
                    'rgba(255, 235, 59, 1)',
                    'rgba(255, 193, 7, 1)',
                ],
                components: {
                    preview: true,
                    hue: true,
                    interaction: {
                        input: true,
                        clear: false,
                        save: false,
                    },
                },
            });

            // Handle color change event
            pickr.on('change', (color, instance) => {
                const hexColor = color.toHEXA().toString();
                const rgbaColor = color.toRGBA().toString();

                // Update the background color of the .color-wrapper
                const colorWrapper = document.querySelector('.color-wrapper');
                if (colorWrapper) {
                    colorWrapper.style.backgroundColor = hexColor;
                }

                // Update the --pcr-color CSS variable of the .pcr-button
                const pcrButton = document.querySelector('.pcr-button');
                if (pcrButton) {
                    pcrButton.style.setProperty('--pcr-color', rgbaColor);
                }

                // Validate if the color is too light
                if (isLightColor(hexColor)) {
                    $('#validationErrorsForColor')
                        .addClass('d-block')
                        .text('Pick a different color');
                    $('#btnSave').prop('disabled', true);
                    return;
                }

                // Clear validation errors and enable the Save button
                $('#validationErrorsForColor').removeClass('d-block');
                $('#btnSave').prop('disabled', false);

                // Update the hidden input field with the selected color
                $('#color').val(hexColor);
            });

            // Function to check if a color is too light
            function isLightColor(hex) {
                const rgb = hexToRgb(hex);
                const brightness = (rgb.r * 299 + rgb.g * 587 + rgb.b * 114) / 1000;
                return brightness > 180; // Adjust threshold as needed
            }

            // Helper function to convert HEX to RGB
            function hexToRgb(hex) {
                const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
                return result
                    ? {
                        r: parseInt(result[1], 16),
                        g: parseInt(result[2], 16),
                        b: parseInt(result[3], 16),
                    }
                    : null;
            }
        });
    </script>
@endpush
