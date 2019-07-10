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

            // Total array
            $total = [
                'totalNumOfOutbreaks' => 0,
                'totalNumOfSusceptible' => 0,
                'totalNumOfAffected' => 0,
                'totalNumOfDead' => 0,
                'totalNumOfVaccinated' => 0,
                'totalNumOfTreated' => 0,
                'totalRegVacc' => 0,
                'totalOutbreakResVacc' => 0,
                'totalDestroyed' => 0,
            ];

            foreach ($reports as $report) {
                $total['totalNumOfOutbreaks'] += $report->num_of_outbreaks;
                $total['totalNumOfSusceptible'] += $report->num_of_susceptible;
                $total['totalNumOfAffected'] += $report->num_of_affected;
                $total['totalNumOfDead'] += $report->num_of_dead;
                $total['totalNumOfVaccinated'] += $report->num_of_vaccinated;
                $total['totalNumOfTreated'] += $report->num_of_treated;
                $total['totalRegVacc'] += $report->reg_vacc;
                $total['totalOutbreakResVacc'] += $report->outbreak_res_vacc;
                $total['totalDestroyed'] += $report->destroyed;
            }

            return view('admin.report-page')
                ->with('states', $states)
                ->with('districts', $districts)
                ->with('animals', $animals)
                ->with('diseases', $diseases)
                ->with('reports', $reports)
                ->with('total', $total);
        }
    }
}
