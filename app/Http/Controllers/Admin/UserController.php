<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User;

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
}
