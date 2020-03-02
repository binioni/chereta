<?php

namespace App\Http\Controllers;

use App\Notifications\NewPosts;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\posts;
use App\catagories;
use Gate;
use App\User;
use App\companies;
use App\cities;

class PostsController extends Controller
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
        
        $data = posts::all(); 
        return view('posts.index')->with('data', $data);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $city = cities::all();
        $comp = companies::all();
        $cat = catagories::all();
        $data = DB::table('posts')->Paginate(5);
        return view('posts.create')->with('cat',$cat)->with('comp', $comp)->with('city', $city)->with('data', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::whereHas('roles', function ($query) { //to get the user that is going to be notified

            $query->where('name', '=', 'user');
    
            })->get();
            

        //to validate the input if they are not filled correctly
        $num = $request->input('num');
        $validator = [];
        for($x = 1; $x<=$num; $x++)
        {        
        
            $validator['mytitle_'.$x] = ['required', 'string', 'max:255'];
            $validator['mycontact_'.$x] = ['required', 'string', 'min:10'];
            $validator['myrequirment_'.$x] = 'required';
            $validator['mycity_'.$x] = 'required';
            $validator['mydiscription_'.$x] = 'required';
            $validator['myopen_'.$x] = 'required';
            $validator['myclose_'.$x] = 'required';

        
        }
        $this->validate($request,$validator);

        //to save the posted data into the database
        for($x = 1; $x<=$num; $x++)
        {        

        $data = new posts;

        $data->title = $request->input('mytitle_'.$x);
        $data->contact = $request->input('mycontact_'.$x);
        $data->requirment = $request->input('myrequirment_'.$x);
        $data->city = $request->input('mycity_'.$x);
        $data->description = $request->input('mydiscription_'.$x);
        $data->catagories_id = $request->input('mycatagories_'.$x);
        $data->companies_id = $request->input('mycompanies_'.$x);
        $data->open = $request->input('myopen_'.$x);
        $data->close = $request->input('myclose_'.$x);
        $data->save();

        }
        foreach($user as $users){
            $users->notify(new NewPosts());
        }
        
        return redirect('/posts')->with('success', 'Post Created'); 

            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $data = posts::find($id);
        return view('posts.show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comp = companies::all();
        $cat = catagories::all();
        $data = posts::find($id);
        return view('posts.edit')->with('data', $data)->with('cat',$cat)->with('comp', $comp);
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
        
        //to get data from database and put it in the form
        $posts = posts::find($id);

        $posts->title = $request->input('mytitle');
        $posts->contact = $request->input('mycontact');
        $posts->requirment = $request->input('myrequirment');
        $posts->city = $request->input('mycity');
        $posts->description = $request->input('mydiscription');
        $posts->catagories_id = $request->input('mycatagories');
        $posts->companies_id = $request->input('mycompanies');
        $posts->open = $request->input('myopen');
        $posts->close = $request->input('myclose');
        $posts->save();

        return redirect('/posts')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
