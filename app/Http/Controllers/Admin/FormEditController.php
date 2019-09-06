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

class FormEditController extends Controller
{
    /* Display form to edit. */
    public function displayFormForEdit($reportId)
    {
        $states = State::all();
        $districts = District::all();

        $animals = Animal::all();
        $diseases = Disease::all();

        /* Report to edit */
        $report = DiseaseReport::find($reportId);

        return view('admin.form-edit-display')
            ->with('states', $states)
            ->with('districts', $districts)
            ->with('animals', $animals)
            ->with('diseases', $diseases)
            ->with('report', $report);
    }

    /* Process the edited form. */
    public function processEditedForm(Request $request)
    {
        /* Todo: Validate input */

        //die("Comment: " . $request->input('comment'));

      
        /* Update with new values. */
        $diseaseReport = DiseaseReport::find($request->input('disease_report_id'));

        $diseaseReport->date = $request->input('date');
        $diseaseReport->disease_id = $request->input('disease_id');
        $diseaseReport->animal_id = $request->input('animal_id');

        $diseaseReport->num_of_outbreaks = $request->input('num_of_outbreaks');
        $diseaseReport->num_of_susceptible = $request->input('num_of_susceptible');
        $diseaseReport->num_of_affected = $request->input('num_of_affected');
        $diseaseReport->num_of_dead = $request->input('num_of_dead');
        $diseaseReport->num_of_vaccinated = $request->input('num_of_vaccinated');
        $diseaseReport->num_of_treated = $request->input('num_of_treated');

        $diseaseReport->reg_vacc = $request->input('reg_vacc');
        $diseaseReport->outbreak_res_vacc = $request->input('outbreak_res_vacc');
        $diseaseReport->destroyed = $request->input('destroyed');

        $diseaseReport->comment = $request->input('comment');

        /* Todo: Catch any exception! */
        $diseaseReport->save();

        /* Flash success message and redirect. */
	      $request->session()->flash('status', 'Success: Disease Report Edited!');
        return redirect('/dashboard');
    }
}
