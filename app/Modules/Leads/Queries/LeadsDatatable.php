<?php

namespace App\Modules\Leads\Queries;

use App\Modules\Leads\Models\Lead;
use App\Modules\Leads\Models\LeadSource;
use App\Modules\Leads\Models\LeadStatus;
use App\Modules\Leads\Repositories\LeadSourceRepository;
use App\Modules\Leads\Repositories\LeadsRepository;
use App\Modules\Leads\Repositories\LeadStatusRepository;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;



class LeadsDatatable
{
    protected $leadsRepository;
    public function __construct(LeadsRepository $leadsRepository)
    {
        $this->leadsRepository = $leadsRepository;
    }
    public function getGridData($request)
    {
        try {
            $filters = $request->only(['search', 'filter']);
            $page = !empty($filters['search']) ? 1 : $request->input('page', 1); // Reset page to 1 if search exists
            $perPage = 24;

            $query = $this->leadsRepository->getFilteredQuery($filters);
            $query->skip(($page - 1) * $perPage)->take($perPage);

            $leads = $query->select(['id', 'name', 'priority', 'mobile'])
                ->orderBy('updated_at', 'desc')
                ->get();

            $response = DataTables::of($leads)
                ->make(true);

            return $response;
        }  catch (\Exception $e) {
            // Log the error
            Log::error('Error preparing DataTables data: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            // Rethrow the exception to propagate it to the caller
            throw $e;
        }
    }

    public static function getDataForDatatable()
    {
        try {
            // Fetch lead sources from the database
            $leadSources = Lead::select(['id', 'name', 'priority', 'mobile']);

            // Return the data as a DataTables response
            return DataTables::of($leadSources)->make(true);
        } catch (\Exception $e) {
            // Log the error
            Log::error('Error preparing DataTables data: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            // Rethrow the exception to propagate it to the caller
            throw $e;
        }
    }
}
