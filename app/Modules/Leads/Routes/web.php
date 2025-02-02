<?php

use App\Modules\Leads\Controllers\LeadSourceController;
use Illuminate\Support\Facades\Route;


Route::prefix('/admin')->group(function () {
    // Lead Sources Routes
    Route::prefix('lead-sources')->group(function () {
        Route::get('/', [LeadSourceController::class, 'index'])->name('lead.source.index');
        Route::get('create', [LeadSourceController::class, 'create'])->name('lead.source.create');
        Route::post('/', [LeadSourceController::class, 'store'])->name('lead.source.store');
        Route::get('{leadSource}/edit', [LeadSourceController::class, 'edit'])->name('lead.source.edit');
        Route::put('{leadSource}', [LeadSourceController::class, 'update'])->name('lead.source.update');
        Route::delete('{leadSource}', [LeadSourceController::class, 'destroy'])->name('lead.source.destroy');
        Route::get('/{leadSource}/view', [LeadSourceController::class, 'view'])->name('lead.source.view');
        Route::get('/data', [LeadSourceController::class, 'getGridView'])->name('lead.source.grid-view');
        Route::get('/all-lead-sources', [LeadSourceController::class, 'getAllLeadSources'])->name('lead.source.getAllLeadSources');
    });
});
