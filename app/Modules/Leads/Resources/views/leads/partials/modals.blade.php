<!-- Modal for displaying/editing currency details -->
<div class="modal fade" id="currencyDetailsModal" tabindex="-1" aria-labelledby="currencyDetailsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="currencyDetailsLabel">Add Currency</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Currency details form or information -->
                <form id="currencyDetailsForm" enctype="multipart/form-data">
                    <!-- Currency Code -->
                    <div class="mb-3">
                        <label for="currencyCode" class="form-label">Currency Code</label>
                        <input type="text" class="form-control" id="currencyCode">
                    </div>

                    <!-- Currency Name -->
                    <div class="mb-3">
                        <label for="currencyName" class="form-label">Currency Name</label>
                        <input type="text" class="form-control" id="currencyName">
                    </div>

                    <!-- Currency Symbol Image (File Input) -->
                    <div class="mb-3">
                        <label for="currencySymbolImage" class="form-label">Currency Symbol Image</label>
                        <input type="file" class="form-control" id="currencySymbolImage" name="currencySymbolImage"
                            accept="image/*">
                        <!-- Display selected image -->
                        <div id="imagePreviewContainer" class="mt-2" style="display: none;">
                            <img id="imagePreview" src="" alt="Currency Symbol"
                                style="max-width: 100px; height: auto;" />
                        </div>
                    </div>

                    <!-- Currency Status -->
                    <div class="mb-3">
                        <label for="currencyStatus" class="form-label">Status</label>
                        <select class="form-select" id="currencyStatus">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>

                    <!-- Currency Draft -->
                    <div class="mb-3">
                        <label for="currencyDraft" class="form-label">Draft Status</label>
                        <select class="form-select" id="currencyDraft">
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>



                    <!-- Buttons for saving or closing -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" id="saveCurrencyDetails">Submit</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
