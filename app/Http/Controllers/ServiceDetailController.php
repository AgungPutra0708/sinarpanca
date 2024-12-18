<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use App\Models\ProjectModel;
use App\Models\ServiceDetailModel;
use App\Models\ServiceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ServiceDetailController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataService = ServiceDetailModel::with('service') // Load the related service
                ->select(['id', 'id_service', 'name_service', 'created_at']) // Include 'created_at' for sorting
                ->orderBy('id', 'desc'); // Order by the latest created_at

            return datatables()->of($dataService)
                ->addIndexColumn() // Menambahkan kolom index (penomoran otomatis)
                ->addColumn('no', function ($row) {
                    static $index = 1;
                    return $index++;
                })
                ->addColumn('name', function ($row) {
                    return $row ? $row->name_service : '-'; // Handle null cases
                })
                ->addColumn('name_service', function ($row) {
                    return $row->service ? $row->service->name_service : '-'; // Handle null cases
                })
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route('set-service-detail.edit', Crypt::encrypt($row->id)) . '" class="btn btn-primary btn-sm">Edit</a>
                        <form action="' . route('set-service-detail.destroy', Crypt::encrypt($row->id)) . '" method="POST" style="display:inline;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $companyData = CompanyModel::first();
        return view('adminpage.service-detail.index', compact('companyData'));
    }

    public function create()
    {
        $companyData = CompanyModel::first();
        $serviceData = ServiceModel::all();
        return view('adminpage.service-detail.form', compact('companyData', 'serviceData'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_service' => 'required|string|max:255',
            'id_service' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('picture')) {
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('img'), $imageName);
            $validatedData['picture'] = $imageName;
        }

        $validatedData['id_service'] = Crypt::decrypt($validatedData['id_service']);

        // var_dump($validatedData);
        // exit;

        ServiceDetailModel::create($validatedData);

        return redirect()->route('set-service-detail.index')->with('success', 'Service detail created successfully.');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $dataServiceDetail = ServiceDetailModel::find($id);
        $serviceData = ServiceModel::all();
        $companyData = CompanyModel::first();
        return view('adminpage.service-detail.form', compact('dataServiceDetail', 'companyData', 'serviceData'));
    }

    public function update(Request $request, $id)
    {
        // Decrypt ID
        $id = Crypt::decrypt($id);

        // Validasi data yang masuk
        $validatedData = $request->validate([
            'name_service' => 'required|string|max:255',
            'id_service' => 'required',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Cari data service detail berdasarkan ID
        $serviceDetail = ServiceDetailModel::findOrFail($id);

        // Jika ada file gambar baru yang diunggah
        if ($request->hasFile('picture')) {
            // Hapus gambar lama jika ada
            if ($serviceDetail->picture && file_exists(public_path('img/' . $serviceDetail->picture))) {
                unlink(public_path('img/' . $serviceDetail->picture));
            }

            // Simpan gambar baru
            $imageName = time() . '.' . $request->picture->extension();
            $request->picture->move(public_path('img'), $imageName);
            $validatedData['picture'] = $imageName;
        } else {
            // Tetap gunakan gambar lama jika tidak ada yang baru
            $validatedData['picture'] = $serviceDetail->picture;
        }

        // Decrypt id_service sebelum disimpan
        $validatedData['id_service'] = Crypt::decrypt($validatedData['id_service']);

        // Update data service detail
        $serviceDetail->update($validatedData);

        return redirect()->route('set-service-detail.index')->with('success', 'Service detail updated successfully.');
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $dataService = ServiceDetailModel::findOrFail($id);

        if ($dataService->picture && file_exists(public_path('img/' . $dataService->picture))) {
            unlink(public_path('img/' . $dataService->picture));
        }

        $dataService->delete();

        return redirect()->route('set-service-detail.index')->with('success', 'Service detail deleted successfully.');
    }
}
