<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\CompanyModel;
use App\Models\LocationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companyData = CompanyModel::first();
        return view('adminpage.company.index', compact('companyData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        // Decrypt ID
        $id = Crypt::decrypt($id);

        // Validate input, make 'logo' optional
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'motto' => 'required|string|max:255',
            'notelp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max size 2MB
        ]);

        // Retrieve the company data
        $dataCompany = CompanyModel::findOrFail($id);

        // Handle logo upload if a new logo is uploaded
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($dataCompany->logo && file_exists(public_path('img/' . $dataCompany->logo))) {
                unlink(public_path('img/' . $dataCompany->logo));
            }

            // Store new logo
            $imageName = time() . '.' . $request->logo->extension();
            $request->logo->move(public_path('img'), $imageName);
            $validatedData['logo'] = $imageName;
        } else {
            // Keep the current logo if no new logo is uploaded
            $validatedData['logo'] = $dataCompany->logo;
        }

        // Update the company data
        $dataCompany->update($validatedData);

        // Redirect with a success message
        return redirect()->route('set-company.index')->with('success', 'Company data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
