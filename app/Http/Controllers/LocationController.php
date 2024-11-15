<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\CompanyModel;
use App\Models\LocationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataLocation = LocationModel::first();
        $companyData = CompanyModel::first();
        return view('adminpage.location.index', compact('dataLocation', 'companyData'));
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
        $request->validate([
            'head_office' => 'required',
            'branch_office' => 'required',
            'maps' => 'required',
        ]);

        $data = [
            'head_office' => $request->head_office,
            'branch_office' => $request->branch_office,
            'maps' => $request->maps,
        ];

        $id = Crypt::decrypt($id);

        // Cari data berdasarkan ID
        $dataLocation = LocationModel::findOrFail($id);

        // Update data
        $dataLocation->update($data);

        // Redirect dengan pesan sukses
        return redirect()->route('set-location.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
