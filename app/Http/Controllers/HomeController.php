<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $value = Project::all();
        return view('home', compact('value'));
    }

    public function store(Request $request)
    {
        $value = new Project;
        $value->std_email = Auth::user()->email;
        $value->std_id = Auth::user()->std_id;
        $value->project_name = $request->project_name;
        $value->project_description = $request->project_description;
        $value->save();
        return back();
    }
    public function delete($id)
    {
        $value = Project::find($id);
        $value->delete();
        return back();
    }
}
