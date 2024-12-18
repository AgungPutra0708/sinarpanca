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
            'worker' => 'required|integer',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max size 2MB
            'description' => 'nullable', // max size 2MB
        ]);

        $id = Crypt::decrypt($id);

        // Cari data berdasarkan ID
        $dataHome = HomeModel::findOrFail($id);

        // Handle image upload if there is a new image
        if ($request->hasFile('picture')) {
            // Delete old image if exists
            if ($dataHome->picture && file_exists(public_path('img/' . $dataHome->picture))) {
                unlink(public_path('img/' . $dataHome->picture));
            }

            // Store new image
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('img'), $imageName);
            $validatedData['picture'] = $imageName;
        } else {
            // Keep the current image if no new image is uploaded
            $validatedData['picture'] = $dataHome->picture;
        }

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
