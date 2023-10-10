<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expansemodel;

class StaffExpanseController extends Controller
{
    public function index()
    {
        // fetch all expanses of logged in user and sort by status
        $expanses = Expansemodel::where('user_id', auth()->user()->id)->orderBy('status', 'asc')->get();
        return view('staff.expanses', compact('expanses'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required | numeric',
            'file' => 'required'
        ]);
        $file = $request->file('file');
        // extract name of file as oldname
        $oldname = $file->getClientOriginalName();
        // $filename = time().'_'.$oldname.'.'.$file->getClientOriginalExtension();
        $filename = time() . '_' . $oldname . '.' . $file->extension();
        $file->move(public_path('expanses_attached'), $filename);
        $expanse = new Expansemodel();
        $expanse->name = $request->name;
        $expanse->amount = $request->amount;
        $expanse->file = $filename;
        $expanse->user_id = auth()->user()->id;
        $expanse->save();
        return redirect()->route('staff.expanses')->with('success', 'Expanse created successfully');
    }
    public function delete($id)
    {
        $expanse = Expansemodel::find($id);
        $expanse->delete();
        return redirect()->route('staff.expanses')->with('success', 'Expanse deleted successfully');
    }
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'amount' => 'required | numeric'
        ]);
        $expanse = Expansemodel::find($request->id);
        $expanse->update($request->all());
        return redirect()->route('staff.expanses')->with('success', 'Expanse updated successfully');
    }
    public function download($file)
    {
        return response()->download(public_path('expanses_attached/' . $file));
    }
}
