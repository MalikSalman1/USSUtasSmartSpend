<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departmentsmodel as Department;

class StaffProfileController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $user = User::find(auth()->user()->id);
        return view('staff.profile', compact('user', 'departments'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'department_id' => 'required',
        ]);
        if($request->password)
        {
            $request->validate([
                'password' => 'confirmed'
            ]);
            $user = User::find(auth()->user()->id);
            $user->department_id = $request->department_id;
            $user->password = bcrypt($request->password);
            $user->verified = 0;
            $user->save();
        }
        else{
            $user = User::find(auth()->user()->id);
            $user->department_id = $request->department_id;
            $user->verified = 0;
            $user->save();
        }
        return redirect('/waiting')->with('success', 'Profile updated successfully');
    }
}
