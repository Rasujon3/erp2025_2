<?php

namespace App\Modules\Leads\Queries;

use App\Modules\Leads\Models\LeadSource;
use App\Modules\Leads\Models\LeadStatus;
use App\Modules\Leads\Repositories\LeadSourceRepository;
use App\Modules\Leads\Repositories\LeadStatusRepository;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;



class LeadStatusDatatable
{
    protected $leadStatusRepository;
    public function __construct(LeadStatusRepository $leadStatusRepository)
    {
        $this->leadStatusRepository = $leadStatusRepository;
    }
    public function getGridData($request)
    {
        try {
            $filters = $request->only(['search', 'filter']);
            $page = !empty($filters['search']) ? 1 : $request->input('page', 1); // Reset page to 1 if search exists
            $perPage = 24;

            $query = $this->leadStatusRepository->getFilteredQuery($filters);
            $query->skip(($page - 1) * $perPage)->take($perPage);

            $leadStatuses = $query->select(['id', 'name', 'color', 'order'])
                ->orderBy('updated_at', 'desc')
                ->get();

            $response = DataTables::of($leadStatuses)
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
            $leadSources = LeadStatus::select(['id', 'name', 'color', 'order']);

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
