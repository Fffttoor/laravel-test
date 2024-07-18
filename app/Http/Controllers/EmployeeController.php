<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Companies::select('id', 'name')->get();
        $companies_collection = collect($companies);
        return view('admin.employees',['employees'=>$this->getAllEmployees(),'companies'=>$companies,'companies_collection'=>$companies_collection]);

    }

    private function getAllEmployees()
    {
        return Employee::paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'nullable|email:filter|unique:employees,email',
            'phone' => 'nullable|unique:employees,phone',
            'company_id' => 'required|exists:companies,id',
        ]);
        $employee = new Employee();
        $employee->fill($validated);
        $employee->save();
        return redirect()->route('employees');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee= Employee::find($id);
        if(!$employee)  return response()->json([ 'view' => false]);
        $companies = Companies::select('id', 'name')->get();
        $view = view('layouts.admin.edit_employee_form', compact('employee','companies'))->render();
        return response()->json(['view' => $view]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'nullable|email:filter|unique:employees,email,'.$id,
            'phone' => 'nullable|unique:employees,phone,'.$id,
            'company_id' => 'required|exists:companies,id',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->fill($validated);
        $employee->update();
        return redirect()->route('employees');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return redirect()->route('employees');

    }
}
