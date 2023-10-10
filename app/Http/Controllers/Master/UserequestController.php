<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserequestController extends Controller
{
    public function index()
    {
        // fetch all users where verified = 0 with department name
        $users = User::where('verified', 0)->with('department')->get();
        return view('master.userrequests',compact('users'));
    }
    public function accept($id)
    {
        // fetch user and update verified = 1
        $user = User::find($id);
        $user->verified = 1;
        $user->save();
        // redirect to userrequests page
        return redirect()->route('master.userrequests')->with('success', 'User request accepted successfully');
    }
    public function reject($id)
    {
        // fetch user and delete
        $user = User::find($id);
        $user->delete();
        // redirect to userrequests page
        return redirect()->route('master.userrequests')->with('success', 'User request rejected successfully');
    }
}
