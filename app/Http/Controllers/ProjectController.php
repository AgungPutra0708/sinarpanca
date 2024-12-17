<?php

namespace App\Http\Controllers;

use App\Models\CompanyModel;
use App\Models\ProjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $dataProject = ProjectModel::select(['id', 'name_project','service', 'location_project', 'year_project', 'status_project']);
            return datatables()->of($dataProject)
                ->addIndexColumn() // Menambahkan kolom index (penomoran otomatis)
                ->addColumn('no', function ($row) {
                    static $index = 1;
                    return $index++;
                })
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route('set-project.edit', Crypt::encrypt($row->id)) . '" class="btn btn-primary btn-sm">Edit</a>
                        <form action="' . route('set-project.destroy', Crypt::encrypt($row->id)) . '" method="POST" style="display:inline;">
                            ' . csrf_field() . method_field('DELETE') . '
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $companyData = CompanyModel::first();
        return view('adminpage.project.index', compact('companyData'));
    }

    public function create()
    {
        $companyData = CompanyModel::first();
        return view('adminpage.project.form', compact('companyData'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_project' => 'required|string|max:255',
            'service' => 'required|string|max:100',
            'picture_project' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location_project' => 'required|string|max:255',
            'year_project' => 'required|integer',
            'status_project' => 'required|in:now,completed',
        ]);

        if ($request->hasFile('picture_project')) {
            $imageName = time() . '.' . $request->picture_project->extension();
            $request->picture_project->move(public_path('img'), $imageName);
            $validatedData['picture_project'] = $imageName;
        }

        ProjectModel::create($validatedData);

        return redirect()->route('set-project.index')->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $dataProject = ProjectModel::find($id);
        $companyData = CompanyModel::first();
        return view('adminpage.project.form', compact('dataProject', 'companyData'));
    }

    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);

        $validatedData = $request->validate([
            'name_project' => 'required|string|max:255',
            'service' => 'required|string|max:100',
            'picture_project' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location_project' => 'required|string|max:255',
            'year_project' => 'required|integer',
            'status_project' => 'required|in:now,completed',
        ]);

        $dataProject = ProjectModel::findOrFail($id);

        if ($request->hasFile('picture_project')) {
            if ($dataProject->picture_project && file_exists(public_path('img/' . $dataProject->picture_project))) {
                unlink(public_path('img/' . $dataProject->picture_project));
            }

            $imageName = time() . '.' . $request->picture_project->extension();
            $request->picture_project->move(public_path('img'), $imageName);
            $validatedData['picture_project'] = $imageName;
        } else {
            $validatedData['picture_project'] = $dataProject->picture_project;
        }

        $dataProject->update($validatedData);

        return redirect()->route('set-project.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        $dataProject = ProjectModel::findOrFail($id);

        if ($dataProject->picture_project && file_exists(public_path('img/' . $dataProject->picture_project))) {
            unlink(public_path('img/' . $dataProject->picture_project));
        }

        $dataProject->delete();

        return redirect()->route('set-project.index')->with('success', 'Project deleted successfully.');
    }
}
