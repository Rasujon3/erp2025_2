<?php

namespace App\Modules\Financial\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Common\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Modules\Common\Repositories\CurrencyRepository;
use App\Modules\Common\Requests\CurrencyRequest;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;
use App\Modules\Common\Queries\CurrencyDatatable;

class FinancialController extends Controller
{



    public function index()
    {

        return view('financial::index');
    }
}
