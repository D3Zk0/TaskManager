<?php

namespace App\Http\Controllers;

use App\Project;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $projects = Auth::user()->projects()->get();
        $private = Auth::user()->projects()->where("visibility", "private")->get();
        $public = Auth::user()->projects()->where("visibility", "public")->get();
        $tasks = $project->tasks()->get();
        $users = $project->users()->get();
        return view("project.index", ["users" => $users,"tasks" => $tasks, "project" => $project,"projects" => $projects, "private" => $private, "public" => $public]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Auth::user()->projects()->get();
        $private = Auth::user()->projects()->where("visibility", "private")->get();
        $public = Auth::user()->projects()->where("visibility", "public")->get();
        $users = User::where("id", "!=", Auth::user()->id)->get();
        return view("project.add", ["users" => $users,"projects" => $projects, "private" => $private, "public" => $public]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = new Project();
        $project->title = $request->title;
        $project->visibility = $request->type;
        $project->save();
        $project->users()->attach(Auth::user());
        if($request->type === "public")
        $project->users()->attach($request->users);
        return redirect()->to("/home");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $projects = Auth::user()->projects()->get();
        $private = Auth::user()->projects()->where("visibility", "private")->get();
        $public = Auth::user()->projects()->where("visibility", "public")->get();
        $users = User::where("id", "!=", Auth::user()->id)->get();
        $sel = $project->users()->get()->pluck("id")->toArray();
        return view("project.edit", ["sel"=> $sel, "project" => $project, "users" => $users,"projects" => $projects, "private" => $private, "public" => $public]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $project->users()->detach();
        $project->title = $request->title;
        $project->visibility = $request->type;
        $project->save();
        $project->users()->attach(Auth::user());
        if($request->type === "public")
            $project->users()->attach($request->users);
        return redirect()->to("/home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
