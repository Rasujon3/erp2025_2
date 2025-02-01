<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dragtable.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
    <!-- custom styling -->



    <link rel="stylesheet" href="{{ asset('assets/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fixedColumns.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/colReorder.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/keyTable.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dataTables.bootstrap5.min.css') }}">


    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />


</head>

<body class="font-sans antialiased">

    <!-- Loader -->
    <div id="loader"
        class="d-none position-fixed top-0 start-0 w-100 h-100 bg-light bg-opacity-10 d-flex align-items-center justify-content-center"
        style="z-index: 1050;">
        <div id="infyLoader" class="infy-loader">
            <svg width="150px" height="75px" viewBox="0 0 100 100" fill="#1C94FF">
                <circle cx="50" cy="50" r="40" stroke-width="5" stroke="#1C94FF" fill="none"
                    stroke-linecap="round">
                    <animate attributeName="stroke-dasharray" dur="1.5s" values="0 125;125 125;0 125"
                        repeatCount="indefinite" />
                    <animate attributeName="stroke-dashoffset" dur="1.5s" values="0;-125;-250"
                        repeatCount="indefinite" />
                </circle>
            </svg>

        </div>
    </div>
    <div class="min-h-screen bg-gray-100">

        @include('layouts.header')
        <div class="content">
            @include('layouts.sidebar')
            <!-- Right Sidebar -->

            <main class="p-4 flex-grow-1" style="z-index: 1 !important; ">
                @yield('content')
            </main>
        </div>
        @include('layouts.footer')
        @include('layouts.modals')





    </div>
    <script src="{{ asset('assets/js/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.fixedColumns.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.colReorder.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/js/select.dataTables.js') }}"></script>

    {{-- <script src="{{ asset('assets/js/custom.js') }}"></script> --}}


    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://rawgit.com/akottr/dragtable/master/jquery.dragtable.js"></script>
    <script src="{{ asset('assets/js/rapid.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>



    <!-- Stack for additional scripts -->
    @stack('scripts')
    <script>
        function closeDropdown() {
            $('.dropdown-menu').removeClass('show'); // Close the dropdown
        }
        $(document).ready(function() {
            $('#listTable').dragtable();
            $("#listTable tbody").sortable();
            $('.js-company-select2').select2();
            $('.company-select2').select2();
            $('#basic').daterangepicker();


            $('#toggleColButton').click(function() {

                $('#sideColumn').toggle(); // Toggle side column visibility
                // Adjust the main column class based on side column visibility
                if ($('#sideColumn').is(':visible')) {
                    $('#mainColumn').removeClass('col-md-12').addClass('col-md-9');
                } else {
                    $('#mainColumn').removeClass('col-md-9').addClass('col-md-12');
                }
            });

            $('#listToggleBtn').click(function() {
                if ($('#listView').css('display') === 'none') {
                    $('#listView').show();
                    $('#cardView').hide();
                    $('#listToggleBtn i').removeClass('bi-list-ul').addClass('bi-grid-fill');
                    $('#importBtn').hide();
                    $('#visibilityBtn').show();
                } else {
                    $('#listView').hide();
                    $('#cardView').show();
                    $('#listToggleBtn i').removeClass('bi-grid-fill').addClass('bi-list-ul');
                    $('#importBtn').show();
                    $('#visibilityBtn').hide();
                }
            });

            $('#companySelctBtn').click(function() {
                if ($('.companySearchOverlay').css('display') === 'none') {
                    $('.companySearchOverlay').show();
                } else {
                    $('.companySearchOverlay').hide();
                }
            });

            $('#searchBox').on('input', function() {
                const searchValue = $(this).val().toLowerCase();
                let hasResults = false;

                $('#checkboxes .form-check').each(function() {
                    const labelText = $(this).find('label').text().toLowerCase();

                    if (labelText.includes(searchValue)) {
                        $(this).show(); // Show matching items
                        hasResults = true;
                    } else {
                        $(this).hide(); // Hide non-matching items
                    }
                });
                if (hasResults) {
                    $('#noResults').hide(); // Hide "no results" message if there are matches
                } else {
                    $('#noResults').show(); // Show "no results" message if no matches found
                }
            });
        });
    </script>

    <script>
        window.addEventListener('load', function() {

        });


        function startLoader() {
            $('#loader').removeClass('d-none');
        }

        function stopLoader() {
            $('#loader').addClass('d-none');
        }


        $("#btnFAQs").click(function() {
            $("#newFAQModal").modal('show');

        });

        function changeButton(buttonSelector, status) {
            // Determine if it's an ID or class selector
            const $button = buttonSelector.startsWith('#') ?
                $(buttonSelector) // ID selector
                :
                $(`.${buttonSelector}`); // Class selector

            // Check if the button exists
            if (!$button.length) {
                console.warn(`Button with selector "${buttonSelector}" not found.`);
                return;
            }

            // Spinner HTML
            const spinnerHTML =
                `<span class="spinner-border spinner-border-sm ms-2" role="status" aria-hidden="true"></span>`; // Spinner on the right

            if (status) {
                // Add spinner if not already present and disable the button
                if ($button.find('.spinner-border').length === 0) {
                    $button.append(spinnerHTML); // Append spinner to the right
                }
                $button.prop('disabled', true); // Disable the button
            } else {
                // Remove the spinner and enable the button
                $button.find('.spinner-border').remove();
                $button.prop('disabled', false); // Enable button
            }
        }

        function showToast(status, message) {
            // Map status to specific loader background colors (optional customization)
            const loaderBgColors = {
                success: '#28a745', // Green for success
                error: '#dc3545', // Red for error
                warning: '#ffc107', // Yellow for warning
                info: '#17a2b8' // Blue for info
            };

            $.toast({
                heading: status.charAt(0).toUpperCase() + status.slice(
                    1), // Capitalize the first letter of the status
                text: message,
                icon: status, // 'success', 'error', 'info', or 'warning'
                position: 'top-right', // Customize position: top-right, top-left, etc.
                loaderBg: loaderBgColors[status] || '#000000', // Default to black if status is unknown
                showHideTransition: 'slide', // Customize transition: slide, fade, or plain
                hideAfter: 3000 // Auto-hide after 3 seconds
            });
        }
    </script>
</body>

</html>
