<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // count departments, hod, staff, manager
        $departments = DB::table('departments')->count();
        $hods = DB::table('users')->where('role', 'hod')->count();
        $staffs = DB::table('users')->where('role', 'staff')->count();
        $managers = DB::table('users')->where('role', 'manager')->count();
        return view('master.home', compact('departments', 'hods', 'staffs', 'managers'));
    }
}
