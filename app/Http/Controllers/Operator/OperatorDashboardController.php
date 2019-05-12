<?php

namespace App\Http\Controllers\Operator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OperatorDashboardController extends Controller
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
     * Show the operator dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showOperatorDashboard()
    {
        return view('operator.dashboard');
    }
}
