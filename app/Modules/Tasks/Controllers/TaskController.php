<?php

namespace App\Modules\Tasks\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Common\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Modules\Common\Repositories\CurrencyRepository;
use App\Modules\Common\Requests\CurrencyRequest;
use Laracasts\Flash\Flash;
use Yajra\DataTables\Facades\DataTables;
use App\Modules\Common\Queries\CurrencyDatatable;

class TaskController extends Controller
{



    public function index()
    {

        return view('tasks::index');
    }
}
