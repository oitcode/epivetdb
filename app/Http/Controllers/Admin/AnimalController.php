<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/* Other related models. */
use App\Animal;

class AnimalController extends Controller
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
     * Show create animal form page.
     *
     * @return Response
     */
    public function showAnimalCreatePage()
    {
        return view('admin.create-animal');
    }

    /**
     * Process animal create form.
     *
     * @return Response
     */
    public function animalCreateProcess(Request $request)
    {
        /* Todo: Validate input. */


        /* Create new animal object. */
        $newAnimal = new Animal;

        $newAnimal->name = $request->input('animal_name');
        $newAnimal->short_name = $request->input('short_name');
        $newAnimal->code = $request->input('animal_code');
        $newAnimal->comment = $request->input('animal_comment');
        $newAnimal->creator_id = auth()->user()->id;

        /* Save new animal to database. */
        /* Todo: Some try catch exception handling. */
        $newAnimal->save();

        /* Flash success message and redirect. */
	      $request->session()->flash('status', 'Success: Animal Created!');
        return redirect('/admin');
    }

    /**
     * List animals.
     *
     * @return \Illuminate\Http\Response
     */
    public function listAnimals()
    {
        $animals = Animal::all();

        return view('admin.list-animals')
            ->with('animals', $animals);
    }
}
