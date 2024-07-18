<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('admin.index',['companies'=>$this->getAllCompanies()]);
    }

    private function getAllCompanies()
    {
        /*$companyModel = new Companies();
        return $companyModel->all()->toArray();*/
        return Companies::paginate(5);
    }

    public function uploadCompanyLogo($file): string
    {
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('companies_logo'), $filename);
        return $filename;

    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:companies,name',
            'email' => 'required|email:filter|unique:companies,email',
        ]);

        $company_data = new Companies();
        $company_data->name = $request->input('name');
        $company_data->email = $request->input('email');
        $company_data->website = $request->input('website');
        if ($request->hasFile('logo')) {
            $company_data->logo = $this->uploadCompanyLogo($request->file('logo'));

        }

        $company_data->save();
        return redirect()->route('admin');
    }



    public function edit($id)
    {
        $company = Companies::find($id);
        if(!$company)  return response()->json([ 'success' => false,]);
        $view = view('layouts.admin.edit_company_form', compact('company'))->render();
        return response()->json(['view' => $view]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $company_id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:companies,name,'.$company_id,
            'email' => 'required|email:filter|unique:companies,email,'.$company_id,
        ]);

        $company = Companies::findOrFail($company_id);
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->website = $request->input('website');
        if ($request->hasFile('logo')) {
            $company->logo = $this->uploadCompanyLogo($request->file('logo'));

        }

        $company->update();
        return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Companies::findOrFail($id);
        if (!empty($company->logo)) {
            if (file_exists(public_path('companies_logo').'\\'.$company->logo)) {
                unlink(public_path('companies_logo').'\\'.$company->logo);
            }
        }
        $company->delete();
        return redirect()->route('admin');

    }
}
