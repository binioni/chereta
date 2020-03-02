<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::find(Auth::id());
        return view('layouts.profile')->with('data',$data);
    }

    
    public function edit($id)
    {
        $data = User::find(Auth::id());
        return view('layouts.profile')->with('data',$data);
    }

    
    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->photo = $request->input('photo');
        $data->save();

        return redirect('/profile')->with('success', 'Post updated');
    }

}
