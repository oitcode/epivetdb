<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/* Use related models. */
use App\State;
use App\District;
use App\LocalBody;

class AddressController extends Controller
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
     * Show address form page.
     *
     * @return Response
     */
    public function showAddressForm()
    {
        $states = State::all();
        $districts = District::all();

        return view('admin.input-address')
            ->with('states', $states)
            ->with('districts', $districts);
    }

    /**
     * Process address.
     *
     * @return Response
     */
    public function inputAddressProcess(Request $request)
    {
        echo "State " . $request->input('state_name') . "<br />";
        echo "District " . $request->input('district_name') . "<br />";
        echo "Body " . $request->input('local_body_name') . "<br />";

        die();
    }
}
