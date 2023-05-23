<?php

namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use App\Models\AllProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user = Auth::user();
        $allProject = AllProject::all();
        return view('back.projects',compact('user','allProject'))->with('title','Projects');
    }
}
