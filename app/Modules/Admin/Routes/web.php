<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Admin\Controllers\AdminController;
use App\Modules\Admin\Controllers\CountryController;


Route::prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    // Admin Countries Routes
    Route::prefix('countries')->group(function () {
        Route::get('/', [CountryController::class, 'index'])->name('countries.index');
        Route::get('create', [CountryController::class, 'create'])->name('countries.create');
        Route::post('/', [CountryController::class, 'store'])->name('countries.store');
        Route::get('{country}/edit', [CountryController::class, 'edit'])->name('countries.edit');
        Route::put('{country}', [CountryController::class, 'update'])->name('countries.update');
        Route::delete('{country}', [CountryController::class, 'destroy'])->name('countries.destroy');
        Route::get('/{country}/view', [CountryController::class, 'view'])->name('countries.view');
        Route::get('/data', [CountryController::class, 'getGridView'])->name('countries.grid-view');
        Route::get('/all-country', [CountryController::class, 'getCountriesDataTable'])->name('countries.getCountries');
        Route::post('/update-country', [CountryController::class, 'updateCountry'])->name('countries.updateCountries');
    });
});
