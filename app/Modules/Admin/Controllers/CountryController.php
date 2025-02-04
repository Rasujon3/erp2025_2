<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Admin\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Modules\Admin\Repositories\CountryRepository;
use App\Modules\Admin\Requests\CountryRequest;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;
use App\Modules\Admin\Queries\CountryDatatable;
use App\Helpers\ActivityLogger;
use App\Http\Controllers\AppBaseController;

class CountryController extends AppBaseController
{

    protected $countryRepository;
    protected $countryDatatable;

    // Inject the repository using the constructor
    public function __construct(CountryRepository $countryRepo, CountryDatatable $countryDatatable)
    {
        $this->countryRepository = $countryRepo;
        $this->countryDatatable = $countryDatatable;
    }

    public function getGridView(Request $request)
    {
        if ($request->ajax()) {
            return $this->countryDatatable->getGridData($request);
        }
    }
    public function getCountriesDataTable(Request $request)
    {
        if ($request->ajax() && $request->ajax()) {
            return CountryDatatable::getDataForDatatable();
        }
    }
    public function index()
    {
        // Fetch currencies using the repository
        $currencies = $this->countryRepository->all();
        return view('admin::countries.index', compact('currencies'));
    }

    public function create()
    {
        return view('admin::countries.create');
    }

    public function store(CountryRequest $request)
    {
        $this->countryRepository->store($request->all());
        return redirect()->route('countries.index')->with('success', 'Country created successfully!');
    }
    public function edit(Country $country)
    {
        return view('admin::countries.edit', compact('country'));
    }
    public function updateCountry(Request $request)
    {
        $response = $this->countryRepository->updateFromDataTable($request->all());
        return $this->sendResponse($response, 'Country updated successfully');
    }

    public function destroy(Country $country)
    {

        $country = $this->countryRepository->delete($country);
        Flash::success('Country deleted successfully!');
        return $this->sendSuccess('Country deleted successfully');
    }
    public function view(Country $country)
    {

        return view('admin::countries.view', compact(['country']));
    }
    public function update(CountryRequest $request, Country $country)
    {
        $this->countryRepository->update($country, $request->all());
        return redirect()->route('countries.index')->with('success', 'Country updated successfully!');
    }
}
