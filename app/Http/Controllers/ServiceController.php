<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\CompanyModel;
use App\Models\ServiceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataService = ServiceModel::select(['id', 'name_service']); // Select the columns you need
            return datatables()->of($dataService)
                ->addIndexColumn() // Menambahkan kolom index (penomoran otomatis)
                ->addColumn('no', function ($row) {
                    static $index = 1;
                    return $index++;
                })
                ->addColumn('action', function ($row) {
                    return '<a href="' . route('set-service.edit', Crypt::encrypt($row->id)) . '" class="btn btn-primary btn-sm">Edit</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $companyData = CompanyModel::first();
        return view('adminpage.servis.index', compact('companyData'));
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
        $id = Crypt::decrypt($id);
        $dataService = ServiceModel::find($id);
        $companyData = CompanyModel::first();
        return view('adminpage.servis.form', compact('dataService', 'companyData'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        // Decrypt ID
        $id = Crypt::decrypt($id);

        // Validate input, make `picture` optional
        $validatedData = $request->validate([
            'name_service' => 'required|string|max:255',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max size 2MB
        ]);

        // Retrieve the service data
        $dataService = ServiceModel::findOrFail($id);

        // Handle image upload if there is a new image
        if ($request->hasFile('picture')) {
            // Delete old image if exists
            if ($dataService->picture && file_exists(public_path('img/' . $dataService->picture))) {
                unlink(public_path('img/' . $dataService->picture));
            }

            // Store new image
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('img'), $imageName);
            $validatedData['picture'] = $imageName;
        } else {
            // Keep the current image if no new image is uploaded
            $validatedData['picture'] = $dataService->picture;
        }

        // Update the service data
        $dataService->update($validatedData);

        // Redirect with a success message
        return redirect()->route('set-service.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
