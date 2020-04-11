<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $value = Project::all();
        return view('admin',compact('value'));
    }
    public function delete($id)
    {
        $value = Project::find($id);
        $value->delete();
        return back();
    }
    public function view($id)
    {
        $value = Project::find($id);
        return view('admin_project_view',compact('value'));
    }




    public function edit($id)
    {
        $value = Project::find($id);
        return view('admin_project_edit',compact('value'));
    }
    public function editaction(Request $request, $id)
    {
        $value = Project::find($id);
        $value->project_name = $request->project_name;
        $value->project_description = $request->project_description;
        $value->save();
        return redirect('/admin');
    }

}
