@extends('layouts.app') <!-- Or the name of your layout -->


@section('content')
    <div class="container-fluid">
        @include('leads::leadSources.partials.content_header')

        <div class="bg-white pb-4">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="dashcards total selected">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="bi-database-check fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4 class="fw-bold" id="totalCountries">0</h4>
                                <h6 class="mb-0">Total </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="dashcards draft">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="bi-folder fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4 class="fw-bold" id="totalDraft">0</h4>
                                <h6 class="mb-0">Draft </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="dashcards active">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="bi-check-circle fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4 class="fw-bold" id="totalActive">0</h4>
                                <h6 class="mb-0">Active </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="dashcards inactive">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="bi-exclamation-diamond fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4 class="fw-bold" id="totalInactive">0</h4>
                                <h6 class="mb-0">Inactive </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 d-none">
                    <div class="dashcards updated">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="bi-building-up fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4 class="fw-bold" id="totalUpdated">0</h4>
                                <h6 class="mb-0">Updated </h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="dashcards deleted">
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="bi-x-square fs-2"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h4 class="fw-bold" id="totalDeleted">0</h4>
                                <h6 class="mb-0">Deleted </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            <hr class="border-primary mb-5">
            <div class="row">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center gap-2">


                        <button type="button" class="btn bg-primary-subtle text-primary-emphasis"
                            data-bs-auto-close="false" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi-download"></i> Import
                        </button>
                        <ul class="dropdown-menu shadow p-3" id="myDropdown" style="min-width: 25rem;">
                            <li>
                                <a href="#" class="dropdown-item">
                                    <div class="d-flex align-items-cneter justify-content-between rounded">
                                        <h6 class="text-primary-emphasis text-decoration-none">Download Example</h6>
                                        <button type="button" class="btn-close close-dropdown" onclick="closeDropdown()"
                                            aria-label="Close"></button>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <label class="d-block text-center border rounded p-3 text-black" style="cursor: pointer;">
                                    <i class="bi-cloud-upload text-theme fs-4"></i>
                                    <p class="mb-0">Drag and drop a icon or click</p>
                                    <h6 class="small text-theme">Note: Only .CSV format.</h6>
                                    <input id="symbol" class="d-none" type="file">
                                </label>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <h6 class="">Import Instructions</h6>
                            </li>
                            <li>
                                <div class="table-responsive" style="height: 150px;">
                                    <table class="table table-sm table-borderless text-center">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Column Name</th>
                                                <th>Value</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Item Name</td>
                                                <td><span class="bg-primary-subtle text-primary-emphasis badge"
                                                        style="width: 80px;">Required</span></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Item Name</td>
                                                <td><span class="text-bg-secondary bg-opacity-50 badge"
                                                        style="width: 80px;">Optional</span></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Item Name</td>
                                                <td><span class="bg-primary-subtle text-primary-emphasis badge"
                                                        style="width: 80px;">Required</span></td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Item Name</td>
                                                <td><span class="text-bg-secondary bg-opacity-50 badge"
                                                        style="width: 80px;">Optional</span></td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>Item Name</td>
                                                <td><span class="text-bg-secondary bg-opacity-50 badge"
                                                        style="width: 80px;">Optional</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </li>
                        </ul>
                        <div class="btn-group dropdown-split-btn" id="visibilityBtn" style="display: none;">
                            <a class="btn btn btn-theme mb-0">Visibility</a>
                            <button type="button" class="btn btn-theme dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                        </div>
                        <ul class="dropdown-menu shadow p-3">
                            <div class="position-relative mb-4">
                                <input type="search" class="form-control pe-5" placeholder="Search...">
                                <a href="#"
                                    class="text-decoration-none position-absolute translate-middle top-50 end-0 me-3">
                                    <i class="bi-search"></i>
                                </a>
                            </div>
                            <div class="overflow-auto" style="height: 200px;">
                                <div class="d-flex align-items-center">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <span class="flex-grow-1 ms-2">Select All</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <span class="flex-grow-1 ms-2">Code</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <span class="flex-grow-1 ms-2">Currency</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <span class="flex-grow-1 ms-2">Default</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <span class="flex-grow-1 ms-2">Country</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <span class="flex-grow-1 ms-2">Symbols</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <span class="flex-grow-1 ms-2">Exchange</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <span class="flex-grow-1 ms-2">Status</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="form-check ms-2">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault"></label>
                                    </div>
                                    <span class="flex-grow-1 ms-2">Actions</span>
                                </div>
                            </div>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="text-end"><a class="btn btn-theme2" href="#">Reset</a></li>
                        </ul>
                        <div class="btn-group dropdown-split-btn">
                            <a class="btn btn-theme"><i class="bi-upload"></i> Export</a>
                            <button type="button" class="btn btn-theme dropdown-toggle dropdown-toggle-split"
                                data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu p-3" style="min-width: 25rem;">
                                <li>
                                    <div class="overflow-auto" id="checkboxes">
                                        <div>
                                            <a class="text-decoration-none text-theme" data-bs-toggle="collapse"
                                                href="#CollapseExample1" role="button" aria-expanded="false"
                                                aria-controls="CollapseExample1">
                                                <i class="bi-chevron-right"></i> Branch
                                            </a>
                                            <div class="collapse" id="CollapseExample1">
                                                <div class="card-body">
                                                    <select class="form-select js-company-select2" multiple="multiple">
                                                        <option>Branch 1</option>
                                                        <option>Branch 2</option>
                                                        <option>Branch 3</option>
                                                        <option>Branch 4</option>
                                                        <option>Branch 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="noResults" style="display:none;">No results found</div>
                                    </div>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li class="text-end"><a class="btn btn-theme2" href="#">Reset</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <div class="d-flex gap-3 mb-2">
                                        <a class="btn btn-theme btn-sm" href="#"><i
                                                class="bi-file-earmark-excel"></i> Excel</a>
                                        <a class="btn btn-theme btn-sm" href="#"><i
                                                class="bi-file-earmark-pdf"></i> PDF</a>
                                        <a class="btn btn-theme btn-sm" href="#"><i class="bi-filetype-csv"></i>
                                            CSV</a>
                                        <a class="btn btn-theme btn-sm" href="#"><i class="bi-printer"></i>
                                            Print</a>
                                    </div>
                                    <div class="d-flex gap-3">
                                        <a class="btn btn-theme btn-sm" href="#" data-bs-toggle="modal"
                                            data-bs-target="#whatsAppModal"><i class="bi-whatsapp"></i> WhatsApp</a>
                                        <a class="btn btn-theme btn-sm" href="#" data-bs-toggle="modal"
                                            data-bs-target="#emailModal"><i class="bi-envelope-arrow-up"></i> Email</a>
                                    </div>
                                </li>
                            </ul>
                        </div>


                    </div>
                    <!-- <a class="btn bg-primary-subtle text-primary-emphasis mb-0"><i class="bi-trash3"></i> </a> -->
                </div>
                <div class="col-lg-2 mx-auto">
                    <form action="">
                        <div class="position-relative">
                            <input type="search" class="form-control rounded-pill bg-light px-5" placeholder="Search..."
                                id="tableSearch">
                            <a href="#"
                                class="text-decoration-none position-absolute translate-middle top-50 start-0 ms-3">
                                <i class="bi-search"></i>
                            </a>
                            <a href="#"
                                class="text-decoration-none position-absolute translate-middle top-50 end-0 me-3">
                                <i class="bi-mic"></i>
                            </a>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <div class="d-flex align-items-center gap-2 justify-content-md-end">


                        <button type="button" class="btn bg-primary-subtle text-primary-emphasis" id="delete-button"
                            style="display: none;">
                            Delete Selected
                        </button>
                        <button type="button" class="btn bg-primary-subtle text-primary-emphasis">
                            <i class="bi-funnel"></i> Filter
                        </button>
                        <button type="button" class="btn bg-primary-subtle text-primary-emphasis" id="toggleTab">
                            <i class="bi-list-ul"></i> List
                        </button>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" id="mainColumn">

                <div class="tab-content mt-3" id="myTabContent">
                    <!-- Grid View Tab -->
                    <div class="tab-pane fade show active" id="grid" role="tabpanel">
                        @include('leads::leadSources.partials.card_view')


                    </div>

                    <!-- List View Tab -->
                    <div class="tab-pane fade" id="list" role="tabpanel">
                        @include('leads::leadSources.partials.list_view')
                    </div>
                </div>

                @include('leads::leadSources.partials.modals')
            </div>
            {{-- below filter --}}
            @include('leads::leadSources.partials.side_filter')
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            var dataSize = 0;
            const container = $('#currencies-container');
            const searchInput = $('#tableSearch');
            let selectedFilter = ''; // Variable to store the selected filter
            var currentPage = 1; // Current page for pagination
            let isLoading = false; // Prevent multiple simultaneous requests
            function loadLeadSourcesGridView(loadMore = false, searchQuery = null, pageNumber = null) {
                if (isLoading) return; // Prevent duplicate requests
                isLoading = true; // Set loading flag to true


                startLoader(); // Start loading indicator

                // Make AJAX request to load currencies
                $.ajax({
                    url: '{{ route('lead.source.grid-view') }}',
                    method: 'GET',
                    data: {
                        search: searchQuery, // Send search query
                        filter: selectedFilter, // Send selected filter
                        page: pageNumber ?? currentPage // Send the current page number for pagination
                    },
                    success: function(response) {
                        stopLoader();
                        // If not loading more, clear the container for fresh data
                        if (!loadMore) {
                            container.empty();
                        }

                        const editRoute = "{{ route('lead.source.edit', ':id') }}";
                        const viewRoute = "{{ route('lead.source.view', ':id') }}";
                        const data = response.data;
                        if (data.length) {
                            dataSize = data.length;
                            data.forEach(leadSource => {
                                const card = `
                                 <div class="col-md-3 col-lg-3  ">
                                    <div class="customer-card border rounded p-3">
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-0 txtColor">Name</p>
                                            <p class="mb-0 txtColor">Action</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p class="mb-0 fw-bold">${leadSource.name}</p>
                                        </div>
                                        <div class="card-footer text-end mt-2">
                                            <a href="${editRoute.replace(':id', leadSource.id)}" class="btn btn-primary btn-sm" title="Edit">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm delete-currency" data-id="${leadSource.id}" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>`;

                                container.append(card);
                            });
                        } else {

                            dataSize = 0;

                            // currentPage = 1;
                            // Optionally handle case when no data is found
                        }
                        isLoading = false; // Reset loading flag
                    },
                    error: function() {
                        stopLoader();
                        isLoading = false; // Reset loading flag
                    }
                });
            }
            // Example delete handler
            // Show modal and set currency ID on delete button click
            $(document).on('click', '.delete-currency', function() {
                console.log('clicked')
                const id = $(this).data('id'); // Get the currency ID
                $('#deleteCardModal').modal('show'); // Show the modal
                $('#confirmDelete').data('id', id); // Attach the ID to the confirm button
            });
            $(document).on('click', '.btnRefreshCard', function() {
                $('#tableSearch').val('');
                currentPage = 1;
                loadLeadSourcesGridView(false, null, 1);
            });


            // Handle delete confirmation
            $(document).on('click', '#confirmDelete', function() {

                changeButton("#confirmDelete", true);
                const id = $(this).data('id'); // Get the country ID from the button
                const deleteCountryUrl = "{{ route('lead.source.destroy', ':id') }}".replace(':id', id);
                $.ajax({
                    url: deleteCountryUrl, // Use the dynamic currency ID in the URL
                    type: 'DELETE', // Set the request type to DELETE
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // CSRF token for security
                    },
                    success: function(response) {
                        $('#deleteCardModal').modal('hide'); // Hide the modal
                        loadLeadSourcesGridView();
                        changeButton("#confirmDelete", false);
                        showToast('success', 'Lead Source deleted successfully!');
                    },
                    error: function(xhr) {
                        $('#deleteCardModal').modal('hide'); // Hide the modal
                        changeButton("#confirmDelete", false);
                        showToast('error', 'Failed to delete the Lead Source. Please try again.');

                    }
                });
            });


            $('.card-container').on('scroll', function() {
                const container = $(this); // Target the specific container

                // Check if the user is near the bottom of the container
                if (container.scrollTop() + container.innerHeight() >= container[0].scrollHeight - 50) {

                    if (!isLoading && dataSize >= 1) {
                        currentPage++; // Increment the page number
                        loadLeadSourcesGridView(true); // Load more data
                    }
                }
            });
            // Initial load

            $("#addBtn").click(function() {
                $("#currencyDetailsModal").modal('show');
            });


            let debounceTimer;
            // Add input event listener to the search input
            searchInput.on('input', function() {
                // Clear the previous timeout if it exists
                clearTimeout(debounceTimer);

                var searchQuery = searchInput.val().trim();
                debounceTimer = setTimeout(function() {
                    loadLeadSourcesGridView(false, searchQuery,
                        1); // Call loadCurrencies after the delay
                }, 500); // 500ms delay (you can adjust this as needed)


            });

            // Method to initialize the Countries Table
            function loadLeadSourcesDataTable() {
                if ($.fn.dataTable.isDataTable('#currencies-table')) {
                    // If the table is already initialized, destroy and reinitialize it
                    $('#currencies-table').DataTable().clear().destroy();
                }

                // Initialize the DataTable
                let table = $('#currencies-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('lead.source.getAllLeadSources') }}",
                    dataSrc: '',
                    responsive: true,
                    columns: [
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: null,
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                console.log(row)
                                // Replace ':id' with the actual row.id dynamically
                                const viewRoute = "{{ route('lead.source.view', ['leadSource' => ':id']) }}";
                                const url = viewRoute.replace(':id', row.id);
                                return `
                                <div class="action-buttons">
                                    <a href="${url}" class="btn btn-info btn-details text-white">Details</a>
                                </div>`;
                            },
                            width: "5%",
                        }
                    ],


                    stateSave: true, // Save the state of the table (pagination, search, etc.)
                    keys: true, // Enable Excel-like keyboard navigation
                    scrollX: true,
                    fixedColumns: {
                        left: 2,
                        right: 1 // Fix checkbox, code, and action columns
                    },
                    select: {
                        blurable: true,
                        selector: 'td:first-child',
                        style: 'os'
                    },
                    colReorder: true,
                    // pagingType: 'full_numbers', // Use full pagination controls
                    // dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    //     "<'row'<'col-sm-12'tr>>" +
                    //     "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    // language: {
                    //     paginate: {
                    //         first: '<<',
                    //         last: '>>',
                    //         next: '>',
                    //         previous: '<'
                    //     }
                    // }


                });

                table.on('key', function(e, datatable, key, cell) {
                    if (key === 13) { // 13 is the keycode for the Enter key
                        let focusedCell = $(cell.node()); // Get the focused cell

                        // Define columns that should not be editable
                        const nonEditableColumns = ['id', 'status',
                            'actions'
                        ]; // Use column names or headers

                        // Dynamically map column name based on the current column index
                        let columnHeaders = table.columns().header().toArray();
                        let columnIdx = cell.index().column;
                        let columnName = $(columnHeaders[columnIdx]).text()
                            .toLowerCase(); // Get column name

                        // Check if the column is non-editable
                        if (nonEditableColumns.includes(columnName)) {
                            return; // Exit without editing
                        }

                        // Check if the cell already has an input field
                        let inputField = focusedCell.find('input');
                        if (inputField.length) {
                            // Trigger blur to save if input field is already active
                            inputField.blur();
                        } else {
                            let oldValue = cell.data();
                            let currentPage = table.page(); // Store current page before the reload

                            // Create and append an input field
                            let input = $('<input type="text" class="form-control" />')
                                .val(oldValue)
                                .appendTo(focusedCell.empty())
                                .focus()
                                .on('blur', function() {
                                    let newValue = $(this).val();
                                    cell.data(newValue).draw(); // Update the DataTable cell

                                    // Prepare data for server update
                                    let rowData = table.row(cell.index().row).data();

                                    // Map column index to actual column name
                                    let columnName;
                                    if ($(columnHeaders[columnIdx]).text().toLowerCase() === 'code') {
                                        columnName = 'code';
                                    } else if ($(columnHeaders[columnIdx]).text().toLowerCase() ===
                                        'name') {
                                        columnName = 'name';
                                    } else if ($(columnHeaders[columnIdx]).text().toLowerCase() ===
                                        'exchange rate') {
                                        columnName = 'exchange_rate';
                                    }

                                    // Send an AJAX request to update the server
                                    if (columnName) {
                                        $.ajax({
                                            url: "{{ route('countries.updateCountries') }}",
                                            type: "POST",
                                            data: {
                                                _token: "{{ csrf_token() }}",
                                                id: rowData.id,
                                                [columnName]: newValue
                                            },
                                            success: function(response) {
                                                if (response.success) {
                                                    table.ajax.reload(function() {
                                                            // After reload, set the table back to the previous page
                                                            table.page(currentPage)
                                                                .draw(
                                                                    false
                                                                ); // false: keeps the current page
                                                        },
                                                        false
                                                    ); // false: keeps the current page
                                                } else {
                                                    alert(response.message);
                                                    cell.data(oldValue)
                                                        .draw(); // Revert on failure
                                                }
                                            },
                                        });
                                    }
                                });
                        }
                    }
                });



                // Return the table instance in case you need to interact with it later
                return table;
            }

            loadLeadSourcesGridView(); // Initial load

            // Select/Deselect All Checkboxes
            $('#select-all').on('click', function() {
                let isChecked = $(this).is(':checked');
                $('.currency-checkbox').prop('checked', isChecked);
                toggleDeleteButton();
            });

            $('#currencies-table').on('change', '.currency-checkbox', function() {
                toggleDeleteButton();
            });

            // Toggle Delete Button Visibility
            function toggleDeleteButton() {
                let anyChecked = $('.currency-checkbox:checked').length > 0;
                $('#delete-button').toggle(anyChecked);
            }

            $('#toggleTab').click(function() {
                const isGridActive = $('#grid').hasClass('show');

                // Toggle between Grid and List views
                if (isGridActive) {
                    $('#grid').removeClass('show active');
                    $('#list').addClass('show active');
                    $(this).html('<i class="bi bi-list"></i>Grid View');
                    loadLeadSourcesDataTable();

                } else {
                    $('#list').removeClass('show active');
                    $('#grid').addClass('show active');
                    $(this).html('<i class="bi bi-grid"></i>List View');
                    currentPage = 1;
                    loadLeadSourcesGridView(false, null, 1);
                }
            });
        });
    </script>
@endpush
