<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Auth;
use JWTAuth;
use App\Http\Requests\RegistrationFormRequest;
use Tymon\JWTAth\Exceptions\JWTException;


use App\User;
use App\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {

        $this->guard = \Auth::guard('api');
    }
    

    public $loginAfterSignUp = true;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('user.index')->with('data', $data);
    }

    public function register(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($this->loginAfterSignUp) {
            return $this->login($request);
        }

        return response()->json([
            'success'   =>  true,
            'data'      =>  $user
        ], 200);
        
    }

    public function login(Request $request){

        $input = $request->only('email','password');
        $jwt_token = null;
        if(!$jwt_token = JWTAuth::attempt($input)){
            return response()->json([
                'success'=>false,
                'message' => 'incalid Email and password',
            ], 401);
        }

        //get the user

        $User = Auth::User();

        return response()->json([
            'success' => true,
            'token' => $jwt_token,
            'user' =>$User,
        ]);
    }

    public function getCurrentUser(Request $request){
        
            return response()->json([
                'message' => 'Token is required'
            ]);
        
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
