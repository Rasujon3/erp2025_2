<?php

namespace App\Modules\Leads\Queries;

use App\Modules\Leads\Models\LeadSource;
use App\Modules\Leads\Repositories\LeadSourceRepository;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;



class LeadSourceDatatable
{
    protected $leadSourceRepository;
    public function __construct(LeadSourceRepository $leadSourceRepository)
    {
        $this->leadSourceRepository = $leadSourceRepository;
    }
    public function getGridData($request)
    {
        try {
            $filters = $request->only(['search', 'filter']);
            $page = !empty($filters['search']) ? 1 : $request->input('page', 1); // Reset page to 1 if search exists
            $perPage = 24;

            $query = $this->leadSourceRepository->getFilteredQuery($filters);
            $query->skip(($page - 1) * $perPage)->take($perPage);

            $leadSources = $query->select(['id', 'name'])
                ->orderBy('updated_at', 'desc')
                ->get();

            $response = DataTables::of($leadSources)
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
            $leadSources = LeadSource::select(['id', 'name']);

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
