<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Departmentsmodel as Department;

class MasterProfileController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $user = User::find(auth()->user()->id);
        return view('master.profile', compact('user', 'departments'));
    }
    public function update(Request $request)
    {
        if($request->password)
        {
            $request->validate([
                'password' => 'confirmed'
            ]);
            $user = User::find(auth()->user()->id);
            $user->password = bcrypt($request->password);
            $user->save();
        }
        else{
            return redirect()->back()->with('error', 'Empty Fields');
        }
        return redirect()->back()->with('success', 'Password Updated');
    }
}