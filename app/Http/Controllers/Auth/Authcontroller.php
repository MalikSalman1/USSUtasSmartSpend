<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departmentsmodel;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function signup_page()
    {
        $departments = Departmentsmodel::all();

        return view('signup', compact('departments'));
    }
    public function signup(Request $request)
    {
        /* 'name',
        'emp_id',
        'role',
        'department_id',
        'password',
        'verified' */
        $request->validate([
            'name' => 'required',
            'emp_id' => 'required|unique:users,emp_id',
            'role' => 'required | in:staff,manager,hod',
            'department_id' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $request['password'] = bcrypt($request->password);
        User::create($request->all());
        // redirect to waiting page
        return redirect()->route('waiting')->with('success', 'Account created successfully');
    }
    public function login_page()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'emp_id' => 'required',
            'password' => 'required'
        ]);
        $credentials = $request->only('emp_id', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            
            if ($user->verified == 0) {
                Auth::logout();
                return redirect()->route('login')->with('error', 'Your account is not verified yet');
            }
            if ($user->role == 'staff') {
                return redirect()->route('staff.home');
            } elseif ($user->role == 'manager') {
                return redirect()->route('manager.home');
            } elseif ($user->role == 'hod') {
                return redirect()->route('hod.home');
            } elseif ($user->role == 'master') {
                return redirect()->route('master.home');
            }
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }
}
