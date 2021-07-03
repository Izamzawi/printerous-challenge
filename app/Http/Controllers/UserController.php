<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
        return view('register');
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

    public function showLoginForm()
    {   
        return view('login');
    }

    function login(Request $request)
    {
        Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if(Auth::check()){
            $user = User::where(['email'=>$request->email])->first();
            $request->session()->put('user', $user);

            // if($user->role_id == '1'){
                return redirect('/');
            // } if($user->role_id == '2'){
            //     return redirect('/organization/{$id}', $org->id);
            // }
        } else {
            return "Username or password is not matched.";
        }
    }

    public function admin()
    {
        return view('admin');
    }

    public function registerAdmin(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = 1;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/login');
    }

    public function registerManager(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = 2;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/');
    }
}
