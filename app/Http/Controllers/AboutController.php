<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\CompanyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataAbout = AboutModel::first();
        $companyData = CompanyModel::first();
        return view('adminpage.about.index', compact('dataAbout', 'companyData'));
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
        // Validasi input
        $validatedData = $request->validate([
            'vision' => 'required',
            'mission' => 'required',
            'description' => 'required',
        ]);

        $id = Crypt::decrypt($id);

        // Cari data berdasarkan ID
        $dataAbout = AboutModel::findOrFail($id);

        // Update data
        $dataAbout->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('set-about.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
