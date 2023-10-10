<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expansemodel;
use App\Models\User;

class ManagerExpanseController extends Controller
{
    public function index()
    {
        // fetch all expanses
        $expanses = Expansemodel::orderBy('status', 'asc')->where('manager_check','0')->get();
        // fetch all users where department_id is same as logged in manager
        $users = User::where('department_id', auth()->user()->department_id)->get();
        // now filter expanses by user_id in expanses array and id in users array
        $expanses = $expanses->whereIn('user_id', $users->pluck('id'));
        // put name of user in each expanse
        foreach ($expanses as $expanse) {
            $expanse->staff_name = $users->where('id', $expanse->user_id)->first()->name;
        }
        
        return view('manager.expanses', compact('expanses'));
    }
    public function accept($id)
    {
        $expanse = Expansemodel::find($id);
        $expanse->manager_check = 1;
        $expanse->save();
        return redirect()->route('manager.expanses')->with('success', 'Expanse accepted successfully');
    }
    public function reject(Request $request)
    {
        $id = $request->id;
        $expanse = Expansemodel::find($id);
        $expanse->comments=$request->comments;
        $expanse->manager_check = 1;
        $expanse->status = 0;
        $expanse->save();
        return redirect()->route('manager.expanses')->with('success', 'Expanse rejected successfully');
    }
    public function download($file)
    {
        return response()->download(public_path('expanses_attached/' . $file));
    }
    
}
