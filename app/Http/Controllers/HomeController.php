<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use App\Models\HomeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataHome = HomeModel::first();
        $companyData = CompanyModel::first();
        return view('adminpage.home.index', compact('dataHome', 'companyData'));
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
            'client' => 'required|integer',
            'project' => 'required|integer',
            'expertise' => 'required|integer',
        ]);

        $id = Crypt::decrypt($id);

        // Cari data berdasarkan ID
        $dataHome = HomeModel::findOrFail($id);

        // Update data
        $dataHome->update($validatedData);

        // Redirect dengan pesan sukses
        return redirect()->route('set-home.index')->with('success', 'Data updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
