<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\companies;
use App\cities;

class CompanyController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = cities::all();
        $comp = companies::all();
        return view('company.create')->with('cat',$cat)->with('comp',$comp);
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
            $validator['mycontact_'.$x] = ['required', 'string', 'min:10'];      
            $validator['mydiscription_'.$x] = ['required', 'string', 'min:25'];
            $validator['mycity_'.$x] = ['required', 'string', 'max:255'];
            $validator['myweb_'.$x] = ['required', 'string', 'max:255'];
            $validator['myface_'.$x] = ['required', 'string', 'max:255'];
        }
        $this->validate($request,$validator);

        //to save the posted data into the database
        for($x = 1; $x<=$num; $x++)
        {        

        $data = new companies;

        $data->name = $request->input('myname_'.$x);
        $data->phone = $request->input('mycontact_'.$x);
        $data->description = $request->input('mydiscription_'.$x);
        $data->cities_id = $request->input('mycity_'.$x);
        $data->website = $request->input('myweb_'.$x);
        $data->facebook = $request->input('myface_'.$x);
        $data->save();

        }
        return redirect('/company/create')->with('success', 'Post Created');
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
        $city = cities::all();
        $cat = companies::find($id);
        return view('company.edit')->with('cat',$cat)->with('city',$city);
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
       
        $this->validate($request,['myname'=>'required', 'string', 'max:255',
        'mycontact'=>'required', 'string', 'max:255',
        'mydiscription'=>'required', 'string', 'max:255',
        'mycity'=>'required', 'string', 'max:255',
        'myweb'=>'required', 'string', 'max:255',
        'myface'=>'required', 'string', 'max:255',
        ]);

        //to save the posted data into the database
        $data = companies::find($id);

        $data->name = $request->input('myname');
        $data->description = $request->input('mydiscription');
        $data->cities_id = $request->input('mycity');
        $data->phone = $request->input('mycontact');
        $data->website = $request->input('myweb');
        $data->facebook = $request->input('myface');
        $data->save();

        return redirect('/company/create')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = companies::find($id);
        $data->delete();
        return redirect('company/create')->with('success', 'Post removed');

    }
}
