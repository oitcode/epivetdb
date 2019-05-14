<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/* Use related models. */
use App\State;
use App\District;
use App\LocalBody;

use App\Animal;
use App\Disease;

use App\DiseaseReport;

class ReportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /* Only for authenticated users. */
        $this->middleware('auth');

        /* Only for admin. */
        $this->middleware('is_admin');
    }

    /**
     * Show report page.
     *
     * @return Response
     */
    public function showReportPage(Request $request)
    {
        $states = State::all();
        $districts = District::all();

        $animals = Animal::all();
        $diseases = Disease::all();

        if ($request->isMethod('get')) {
            return view('admin.report-page')
                ->with('states', $states)
                ->with('districts', $districts)
                ->with('animals', $animals)
                ->with('diseases', $diseases);
        } else if ($request->isMethod('post')) {
            /* Todo: Validate input. */

            $reports = DiseaseReport::where('disease_id', $request->input('disease_id'))->get();

            return view('admin.report-page')
                ->with('states', $states)
                ->with('districts', $districts)
                ->with('animals', $animals)
                ->with('diseases', $diseases)
                ->with('reports', $reports);
        }
    }
}
