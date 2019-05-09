<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/* Use related models. */
use App\Status;

class StatusController extends Controller
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
     * Show create status form page.
     *
     * @return Response
     */
    public function showStatusCreatePage()
    {
        return view('admin.create-status');
    }

    /**
     * Process status create form.
     *
     * @return Response
     */
    public function statusCreateProcess(Request $request)
    {
        /* Todo: Validate input. */


        /* Create new status object. */
        $newStatus = new Status;

        $newStatus->name = $request->input('status_name');
        $newStatus->comment = $request->input('status_comment');
        $newStatus->creator_id = auth()->user()->id;

        /* Save new status to database. */
        /* Todo: Some try catch exception handling. */
        $newStatus->save();

        /* Flash success message and redirect. */
	      $request->session()->flash('status', 'Success: Status Created!');
        return redirect('/admin');
    }

    /**
     * List Statuses.
     *
     * @return \Illuminate\Http\Response
     */
    public function listStatuses()
    {
        $statuses = Status::all();

        return view('admin.list-statuses')
            ->with('statuses', $statuses);
    }
}
