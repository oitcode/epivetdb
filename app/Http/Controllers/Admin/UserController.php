<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;
use App\State;
use App\District;
use App\LocalBody;

class UserController extends Controller
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
     * List users.
     *
     * @return \Illuminate\Http\Response
     */
    public function listUsers()
    {
        $users = User::all();

        return view('admin.list-users')
            ->with('users', $users);
    }

    /**
     * Change user password.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeUserPw(Request $request)
    {
        if ($request->isMethod('get')) {
            /*
             * Just show the form for a get request.
             */
            return view('admin.change-userpw');
        } else if ($request->isMethod('post')) {
            /*
             * Process the form for a post request.
             */

            /* Todo: Validate input. */

            $user = User::where('email', $request->input('email'))->first();

            /* If user not found.*/
            if (! $user) {
                /* Todo: Do something sensible. */
                die("User not found!");
            }

            /* Change password in db. */
            $user->password = bcrypt($request->input('newpass'));
            $user->save();

            /* Flash success message and reload the page. */
	          $request->session()->flash('status', 'Success: Password changed!');
            return redirect('/admin/changeupw');
        }
    }

    /**
     * Filter users.
     *
     * @return \Illuminate\Http\Response
     */
    public function filterUsers(Request $request)
    {
        if ($request->isMethod('get')) {
            /*
             * Just show the form for a get request.
             */
            return view('admin.filter-users');
        } else if ($request->isMethod('post')) {
            /*
             * Process the form for a post request.
             */

            /* Todo: Validate input. */

            $state = State::where('name', $request->input('state'))->first();
            $districts = $state->districts;

            $users = collect();

            foreach ($districts as $district) {
                $localBodies = $district->local_bodies;

                foreach ($localBodies as $localBody) {
                    $usersInLocalBody = $localBody->users; 
                    foreach ($usersInLocalBody as $userInLocalBody) {
                        $users->push($userInLocalBody);
                    }
                }
            }


            /* Flash success message and reload the page. */
            return view('admin.filter-users')
                ->with('users', $users);
        }
    }
}
