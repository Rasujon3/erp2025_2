<?php

namespace App\Modules\Leads\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Country;
use App\Modules\Leads\Models\Lead;
use App\Modules\Leads\Models\LeadSource;
use App\Modules\Leads\Models\LeadStatus;
use App\Modules\Leads\Queries\LeadsDatatable;
use App\Modules\Leads\Queries\LeadSourceDatatable;
use App\Modules\Leads\Queries\LeadStatusDatatable;
use App\Modules\Leads\Repositories\LeadSourceRepository;
use App\Modules\Leads\Repositories\LeadsRepository;
use App\Modules\Leads\Repositories\LeadStatusRepository;
use App\Modules\Leads\Requests\LeadSourceRequest;
use App\Modules\Leads\Requests\LeadsRequest;
use App\Modules\Leads\Requests\LeadStatusRequest;
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

class LeadController extends AppBaseController
{
    protected $leadsRepository;
    protected $leadsDatatable;

    // Inject the repository using the constructor
    public function __construct(LeadsRepository $leadsRepository, LeadsDatatable $leadsDatatable)
    {
        $this->leadsRepository = $leadsRepository;
        $this->leadsDatatable = $leadsDatatable;
    }

    public function getGridView(Request $request)
    {
        try {
            if ($request->ajax()) {
//                dd('$this->leadsDatatable->getGridData($request)',$this->leadsDatatable->getGridData($request));
                return $this->leadsDatatable->getGridData($request);
            }
        }  catch (\Exception $e) {
            Log::error('Error fetching lead sources: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return response()->json(['error' => 'An unexpected error occurred while fetching lead sources. [LSSC-001]'], 500);
        }
    }
    public function getAllLeads(Request $request)
    {
        try {
            if ($request->ajax()) {
                return LeadsDatatable::getDataForDatatable();
            }
            return response()->json(['error' => 'Invalid request type.'], 400);
        } catch (\Exception $e) {
            Log::error('Error fetching lead sources: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return response()->json(['error' => 'An unexpected error occurred while fetching lead sources. [LSSC-002]'], 500);
        }
    }
    public function index()
    {
        return view('leads::leads.index');
    }

    public function create()
    {
        return view('leads::leads.create');
    }

    public function store(LeadsRequest $request)
    {
        try {
            // Delegate creation to repository
            $this->leadsRepository->store($request->all());

            // Redirect with success message
            return redirect()->route('lead.status.index')->with('success', 'Lead Status created successfully!');
        } catch (\Exception $e) {
            // Log error with more details
            Log::error('Lead Status Store Error: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'input' => $request->all(),
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again. [LSSC-003]');
        }
    }
    public function edit(LeadStatus $leadStatus)
    {
        try {
            return view('leads::leads.edit', compact('leadStatus'));
        } catch (\Exception $e) {
            Log::error('Lead Status Edit Error: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again. [LSSC-004]');
        }
    }
    public function updateCountry(Request $request)
    {
        $response = $this->leadsRepository->updateFromDataTable($request->all());
        return $this->sendResponse($response, 'Country updated successfully');
    }

    public function destroy(Lead $lead)
    {
        try {
            $this->leadsRepository->delete($lead);
            Flash::success('Lead deleted successfully!');
            return $this->sendSuccess('Lead deleted successfully');
        } catch (\Exception $e) {
            Log::error('Lead delete Error: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again. [LSSC-005]');
        }
    }
    public function view(LeadStatus $leadStatus)
    {
        try {
            return view('leads::leads.view', compact(['leadStatus']));
        } catch (\Exception $e) {
            Log::error('Lead Status View Error: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again. [LSSC-006]');
        }
    }
    public function update(LeadsRequest $request, Lead $lead)
    {
        try {
            $this->leadsRepository->update($lead, $request->all());
            return redirect()->route('lead.status.index')->with('success', 'Lead Status updated successfully!');
        } catch (\Exception $e) {
            Log::error('Lead Status Update Error: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again. [LSSC-007]');
        }
    }
}
