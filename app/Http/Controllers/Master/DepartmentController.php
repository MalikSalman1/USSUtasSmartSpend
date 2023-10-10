<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Departmentsmodel;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Departmentsmodel::all();
        return view('master.department', compact('departments'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments,name'
        ]);
        Departmentsmodel::create($request->all());
        return redirect()->route('master.departments')->with('success', 'Department created successfully');
    }
    public function delete($id)
    {
        $department = Departmentsmodel::find($id);
        $department->delete();
        return redirect()->route('master.departments')->with('success', 'Department deleted successfully');
    }
}
