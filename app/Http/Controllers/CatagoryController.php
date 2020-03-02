<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use App\catagories;
use App\companies;
use App\cities;

class CatagoryController extends Controller
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
    public function index()
    {
        
        //$cat = catagories::all();
        //return view('catagory.show')->with('cat',$cat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = catagories::all();
        return view('catagory.create')->with('cat',$cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $num = $request->input('num');
        $validator = [];
        for($x = 1; $x<=$num; $x++)
        {        
        
            $validator['myname_'.$x] = ['required', 'string', 'max:255'];        
        }
        $this->validate($request,$validator);

        //to save the posted data into the database
        for($x = 1; $x<=$num; $x++)
        {        

        $data = new catagories;

        $data->name = $request->input('myname_'.$x);
        $data->save();

        }
        return redirect('/catagory/create')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = catagories::find($id);
        return view('catagory.edit')->with('cat',$cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $this->validate($request,['myname'=>'required', 'string', 'max:255']);

        //to save the posted data into the database
        $data = catagories::find($id);

        $data->name = $request->input('myname');
        $data->save();

        return redirect('/catagory/create')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = catagories::find($id);
        $data->delete();
        return redirect('/catagory')->with('success', 'Post removed');

    }
}
