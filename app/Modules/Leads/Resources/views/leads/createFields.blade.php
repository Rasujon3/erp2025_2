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
<div class="form-group col-sm-12">
    <label for="color">Status Color:<span class="required-star">*</span></label>
    <div class="color-wrapper" style="width: 30px; height: 30px; border: 1px solid #ccc; border-radius: 50%; cursor: pointer;"></div>
    <input type="text" name="color" id="color" hidden class="form-control color" placeholder="Status Color">
    @error('color')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
<!-- Order -->
<div class="col-md-6 mb-4 position-relative">
    <div class="input-group mb-3">
        <div class="form-floating flex-grow-1">
            <input type="number" min="0" step="1" max="100" class="form-control rounded-start" id="order" name="order"
                   placeholder="Enter Order" required>
            <label for="order">Order</label>
        </div>
    </div>
    @error('order')
    <div class="text-danger">{{ $message }}</div>
    @enderror
</div>
