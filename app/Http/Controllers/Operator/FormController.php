<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/* Use related models. */
use App\State;
use App\District;
use App\LocalBody;

use App\Animal;
use App\Disease;

use App\DiseaseReport;

class FormController extends Controller
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
    }

    /**
     * Show the form page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showFormPage()
    {
        $states = State::all();
        $districts = District::all();

        $animals = Animal::all();
        $diseases = Disease::all();

        /* Recent report submissions */
        $recentReports = DiseaseReport::where('creator_id', auth()->user()->id)
                         ->take(5)
                         ->get();

        return view('operator.form-display')
            ->with('states', $states)
            ->with('districts', $districts)
            ->with('animals', $animals)
            ->with('diseases', $diseases)
            ->with('recentReports', $recentReports);
    }

    /**
     * Process the disease report form.
     *
     * @return \Illuminate\Http\Response
     */
    public function processReportForm(Request $request)
    {
        /* Todo: Validate input. */
        $validatedData = $request->validate([
            'date' => 'required|date',
            'local_body_name' => 'required',
            'disease_id' => 'required|integer',
            'animal_id' => 'required|integer',
            'num_of_outbreaks' => 'required|integer|min:0',
            'num_of_susceptible' => 'required|integer|min:0',
            'num_of_affected' => 'required|integer|min:0',
            'num_of_dead' => 'required|integer|min:0',
            'num_of_vaccinated' => 'required|integer|min:0',
            'num_of_treated' => 'required|integer|min:0',
            'reg_vacc' => 'required|integer|min:0',
            'outbreak_res_vacc' => 'required|integer|min:0',
            'destroyed' => 'required|integer|min:0',
        ]);

        $diseaseReport = new DiseaseReport;

        $diseaseReport->date = $request->input('date');
        $diseaseReport->local_body_id = $request->input('local_body_name');
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

        $diseaseReport->creator_id = auth()->user()->id;

        /* Todo: Catch any exception! */
        $diseaseReport->save();

        /* Flash success message and redirect. */
	      $request->session()->flash('status', 'Success: Disease Report Created!');
        return redirect('/dashboard');
    }
}
