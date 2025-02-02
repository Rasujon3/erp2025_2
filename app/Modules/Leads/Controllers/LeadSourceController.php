<?php

namespace App\Modules\Leads\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Country;
use App\Modules\Leads\Models\LeadSource;
use App\Modules\Leads\Queries\LeadSourceDatatable;
use App\Modules\Leads\Repositories\LeadSourceRepository;
use App\Modules\Leads\Requests\LeadSourceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use App\Modules\Admin\Repositories\CountryRepository;
use App\Modules\Admin\Requests\CountryRequest;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;
use App\Modules\Admin\Queries\CountryDatatable;
use App\Helpers\ActivityLogger;
use App\Http\Controllers\AppBaseController;

class LeadSourceController extends AppBaseController
{
    protected $leadSourceRepository;
    protected $leadSourceDatatable;

    // Inject the repository using the constructor
    public function __construct(LeadSourceRepository $leadSourceRepository, LeadSourceDatatable $leadSourceDatatable)
    {
        $this->leadSourceRepository = $leadSourceRepository;
        $this->leadSourceDatatable = $leadSourceDatatable;
    }

    public function getGridView(Request $request)
    {
        try {
            if ($request->ajax()) {
                return $this->leadSourceDatatable->getGridData($request);
            }
        }  catch (\Exception $e) {
            Log::error('Error fetching lead sources: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return response()->json(['error' => 'An unexpected error occurred while fetching lead sources. [LSC-001]'], 500);
        }
    }
    public function getAllLeadSources(Request $request)
    {
        try {
            if ($request->ajax()) {
                return LeadSourceDatatable::getDataForDatatable();
            }
            return response()->json(['error' => 'Invalid request type.'], 400);
        } catch (\Exception $e) {
            Log::error('Error fetching lead sources: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return response()->json(['error' => 'An unexpected error occurred while fetching lead sources. [LSC-002]'], 500);
        }
    }
    public function index()
    {
        return view('leads::leadSources.index');
    }

    public function create()
    {
        return view('leads::leadSources.create');
    }

    public function store(LeadSourceRequest $request)
    {
        try {
            // Delegate creation to repository
            $this->leadSourceRepository->store($request->validated());

            // Redirect with success message
            return redirect()->route('lead.source.index')->with('success', 'Lead Source created successfully!');
        } catch (\Exception $e) {
            // Log error with more details
            Log::error('Lead Source Store Error: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'input' => $request->all(),
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again. [LSC-003]');
        }
    }
    public function edit(LeadSource $leadSource)
    {
        try {
            return view('leads::leadSources.edit', compact('leadSource'));
        } catch (\Exception $e) {
            Log::error('Lead Source Edit Error: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again. [LSC-004]');
        }
    }
    public function updateCountry(Request $request)
    {
        $response = $this->leadSourceRepository->updateFromDataTable($request->all());
        return $this->sendResponse($response, 'Country updated successfully');
    }

    public function destroy(LeadSource $leadSource)
    {
        try {
            $this->leadSourceRepository->delete($leadSource);
            Flash::success('Lead Source deleted successfully!');
            return $this->sendSuccess('Lead Source deleted successfully');
        } catch (\Exception $e) {
            Log::error('Lead Source delete Error: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again. [LSC-005]');
        }
    }
    public function view(LeadSource $leadSource)
    {
        try {
            return view('leads::leadSources.view', compact(['leadSource']));
        } catch (\Exception $e) {
            Log::error('Lead Source View Error: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again. [LSC-006]');
        }
    }
    public function update(LeadSourceRequest $request, LeadSource $leadSource)
    {
        try {
            $this->leadSourceRepository->update($leadSource, $request->all());
            return redirect()->route('lead.source.index')->with('success', 'Lead Source updated successfully!');
        } catch (\Exception $e) {
            Log::error('Lead Source Update Error: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again. [LSC-007]');
        }
    }
}
