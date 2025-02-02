<?php

namespace App\Modules\Leads\Repositories;

use App\Modules\Admin\Models\Country;
use App\Helpers\ActivityLogger;
use App\Modules\Leads\Models\LeadSource;
use Illuminate\Support\Facades\Log;

class LeadSourceRepository
{

    public function getFilteredQuery($filters)
    {
        try {
            $query = LeadSource::query();

            if (isset($filters['search']) && !empty($filters['search'])) {
                $search = $filters['search'];
                $query->where('name', 'like', "%{$search}%");
            }

            if (isset($filters['filter']) && !empty($filters['filter'])) {
                switch ($filters['filter']) {
                    case 'daily':
                        $query->whereDate('created_at', now()->toDateString());
                        break;
                    case 'weekly':
                        $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
                        break;
                    case 'monthly':
                        $query->whereMonth('created_at', now()->month);
                        break;
                    case 'yearly':
                        $query->whereYear('created_at', now()->year);
                        break;
                    default:
                        Log::warning("Unsupported filter value: {$filters['filter']}");
                        break;
                }
            }

            return $query;
        } catch (\Exception $e) {
            Log::error('Error building filtered query: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'filters' => $filters,
            ]);
            throw $e;
        }
    }
    public function all()
    {
        return LeadSource::all();
    }

    public function store(array $data): LeadSource
    {
        try {
            // Create Lead Source record
            $leadSource = LeadSource::create($data);

            // Log activity
            ActivityLogger::log('Lead Source Add', 'Leads', 'LeadSource', $leadSource->id, ['name' => $leadSource->name]);

            return $leadSource;
        } catch (\Exception $e) {
            // Log error in repository and rethrow it to the controller
            Log::error('Lead Source Store Error on repository: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'data' => $data, // Log actual data being saved
            ]);

            throw $e; // Re-throw the exception so the controller can handle it
        }
    }
    public function update(LeadSource $leadSource, array $data): LeadSource
    {
        try {
            // Perform the update
            $leadSource->update($data);

            // Log activity
            ActivityLogger::log('Lead Source Update', 'Leads', 'LeadSource', $leadSource->id, ['name' => $leadSource->name]);

            return $leadSource;
        } catch (\Exception $e) {
            // Log error in repository and rethrow it to the controller
            Log::error('Lead Source Update Error on repository: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'data' => $data, // Log actual data being saved
            ]);

            throw $e; // Re-throw the exception so the controller can handle it
        }
    }

    public function updateFromDataTable(array $data)
    {
        $country = LeadSource::find($data['id'] ?? null);
        if (!$country) {
            return ['success' => false, 'message' => 'Country not found'];
        }
        // Update only specific fields
        $country->update([
            'code' => $data['code'] ?? $country->code,
            'name' => $data['name'] ?? $country->name,
        ]);
        ActivityLogger::log('Country Updated', 'Country', 'Country', $country->id, [
            'name' => $country->name,
            'code' => $country->code,
        ]);
        return $country;
    }

    public function delete(LeadSource $leadSource)
    {
        try {
            ActivityLogger::log('Lead Source Deleted', 'Lead Source', 'LeadSource', $leadSource->id, ['name' => $leadSource->name ?? '']);
            return $leadSource->delete();
        }  catch (\Exception $e) {
            // Log error in repository and rethrow it to the controller
            Log::error('Lead Source delete Error on repository: ' . $e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
                'data' => $leadSource, // Log actual data being deleted
            ]);

            throw $e; // Re-throw the exception so the controller can handle it
        }
    }

    public function find($id)
    {
        return LeadSource::findOrFail($id);
    }
}
