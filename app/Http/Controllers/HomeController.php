<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\cities;
use App\catagories;

use Illuminate\Http\Request;


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
        $city = cities::all();
        $cat = catagories::all();
        $user = auth()->user()->roles()->pluck('name');
        $data = DB::table('posts')->Paginate(5);
        if ($user[0] == "admin"){
            return view('home')->with('data',$data);
        }
        elseif($user[0] == "user"){
            return view('users/index')->with('data',$data)->with('city',$city)->with('cat',$cat);
        }
        else{
            return 'error';
        }
    }

    public function notification()
    {
        return view('notification/reply');
    }
}
