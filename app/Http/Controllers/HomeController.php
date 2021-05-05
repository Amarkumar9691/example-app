<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Task;
use Illuminate\Support\Facades\Session;


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
        $tasks = Task::where('user_id',Auth::user()->id)->orderby('updated_at','DESC')->simplePaginate(5);
        $token = Session::get('api_token');
        return view('home',['task'=>$tasks,'token'=>$token]);
    }

    
}
