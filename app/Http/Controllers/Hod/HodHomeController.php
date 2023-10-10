<?php

namespace App\Http\Controllers\Hod;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expansemodel;
use App\Models\User;

class HodHomeController extends Controller
{
    public function index()
    {
        // fetch all expanses
        $expanses = Expansemodel::orderBy('status', 'asc')->where('hod_check','0')->where('manager_check','1')->where('status','')->get();
        // fetch all users where department_id is same as logged in manager
        $users = User::where('department_id', auth()->user()->department_id)->get();
        $total_staff = $users->count()-1;
        // now filter expanses by user_id in expanses array and id in users array
        $expanses = $expanses->whereIn('user_id', $users->pluck('id'));
        // put name of user in each expanse
        foreach ($expanses as $expanse) {
            $expanse->staff_name = $users->where('id', $expanse->user_id)->first()->name;
        }
        $unapproved = $expanses->count();
        return view('hod.home', compact('total_staff','unapproved'));
    }
}
