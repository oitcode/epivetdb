<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/* Other related models. */
use App\Disease;

class DiseaseController extends Controller
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
     * Show create disease form page.
     *
     * @return Response
     */
    public function showDiseaseCreatePage()
    {
        return view('admin.create-disease');
    }

    /**
     * Process disease create form.
     *
     * @return Response
     */
    public function diseaseCreateProcess(Request $request)
    {
        /* Todo: Validate input. */


        /* Create new disease object. */
        $newDisease = new Disease;

        $newDisease->name = $request->input('disease_name');
        $newDisease->short_name = $request->input('short_name');
        $newDisease->code = $request->input('disease_code');
        $newDisease->comment = $request->input('disease_comment');
        $newDisease->creator_id = auth()->user()->id;

        /* Save new disease to database. */
        /* Todo: Some try catch exception handling. */
        $newDisease->save();

        /* Flash success message and redirect. */
	      $request->session()->flash('status', 'Success: Disease Created!');
        return redirect('/admin');
    }

    /**
     * List diseases.
     *
     * @return \Illuminate\Http\Response
     */
    public function listDiseases()
    {
        $diseases = Disease::all();

        return view('admin.list-diseases')
            ->with('diseases', $diseases);
    }
}
