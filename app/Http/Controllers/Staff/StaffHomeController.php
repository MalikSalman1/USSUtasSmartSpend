<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expansemodel;
use Illuminate\Support\Facades\Auth;

class StaffHomeController extends Controller
{
    public function index()
    {
        $approved_expanses = Expansemodel::where('status', '1')->where('user_id',Auth()->user()->id)->count();
        $waiting_expanses = Expansemodel::where('status', '')->where('user_id',Auth()->user()->id)->count();
        return view('staff.home', compact('approved_expanses', 'waiting_expanses'));
    }
}
