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

            /**
             * Get reports based on user search input.
             */

            $reports = DiseaseReport::all();
            if ($request->input('local_body_name')) {
                $reports = $reports->where('local_body_id', $request->input('local_body_name'));
            }
            if ($request->input('animal_id')) {
                $reports = $reports->where('animal_id', $request->input('animal_id'));
            }
            if ($request->input('disease_id')) {
                $reports = $reports->where('disease_id', $request->input('disease_id'));
            }

            return view('admin.report-page')
                ->with('states', $states)
                ->with('districts', $districts)
                ->with('animals', $animals)
                ->with('diseases', $diseases)
                ->with('reports', $reports);
        }
    }
}
