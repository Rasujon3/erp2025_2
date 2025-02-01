<?php

namespace App\Modules\Admin\Repositories;

use App\Modules\Admin\Models\Country;
use App\Helpers\ActivityLogger;

class CountryRepository
{

    public function getFilteredQuery($filters)
    {
        $query = Country::query();

        if (isset($filters['search']) && !empty($filters['search'])) {
            $search = $filters['search'];
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('code', 'like', "%{$search}%");
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
            }
        }

        return $query;
    }
    public function getSummaryData()
    {
        $countries = Country::withTrashed()->get(); // Load all records including soft-deleted

        $totalDraft = $countries->where('draft', true)->count();
        $totalInactive = $countries->where('is_active', false)->count();
        $totalActive = $countries->where('is_active', true)->count();
        $totalDeleted = $countries->whereNotNull('deleted_at')->count();
        $totalUpdated = $countries->whereNotNull('updated_at')->count();

        // Ensure totalCountries is the sum of totalDraft + totalInactive + totalActive
        $totalCountries = $totalDraft + $totalInactive + $totalActive+ $totalDeleted;

        return [
            'totalCountries' => $totalCountries,
            'totalDraft' => $totalDraft,
            'totalInactive' => $totalInactive,
            'totalActive' => $totalActive,
            'totalUpdated' => $totalUpdated,
            'totalDeleted' => $totalDeleted,
        ];
    }
    public function all()
    {
        return Country::all();
    }

    public function store(array $data): Country
    {
        // Convert checkbox values to boolean (1 or 0)
        $data['is_default'] = isset($data['is_default']) && $data['is_default'] === 'on' ? 1 : 0;
        $data['draft'] = isset($data['draft']) && $data['draft'] === 'on' ? 1 : 0;
        $data['is_active'] = isset($data['is_active']) && $data['is_active'] === 'on' ? 1 : 0;

        // Set drafted_at timestamp if it's a draft
        if ($data['draft'] === 1) {
            $data['drafted_at'] = now();
        }

        // Handle file upload for 'flag'
        if (isset($data['flag']) && $data['flag'] instanceof \Illuminate\Http\UploadedFile) {
            // Define the directory path
            $directory = public_path('files/images/country');

            // Ensure the directory exists
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Generate a unique file name
            $fileName = uniqid('flag_', true) . '.' . $data['flag']->getClientOriginalExtension();

            // Move the file to the destination directory
            $data['flag']->move($directory, $fileName);

            // Save only the file name in the database
            $data['flag'] = $fileName;
        }

        // Create the country record in the database
        $country = Country::create($data);

        // Log activity
        ActivityLogger::log('Country Add', 'Country', 'Country', $country->id, ['name' => $country->name ?? '', 'code' => $country->code ?? '']);

        return $country;
    }
    public function update(Country $country, array $data): Country
    {
        // Convert checkbox values to boolean (1 or 0)
        $data['is_default'] = isset($data['is_default']) && $data['is_default'] === 'on' ? 1 : 0;
        $data['draft'] = isset($data['draft']) && $data['draft'] === 'on' ? 1 : 0;
        $data['is_active'] = isset($data['is_active']) && $data['is_active'] === 'on' ? 1 : 0;

        // Set drafted_at timestamp if it's a draft
        if ($data['draft'] === 1) {
            $data['drafted_at'] = now();
        }

        // Handle file upload for 'flag'
        if (isset($data['flag']) && $data['flag'] instanceof \Illuminate\Http\UploadedFile) {
            $directory = public_path('files/images/country');

            // Ensure the directory exists
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }

            // Generate a unique file name
            $fileName = uniqid('flag_', true) . '.' . $data['flag']->getClientOriginalExtension();

            // Delete the old image if it exists
            if ($country->flag && file_exists(public_path("files/images/country/{$country->flag}"))) {
                unlink(public_path("files/images/country/{$country->flag}"));
            }

            // Move the new file to the destination directory
            $data['flag']->move($directory, $fileName);
            $data['flag'] = $fileName;
        }

        // Perform the update
        $country->update($data);

        // Delete the record if 'is_delete' is set to 'on'
        if (!empty($data['is_delete']) && $data['is_delete'] === 'on') {
            $country->delete(); // Soft delete (set deleted_at timestamp)
        }

        // Log activity
        ActivityLogger::log('Country Update', 'Country', 'Country', $country->id, ['name' => $country->name]);

        return $country;
    }

    public function updateFromDataTable(array $data)
    {
        $country = Country::find($data['id'] ?? null);
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

    public function delete(Country $country)
    {

        if ($country->flag && file_exists(public_path('files/images/country/' . $country->flag))) {
            unlink(public_path('files/images/country/' . $country->flag));
        }
        ActivityLogger::log('Country Deleted', 'Country', 'Country', $country->id, ['name' => $country->name ?? '', 'code' => $country->code ?? '']);
        return $country->delete();
    }

    public function find($id)
    {
        return Country::findOrFail($id);
    }
}
