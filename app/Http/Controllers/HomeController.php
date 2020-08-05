<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    public function edit(User $user)
    {   $projects = Auth::user()->projects()->get();
        $private = Auth::user()->projects()->where("visibility", "private")->get();
        $public = Auth::user()->projects()->where("visibility", "public")->get();
        return view('user.edit', ["user" => $user,"projects" => $projects, "private" => $private, "public" => $public]);
    }
    public function store(User $user, Request $request)
    {
        $projects = Auth::user()->projects()->get();
        $private = Auth::user()->projects()->where("visibility", "private")->get();
        $public = Auth::user()->projects()->where("visibility", "public")->get();
        if(
        Validator::make((array)$request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]) && $request->password === $request->repeat_password)
        {

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
            return view('user.edit', ["user" => $user,"projects" => $projects, "private" => $private, "public" => $public]);
        }
        return back()->withErrors(['password' => ['Your credentials are invalid.']]);
    }


    public function index()
    {
        $projects = Auth::user()->projects()->get();
        $private = Auth::user()->projects()->where("visibility", "private")->get();
        $public = Auth::user()->projects()->where("visibility", "public")->get();

        return view('dashboard', ["projects" => $projects, "private" => $private, "public" => $public]);
    }
}
