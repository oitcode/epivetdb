<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('operator.form-display');
    }
}
