<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin_login');
    }
    
    public function signup()
    {
        return view('admin.admin_register');
    }

    public function signin()
    {
        return view('admin.admin_login');
    }
    
    public function admin_create(Request $request)
    {
        
        $request->validate([
            'name'=>'required',
            'email' => 'required|unique:users|email',
            'password'=>'required'
        ]);

        // save in users table 
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> $request->password
        ]);

        if(\Auth::attempt($request->only('email','password'))){
            return redirect('emp_dashboard');
        }
    }

    public function admin_signin(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(\Auth::attempt($request->only('email','password'))){
            return redirect('emp_dashboard');
        }

        return redirect('/');
    }

    public function logout(){
        \Session::flush();
        \Auth::logout();
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
