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

        return view('operator.form-display')
            ->with('states', $states)
            ->with('districts', $districts)
            ->with('animals', $animals)
            ->with('diseases', $diseases);

    }
}
