<?php

use App\Modules\Leads\Controllers\LeadController;
use App\Modules\Leads\Controllers\LeadSourceController;
use App\Modules\Leads\Controllers\LeadStatusController;
use Illuminate\Support\Facades\Route;


Route::prefix('/admin')->group(function () {
    // Lead Status Routes
    Route::prefix('lead-status')->group(function () {
        Route::get('/', [LeadStatusController::class, 'index'])->name('lead.status.index');
        Route::get('/create', [LeadStatusController::class, 'create'])->name('lead.status.create');
        Route::post('/', [LeadStatusController::class, 'store'])->name('lead.status.store');
        Route::get('{leadStatus}/edit', [LeadStatusController::class, 'edit'])->name('lead.status.edit');
        Route::put('{leadStatus}', [LeadStatusController::class, 'update'])->name('lead.status.update');
        Route::delete('{leadStatus}', [LeadStatusController::class, 'destroy'])->name('lead.status.destroy');

        Route::get('/{leadStatus}/view', [LeadStatusController::class, 'view'])->name('lead.status.view');
        Route::get('/data', [LeadStatusController::class, 'getGridView'])->name('lead.status.grid-view');
        Route::get('/all-lead-statuses', [LeadStatusController::class, 'getAllLeadStatuses'])->name('lead.status.getAllLeadStatuses');
    });

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

    // Leads Routes
    Route::prefix('leads')->group(function () {
        Route::get('/', [LeadController::class, 'index'])->name('leads.index');
        Route::get('create/{customerId?}', [LeadController::class, 'create'])->name('leads.create');
        Route::post('/', [LeadController::class, 'store'])->name('leads.store');
        // Route::get('leads/{lead}', [LeadController::class, 'show'])->name('leads.show');
        Route::get('{lead}/view', [LeadController::class, 'view'])->name('leads.show');
        Route::get('{lead}/edit', [LeadController::class, 'edit'])->name('leads.edit');
        Route::put('{lead}', [LeadController::class, 'update'])->name('leads.update');
        Route::delete('{lead}', [LeadController::class, 'destroy'])->name('leads.destroy');


//        Route::put(
//            'leads/{lead}/status/{status}',
//            [LeadController::class, 'changeStatus']
//        )->name('leads.changeStatus');
//        Route::get('leads-kanban-list', [LeadController::class, 'kanbanList'])->name('leads.kanbanList');
//        Route::post(
//            'contact-as-per-customer',
//            [LeadController::class, 'contactAsPerCustomer']
//        )->name('leads.contactAsPerCustomer');
//        Route::get('leads/{lead}/{group}', [LeadController::class, 'show']);
//        Route::post(
//            'leads/{lead}/{group}/notes-count',
//            [LeadController::class, 'getNotesCount']
//        );
//        Route::post(
//            'lead-convert-customer',
//            [CustomerController::class, 'leadConvertToCustomer']
//        )->name('lead.convert.customer');
//        Route::get(
//            'leads-convert-chart',
//            [LeadController::class, 'leadConvertChart']
//        )->name('leads.leadConvertChart');

        Route::get('/{lead}/view', [LeadController::class, 'view'])->name('leads.view');
        Route::get('/data', [LeadController::class, 'getGridView'])->name('leads.grid-view');
        Route::get('/all-leads', [LeadController::class, 'getAllLeads'])->name('leads.getAllLeads');
    });
});
