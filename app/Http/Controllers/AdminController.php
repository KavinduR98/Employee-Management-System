<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{
    
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
        $email = $request->input('email');
		$password = $request->input('password');
		$confirmPassword = $request->input('confirmPassword');

        $data=array('email'=>$email,
					'password'=>$password,
					'confirmPassword'=>$confirmPassword,
		);

        DB::table('rbs_db.tbl_admin')
            ->insert($data);

            return redirect('/emp_dashboard');
    }

    public function admin_signin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $admin = DB::table('rbs_db.tbl_admin')
            ->select('email', 'password')
            ->where('email', $email)
            ->first();

        if($email === $admin->email && $password === $admin->password) {
            return redirect('/emp_dashboard');
        } else {
            return redirect('/login');
        }
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
